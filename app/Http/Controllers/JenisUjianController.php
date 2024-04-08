<?php

namespace App\Http\Controllers;

use App\Models\JenisUjian;
use App\Models\LogHistori;
use App\Models\NilaiSiswaDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisUjianController extends Controller
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
        $jenis_ujian = JenisUjian::orderBy('id', 'desc')->get();
        return view('back.jenis_ujian.index',compact('jenis_ujian'));
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
        $validator = Validator::make($request->all(), [
            'nama_ujian' => 'required',
            'tanggal_ujian' => 'required',
            'keterangan' => 'required',
        ], [
            'nama_ujian.required' => 'Nama Ujian Wajib diisi',
            'tanggal_ujian.required' => 'Tanggal Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Simpan data jenis_ujian ke database
        $jenis_ujian = new JenisUjian();
        $jenis_ujian->nama_ujian = $request->nama_ujian;
        $jenis_ujian->tanggal_ujian = $request->tanggal_ujian;
        $jenis_ujian->keterangan = $request->keterangan;

        $jenis_ujian->save();

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan ruangan_id yang sedang login
        $this->simpanLogHistori('Create', 'jenis_ujian', $jenis_ujian->id, $loggedInUserId, null, json_encode($jenis_ujian));
       

        return response()->json(['message' => 'Data Berhasil Disimpan']);
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
        $jenis_ujian = JenisUjian::findOrFail($id);
        return response()->json($jenis_ujian);
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
          $jenis_ujian = JenisUjian::findOrFail($id);
          $oldData = $jenis_ujian->getOriginal();
         // Validasi request
         $validator = Validator::make($request->all(), [
             'nama_ujian' => 'required',
             'tanggal_ujian' => 'required',
             'keterangan' => 'required',
         ], [
             'nama_ujian.required' => 'Nama Ujian Wajib diisi',
             'tanggal_ujian.required' => 'Tanggal Wajib diisi',
             'keterangan.required' => 'Keterangan Wajib diisi',
         ]);
     
         if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()->all()], 422);
         }
     
         // Lakukan update data
         $jenis_ujian->nama_ujian = $request->nama_ujian;
         $jenis_ujian->tanggal_ujian = $request->tanggal_ujian;
         $jenis_ujian->keterangan = $request->keterangan;
     
         // Simpan perubahan
         $jenis_ujian->save();
 

       // Simpan log histori untuk operasi Update dengan user_id yang sedang login
       $loggedInUserId = Auth::id();
       $this->simpanLogHistori('Update', 'jenis_ujian', $id, $loggedInUserId, json_encode($oldData), json_encode($jenis_ujian));
  
     
         return response()->json(['message' => 'Data Berhasil Diperbaharui']);
     }
     
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_ujian = JenisUjian::find($id);
        
        if (!$jenis_ujian) {
            return response()->json(['message' => 'Data jenis_ujian not found'], 404);
        }
    
        // Periksa apakah jenis_ujian masih terkait dengan NilaiSiswaDetail
        $nilai_siswa_detail = NilaiSiswaDetail::where('jenis_ujian_id', $id)->first();
        if ($nilai_siswa_detail) {
            return response()->json(['message' => 'Data tidak dapat dihapus karena masih terkait dengan NilaiSiswaDetail'], 400);
        }
        
        // Lakukan penghapusan jika tidak ada keterkaitan dengan NilaiSiswaDetail
        $jenis_ujian->delete();
    
        // Simpan log histori jika diperlukan
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'jenis_ujian', $id, $loggedInUserId, json_encode($jenis_ujian), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    
    

}