<?php

namespace App\Http\Controllers;

use App\Models\About;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;




class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('front.area');
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
         // Validasi input
         $request->validate([
             'password' => 'nullable|string|min:8|confirmed',
         ], [
             'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
             'password.min' => 'Panjang password minimal harus 8 karakter.',
         ]);
     
         // Cari siswa berdasarkan ID
         $siswa = Siswa::findOrFail($id);
     
         // Jika input password diisi, lakukan update password
         if ($request->filled('password')) {
             // Jika password konfirmasi tidak cocok, kembalikan dengan pesan kesalahan
             if ($request->input('password') !== $request->input('password_confirmation')) {
                 return redirect('/area')->with('error', 'Konfirmasi password tidak cocok');
             }
     
            //  dd($request->password);
             // Simpan hash password baru ke dalam field password di database
             $siswa->password =  Hash::make($request->password);
             $siswa->save();
     
     
             // Kirim respons sukses
             return redirect('/area')->with('message', 'Password berhasil diperbarui');
         }
     
         // Kirim respons jika tidak ada perubahan pada password
         return redirect('/area')->with('message', 'Tidak ada perubahan pada password');
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
