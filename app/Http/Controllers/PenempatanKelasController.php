<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\PenempatanKelasDetail;
use App\Models\PenempatanKelasHead;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

 
 

class PenempatanKelasController extends Controller
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
        // $kelas = Kelas::whereNotIn('id', function($query) {
        //     $query->select('kelas_id')->from('penempatan_kelas_head');
        // })->get();
    
        // $siswa = Siswa::whereNotIn('id', function($query) {
        //     $query->select('siswa_id')->from('penempatan_kelas_detail');
        // })->get();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $penempatan_kelas = PenempatanKelasHead::with('kelas.guru')->get();

        return view('back.penempatan_kelas.index', compact('penempatan_kelas','kelas','siswa'));
    }
    
    
        public function ambilWaliKelas($kelasId)
    {
        $kelas = Kelas::with('waliKelas')->find($kelasId);
        $waliKelas = $kelas->waliKelas->nama_guru; // Pastikan penyesuaian dengan nama atribut yang benar pada model Guru

        return response()->json(['nama_wali_kelas' => $waliKelas]);
    }



    public function simpanPenempatanKelas(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'siswa_id' => 'required|array|min:1',
        ]);
    
        // Cek apakah kelas_id sudah ada dalam penempatan_kelas_head
        $existingPenempatan = PenempatanKelasHead::where('kelas_id', $request->kelas_id)->first();
    
        if ($existingPenempatan) {
            return response()->json(['message' => 'Data kelas sudah ada dalam penempatan kelas'], 422);
        }
    
        // Mulai transaksi database
        DB::beginTransaction();
    
        try {
            // Simpan ke dalam tabel penempatan_kelas_head
            $penempatanHead = PenempatanKelasHead::create([
                'kelas_id' => $request->kelas_id,
                'tanggal_penempatan' => now(),
            ]);
    
            // Simpan ke dalam tabel penempatan_kelas_detail untuk setiap siswa yang dipilih
            foreach ($request->siswa_id as $siswaId) {
                PenempatanKelasDetail::create([
                    'penempatan_kelas_head_id' => $penempatanHead->id,
                    'kelas_id' => $request->kelas_id,
                    'siswa_id' => $siswaId,
                ]);
            }
    
            // Commit transaksi jika tidak ada kesalahan
            DB::commit();

                     // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan ruangan_id yang sedang login
        $this->simpanLogHistori('Create', 'penempatan_kelas', $penempatanHead->id, $loggedInUserId, null, json_encode($penempatanHead));

    
            return response()->json(['message' => 'Penempatan kelas berhasil disimpan'], 200);
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
    
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data'], 500);
        }
    }
    

public function getPenempatanKelasById($id)
{
    $penempatanKelas = PenempatanKelasHead::with('kelas')->findOrFail($id);
    $siswa = PenempatanKelasDetail::where('penempatan_kelas_head_id', $id)->pluck('siswa_id')->toArray();
    

    return response()->json([
        'kelas_id' => $penempatanKelas->kelas_id,
        'wali_kelas' => $penempatanKelas->kelas->guru->nama_guru, // Sesuaikan dengan relasi yang sesuai
        'siswa_id' => $siswa,
    ]);
}

public function updatePenempatanKelas(Request $request, $id)
{
    $request->validate([
        'kelas_id' => 'required',
        'siswa_id' => 'required|array|min:1',
    ]);

    // Mulai transaksi database
    DB::beginTransaction();

    try {
        // Perbarui ke dalam tabel penempatan_kelas_head
        $penempatanHead = PenempatanKelasHead::findOrFail($id);
        $penempatanHead->update([
            'kelas_id' => $request->kelas_id,
        ]);

        // Hapus data lama dari tabel penempatan_kelas_detail
        PenempatanKelasDetail::where('penempatan_kelas_head_id', $id)->delete();

        // Simpan ke dalam tabel penempatan_kelas_detail untuk setiap siswa yang dipilih
        foreach ($request->siswa_id as $siswaId) {
            PenempatanKelasDetail::create([
                'penempatan_kelas_head_id' => $id,
                'kelas_id' => $request->kelas_id,
                'siswa_id' => $siswaId,
            ]);
        }

        // Commit transaksi jika tidak ada kesalahan
        DB::commit();

         // Mendapatkan ID pengguna yang sedang login
       $loggedInUserId = Auth::id();
    
       // Simpan log histori untuk operasi Update dengan ruangan_id yang sedang login
       $this->simpanLogHistori('Update', 'penempatan_kelas', $penempatanHead->id, $loggedInUserId, json_encode($penempatanHead), json_encode($penempatanHead));


        return response()->json(['message' => 'Penempatan kelas berhasil diperbarui'], 200);
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollback();

        return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data'], 500);
    }
}

public function hapusPenempatanKelas($id)
{
    // Temukan data PenempatanKelasHead berdasarkan ID
    $penempatanHead = PenempatanKelasHead::findOrFail($id);

    // Mulai transaksi database
    DB::beginTransaction();

    try {
        // Hapus terlebih dahulu data di PenempatanKelasDetail sesuai penempatan_kelas_head_id
        PenempatanKelasDetail::where('penempatan_kelas_head_id', $penempatanHead->id)->delete();

        // Setelah itu, hapus data pada PenempatanKelasHead
        $penempatanHead->delete();

        // Commit transaksi jika tidak ada kesalahan
        DB::commit();

        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'penempatan_kelas', $id, $loggedInUserId, json_encode($penempatanHead), null);
    
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
    

    public function update(Request $request)
    {
        
    }
    
    

  
    public function destroy($id)
    {
           
    }
    
}
