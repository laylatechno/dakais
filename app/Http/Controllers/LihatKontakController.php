<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\LihatKontak;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LihatKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $lihat_kontak = Kontak::orderBy('id', 'desc')->get();
        return view('back.kontak.index',compact('lihat_kontak'));
    }

    public function deleteAll()
    {
        try {
            // Use DB facade to perform a raw SQL delete query
            DB::statement('DELETE FROM kontak');
            
            // Redirect back with a success message
            return redirect()->route('kontak.index')->with('success', 'All data deleted successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message if something goes wrong
            return redirect()->route('kontak.index')->with('error', 'Failed to delete data. Please try again.');
        }
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
         
     }
     
     
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
    }

}