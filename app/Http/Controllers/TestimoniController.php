<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('back.testimoni.index',compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.testimoni.create');
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
            'nama'=>'required',
            'keterangan'=>'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama.required'=>'Nama Wajib diisi',
            'keterangan.required'=>'Keterangan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/';
            
            // Mengambil nama file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama baru
            $image->move($destinationPath, $imageName);
        
            $input['gambar'] = $imageName;
        }
        
        Testimoni::create($input);
        return redirect('/testimoni')->with('message', 'Data berhasil ditambahkan');

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
        $data = Testimoni::where('id', $id)->first();
        return view('back.testimoni.edit')->with('data', $data);
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
            'nama' => 'required',
            'keterangan' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama.required' => 'Nama Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG, dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        $testimoni = Testimoni::find($id); // Dapatkan data testimoni yang akan diupdate
    
        if (!$testimoni) {
            return redirect('/testimoni')->with('error', 'Testimoni tidak ditemukan');
        }
    
        if ($image = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('upload/' . $testimoni->gambar))) {
                unlink(public_path('upload/' . $testimoni->gambar));
            }
        

            $destinationPath = 'upload/';
            
            // Mengambil nama file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;

        
            $image->move($destinationPath, $imageName);
            $testimoni->gambar = $imageName;
        }
        
    
        // Perbarui data lainnya
        $testimoni->nama = $request->input('nama');
        $testimoni->keterangan = $request->input('keterangan');
        $testimoni->save();
    
        return redirect('/testimoni')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $namaFoto = Testimoni::where('id', $id)->pluck('gambar')->first();
    
        if ($namaFoto) {
            // Hapus data dari database
            Testimoni::where('id', $id)->delete();
    
            // Hapus file foto
            if (file_exists(public_path('upload/' . $namaFoto))) {
                unlink(public_path('upload/' . $namaFoto));
            }
    
            return redirect('/portofolios')->with('messagehapus', 'Berhasil menghapus data dan foto');
        } else {
            return redirect('/portofolios')->with('messagehapus', 'Data tidak ditemukan');
        }
        
        
    }
    
}
