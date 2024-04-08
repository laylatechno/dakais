<?php

namespace App\Http\Controllers;

use App\Models\JenisUjian;
use App\Models\NilaiSiswaHead;
use App\Models\NilaiSiswaDetail;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\Mapel;
use App\Models\PenempatanKelasDetail;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\WaktuMengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiSiswaController extends Controller
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
        $nilai_siswa = NilaiSiswaHead::all();
        return view('back.nilai_siswa.index',compact('nilai_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->select('id', 'nama_tahun_ajaran')->get();
        $mataPelajaran = Mapel::select('id', 'nama_mapel')->get();
        $kelas = Kelas::select('id', 'nama_kelas')->get();
        $siswa = Siswa::select('id', 'nama_siswa')->get();
        $jenis_ujian = JenisUjian::all();
        return view('back.nilai_siswa.create',compact('tahunAjaran','siswa','jenis_ujian','mataPelajaran','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Memeriksa apakah kelas dan siswa sesuai
    $penempatan = PenempatanKelasDetail::where('kelas_id', $request->kelas_id)
                    ->where('siswa_id', $request->siswa_id)
                    ->first();

    // Jika penempatan tidak ditemukan, berikan pesan error
    if (!$penempatan) {
        return redirect('/nilai_siswa/create')
            ->with('error', 'Kelas dan siswa tidak sesuai dalam penempatan')
            ->withInput();
    }

    // Simpan data ke nilai_siswa_head
    $head = new NilaiSiswaHead();
    $head->tahun_ajaran_id = $request->tahun_ajaran_id;
    $head->kelas_id = $request->kelas_id;
    $head->siswa_id = $request->siswa_id;
    $head->mapel_id = $request->mapel_id;
    $head->total_nilai = $request->total_nilai;
    $head->keterangan = $request->keterangan;
    $head->save();

    // Ambil ID dari nilai_siswa_head yang baru saja disimpan
    $nilaiSiswaHeadId = $head->id;

    // Simpan data ke nilai_siswa_detail
    $jenisUjianIds = $request->jenis_ujian_id;
    $nilais = $request->nilai;

    foreach ($jenisUjianIds as $index => $jenisUjianId) {
        $detail = new NilaiSiswaDetail();
        $detail->nilai_siswa_head_id = $nilaiSiswaHeadId;
        $detail->jenis_ujian_id = $jenisUjianId;
        $detail->nilai = $nilais[$index];
        $detail->save();
    }

      // Mendapatkan ID pengguna yang sedang login
      $loggedInUserId = Auth::id();

      // Simpan log histori untuk operasi Create dengan user_id yang sedang login
      $this->simpanLogHistori('Create', 'nilai_siswa', $head->id, $loggedInUserId, null, json_encode($head));
  

    return redirect('/nilai_siswa')->with('message', 'Data berhasil ditambahkan');
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
   
    public function edit($id)
    {
            $nilaiSiswaHead = NilaiSiswaHead::findOrFail($id);
        
 
            $tahunAjaran = TahunAjaran::where('status', 'Aktif')->select('id', 'nama_tahun_ajaran')->get();
            $mataPelajaran = Mapel::all();
            $kelas = Kelas::all();
            $siswa = Siswa::all();
            $jenis_ujian = JenisUjian::all();
        
        return view('back.nilai_siswa.edit', compact('nilaiSiswaHead', 'tahunAjaran', 'siswa', 'jenis_ujian', 'mataPelajaran', 'kelas'));
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
    // Ambil data nilai_siswa_head yang akan diupdate
    $nilaiSiswaHead = NilaiSiswaHead::findOrFail($id);
    $oldData = $nilaiSiswaHead->getOriginal();

    // Update data pada nilai_siswa_head
    $nilaiSiswaHead->tahun_ajaran_id = $request->tahun_ajaran_id;
    $nilaiSiswaHead->kelas_id = $request->kelas_id;
    $nilaiSiswaHead->siswa_id = $request->siswa_id;
    $nilaiSiswaHead->mapel_id = $request->mapel_id;
    $nilaiSiswaHead->total_nilai = $request->total_nilai;
    $nilaiSiswaHead->keterangan = $request->keterangan;
    $nilaiSiswaHead->save();

    // Update data pada nilai_siswa_detail
    $jenisUjianIds = $request->jenis_ujian_id;
    $nilais = $request->nilai;

    foreach ($jenisUjianIds as $index => $jenisUjianId) {
        // Cari data detail berdasarkan head_id dan jenis_ujian_id
        $detail = NilaiSiswaDetail::where('nilai_siswa_head_id', $id)
                                    ->where('jenis_ujian_id', $jenisUjianId)
                                    ->first();

        // Jika data detail ditemukan, update nilai
        if ($detail) {
            $detail->nilai = $nilais[$index];
            $detail->save();
        }
    }

      // Mendapatkan ID pengguna yang sedang login
      $loggedInUserId = Auth::id();
        
      // Simpan log histori untuk operasi Update dengan user_id yang sedang login
      $this->simpanLogHistori('Update', 'nilai_siswa', $nilaiSiswaHead->id, $loggedInUserId, json_encode($oldData), json_encode($nilaiSiswaHead));
  

    return redirect('/nilai_siswa')->with('message', 'Data berhasil diupdate');
}

    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan data NilaiSiswaHead yang akan dihapus
        $nilaiSiswaHead = NilaiSiswaHead::findOrFail($id);
    
        // Temukan data NilaiSiswaDetail yang terkait dengan NilaiSiswaHead
        $nilaiSiswaDetails = NilaiSiswaDetail::where('nilai_siswa_head_id', $id)->get();
    
        // Hapus data pada NilaiSiswaDetail
        foreach ($nilaiSiswaDetails as $detail) {
            $detail->delete();
        }

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'nilai_siswa', $id, $loggedInUserId, json_encode($nilaiSiswaHead), null);

    
        // Hapus data pada NilaiSiswaHead
        $nilaiSiswaHead->delete();
    
        return redirect('/nilai_siswa')->with('messagehapus', 'Data berhasil dihapus');
    }
    
    
}
