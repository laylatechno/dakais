<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\MutasiBarang;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;


class BarangController extends Controller
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
        $ruangan = Ruangan::select('id', 'nama_ruangan')->get();
        $kategori_barang = KategoriBarang::select('id', 'nama_kategori_barang')->get();
        $barang = Barang::orderBy('id', 'desc')->get();
        return view('back.barang.index',compact('barang','kategori_barang','ruangan'));
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
            'kategori_barang_id' => 'required',
            'kode_barang' => 'required|unique:barang,kode_barang', 
            'nama_barang' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'tanggal_masuk' => 'required|date',
            'kondisi_baik' => 'required|numeric|min:0',
            'kondisi_sedang' => 'required|numeric|min:0',
            'kondisi_rusak' => 'required|numeric|min:0',
            'ruangan_id' => 'required',
            'status' => 'required',
             
            'asal' => 'required',
            'pic' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'kategori_barang_id.required' => 'Kategori Barang wajib diisi',
            'kode_barang.required' => 'Kode Barang wajib diisi',
            'kode_barang.unique' => 'Kode Barang sudah ada dalam database',
            'nama_barang.required' => 'Nama Barang wajib diisi',
            'merk.required' => 'Merk Barang wajib diisi',
            'type.required' => 'Type Barang wajib diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Barang wajib diisi',
            'tanggal_masuk.date' => 'Format tanggal tidak valid',
            'kondisi_baik.required' => 'Jumlah Kondisi Baik wajib diisi',
            'kondisi_baik.numeric' => 'Jumlah Kondisi Baik harus berupa angka',
            'kondisi_baik.min' => 'Jumlah Kondisi Baik tidak boleh kurang dari 0',
            'kondisi_sedang.required' => 'Jumlah Kondisi Sedang wajib diisi',
            'kondisi_sedang.numeric' => 'Jumlah Kondisi Sedang harus berupa angka',
            'kondisi_sedang.min' => 'Jumlah Kondisi Sedang tidak boleh kurang dari 0',
            'kondisi_rusak.required' => 'Jumlah Kondisi Rusak wajib diisi',
            'kondisi_rusak.numeric' => 'Jumlah Kondisi Rusak harus berupa angka',
            'kondisi_rusak.min' => 'Jumlah Kondisi Rusak tidak boleh kurang dari 0',
            'ruangan_id.required' => 'Ruangan wajib diisi',
            'status.required' => 'Status wajib diisi',
            'harga_perolehan.required' => 'Jumlah Harga Perolehan wajib diisi',
         
            'asal.required' => 'Asal wajib diisi',
            'pic.required' => 'PIC wajib diisi',
            'gambar.required' => 'Bukti Barang wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
 
     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     }
         $input = $request->except('harga_perolehan');
 
         if ($request->has('harga_perolehan')) {
             $input['harga_perolehan'] = str_replace(',', '', $request->input('harga_perolehan'));
         }
 
         if ($image = $request->file('gambar')) {
             $destinationPath = 'upload/barang/';
             
             // Mengambil nama_guru file asli
             $originalFileName = $image->getClientOriginalName();
         
             // Mendapatkan ekstensi file
             $extension = $image->getClientOriginalExtension();
         
             // Menggabungkan waktu dengan nama_guru file asli
             $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
         
             // Pindahkan file ke lokasi tujuan dengan nama_guru baru
             $image->move($destinationPath, $imageName);
         
             $input['gambar'] = $imageName;
         }
        $barang = Barang::create($input);

         $loggedInUserId = Auth::id();

         // Simpan log histori untuk operasi Create dengan user_id yang sedang login
         $this->simpanLogHistori('Create', 'barang', $barang->id, $loggedInUserId, null, json_encode($barang));
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
       $barang = Barang::findOrFail($id);

        return response()->json($barang);
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
        'kategori_barang_id' => 'required',
        'kode_barang' => 'required|unique:barang,kode_barang', 
        'nama_barang' => 'required',
        'merk' => 'required',
        'type' => 'required',
        'tanggal_masuk' => 'required|date',
        'kondisi_baik' => 'required|numeric|min:0',
        'kondisi_sedang' => 'required|numeric|min:0',
        'kondisi_rusak' => 'required|numeric|min:0',
        'ruangan_id' => 'required',
        'status' => 'required',
         
        'asal' => 'required',
        'pic' => 'required',
        'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
    ], [
        'kategori_barang_id.required' => 'Kategori Barang wajib diisi',
        'kode_barang.required' => 'Kode Barang wajib diisi',
        'kode_barang.unique' => 'Kode Barang sudah ada dalam database',
        'nama_barang.required' => 'Nama Barang wajib diisi',
        'merk.required' => 'Merk Barang wajib diisi',
        'type.required' => 'Type Barang wajib diisi',
        'tanggal_masuk.required' => 'Tanggal Masuk Barang wajib diisi',
        'tanggal_masuk.date' => 'Format tanggal tidak valid',
        'kondisi_baik.required' => 'Jumlah Kondisi Baik wajib diisi',
        'kondisi_baik.numeric' => 'Jumlah Kondisi Baik harus berupa angka',
        'kondisi_baik.min' => 'Jumlah Kondisi Baik tidak boleh kurang dari 0',
        'kondisi_sedang.required' => 'Jumlah Kondisi Sedang wajib diisi',
        'kondisi_sedang.numeric' => 'Jumlah Kondisi Sedang harus berupa angka',
        'kondisi_sedang.min' => 'Jumlah Kondisi Sedang tidak boleh kurang dari 0',
        'kondisi_rusak.required' => 'Jumlah Kondisi Rusak wajib diisi',
        'kondisi_rusak.numeric' => 'Jumlah Kondisi Rusak harus berupa angka',
        'kondisi_rusak.min' => 'Jumlah Kondisi Rusak tidak boleh kurang dari 0',
        'ruangan_id.required' => 'Ruangan wajib diisi',
        'status.required' => 'Status wajib diisi',
        'harga_perolehan.required' => 'Jumlah Harga Perolehan wajib diisi',
     
        'asal.required' => 'Asal wajib diisi',
        'pic.required' => 'PIC wajib diisi',
        'gambar.required' => 'Bukti Barang wajib diisi',
        'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
    ]);

    $barang = Barang::findOrFail($id);
    $oldData = $barang->getOriginal();
    $input = $request->except('harga_perolehan');
 
    if ($request->has('harga_perolehan')) {
        $input['harga_perolehan'] = str_replace(',', '', $request->input('harga_perolehan'));
    }

     // Upload gambar baru jika ada
     if ($request->hasFile('gambar')) {
        $oldgambarFileName = $barang->gambar;
        $destinationPath = 'upload/barang/';

        // Hapus gambar lama jika ada sebelum mengganti dengan yang baru
        if ($oldgambarFileName && file_exists(public_path($destinationPath . $oldgambarFileName))) {
            unlink(public_path($destinationPath . $oldgambarFileName));
        }

        $image = $request->file('gambar');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $input['gambar'] = $imageName;
    }

    // Update data barang
    $barang->update($input);

    $loggedInUserId = Auth::id();
    
    // Simpan log histori untuk operasi Update dengan user_id yang sedang login
    $this->simpanLogHistori('Update', 'barang', $barang->id, $loggedInUserId, json_encode($oldData), json_encode($barang));



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
        $barang = Barang::find($id);
    
        if (!$barang) {
            return response()->json(['message' => 'Data barang not found'], 404);
        }
    
        // Periksa apakah barang masih terkait dengan mutasi_barang
        $related_mutasi = MutasiBarang::where('barang_id', $barang->id)->first();
    
        if ($related_mutasi) {
            return response()->json(['message' => 'Data masih terkait dengan mutasi_barang dan tidak bisa dihapus'], 400);
        }
    
        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldgambarFileName = $barang->gambar; // Nama file saja
        $oldgambarPath = public_path('upload/barang/' . $oldgambarFileName);
    
        if ($oldgambarFileName && file_exists($oldgambarPath)) {
            unlink($oldgambarPath);
        }
    
        $barang->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'barang', $id, $loggedInUserId, json_encode($barang), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    

}