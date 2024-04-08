<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        return view('back.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.about.create');
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
            'nama_about'=>'required',
            'keterangan'=>'required',
            'link'=>'required',
            'ikon'=>'required',
            'urutan'=>'required',
   
        ],[
            'nama_about.required'=>'Nama Wajib diisi',
            'keterangan.required'=>'Keterangan Wajib diisi',
            'link.required'=>'Link Wajib diisi',
            'ikon.required'=>'Ikon Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
             
        ]);
        $input = $request->all();

     
        About::create($input);
        return redirect('/about')->with('message', 'Data berhasil ditambahkan');

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
        $data = About::where('id', $id)->first();
        return view('back.about.edit')->with('data', $data);
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
            'nama_about'=>'required',
            'keterangan'=>'required',
            'link'=>'required',
            'ikon'=>'required',
            'urutan'=>'required',
            
        ], [
            'nama_about.required' => 'Nama Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
            'link.required' => 'Link Wajib diisi',
            'ikon.required' => 'Ikon Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            
        ]);
    
       
            $data =[
                'nama_about'=>$request->nama_about,
                'keterangan'=>$request->keterangan,
                'link'=>$request->link,
                'ikon'=>$request->ikon,
                'urutan'=>$request->urutan,
                 
                 
            ];
            About::where('id', $id)->update($data);
            return redirect('/about')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::where('id', $id)->delete();
        return redirect('/about')->with('messagehapus', 'Berhasil menghapus data');
    }
}
