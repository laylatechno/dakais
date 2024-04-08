<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KategoriProdukController extends Controller
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
        $kategori_produk = KategoriProduk::all();
        return view('back.kategori_produk.index',compact('kategori_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategori_produk.create');
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
            'nama_kategori_produk' => 'required',
        ], [
            'nama_kategori_produk.required' => 'Nama Kategori Produk diisi',
        ]);
    
        // Simpan data kategori_produk ke database
        $input = $request->all();
    
        $kategori_produk = new KategoriProduk();
        $kategori_produk->fill($input);
        $kategori_produk->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Kategori Produk', $kategori_produk->id, $loggedInUserId, null, json_encode($kategori_produk));

    
        return response()->json(['message' => 'Data kategori produk berhasil disimpan']);
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
        $kategori_produk = KategoriProduk::findOrFail($id);
        return response()->json($kategori_produk);
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
        $kategori_produk = KategoriProduk::findOrFail($id);
        $oldData = $kategori_produk->getOriginal();
    
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_kategori_produk' => 'required',
        ], [
            'nama_kategori_produk.required' => 'Nama Ujian Wajib diisi',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    
        // Simpan perubahan pada instance yang sudah ada
        $kategori_produk->update($request->all());
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'kategori_produk', $kategori_produk->id, $loggedInUserId, json_encode($oldData), json_encode($kategori_produk));
    
        return response()->json(['message' => 'Data berhasil diupdate']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori_produk = KategoriProduk::find($id);
    
        if (!$kategori_produk) {
            return response()->json(['message' => 'Data kategori_produk not found'], 404);
        }
    
       
    
        $kategori_produk->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kategori_produk', $id, $loggedInUserId, json_encode($kategori_produk), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
