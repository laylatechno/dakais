<?php

namespace App\Http\Controllers;

use App\Models\SatuanProduk;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SatuanProdukController extends Controller
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
        $satuan_produk = SatuanProduk::all();
        return view('back.satuan_produk.index',compact('satuan_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.satuan_produk.create');
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
            'nama_satuan_produk' => 'required',
        ], [
            'nama_satuan_produk.required' => 'Nama Satuan Produk diisi',
        ]);
    
        // Simpan data satuan_produk ke database
        $input = $request->all();
    
        $satuan_produk = new SatuanProduk();
        $satuan_produk->fill($input);
        $satuan_produk->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Satuan Produk', $satuan_produk->id, $loggedInUserId, null, json_encode($satuan_produk));

    
        return response()->json(['message' => 'Data satuan produk berhasil disimpan']);
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
        $satuan_produk = SatuanProduk::findOrFail($id);
        return response()->json($satuan_produk);
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
        $satuan_produk = SatuanProduk::findOrFail($id);
        $oldData = $satuan_produk->getOriginal();
    
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_satuan_produk' => 'required',
        ], [
            'nama_satuan_produk.required' => 'Nama Ujian Wajib diisi',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    
        // Simpan perubahan pada instance yang sudah ada
        $satuan_produk->update($request->all());
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'satuan_produk', $satuan_produk->id, $loggedInUserId, json_encode($oldData), json_encode($satuan_produk));
    
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
        $satuan_produk = SatuanProduk::find($id);
    
        if (!$satuan_produk) {
            return response()->json(['message' => 'Data satuan_produk not found'], 404);
        }
    
       
    
        $satuan_produk->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'satuan_produk', $id, $loggedInUserId, json_encode($satuan_produk), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
