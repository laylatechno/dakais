<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = Mitra::all();
        return view('back.mitra.index',compact('mitra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.mitra.create');
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
            'nama_mitra'=>'required',
            'no_telp'=>'required',
            'email'=>'required',
            'urutan'=>'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama_mitra.required'=>'Nama Wajib diisi',
            'no_telp.required'=>'No Telp Wajib diisi',
            'email.required'=>'Email Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
            'gambar.required'=>'Gambar Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/mitra/';
            
            // Mengambil nama file asli dan ekstensinya
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            
            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Simpan gambar dalam format aslinya
            $image->move($destinationPath, $imageName);
            
            // Konversi gambar ke format WebP
            $img = Image::make($destinationPath . $imageName)->encode('webp', 90); // 90 untuk kualitas
            $img->save($destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp');
        
            // Simpan nama gambar baru (WebP) ke dalam properti mitra
            $input['gambar'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
        }
        Mitra::create($input);
        return redirect('/mitra')->with('message', 'Data berhasil ditambahkan');

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
        $data = Mitra::where('id', $id)->first();
        return view('back.mitra.edit')->with('data', $data);
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
            'nama_mitra'=>'required',
            'no_telp'=>'required',
            'email'=>'required',
            'urutan'=>'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ],[
            'nama_mitra.required'=>'Nama Wajib diisi',
            'no_telp.required'=>'No Telp Wajib diisi',
            'email.required'=>'Email Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);
    
        $mitra = Mitra::find($id); // Dapatkan data mitra yang akan diupdate
    
        if (!$mitra) {
            return redirect('/mitra')->with('error', 'Mitra tidak ditemukan');
        }
    

        if ($image = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('upload/mitra/' . $mitra->gambar))) {
                unlink(public_path('upload/mitra/' . $mitra->gambar));
            }
        
            $destinationPath = 'upload/mitra/';
        
            // Mengambil nama file asli dan ekstensinya
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            
            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Simpan gambar dalam format aslinya
            $image->move($destinationPath, $imageName);
            
            // Konversi gambar ke format WebP
            $img = Image::make($destinationPath . $imageName)->encode('webp', 90); // 90 untuk kualitas
            $img->save($destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp');
        
            // Simpan nama gambar baru (WebP) ke dalam properti mitra
            $mitra->gambar = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
        }
        
    
        // Perbarui data lainnya
        $mitra->nama_mitra = $request->input('nama_mitra');
        $mitra->no_telp = $request->input('no_telp');
        $mitra->email = $request->input('email');
        $mitra->instagram = $request->input('instagram');
        $mitra->youtube = $request->input('youtube');
        $mitra->website = $request->input('website');
        $mitra->keterangan = $request->input('keterangan');
        $mitra->urutan = $request->input('urutan');
        $mitra->save();
    
        return redirect('/mitra')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nama_mitraFoto = Mitra::where('id', $id)->pluck('gambar')->first();
    
        if ($nama_mitraFoto) {
            // Hapus data dari database
            Mitra::where('id', $id)->delete();
    
            // Hapus file foto
            if (file_exists(public_path('upload/mitra/' . $nama_mitraFoto))) {
                unlink(public_path('upload/mitra/' . $nama_mitraFoto));
            }
    
            return redirect('/mitra')->with('messagehapus', 'Berhasil menghapus data dan foto');
        } else {
            return redirect('/mitra')->with('messagehapus', 'Data tidak ditemukan');
        }
    }
    
}
