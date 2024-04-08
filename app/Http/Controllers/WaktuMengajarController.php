<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaranDetail;
use App\Models\WaktuMengajar;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;
use Illuminate\Support\Facades\DB;
 

class WaktuMengajarController extends Controller
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
        $waktu_mengajar = WaktuMengajar::all();
        return view('back.waktu_mengajar.index',compact('waktu_mengajar'));
    }


  
    
    

/**
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
        // Validasi request
        $request->validate([
            'jam' => 'required|unique:waktu_mengajar,jam',
        ], [
            'jam.unique' => 'Nama waktu mengajar sudah ada.',
        ]);
    
        // Simpan data waktu_mengajar ke database
        $waktu_mengajar = new WaktuMengajar();
        $waktu_mengajar->jam = $request->jam;
        $waktu_mengajar->waktu = $request->waktu;
    
        $waktu_mengajar->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Waktu Mengajar', $waktu_mengajar->id, $loggedInUserId, null, json_encode($waktu_mengajar));

    
        return response()->json(['message' => 'Data waktu mengajar berhasil disimpan']);
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
        $waktu_mengajar = WaktuMengajar::findOrFail($id);
        return response()->json($waktu_mengajar);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $waktu_mengajar = WaktuMengajar::findOrFail($id);
        $oldData = $waktu_mengajar->getOriginal();
        $waktu_mengajar->jam = $request->jam;
        $waktu_mengajar->waktu = $request->waktu;
        $waktu_mengajar->save();

     
    
        // Menyimpan data lama sebelum perubahan
       
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Form Update Waktu Mengajar', $waktu_mengajar->id, $loggedInUserId, json_encode($oldData), json_encode($waktu_mengajar));
    
    
        return response()->json(['message' => 'Data berhasil diupdate']);
                
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     // Cek apakah ID waktu mengajar ada dalam tabel jadwal_pelajaran_detail
    //     $isRelated = DB::table('jadwal_pelajaran_detail')->where('waktu_mengajar_id', $id)->exists();
    
    //     if ($isRelated) {
    //         // Jika terkait, beri notifikasi bahwa data tidak dapat dihapus
    //         return response()->json(['error_terkait' => 'Data tidak dapat dihapus karena masih terkait dengan jadwal pelajaran.']);
    //     }
    
    //     $waktu_mengajar = WaktuMengajar::findOrFail($id);
    //     $loggedInUserId = Auth::id();
    
    //     // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
    //     $this->simpanLogHistori('Delete', 'waktu_mengajar', $id, $loggedInUserId, json_encode($waktu_mengajar), null);
    
    //     $waktu_mengajar->delete();
    
    //     return response()->json(['message' => 'Data berhasil dihapus']);
    // }

    public function destroy($id)
    {
        $waktu_mengajar = WaktuMengajar::find($id);
    
        if (!$waktu_mengajar) {
            return response()->json(['message' => 'Data waktu_mengajar not found'], 404);
        }
    
        // Periksa apakah waktu_mengajar masih terkait dengan jadwal_pelajaran_waktu_mengajar
        $related_jadwal_pelajaran = JadwalPelajaranDetail::where('waktu_mengajar_id', $waktu_mengajar->id)->first();
    
        if ($related_jadwal_pelajaran) {
            return response()->json(['message' => 'Data masih terkait dengan jadwal_pelajaran_waktu_mengajar dan tidak bisa dihapus'], 400);
        }
    
        $waktu_mengajar->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'Form Hapus Waktu Mengajar', $id, $loggedInUserId, json_encode($waktu_mengajar), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    
    
    
}
