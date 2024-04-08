<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\KategoriSuratMasuk;
use App\Models\LogHistori;
use App\Models\MutasiSuratMasuk;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
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
         
        $surat_masuk = SuratMasuk::orderBy('id', 'desc')->get();
        return view('back.surat_masuk.index',compact('surat_masuk'));
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
            'pengirim' => 'required',
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'tanggal_masuk' => 'required|date',
            'disposisi' => 'required',
            'lampiran' => 'required|mimes:jpg,jpeg,png,gif,docx|max:4048',

        ], [
            'nomor_surat.required' => 'Nomor Surat wajib diisi', 
            'pengirim.required' => 'Nama Pengirim wajib diisi',
            'jenis_surat.required' => 'Jenis Surat wajib diisi',
            'perihal.required' => 'Perihal wajib diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Surat Masuk wajib diisi',
            'tanggal_masuk.date' => 'Format tanggal tidak valid',            
            'disposisi.required' => 'Disposisi wajib diisi',
            'lampiran.required' => 'Bukti Lampiran wajib diisi',
            'lampiran.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
            'lampiran.max' => 'Ukuran lampiran tidak boleh lebih dari 4 MB',
        ]);
 
     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     } 
 
        $input = $request->all();

        if ($image = $request->file('lampiran')) {
            $destinationPath = 'upload/surat_masuk/';
            
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
        $surat_masuk = SuratMasuk::create($input);
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'surat_masuk', $surat_masuk->id, $loggedInUserId, null, json_encode($surat_masuk));


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
       $surat_masuk = SuratMasuk::findOrFail($id);

        return response()->json($surat_masuk);
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
        'pengirim' => 'required',
        'jenis_surat' => 'required',
        'perihal' => 'required',
        'tanggal_masuk' => 'required|date',
        'disposisi' => 'required',
        'lampiran' => 'required|mimes:jpg,jpeg,png,gif,docx|max:4048',

    ], [
        'nomor_surat.required' => 'Nomor Surat wajib diisi', 
        'pengirim.required' => 'Nama Pengirim wajib diisi',
        'jenis_surat.required' => 'Jenis Surat wajib diisi',
        'perihal.required' => 'Perihal wajib diisi',
        'tanggal_masuk.required' => 'Tanggal Masuk Surat Masuk wajib diisi',
        'tanggal_masuk.date' => 'Format tanggal tidak valid',            
        'disposisi.required' => 'Disposisi wajib diisi',
        'lampiran.required' => 'Bukti Lampiran wajib diisi',
        'lampiran.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
        'lampiran.max' => 'Ukuran lampiran tidak boleh lebih dari 4 MB',
    ]);

    $surat_masuk = SuratMasuk::findOrFail($id);
    $oldData = $surat_masuk->getOriginal();
   
     
    $input = $request->all();
     // Upload gambar baru jika ada
     if ($request->hasFile('lampiran')) {
        $oldlampiranFileName = $surat_masuk->lampiran;
        $destinationPath = 'upload/surat_masuk/';

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
    $surat_masuk->update($input);
    $loggedInUserId = Auth::id();
    
    // Simpan log histori untuk operasi Update dengan user_id yang sedang login
    $this->simpanLogHistori('Update', 'surat_masuk', $surat_masuk->id, $loggedInUserId, json_encode($oldData), json_encode($surat_masuk));


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
        $surat_masuk = SuratMasuk::find($id);
    
        if (!$surat_masuk) {
            return response()->json(['message' => 'Data surat_masuk not found'], 404);
        }
    
       
    
        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldlampiranFileName = $surat_masuk->lampiran; // Nama file saja
        $oldlampiranPath = public_path('upload/surat_masuk/' . $oldlampiranFileName);
    
        if ($oldlampiranFileName && file_exists($oldlampiranPath)) {
            unlink($oldlampiranPath);
        }
    
        $surat_masuk->delete();
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'surat_masuk', $id, $loggedInUserId, json_encode($surat_masuk), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    

}