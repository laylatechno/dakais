<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metode = Metode::all();
        return view('back.metode.index',compact('metode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.metode.create');
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
        
        Metode::create($input);
        return redirect('/metode')->with('message', 'Data berhasil ditambahkan');

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
        $data = Metode::where('id', $id)->first();
        return view('back.metode.edit')->with('data', $data);
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
    
        $metode = Metode::find($id); // Dapatkan data metode yang akan diupdate
    
        if (!$metode) {
            return redirect('/metode')->with('error', 'Metode tidak ditemukan');
        }
    
        if ($image = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('upload/' . $metode->gambar))) {
                unlink(public_path('upload/' . $metode->gambar));
            }
        

            $destinationPath = 'upload/';
            
            // Mengambil nama file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;

        
            $image->move($destinationPath, $imageName);
            $metode->gambar = $imageName;
        }
        
    
        // Perbarui data lainnya
        $metode->nama = $request->input('nama');
        $metode->keterangan = $request->input('keterangan');
        $metode->save();
    
        return redirect('/metode')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $namaFoto = Metode::where('id', $id)->pluck('gambar')->first();
    
        if ($namaFoto) {
            // Hapus data dari database
            Metode::where('id', $id)->delete();
    
            // Hapus file foto
            if (file_exists(public_path('upload/' . $namaFoto))) {
                unlink(public_path('upload/' . $namaFoto));
            }
    
            return redirect('/metode')->with('messagehapus', 'Berhasil menghapus data dan foto');
        } else {
            return redirect('/metode')->with('messagehapus', 'Data tidak ditemukan');
        }
        
        
    }
    
}
