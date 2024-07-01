<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Kegiatan;
use App\Models\NilaiSiswaHead;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Facades\Hash;
 




class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
    {
        // Dapatkan siswa yang sedang login
        $loggedInSiswa = Auth::guard('siswa')->user();

        // Pastikan siswa yang login ada
        if (!$loggedInSiswa) {
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }

        $query = Kegiatan::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_kegiatan', 'LIKE', "%{$search}%")
                  ->orWhere('tanggal_kegiatan', 'LIKE', "%{$search}%")
                  ->orWhere('jam', 'LIKE', "%{$search}%")
                  ->orWhere('tempat', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
        }

        // Menambahkan kondisi untuk memfilter berdasarkan siswa yang login
        $nilai_siswa = NilaiSiswaHead::join('tahun_ajaran', 'nilai_siswa_head.tahun_ajaran_id', '=', 'tahun_ajaran.id')
            ->join('kelas', 'nilai_siswa_head.kelas_id', '=', 'kelas.id')
            ->join('siswa', 'nilai_siswa_head.siswa_id', '=', 'siswa.id')
            ->join('mapel', 'nilai_siswa_head.mapel_id', '=', 'mapel.id')
            ->leftJoin('nilai_siswa_detail', 'nilai_siswa_head.id', '=', 'nilai_siswa_detail.nilai_siswa_head_id')
            ->leftJoin('jenis_ujian', 'nilai_siswa_detail.jenis_ujian_id', '=', 'jenis_ujian.id')
            ->select('nilai_siswa_head.*', 'tahun_ajaran.nama_tahun_ajaran', 'kelas.nama_kelas', 'siswa.nama_siswa', 'mapel.nama_mapel')
            ->addSelect(\DB::raw('GROUP_CONCAT(CONCAT("<strong>", jenis_ujian.nama_ujian, "</strong>: <em>", nilai_siswa_detail.nilai, "</em>") SEPARATOR ", ") AS detail_nilai'))
            ->where('nilai_siswa_head.siswa_id', $loggedInSiswa->id) // Menambahkan kondisi where untuk siswa yang login
            ->groupBy('nilai_siswa_head.id', 'tahun_ajaran.nama_tahun_ajaran', 'kelas.nama_kelas', 'siswa.nama_siswa', 'mapel.nama_mapel')
            ->get();

        // Menggunakan paginate() untuk membagi hasil query menjadi beberapa halaman
        $kegiatan = $query->orderBy('id', 'desc')->paginate(2);
        
        return view('front.area', compact('kegiatan', 'nilai_siswa', 'loggedInSiswa'));
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
