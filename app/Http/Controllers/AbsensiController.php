<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AbsensiDetail;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\Mapel;
use App\Models\PenempatanKelasDetail;
use App\Models\Siswa;
use App\Models\WaktuMengajar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
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
        $absensi = Absensi::with('siswa')->get(); // Menggunakan eager loading untuk memastikan relasi
    
        if ($absensi->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data absensi.');
        }
    
        return view('back.absensi.index', compact('absensi'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        $absensi = Absensi::all();
        return view('back.absensi.create', compact('siswa', 'guru', 'kelas', 'absensi'));
    }

    public function getSiswaByKelas($kelasId)
    {
        // Dapatkan siswa berdasarkan kelas_id dari penempatan_kelas_detail
        $siswa_ids = PenempatanKelasDetail::where('kelas_id', $kelasId)->pluck('siswa_id');
        $siswa = Siswa::whereIn('id', $siswa_ids)->get();

        return response()->json($siswa); // Kembalikan data siswa sebagai JSON
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggalAbsensi = Carbon::today();
        $guruId = $request->input('guru_id');

        if (is_null($guruId)) {
            return redirect()->back()->with('error', 'Guru belum dipilih.');
        }

        $siswa_ids = $request->input('siswa_ids');
        if (is_null($siswa_ids) || empty($siswa_ids)) {
            return redirect()->back()->with('error', 'Tidak ada siswa yang dipilih.');
        }

        foreach ($siswa_ids as $siswa_id) {
            $status = $request->input("kehadiran_${siswa_id}");
            $keterangan = $request->input("keterangan_${siswa_id}");

            Absensi::create([
                'tanggal_absensi' => $tanggalAbsensi,
                'guru_id' => $guruId,
                'siswa_id' => $siswa_id,
                'status' => $status,
                'keterangan' => $keterangan,
            ]);
        }

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
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
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        $absensi = Absensi::where('id', $id)->first();
        return view('back.absensi.edit', compact('kelas', 'siswa', 'guru', 'absensi'));
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
        // Validasi input (sesuaikan dengan kebutuhan Anda)
        $validatedData = $request->validate([
            'guru_id' => 'required|exists:guru,id',
            'siswa_id' => 'required|exists:siswa,id',
            'status' => 'required|in:Hadir,Alpa,Izin',
            'keterangan' => 'nullable|string|max:255',
        ]);
    
        // Ambil data Absensi yang akan diubah
        $absensi = Absensi::findOrFail($id);
    
        // Perbarui data berdasarkan input pengguna
        $absensi->guru_id = $request->input('guru_id');
        $absensi->siswa_id = $request->input('siswa_id');
        $absensi->status = $request->input('status');
        $absensi->keterangan = $request->input('keterangan', ''); // Default ke string kosong jika null
    
        // Simpan perubahan ke database
        $absensi->save();
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update
        $this->simpanLogHistori(
            'Update', 
            'Form Update Absensi', 
            $absensi->id, 
            $loggedInUserId, 
            json_encode($absensi), 
            json_encode($validatedData) // Data yang diperbarui
        );
    
        // Redirect dengan pesan sukses
        return redirect('/absensi')->with('message', 'Data absensi berhasil diperbarui.');
    }
    



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data dari tabel absensi_detail
        $Absensi = Absensi::findOrFail($id);

        // Mendapatkan ID pengguna yang sedang login

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus

        Absensi::destroy($id);
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Form Hapus Jadwal Pelajaran', $id, $loggedInUserId, json_encode($Absensi), null);

        return redirect('/absensi')->with('success', 'Data berhasil dihapus');
    }
}
