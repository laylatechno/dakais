<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;

 
use App\Models\BayarSppHead;
use App\Models\Bulan;
use App\Models\LogHistori;
use App\Models\Siswa;
use App\Models\Spp;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class RekapSppController extends Controller
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

    

    public function index(Request $request, $siswa_id = null)
{
    // Mengambil data umum
    $spp = Spp::where('status', 'Aktif')->get(); // Data SPP
    $bulan = Bulan::all();
    $siswa = Siswa::all();
 // Mendapatkan nama siswa
 $nama_siswa = Siswa::find($siswa_id)?->nama_siswa;
    // Data rekap SPP
    if ($siswa_id) {
        $rekap_spp_detail = BayarSppHead::where('siswa_id', $siswa_id)->get(); // Filter berdasarkan siswa_id
    } else {
        $rekap_spp_detail = collect(); // Semua data rekap SPP
    }

    $rekap_spp_head = BayarSppHead::all()->groupBy('siswa_id'); // Kelompokkan berdasarkan siswa_id

    // Bagian "unpaid" untuk siswa tertentu
    if ($siswa_id) {
        // Filter SPP berdasarkan status "Aktif" dan left join dengan `bayar_spp_head`
        $unpaid_spp = Spp::where('status', 'Aktif') // Hanya mengambil SPP yang aktif
            ->leftJoin('bayar_spp_head', function ($join) use ($siswa_id) {
                $join->on('spp.id', '=', 'bayar_spp_head.spp') 
                     ->where('bayar_spp_head.siswa_id', '=', $siswa_id); // Filter berdasarkan siswa_id
            })
            ->whereNull('bayar_spp_head.id') // Ambil SPP yang belum dibayar oleh siswa tersebut
            ->orderBy('spp.id', 'asc') // Mengurutkan berdasarkan id SPP dalam urutan naik
            ->select('spp.id as spp', 'spp.bulan', 'spp.tahun', 'spp.id') // Memilih kolom yang diperlukan
            ->get();
    } else {
        $unpaid_spp = collect(); // Tidak ada data unpaid jika siswa_id tidak ada
    }
    
    
    return view('back.rekap_spp.index', compact('rekap_spp_head', 'bulan', 'siswa', 'spp', 'rekap_spp_detail', 'unpaid_spp', 'nama_siswa'));
}



    // public function tagihanSpp()
    // {
    //     $tahunAjaran = TahunAjaran::select('id', 'nama_tahun_ajaran')->get();
    //     $bulan = Bulan::all();
    //     $siswa = Siswa::all();
    //     $rekap_spp = BayarSppHead::all();

    //     return view('back.tagihan_spp.index', compact('rekap_spp', 'bulan', 'siswa', 'tahunAjaran'));
    // }

    public function getSppDetails($id)
    {
        $spp = Spp::find($id); // Temukan data Spp berdasarkan ID
        if ($spp) {
            return response()->json([
                'success' => true,
                'jumlah_spp' => $spp->jumlah_spp, // Mengembalikan nilai jumlah_spp
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan.',
            ]);
        }
    }



    public function simpanRekapSpp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_pembayaran' => 'required',
            'siswa_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required',
            'metode_pembayaran' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Periksa kombinasi bulan_id dan siswa_id sebelum menyimpan
        $input = $request->all();
       

        // Menghapus koma pada jumlah_spp dan jumlah_bayar sebelum menyimpan
        $input = $request->all();
        if (isset($input['jumlah_spp'])) {
            $input['jumlah_spp'] = str_replace(',', '', $input['jumlah_spp']);
        }
        if (isset($input['jumlah_bayar'])) {
            $input['jumlah_bayar'] = str_replace(',', '', $input['jumlah_bayar']);
        }

        // Simpan data ke tabel rekap_spp_head setelah menghapus koma pada jumlah_spp
        $bayarSppHead = BayarSppHead::create([
            'kode_pembayaran' => $input['kode_pembayaran'],
            'siswa_id' => $input['siswa_id'],
            'tanggal_bayar' => $input['tanggal_bayar'],
            'jumlah_bayar' => $input['jumlah_bayar'],
            'metode_pembayaran' => $input['metode_pembayaran'],
            'keterangan' => $input['keterangan'],
            'jumlah_spp' => $input['jumlah_spp'], // Nilai yang telah diubah tanpa koma
            'spp' => $input['spp'], // Nilai yang telah diubah tanpa koma
            'status_head' => 'Lunas',
        ]);

       
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'bayar_pp', $bayarSppHead->id, $loggedInUserId, null, json_encode($bayarSppHead));


        return response()->json(['message' => 'Data disimpan']);
    }



    // public function getRekapSppById($id)
    // {
    //     $bayarSiswa = BayarSppHead::with('siswa')->findOrFail($id);
    //     $bulan = RekapSppDetail::where('bayar_bayarSppHead_head_id', $id)->pluck('bulan_id')->toArray();


    //     return response()->json([
    //         'siswa_id' => $bayarSiswa->siswa_id,
    //         'bulan_id' => $bulan,
    //     ]);
    // }

    // public function getRekapSppById($id)
    // {
    //     $bayarSiswa = BayarSppHead::with('siswa')->findOrFail($id);

    //     $data = $bayarSiswa->toArray();

    //     return response()->json($data);
    // }




    public function hapusRekapSpp($id)
    {
        // Temukan data BayarSppHead berdasarkan ID
        $bayarSppHead = BayarSppHead::findOrFail($id);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Hapus terlebih dahulu data di RekapSppDetail sesuai rekap_spp_head_id
            // RekapSppDetail::where('rekap_spp_head_id', $bayarSppHead->id)->delete();

            // Setelah itu, hapus data pada BayarSppHead
            $bayarSppHead->delete();

            // Commit transaksi jika tidak ada kesalahan
            DB::commit();

            $loggedInUserId = Auth::id();

            // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'rekap_spp', $id, $loggedInUserId, json_encode($bayarSppHead), null);


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
        $jumlahRekap = str_replace(',', '', $request->input('jumlah_bayar'));
        $metodePembayaran = $request->input('metode_pembayaran');
        $keterangan = $request->input('keterangan');
        $spp = $request->input('spp');

        // Menghapus koma pada jumlah_spp dan jumlah_bayar sebelum menyimpan
        $input = $request->all();
        if (isset($input['jumlah_spp'])) {
            $input['jumlah_spp'] = str_replace(',', '', $input['jumlah_spp']);
        }

        // Update data rekap_spp_head
        $bayarSppHead = BayarSppHead::findOrFail($id);
        $oldData = $bayarSppHead->getOriginal();
        $bayarSppHead->siswa_id = $siswaId;
        $bayarSppHead->jumlah_bayar = $jumlahRekap;
        $bayarSppHead->metode_pembayaran = $metodePembayaran;
        $bayarSppHead->keterangan = $keterangan;
        $bayarSppHead->spp = $spp;
        $bayarSppHead->save();

      

        // Buat pesan sukses
        $message = "Data berhasil diupdate";

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'rekap_spp', $bayarSppHead->id, $loggedInUserId, json_encode($oldData), json_encode($bayarSppHead));

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
