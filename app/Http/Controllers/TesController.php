<?php

namespace App\Http\Controllers;

use App\Models\Tes;
use Illuminate\Http\Request;

class TesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tes = Tes::paginate(10);
        return response()->json([
            'data' => $tes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tes = Tes::create([
            'nama' => $request->nama,
            'no' => $request->no,
        ]);

        return response()->json([
            'data' => $tes
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $data = Tes::find($id);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'Data Ketemu',
                'data' => $data
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data Ora Ketemu',
            ]);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tes $tes)
    {
        $tes->nama = $request->nama;
        $tes->no = $request->no;
        $tes->save();
        return response()->json([
            'data'=> $tes
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tes $tes)
    {
        $tes->delete();
        return response()->json([
            'message' => 'Tes Deleted'
        ], 204);
    }
}
