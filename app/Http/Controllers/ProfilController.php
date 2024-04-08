<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::all();
        return view('back.profil.index',compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.profil.create');
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
        // Mendapatkan data profil berdasarkan ID
        $data = Profil::where('id', $id)->first();
    
        // Mendapatkan semua data guru
        $semuaGuru = Guru::all(); // Sesuaikan dengan query yang dibutuhkan
    
        // Mengambil data guru untuk kepala sekolah, bendahara, dan operator sekolah
        $kepalaSekolah = Guru::find($data->kepala_sekolah_id);
        $bendaharaSekolah = Guru::find($data->bendahara_sekolah_id);
        $operatorSekolah = Guru::find($data->operator_sekolah_id);
    
        return view('back.profil.edit')->with([
            'data' => $data,
            'semuaGuru' => $semuaGuru,
            'kepalaSekolah' => $kepalaSekolah,
            'bendaharaSekolah' => $bendaharaSekolah,
            'operatorSekolah' => $operatorSekolah,
        ]);
    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_media_sosial(Request $request, $id)
    {
        $request->validate([
            'email' => 'required',
             
        ], [
            'email.required' => 'Email Sekolah Wajib diisi',
             
        ]);
    
        $profil = Profil::find($id); // Dapatkan data profil yang akan diupdate
    
        if (!$profil) {
            return redirect('/profil/1/edit')->with('error', 'Profil tidak ditemukan');
        }
    
  
    
   ;
     
        $profil->email = $request->input('email');
        $profil->instagram = $request->input('instagram');
        $profil->facebook = $request->input('facebook');
        $profil->youtube = $request->input('youtube');
        $profil->website = $request->input('website');
        
        
        $profil->save();
    
        return redirect('/profil/1/edit')->with('message', 'Data media sosial berhasil diperbarui');
    }


    public function update_umum(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'npsn' => 'required',
            'status' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
             
        ], [
            'nama_sekolah.required' => 'Nama Sekolah Wajib diisi',
            'npsn.required' => 'NPSN Sekolah Wajib diisi',
            'status.required' => 'Status Sekolah Wajib diisi',
            'no_telp.required' => 'No Telp Sekolah Wajib diisi',
            'alamat.required' => 'Alamat Sekolah Wajib diisi',
            'deskripsi.required' => 'Deskripsi Sekolah Wajib diisi',
             
        ]);
    
        $profil = Profil::find($id); // Dapatkan data profil yang akan diupdate
    
        if (!$profil) {
            return redirect('/profil/1/edit')->with('error', 'Profil tidak ditemukan');
        }
    
        $profil->nama_sekolah = $request->input('nama_sekolah');
        $profil->npsn = $request->input('npsn');
        $profil->status = $request->input('status');
        $profil->no_telp = $request->input('no_telp');
        $profil->alamat = $request->input('alamat');
        $profil->deskripsi = $request->input('deskripsi');
        
        
        $profil->save();
    
        return redirect('/profil/1/edit')->with('message', 'Data Umum berhasil diperbarui');
    }
    
    public function update_sdm(Request $request, $id)
    {
        $request->validate([
            'kepala_sekolah_id' => 'required',
            
             
        ], [
            'kepala_sekolah_id.required' => 'Kepala Sekolah Wajib diisi',
            
             
        ]);
    
        $profil = Profil::find($id); // Dapatkan data profil yang akan diupdate
    
        if (!$profil) {
            return redirect('/profil/1/edit')->with('error', 'Profil tidak ditemukan');
        }
    
        $profil->kepala_sekolah_id = $request->input('kepala_sekolah_id');
        $profil->bendahara_sekolah_id = $request->input('bendahara_sekolah_id');
        $profil->operator_sekolah_id = $request->input('operator_sekolah_id');
        
        
        
        $profil->save();
    
        return redirect('/profil/1/edit')->with('message', 'Data Umum berhasil diperbarui');
    }
    

    public function update_display(Request $request, $id)
            {
                $request->validate([
                    // validasi untuk setiap gambar
                    'logo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    'favicon' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                    'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
                ]);

                $data = Profil::findOrFail($id); // Dapatkan data Profil yang akan diupdate

                // Update Logo Sekolah
                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
                    $logo->move(public_path('upload/profil'), $logoName);
                    $data->logo = $logoName;
                }

                // Update Favicon
                if ($request->hasFile('favicon')) {
                    $favicon = $request->file('favicon');
                    $faviconName = 'favicon_' . time() . '.' . $favicon->getClientOriginalExtension();
                    $favicon->move(public_path('upload/profil'), $faviconName);
                    $data->favicon = $faviconName;
                }

                // Update Banner Website
                if ($request->hasFile('gambar')) {
                    $gambar = $request->file('gambar');
                    $gambarName = 'banner_' . time() . '.' . $gambar->getClientOriginalExtension();
                    $gambar->move(public_path('upload/profil'), $gambarName);
                    $data->gambar = $gambarName;
                }

                // Simpan perubahan
                $data->save();

                return redirect()->back()->with('message', 'Gambar berhasil diperbarui');
            }


 
    /**

     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profil::where('id', $id)->delete();
        return redirect('/profil')->with('success', 'Berhasil menghapus data');
    }
}
