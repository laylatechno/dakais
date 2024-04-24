<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        $kontak = Kontak::all();
        return view('front.kontak', compact('about', 'kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kontak.create');
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
            'nama_kontak'=>'required',
            'subjek'=>'required',
            'no_telp'=>'required',
            'email'=>'required',
            'isi'=>'required',
   
        ],[
            'nama_kontak.required'=>'Nama Wajib diisi',
            'subjek.required'=>'Subjek Wajib diisi',
            'no_telp.required'=>'No Telp Wajib diisi',
            'email.required'=>'Email Wajib diisi',
            'isi.required'=>'Isi Wajib diisi',
             
        ]);
        $input = $request->all();

     
        Kontak::create($input);
        return redirect('/kontak_sekolah')->with('message', 'Terima kasih! Pesan berhasil dikirim, tunggu informasi selanjutnya');

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
        $data = Kontak::where('id', $id)->first();
        return view('back.kontak.edit')->with('data', $data);
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
            'nama_kontak' => 'required',
            'keterangan' => 'required',
            'ikon' => 'required',
            'urutan' => 'required',
            
        ], [
            'nama_kontak.required' => 'Nama Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
            'ikon.required' => 'Ikon Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            
        ]);
    
       
            $data =[
                'nama_kontak'=>$request->nama_kontak,
                'keterangan'=>$request->keterangan,
                'ikon'=>$request->ikon,
                'urutan'=>$request->urutan,
                 
                 
            ];
            Kontak::where('id', $id)->update($data);
            return redirect('/kontak')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kontak::where('id', $id)->delete();
        return redirect('/kontak')->with('messagehapus', 'Berhasil menghapus data');
    }
}
