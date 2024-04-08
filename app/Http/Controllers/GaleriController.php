<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all();
        return view('back.galeri.index',compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriGaleris = KategoriGaleri::select('id', 'nama_kategori_galeri')->get();

        return view('back.galeri.create', compact('kategoriGaleris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_galeri'=>'required',
            'kategori_galeri_id'=>'required',
            'urutan'=>'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama_galeri.required'=>'Nama Wajib diisi',
            'kategori_galeri_id.required'=>'Kategori Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
            'gambar.required'=>'Gambar Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/galeri/';
            
            // Mengambil nama_galeri file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_galeri file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama_galeri baru
            $image->move($destinationPath, $imageName);
        
            $input['gambar'] = $imageName;
        }
        Galeri::create($input);
        return redirect('/galeri')->with('message', 'Data berhasil ditambahkan');

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
        $data = Galeri::where('id', $id)->first();
        $kategoriGaleris = KategoriGaleri::select('id', 'nama_kategori_galeri')->get();
    
        return view('back.galeri.edit', compact('data', 'kategoriGaleris'));
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
        $request->validate([
            'nama_galeri'=>'required',
            'kategori_galeri_id'=>'required',
            'urutan'=>'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama_galeri.required'=>'Nama Wajib diisi',
            'kategori_galeri_id.required'=>'Kategori Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        $galeri = Galeri::find($id); // Dapatkan data galeri yang akan diupdate
    
        if (!$galeri) {
            return redirect('/galeri')->with('error', 'Galeri tidak ditemukan');
        }
    
        if ($image = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('upload/galeri/' . $galeri->gambar))) {
                unlink(public_path('upload/galeri/' . $galeri->gambar));
            }
        

            $destinationPath = 'upload/galeri/';
            
            // Mengambil nama_galeri file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_galeri file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
            $image->move($destinationPath, $imageName);
            $galeri->gambar = $imageName;
        }
        
    
        // Perbarui data lainnya
        $galeri->nama_galeri = $request->input('nama_galeri');
        $galeri->kategori_galeri_id = $request->input('kategori_galeri_id');
        $galeri->keterangan = $request->input('keterangan');
        $galeri->link = $request->input('link');
        $galeri->urutan = $request->input('urutan');
        $galeri->save();
    
        return redirect('/galeri')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nama_galeriFoto = Galeri::where('id', $id)->pluck('gambar')->first();
    
        if ($nama_galeriFoto) {
            // Hapus data dari database
            Galeri::where('id', $id)->delete();
    
            // Hapus file foto
            if (file_exists(public_path('upload/galeri/' . $nama_galeriFoto))) {
                unlink(public_path('upload/galeri/' . $nama_galeriFoto));
            }
    
            return redirect('/galeri')->with('messagehapus', 'Berhasil menghapus data dan foto');
        } else {
            return redirect('/galeri')->with('messagehapus', 'Data tidak ditemukan');
        }
    }
    
}
