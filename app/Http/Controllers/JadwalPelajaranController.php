<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use App\Models\JadwalPelajaranDetail;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\Mapel;
use App\Models\WaktuMengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }
    public function index()
    {
        $jadwal_pelajaran = JadwalPelajaran::all();
        return view('back.jadwal_pelajaran.index',compact('jadwal_pelajaran'));
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
        return view('back.jadwal_pelajaran.create',compact('waktu_mengajar','mataPelajaran','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mulai transaksi database
        DB::beginTransaction();
    
        try {
            // Validasi input
            $request->validate([
                'hari' => 'required',
                'waktu_mengajar_id.*' => 'required',
                'mapel_id.*' => 'required',
            ]);
    
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
                    // Simpan data ke tabel jadwal_pelajaran_detail
                    $jadwalPelajaranDetail = new JadwalPelajaranDetail();
                    $jadwalPelajaranDetail->jadwal_pelajaran_id = $jadwalPelajaranId;
                    $jadwalPelajaranDetail->waktu_mengajar_id = $waktuMengajarId;
                    $jadwalPelajaranDetail->mapel_id = $request->mapel_id[$key];
                    $jadwalPelajaranDetail->hari = $request->hari;
                    $jadwalPelajaranDetail->save();
                }
            }
    
            // Commit transaksi jika berhasil
            DB::commit();
    
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();
    
            // Simpan log histori untuk operasi Create dengan ruangan_id yang sedang login
            $this->simpanLogHistori('Create', 'Form Tambah Jadwal Pelajaran', $jadwalPelajaran->id, $loggedInUserId, null, json_encode($jadwalPelajaran));
    
            // Jika berhasil disimpan
            return redirect('/jadwal_pelajaran')->with('message', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
    
            // Tangkap pesan kesalahan jika ada
            return redirect('/jadwal_pelajaran')->with('error', 'Penyimpanan gagal. Terjadi kesalahan: ' . $e->getMessage());
        }
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
    //     return view('back.jadwal_pelajaran.edit',compact('data','waktu_mengajar','mataPelajaran','kelas','dataJadwalPelajaran'));
    // }
    public function edit($id)
{
    // Mengambil data jadwal pelajaran yang akan diedit
    $jadwalPelajaran = JadwalPelajaran::findOrFail($id);
    $kelas = Kelas::select('id', 'nama_kelas')->get();
    // Mengambil data waktu mengajar dan mata pelajaran
    $waktuMengajar = JadwalPelajaranDetail::where('jadwal_pelajaran_id', $id)->get();

    $mataPelajaran = Mapel::all();
    
    return view('back.jadwal_pelajaran.edit', compact('jadwalPelajaran', 'waktuMengajar', 'mataPelajaran', 'kelas'));
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

       // Mendapatkan ID pengguna yang sedang login
       $loggedInUserId = Auth::id();
    
       // Simpan log histori untuk operasi Update dengan ruangan_id yang sedang login
       $this->simpanLogHistori('Update', 'Form Update Jadwal Pelajaran', $jadwalPelajaran->id, $loggedInUserId, json_encode($jadwalPelajaran), json_encode($jadwalPelajaran));

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
        $JadwalPelajaran = JadwalPelajaran::findOrFail($id);
        JadwalPelajaranDetail::where('jadwal_pelajaran_id', $id)->delete();
    
        // Mendapatkan ID pengguna yang sedang login
        
        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        
        JadwalPelajaran::destroy($id);
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Form Hapus Jadwal Pelajaran', $id, $loggedInUserId, json_encode($JadwalPelajaran), null);
    
        return redirect('/jadwal_pelajaran')->with('success', 'Data berhasil dihapus');
    }
    
}
