<?php

namespace App\Http\Controllers;

use App\Models\KategoriGaleri;
use Illuminate\Http\Request;

class KategoriGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorigaleri = KategoriGaleri::all();
        return view('back.kategorigaleri.index',compact('kategorigaleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kategorigaleri.create');
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
            'nama_kategori_galeri'=>'required|unique:kategori_galeri',
            'urutan'=>'required',
            
   
        ],[
            'nama_kategori_galeri.required'=>'Nama Wajib diisi',
            'nama_kategori_galeri.unique' => 'Nama Kategori sudah ada',
            'urutan.required'=>'Urutan Wajib diisi',
            
             
        ]);
        $input = $request->all();

     
        KategoriGaleri::create($input);
        return redirect('/kategorigaleri')->with('message', 'Data berhasil ditambahkan');

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
        $data = KategoriGaleri::where('id', $id)->first();
        return view('back.kategorigaleri.edit')->with('data', $data);
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
            'nama_kategori_galeri' => 'required',
            'urutan' => 'required',
             
        ], [
            'nama_kategori_galeri.required' => 'Nama Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            
        ]);
    
       
            $data =[
                'nama_kategori_galeri'=>$request->nama_kategori_galeri,
                'urutan'=>$request->urutan,
                 
                 
            ];
            KategoriGaleri::where('id', $id)->update($data);
            return redirect('/kategorigaleri')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriGaleri::where('id', $id)->delete();
        return redirect('/kategorigaleri')->with('messagehapus', 'Berhasil menghapus data');
    }
}
