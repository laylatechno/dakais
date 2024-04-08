<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\KategoriSuratKeluar;
use App\Models\MutasiSuratKeluar;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\LogHistori;
use Illuminate\Support\Facades\Auth;


class SuratKeluarController extends Controller
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
         
        $surat_keluar = SuratKeluar::orderBy('id', 'desc')->get();
        return view('back.surat_keluar.index',compact('surat_keluar'));
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
            'nomor_surat' => 'required', 
            'penerima' => 'required',
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'tanggal_keluar' => 'required|date',
            'tindak_lanjut' => 'required',
            'lampiran' => 'required|mimes:jpg,jpeg,png,gif,docx|max:4048',

        ], [
            'nomor_surat.required' => 'Nomor Surat wajib diisi', 
            'penerima.required' => 'Nama Penerima wajib diisi',
            'jenis_surat.required' => 'Jenis Surat wajib diisi',
            'perihal.required' => 'Perihal wajib diisi',
            'tanggal_keluar.required' => 'Tanggal Keluar Surat Keluar wajib diisi',
            'tanggal_keluar.date' => 'Format tanggal tidak valid',            
            'tindak_lanjut.required' => 'Tindak Lanjut wajib diisi',
            'lampiran.required' => 'Bukti Lampiran wajib diisi',
            'lampiran.mimes' => 'Foto yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
            'lampiran.max' => 'Ukuran lampiran tidak boleh lebih dari 4 MB',
        ]);
 
     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     } 
 
        $input = $request->all();

        if ($image = $request->file('lampiran')) {
            $destinationPath = 'upload/surat_keluar/';
            
            // Mengambil nama_galeri file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_galeri file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama_galeri baru
            $image->move($destinationPath, $imageName);
        
            $input['lampiran'] = $imageName;
        }
        $surat_keluar = SuratKeluar::create($input);
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'surat_keluar', $surat_keluar->id, $loggedInUserId, null, json_encode($surat_keluar));
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
       $surat_keluar = SuratKeluar::findOrFail($id);

        return response()->json($surat_keluar);
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
       // Validasi request
       $validator = Validator::make($request->all(), [
        'nomor_surat' => 'required', 
        'penerima' => 'required',
        'jenis_surat' => 'required',
        'perihal' => 'required',
        'tanggal_keluar' => 'required|date',
        'tindak_lanjut' => 'required',
        'lampiran' => 'required|mimes:jpg,jpeg,png,gif,docx|max:4048',

    ], [
        'nomor_surat.required' => 'Nomor Surat wajib diisi', 
        'penerima.required' => 'Nama Penerima wajib diisi',
        'jenis_surat.required' => 'Jenis Surat wajib diisi',
        'perihal.required' => 'Perihal wajib diisi',
        'tanggal_keluar.required' => 'Tanggal Keluar Surat Keluar wajib diisi',
        'tanggal_keluar.date' => 'Format tanggal tidak valid',            
        'tindak_lanjut.required' => 'Tindak Lanjut wajib diisi',
        'lampiran.required' => 'Bukti Lampiran wajib diisi',
        'lampiran.mimes' => 'Foto yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
        'lampiran.max' => 'Ukuran lampiran tidak boleh lebih dari 4 MB',
    ]);

    $surat_keluar = SuratKeluar::findOrFail($id);
    $oldData = $surat_keluar->getOriginal();
   
     
    $input = $request->all();
     // Upload gambar baru jika ada
     if ($request->hasFile('lampiran')) {
        $oldlampiranFileName = $surat_keluar->lampiran;
        $destinationPath = 'upload/surat_keluar/';

        // Hapus lampiran lama jika ada sebelum mengganti dengan yang baru
        if ($oldlampiranFileName && file_exists(public_path($destinationPath . $oldlampiranFileName))) {
            unlink(public_path($destinationPath . $oldlampiranFileName));
        }

        $image = $request->file('lampiran');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $input['lampiran'] = $imageName;
    }

    // Update data barang
    $surat_keluar->update($input);
    $loggedInUserId = Auth::id();
    
    // Simpan log histori untuk operasi Update dengan user_id yang sedang login
    $this->simpanLogHistori('Update', 'surat_keluar', $surat_keluar->id, $loggedInUserId, json_encode($oldData), json_encode($surat_keluar));



    return response()->json(['message' => 'Data Berhasil Diupdate']);
}

     
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat_keluar = SuratKeluar::find($id);
    
        if (!$surat_keluar) {
            return response()->json(['message' => 'Data surat_keluar not found'], 404);
        }
    
       
    
        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldlampiranFileName = $surat_keluar->lampiran; // Nama file saja
        $oldlampiranPath = public_path('upload/surat_keluar/' . $oldlampiranFileName);
    
        if ($oldlampiranFileName && file_exists($oldlampiranPath)) {
            unlink($oldlampiranPath);
        }
    
        $surat_keluar->delete();
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'surat_keluar', $id, $loggedInUserId, json_encode($surat_keluar), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    

}