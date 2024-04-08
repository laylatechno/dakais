<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use App\Models\JadwalPelajaranDetail;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\WaktuMengajar;
use Illuminate\Http\Request;

class LihatJadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal_pelajaran = JadwalPelajaran::all()->groupBy('kelas_id');
        return view('back.lihat_jadwal_pelajaran.index', compact('jadwal_pelajaran'));
    }
    
 

    public function tampilkanJadwalKelas($kelasId)
{
    // Mengambil jadwal pelajaran sesuai dengan kelas yang dipilih
    $jadwalPelajaran = JadwalPelajaran::where('kelas_id', $kelasId)->get();

    // Memuat data waktu mengajar dan mata pelajaran berdasarkan jadwal pelajaran yang telah dipilih
    $jadwalPelajaranDetails = [];
    foreach ($jadwalPelajaran as $jadwal) {
        $detail = JadwalPelajaranDetail::where('jadwal_pelajaran_id', $jadwal->id)
            ->with('waktuMengajar')
            ->get();

        // Mengatur struktur data $jadwalPelajaranDetails
        foreach ($detail as $jadwalDetail) {
            $jadwalPelajaranDetails[$jadwal->hari][] = $jadwalDetail;
        }
    }

    return view('back.lihat_jadwal_pelajaran.edit', [
        'jadwalPelajaran' => $jadwalPelajaran,
        'jadwalPelajaranDetails' => $jadwalPelajaranDetails,
    ]);
}
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mataPelajaran = Mapel::select('id', 'nama_mapel')->get();
        $kelas = Kelas::select('id', 'nama_kelas')->get();
        $waktu_mengajar = WaktuMengajar::all();
        return view('back.lihat_jadwal_pelajaran.create',compact('waktu_mengajar','mataPelajaran','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
     {
         // Simpan data ke tabel jadwal_pelajaran
         $jadwalPelajaran = new JadwalPelajaran();
         $jadwalPelajaran->hari = $request->hari;
         $jadwalPelajaran->kelas_id = $request->kelas_id;
         $jadwalPelajaran->save();
     
         // Mendapatkan ID dari jadwal_pelajaran yang baru saja disimpan
         $jadwalPelajaranId = $jadwalPelajaran->id;
     
         // Looping untuk menyimpan data ke tabel jadwal_pelajaran_detail
         if ($request->has('waktu_mengajar_id')) {
             foreach ($request->waktu_mengajar_id as $key => $waktuMengajarId) {
                 $jadwalPelajaranDetail = new JadwalPelajaranDetail();
                 $jadwalPelajaranDetail->jadwal_pelajaran_id = $jadwalPelajaranId;
                 $jadwalPelajaranDetail->waktu_mengajar_id = $waktuMengajarId;
                 $jadwalPelajaranDetail->mapel_id = $request->mapel_id[$key];
                 $jadwalPelajaranDetail->save();
             }
         }
     
         // Jika berhasil disimpan
         return redirect('/jadwal_pelajaran')->with('message', 'Data berhasil ditambahkan');
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
    // public function edit($id)
    // {
    //     $mataPelajaran = Mapel::select('id', 'nama_mapel')->get();
    //     $kelas = Kelas::select('id', 'nama_kelas')->get();
    //     $waktu_mengajar = WaktuMengajar::all();
    //     $data = JadwalPelajaran::where('id', $id)->first();
    //     $dataJadwalPelajaran = JadwalPelajaran::findOrFail($id);
    //     return view('back.lihat_jadwal_pelajaran.edit',compact('data','waktu_mengajar','mataPelajaran','kelas','dataJadwalPelajaran'));
    // }
//     public function edit($id)
// {
//     // Mengambil data jadwal pelajaran yang akan diedit
//     $jadwalPelajaran = JadwalPelajaran::findOrFail($id);
//     $kelas = Kelas::select('id', 'nama_kelas')->get();
//     // Mengambil data waktu mengajar dan mata pelajaran
//     $waktuMengajar = JadwalPelajaranDetail::where('jadwal_pelajaran_id', $id)->get();

//     $mataPelajaran = Mapel::all();
    
//     return view('back.lihat_jadwal_pelajaran.edit', compact('jadwalPelajaran', 'waktuMengajar', 'mataPelajaran', 'kelas'));
// }

public function edit($id)
{
    $jadwalPelajaran = JadwalPelajaran::findOrFail($id);
    $waktuMengajar = JadwalPelajaranDetail::where('jadwal_pelajaran_id', $id)->get();
    $mataPelajaran = Mapel::all();

    // Mengelompokkan jadwal pelajaran berdasarkan hari
    $jadwalPerHari = $waktuMengajar->groupBy('hari');

    return view('back.lihat_jadwal_pelajaran.edit', compact('jadwalPelajaran', 'waktuMengajar', 'mataPelajaran', 'jadwalPerHari'));
}

public function editByKelas($kelas_id)
{
    // Ambil jadwal pelajaran berdasarkan kelas_id
    $jadwalPelajaran = JadwalPelajaran::where('kelas_id', $kelas_id)->get();
    
    // Lakukan pengelompokan berdasarkan hari
    $jadwalPerHari = $jadwalPelajaran->groupBy('hari');

    // Sertakan data ke view untuk ditampilkan
    return view('back.lihat_jadwal_pelajaran.edit_by_kelas', compact('jadwalPelajaran', 'jadwalPerHari'));
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
    // Validasi input jika diperlukan
    $validatedData = $request->validate([
        // Atur validasi sesuai kebutuhan
    ]);

    // Update data di tabel jadwal_pelajaran
    $jadwalPelajaran = JadwalPelajaran::findOrFail($id);
    $jadwalPelajaran->hari = $request->hari;
    $jadwalPelajaran->kelas_id = $request->kelas_id;
    $jadwalPelajaran->save();

    // Looping untuk menyimpan atau memperbarui data di tabel jadwal_pelajaran_detail
    if ($request->has('waktu_mengajar_id')) {
        foreach ($request->waktu_mengajar_id as $key => $waktuMengajarId) {
            // Memeriksa apakah terjadi perubahan pada mapel_id
            if ($request->mapel_id[$key] != 0 && $request->mapel_id[$key] != null) {
                $jadwalPelajaranDetail = JadwalPelajaranDetail::updateOrCreate(
                    ['jadwal_pelajaran_id' => $jadwalPelajaran->id, 'waktu_mengajar_id' => $waktuMengajarId],
                    ['mapel_id' => $request->mapel_id[$key]]
                );
            }
        }
    }

    // Jika berhasil diupdate
    return redirect('/jadwal_pelajaran')->with('message', 'Data berhasil diupdate');
}

    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data dari tabel jadwal_pelajaran_detail
        JadwalPelajaranDetail::where('jadwal_pelajaran_id', $id)->delete();
    
        // Hapus data dari tabel jadwal_pelajaran
        JadwalPelajaran::destroy($id);
    
        return redirect('/jadwal_pelajaran')->with('success', 'Data berhasil dihapus');
    }
    
}
