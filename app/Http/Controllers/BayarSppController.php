<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
 
use App\Models\BayarSppDetail;
use App\Models\BayarSppHead;
use App\Models\Bulan;
use App\Models\LogHistori;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
 
 

class BayarSppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }

    public function index()
    {
        $tahunAjaran = TahunAjaran::select('id', 'nama_tahun_ajaran')->get();
        $bulan = Bulan::all();
        $siswa = Siswa::all();
        $bayar_spp = BayarSppHead::all();

        return view('back.bayar_spp.index', compact('bayar_spp','bulan','siswa','tahunAjaran'));
    }

    public function tagihanSpp()
    {
        $tahunAjaran = TahunAjaran::select('id', 'nama_tahun_ajaran')->get();
        $bulan = Bulan::all();
        $siswa = Siswa::all();
        $bayar_spp = BayarSppHead::all();

        return view('back.tagihan_spp.index', compact('bayar_spp','bulan','siswa','tahunAjaran'));
    }
    
    public function getJumlahSPP()
    {
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if ($tahunAjaranAktif) {
            $jumlahSPP = Spp::where('tahun_ajaran_id', $tahunAjaranAktif->id)->value('jumlah_spp');

            return response()->json(['jumlah_spp' => $jumlahSPP]);
        }

        return response()->json(['error' => 'Tidak ada tahun ajaran yang aktif'], 404);
    }


    public function simpanBayarSpp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembayaran' => 'required',
            'siswa_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required',
            'metode_pembayaran' => 'required',
            'bulan_id' => 'required|array',
            'bulan_id.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

         // Periksa kombinasi bulan_id dan siswa_id sebelum menyimpan
        $input = $request->all();
        $existingRecords = BayarSppDetail::whereIn('bulan_id', $input['bulan_id'])
            ->where('siswa_id', $input['siswa_id'])
            ->exists();

        if ($existingRecords) {
            return response()->json(['message' => 'Spp Bulan Sudah Dibayar'], 400);
        }

       // Menghapus koma pada jumlah_spp dan jumlah_bayar sebelum menyimpan
        $input = $request->all();
        if (isset($input['jumlah_spp'])) {
            $input['jumlah_spp'] = str_replace(',', '', $input['jumlah_spp']);
        }
        if (isset($input['jumlah_bayar'])) {
            $input['jumlah_bayar'] = str_replace(',', '', $input['jumlah_bayar']);
        }

        // Simpan data ke tabel bayar_spp_head setelah menghapus koma pada jumlah_spp
        $bayarSppHead = BayarSppHead::create([
            'kode_pembayaran' => $input['kode_pembayaran'],
            'siswa_id' => $input['siswa_id'],
            'tanggal_bayar' => $input['tanggal_bayar'],
            'jumlah_bayar' => $input['jumlah_bayar'],
            'metode_pembayaran' => $input['metode_pembayaran'],
            'keterangan' => $input['keterangan'],
            'jumlah_spp' => $input['jumlah_spp'], // Nilai yang telah diubah tanpa koma
            'status_head' => 'Lunas',
        ]);

        // Simpan data ke tabel bayar_spp_detail
        foreach ($input['bulan_id'] as $bulanId) {
            BayarSppDetail::create([
                'bayar_spp_head_id' => $bayarSppHead->id,
                'status_bayar' => 'Lunas',
                'siswa_id' => $input['siswa_id'],
                'bulan_id' => $bulanId,
            ]);
        }

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'bayar_pp', $bayarSppHead->id, $loggedInUserId, null, json_encode($bayarSppHead));


        return response()->json(['message' => 'Data disimpan']);
    }

        

// public function getBayarSppById($id)
// {
//     $bayarSiswa = BayarSppHead::with('siswa')->findOrFail($id);
//     $bulan = BayarSppDetail::where('bayar_bayarSppHead_head_id', $id)->pluck('bulan_id')->toArray();
    

//     return response()->json([
//         'siswa_id' => $bayarSiswa->siswa_id,
//         'bulan_id' => $bulan,
//     ]);
// }

public function getBayarSppById($id)
{
    $bayarSiswa = BayarSppHead::with('siswa')->findOrFail($id);
    $bulan = BayarSppDetail::where('bayar_spp_head_id', $id)->pluck('bulan_id')->toArray();
    
    $data = $bayarSiswa->toArray();
    $data['bulan_id'] = $bulan;

    return response()->json($data);
}

  
 

public function hapusBayarSpp($id)
{
    // Temukan data BayarSppHead berdasarkan ID
    $bayarSppHead = BayarSppHead::findOrFail($id);

    // Mulai transaksi database
    DB::beginTransaction();

    try {
        // Hapus terlebih dahulu data di BayarSppDetail sesuai bayar_spp_head_id
        BayarSppDetail::where('bayar_spp_head_id', $bayarSppHead->id)->delete();

        // Setelah itu, hapus data pada BayarSppHead
        $bayarSppHead->delete();

        // Commit transaksi jika tidak ada kesalahan
        DB::commit();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'bayar_spp', $id, $loggedInUserId, json_encode($bayarSppHead), null);


        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollback();

        return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
    }
}

  
   
/**
 * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
    }
    
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }
    
    public function update(Request $request, $id)
    {
        // Validasi data
        $this->validate($request, [
            'siswa_id' => 'required',
            'jumlah_bayar' => 'required',
            'metode_pembayaran' => 'required|in:Cash,Transfer',
            'keterangan' => 'nullable|string',
        ]);
    
        // Dapatkan data dari request
        $siswaId = $request->input('siswa_id');
        $jumlahBayar = str_replace(',', '', $request->input('jumlah_bayar'));
        $metodePembayaran = $request->input('metode_pembayaran');
        $keterangan = $request->input('keterangan');
    
        // Menghapus koma pada jumlah_spp dan jumlah_bayar sebelum menyimpan
        $input = $request->all();
        if (isset($input['jumlah_spp'])) {
            $input['jumlah_spp'] = str_replace(',', '', $input['jumlah_spp']);
        }
    
        // Update data bayar_spp_head
        $bayarSppHead = BayarSppHead::findOrFail($id);
        $oldData = $bayarSppHead->getOriginal();
        $bayarSppHead->siswa_id = $siswaId;
        $bayarSppHead->jumlah_bayar = $jumlahBayar;
        $bayarSppHead->metode_pembayaran = $metodePembayaran;
        $bayarSppHead->keterangan = $keterangan;
        $bayarSppHead->save();
    
        // Dapatkan data bulan_id dari request
        $bulanIds = $request->input('bulan_id');
    
        // Hapus semua data bayar_spp_detail yang memiliki bayar_spp_head_id = $id
        BayarSppDetail::where('bayar_spp_head_id', $id)->delete();
    
        // Simpan data bayar_spp_detail
        foreach ($bulanIds as $bulanId) {
            $bayarSppDetail = new BayarSppDetail();
            $bayarSppDetail->bayar_spp_head_id = $id;
            $bayarSppDetail->bulan_id = $bulanId;
            $bayarSppDetail->siswa_id = $siswaId;
    
            $bayarSppDetail->save();
        }
    
        // Buat pesan sukses
        $message = "Data berhasil diupdate";
    
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'bayar_spp', $bayarSppHead->id, $loggedInUserId, json_encode($oldData), json_encode($bayarSppHead));
    
        // Return response
        return response()->json([
            'success' => true,
            'message' => $message,
        ]);
    }
    
    
    

  
    public function destroy($id)
    {
           
    }
    
}
