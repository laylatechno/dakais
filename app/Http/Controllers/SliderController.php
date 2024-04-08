<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('back.slider.index',compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.slider.create');
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
            'nama_slider'=>'required',
            'urutan'=>'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama_slider.required'=>'Nama Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/slider/';
            
            // Mengambil nama_slider file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_slider file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama_slider baru
            $image->move($destinationPath, $imageName);
        
            $input['gambar'] = $imageName;
        }
        Slider::create($input);
        return redirect('/slider')->with('message', 'Data berhasil ditambahkan');

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
        $data = Slider::where('id', $id)->first();
        return view('back.slider.edit')->with('data', $data);
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
            'nama_slider'=>'required',
            'urutan'=>'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama_slider.required'=>'Nama Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        $slider = Slider::find($id); // Dapatkan data slider yang akan diupdate
    
        if (!$slider) {
            return redirect('/slider')->with('error', 'Slider tidak ditemukan');
        }
    
        if ($image = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('upload/slider/' . $slider->gambar))) {
                unlink(public_path('upload/slider/' . $slider->gambar));
            }
        

            $destinationPath = 'upload/slider/';
            
            // Mengambil nama_slider file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_slider file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
            $image->move($destinationPath, $imageName);
            $slider->gambar = $imageName;
        }
        
    
        // Perbarui data lainnya
        $slider->nama_slider = $request->input('nama_slider');
        $slider->keterangan = $request->input('keterangan');
        $slider->link = $request->input('link');
        $slider->urutan = $request->input('urutan');
        $slider->save();
    
        return redirect('/slider')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nama_sliderFoto = Slider::where('id', $id)->pluck('gambar')->first();
    
        if ($nama_sliderFoto) {
            // Hapus data dari database
            Slider::where('id', $id)->delete();
    
            // Hapus file foto
            if (file_exists(public_path('upload/slider/' . $nama_sliderFoto))) {
                unlink(public_path('upload/slider/' . $nama_sliderFoto));
            }
    
            return redirect('/slider')->with('messagehapus', 'Berhasil menghapus data dan foto');
        } else {
            return redirect('/slider')->with('messagehapus', 'Data tidak ditemukan');
        }
    }
    
}
