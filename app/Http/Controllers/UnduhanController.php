<?php

namespace App\Http\Controllers;

use App\Models\Unduhan;
use App\Models\KategoriUnduhan;
use App\Models\MutasiUnduhan;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\LogHistori;
use Illuminate\Support\Facades\Auth;


class UnduhanController extends Controller
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
         
        $unduhan = Unduhan::orderBy('id', 'desc')->get();
        return view('back.unduhan.index',compact('unduhan'));
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
            'nama_unduhan' => 'required', 
            'kategori' => 'required',
            
            'file' => 'required|mimes:jpg,jpeg,png,gif,docx,pdf|max:4048',
            'thumbnail' => 'required|mimes:jpg,jpeg,png,gif,docx,pdf|max:4048',

        ], [
            'nama_unduhan.required' => 'Nama Unduhan wajib diisi', 
            'kategori.required' => 'Kategori wajib diisi',
            'jenis_surat.required' => 'Jenis Surat wajib diisi',
             
            'thumbnail.required' => 'Thumnbail wajib diisi',
            'thumbnail.mimes' => 'Foto yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
            'thumbnail.max' => 'Ukuran thumbnail tidak boleh lebih dari 4 MB',

            
            'file.required' => 'File wajib diisi',
            'file.mimes' => 'Foto yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
            'file.max' => 'Ukuran file tidak boleh lebih dari 4 MB',
        ]);
 
     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     } 
 
        $input = $request->all();

        if ($image = $request->file('thumbnail')) {
            $destinationPath = 'upload/unduhan/';
            
            // Mengambil nama_galeri file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_galeri file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama_galeri baru
            $image->move($destinationPath, $imageName);
        
            $input['thumbnail'] = $imageName;
        }

        if ($image = $request->file('file')) {
            $destinationPath = 'upload/unduhan/';
            
            // Mengambil nama_galeri file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_galeri file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama_galeri baru
            $image->move($destinationPath, $imageName);
        
            $input['file'] = $imageName;
        }


        $unduhan = Unduhan::create($input);
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'unduhan', $unduhan->id, $loggedInUserId, null, json_encode($unduhan));
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
       $unduhan = Unduhan::findOrFail($id);

        return response()->json($unduhan);
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
        'nama_unduhan' => 'required', 
        'kategori' => 'required',
        
        'file' => 'required|mimes:jpg,jpeg,png,gif,docx,pdf|max:4048',
        'thumbnail' => 'required|mimes:jpg,jpeg,png,gif,docx,pdf|max:4048',

    ], [
        'nama_unduhan.required' => 'Nama Unduhan wajib diisi', 
        'kategori.required' => 'Kategori wajib diisi',
        'jenis_surat.required' => 'Jenis Surat wajib diisi',
         
        'thumbnail.required' => 'Thumnbail wajib diisi',
        'thumbnail.mimes' => 'Foto yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
        'thumbnail.max' => 'Ukuran thumbnail tidak boleh lebih dari 4 MB',

        
        'file.required' => 'File wajib diisi',
        'file.mimes' => 'Foto yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
        'file.max' => 'Ukuran file tidak boleh lebih dari 4 MB',
    ]);

    $unduhan = Unduhan::findOrFail($id);
    $oldData = $unduhan->getOriginal();
   
     
    $input = $request->all();
     // Upload gambar baru jika ada
     if ($request->hasFile('thumbnail')) {
        $oldthumbnailFileName = $unduhan->thumbnail;
        $destinationPath = 'upload/unduhan/';

        // Hapus thumbnail lama jika ada sebelum mengganti dengan yang baru
        if ($oldthumbnailFileName && file_exists(public_path($destinationPath . $oldthumbnailFileName))) {
            unlink(public_path($destinationPath . $oldthumbnailFileName));
        }

        $image = $request->file('thumbnail');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $input['thumbnail'] = $imageName;
    }


    if ($request->hasFile('file')) {
        $oldfileFileName = $unduhan->file;
        $destinationPath = 'upload/unduhan/';

        // Hapus file lama jika ada sebelum mengganti dengan yang baru
        if ($oldfileFileName && file_exists(public_path($destinationPath . $oldfileFileName))) {
            unlink(public_path($destinationPath . $oldfileFileName));
        }

        $image = $request->file('file');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $input['file'] = $imageName;
    }

    // Update data barang
    $unduhan->update($input);
    $loggedInUserId = Auth::id();
    
    // Simpan log histori untuk operasi Update dengan user_id yang sedang login
    $this->simpanLogHistori('Update', 'unduhan', $unduhan->id, $loggedInUserId, json_encode($oldData), json_encode($unduhan));



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
        $unduhan = Unduhan::find($id);
    
        if (!$unduhan) {
            return response()->json(['message' => 'Data unduhan not found'], 404);
        }
    
       
    
        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldthumbnailFileName = $unduhan->thumbnail; // Nama file saja
        $oldthumbnailPath = public_path('upload/unduhan/' . $oldthumbnailFileName);
    
        if ($oldthumbnailFileName && file_exists($oldthumbnailPath)) {
            unlink($oldthumbnailPath);
        }


        $oldfileFileName = $unduhan->file; // Nama file saja
        $oldfilePath = public_path('upload/unduhan/' . $oldfileFileName);
    
        if ($oldfileFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }
    
        $unduhan->delete();
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'unduhan', $id, $loggedInUserId, json_encode($unduhan), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    

}