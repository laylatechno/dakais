<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Intervention\Image\Facades\Image;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $pendaftaran = Pendaftaran::all();
        return view('back.pendaftaran.index', compact('pendaftaran'));
    }

    public function index()
    {
        $about = About::all();
        return view('front.daftar', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pendaftaran.create');
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
            'nik'=>'required',
            'nama_siswa'=>'required',
            'email'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'foto'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur validasi sesuai kebutuhan Anda
            // tambahkan validasi lainnya
        ],[
            'nik.required'=>'NIK Wajib diisi',
            'nama_siswa.required'=>'Nama Siswa Wajib diisi',
            'email.required'=>'Email Wajib diisi',
            'tempat_lahir.required'=>'Tempat Lahir Wajib diisi',
            'tanggal_lahir.required'=>'Tanggal Lahir Wajib diisi',
            'foto.required'=>'Foto Wajib diisi',
            'foto.image'=>'File harus berupa gambar',
            'foto.mimes'=>'Format gambar harus jpeg, png, jpg, atau gif',
            'foto.max'=>'Ukuran maksimal gambar adalah 2MB',
            // tambahkan pesan validasi lainnya
        ]);
    
        if ($image = $request->file('foto')) {
            $destinationPath = 'upload/foto_siswa/';

            // Mengambil nama_guru file asli
            $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            // Mendapatkan nama unik dengan waktu
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.webp';

            // Konversi foto ke WebP dan simpan ke folder tujuan
            $img = Image::make($image->getRealPath())->encode('webp', 90); // 90 untuk kualitas foto
            $img->save($destinationPath . $imageName);

            $input['foto'] = $imageName;
        }
         
        $siswa = Siswa::create([
            'nik' => $request->nik,
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'no_telp_ayah' => $request->no_telp_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_telp_ibu' => $request->no_telp_ibu,
            'sekolah_asal' => $request->sekolah_asal,
            'kelas' => $request->kelas,
            'foto' => $imageName, // Simpan nama file foto
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);

       
    
        // Simpan data pendaftaran
        $pendaftaran = Pendaftaran::create([
            'tanggal_pendaftaran' => Carbon::now(), // Tanggal saat ini
            'nik' => $request->nik,
            'siswa_id' => $siswa->id, // Gunakan id siswa yang baru dibuat
            'status' => 'Pending',
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);
    
        return redirect('/daftar_sekolah#contact-us')->with('message', 'Terima kasih! Pendaftaran berhasil dilakukan, tunggu informasi selanjutnya');

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
