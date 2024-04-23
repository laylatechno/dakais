<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaranDetail;
use App\Models\Hitung;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
 

class HitungController extends Controller
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
        $hitung = Hitung::all();
        return view('back.hitung.index',compact('hitung'));
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
            'nama_hitung' => 'required',
        ], [
            'nama_hitung.required' => 'Nama Hitung diisi',
        ]);
    
        // Simpan data hitung ke database
        $input = $request->all();
    
        $hitung = new Hitung();
        $hitung->fill($input);
        $hitung->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Hitung', $hitung->id, $loggedInUserId, null, json_encode($hitung));

    
        return response()->json(['message' => 'Data hitung berhasil disimpan']);
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
        $hitung = Hitung::findOrFail($id);
        return response()->json($hitung);
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
        // Remove the comma from jumlah_tabungan if present
        $hitung = Hitung::findOrFail($id);
        $oldData = $hitung->getOriginal();
    
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_hitung' => 'required',
        ], [
            'nama_hitung.required' => 'Nama Ujian Wajib diisi',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    
        // Simpan perubahan pada instance yang sudah ada
        $hitung->update($request->all());
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'hitung', $hitung->id, $loggedInUserId, json_encode($oldData), json_encode($hitung));
    
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
    //     // Cek apakah ID hitung ada dalam tabel jadwal_pelajaran_detail
    //     $isRelated = DB::table('jadwal_pelajaran_detail')->where('hitung_id', $id)->exists();
    
    //     if ($isRelated) {
    //         // Jika terkait, beri notifikasi bahwa data tidak dapat dihapus
    //         return response()->json(['error_terkait' => 'Data tidak dapat dihapus karena masih terkait dengan jadwal pelajaran.']);
    //     }
    
    //     $hitung = Hitung::findOrFail($id);
    //     $loggedInUserId = Auth::id();
    
    //     // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
    //     $this->simpanLogHistori('Delete', 'hitung', $id, $loggedInUserId, json_encode($hitung), null);
    
    //     $hitung->delete();
    
    //     return response()->json(['message' => 'Data berhasil dihapus']);
    // }

    public function destroy($id)
    {
        $hitung = Hitung::find($id);
    
        if (!$hitung) {
            return response()->json(['message' => 'Data hitung not found'], 404);
        }
    
       
    
        $hitung->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'hitung', $id, $loggedInUserId, json_encode($hitung), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    
    
    
}
