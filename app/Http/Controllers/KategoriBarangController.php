<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;


class KategoriBarangController extends Controller
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
      
        $kategori_barang = KategoriBarang::orderBy('id', 'desc')->get();
        return view('back.kategori_barang.index',compact('kategori_barang'));
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
            'nama_kategori_barang' => 'required',
        ], [
            'nama_kategori_barang.required' => 'Nama Kategori Barang Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Menghapus koma pada jumlah_kategori_barang sebelum menyimpan
      

        // Simpan data kategori_barang ke database menggunakan fill()
        $kategori_barang = new KategoriBarang();
        $kategori_barang->fill($request->all());
        $kategori_barang->save();

          // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'kategori_barang', $kategori_barang->id, $loggedInUserId, null, json_encode($kategori_barang));

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
        $kategori_barang = KategoriBarang::findOrFail($id);
        return response()->json($kategori_barang);
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
         // Ambil data kategori_barang yang akan diperbarui
         $kategori_barang = KategoriBarang::findOrFail($id);
         $oldData = $kategori_barang->getOriginal();
     
         // Validasi request
         $validator = Validator::make($request->all(), [
             'nama_kategori_barang' => 'required',
         ], [
             'nama_kategori_barang.required' => 'Nama Kategori Barang Wajib diisi',
         ]);
     
         if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()], 422);
         }
     
         // Mengisi nilai dari request ke objek kategori_barang
         $kategori_barang->fill($request->all());
     
         // Simpan perubahan
         $kategori_barang->save();

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'kategori_barang', $kategori_barang->id, $loggedInUserId, json_encode($oldData), json_encode($kategori_barang));

     
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
        $kategori_barang = KategoriBarang::find($id);
    
        if (!$kategori_barang) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    
        // Periksa apakah kategori_barang masih terkait dengan barang
        $related_barang = Barang::where('kategori_barang_id', $kategori_barang->id)->first();
    
        if ($related_barang) {
            return response()->json(['message' => 'Data tidak bisa dihapus karena masih terkait dengan data barang'], 400);
        }
    
        // Jika tidak ada barang yang terkait, lakukan penghapusan
        $deleted = $kategori_barang->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kategori_barang', $id, $loggedInUserId, json_encode($kategori_barang), null);
    
        if ($deleted) {
            return response()->json(['message' => 'Data Berhasil Dihapus']);
        } else {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }
    
    

}