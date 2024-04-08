<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use Illuminate\Http\Request;

class AlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alasan = Alasan::all();
        return view('back.alasan.index',compact('alasan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.alasan.create');
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
            'nama_alasan'=>'required',
            'keterangan'=>'required',
            'ikon'=>'required',
            'urutan'=>'required',
   
        ],[
            'nama_alasan.required'=>'Nama Wajib diisi',
            'keterangan.required'=>'Keterangan Wajib diisi',
            'ikon.required'=>'Ikon Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
             
        ]);
        $input = $request->all();

     
        Alasan::create($input);
        return redirect('/alasan')->with('message', 'Data berhasil ditambahkan');

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
        $data = Alasan::where('id', $id)->first();
        return view('back.alasan.edit')->with('data', $data);
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
            'nama_alasan' => 'required',
            'keterangan' => 'required',
            'ikon' => 'required',
            'urutan' => 'required',
            
        ], [
            'nama_alasan.required' => 'Nama Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
            'ikon.required' => 'Ikon Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            
        ]);
    
       
            $data =[
                'nama_alasan'=>$request->nama_alasan,
                'keterangan'=>$request->keterangan,
                'ikon'=>$request->ikon,
                'urutan'=>$request->urutan,
                 
                 
            ];
            Alasan::where('id', $id)->update($data);
            return redirect('/alasan')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alasan::where('id', $id)->delete();
        return redirect('/alasan')->with('messagehapus', 'Berhasil menghapus data');
    }
}
