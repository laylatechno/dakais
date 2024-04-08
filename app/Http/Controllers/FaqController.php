<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all();
        return view('back.faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.faq.create');
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
            'pertanyaan'=>'required',
            'jawaban'=>'required',
            'urutan'=>'required',
   
        ],[
            'pertanyaan.required'=>'Pertanyaan Wajib diisi',
            'jawaban.required'=>'Jawaban Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
             
        ]);
        $input = $request->all();

     
        Faq::create($input);
        return redirect('/faq')->with('message', 'Data berhasil ditambahkan');

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
        $data = Faq::where('id', $id)->first();
        return view('back.faq.edit')->with('data', $data);
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
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'urutan' => 'required',
            
        ], [
            'pertanyaan.required' => 'Pertanyaan Wajib diisi',
            'jawaban.required' => 'Jawaban Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            
        ]);
    
       
            $data =[
                'pertanyaan'=>$request->pertanyaan,
                'jawaban'=>$request->jawaban,
                'urutan'=>$request->urutan,
                 
                 
            ];
            Faq::where('id', $id)->update($data);
            return redirect('/faq')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::where('id', $id)->delete();
        return redirect('/faq')->with('messagehapus', 'Berhasil menghapus data');
    }
}
