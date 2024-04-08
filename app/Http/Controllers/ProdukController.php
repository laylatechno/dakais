<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\LogHistori;
use App\Models\Produk;
use App\Models\SatuanProduk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
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
        $produk = Produk::orderBy('id', 'desc')->get();
        $kategoriProduk = KategoriProduk::all();
        $satuanProduk = SatuanProduk::all();
        return view('back.produk.index', compact('produk', 'kategoriProduk', 'satuanProduk'));
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
            'nama_produk' => 'required',
            'harga_beli' => 'required',
            'harga_jual_1' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'harga_beli.required' => 'Harga Beli Produk Wajib diisi',
            'nama_produk.required' => 'Nama Produk Wajib diisi',
            'harga_jual_1.required' => 'Harga Jual 1 Produk Wajib diisi',
            'deskripsi.required' => 'Keterangan Wajib diisi',
            'gambar.required' => 'Bukti Produk Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->except('harga_beli', 'harga_jual_1', 'harga_jual_2', 'harga_jual_3');

        if ($request->has('harga_beli')) {
            $input['harga_beli'] = str_replace(',', '', $request->input('harga_beli'));
        }

        if ($request->has('harga_jual_1')) {
            $input['harga_jual_1'] = str_replace(',', '', $request->input('harga_jual_1'));
        }

        if ($request->has('harga_jual_2')) {
            $input['harga_jual_2'] = str_replace(',', '', $request->input('harga_jual_2'));
        }

        if ($request->has('harga_jual_3')) {
            $input['harga_jual_3'] = str_replace(',', '', $request->input('harga_jual_3'));
        }
        // Generate kode_produk secara acak
        // $input['kode_produk'] = "PROD_" . uniqid();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/produk/';
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
            $image->move($destinationPath, $imageName);
            $input['gambar'] = $imageName;
        }

        // Simpan data produk ke database menggunakan fill()
        $produk = new Produk();
        $produk->fill($input);
        $produk->save();

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'produk', $produk->id, $loggedInUserId, null, json_encode($produk));

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
        $produk = Produk::findOrFail($id);
        return response()->json($produk);
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
            'nama_produk' => 'required',
            'harga_beli' => 'required',
            'harga_jual_1' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'harga_beli.required' => 'Harga Beli Produk Wajib diisi',
            'nama_produk.required' => 'Nama Produk Wajib diisi',
            'harga_jual_1.required' => 'Harga Jual 1 Produk Wajib diisi',
            'deskripsi.required' => 'Keterangan Wajib diisi',
            'gambar.required' => 'Bukti Produk Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

      

        $produk = Produk::findOrFail($id);
        $oldData = $produk->getOriginal();



        // Menghapus gambar lama jika ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            $oldBuktiFileName = $produk->gambar; // Ini adalah nama file saja, bukan path lengkap

            // Mendapatkan path lengkap dari root folder ke file yang ingin dihapus
            $oldBuktiPath = public_path('upload/produk/' . $oldBuktiFileName);

            // Jika ada gambar lama, hapus dari penyimpanan
            if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
                unlink($oldBuktiPath);
            }


            // Upload gambar baru
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = '' . $fileName;
            $file->move(public_path('upload/produk'), $fileName);
            $validatedData['gambar'] = $filePath;
        }

        $input = $request->except('harga_beli', 'harga_jual_1', 'harga_jual_2', 'harga_jual_3');

        if ($request->has('harga_beli')) {
            $input['harga_beli'] = str_replace(',', '', $request->input('harga_beli'));
        }

        if ($request->has('harga_jual_1')) {
            $input['harga_jual_1'] = str_replace(',', '', $request->input('harga_jual_1'));
        }

        if ($request->has('harga_jual_2')) {
            $input['harga_jual_2'] = str_replace(',', '', $request->input('harga_jual_2'));
        }

        if ($request->has('harga_jual_3')) {
            $input['harga_jual_3'] = str_replace(',', '', $request->input('harga_jual_3'));
        }


        $produk->update($input);


        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'produk', $produk->id, $loggedInUserId, json_encode($oldData), json_encode($produk));


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
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Data produk not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $produk->gambar; // Nama file saja
        $oldBuktiPath = public_path('upload/produk/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $produk->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'produk', $id, $loggedInUserId, json_encode($produk), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
