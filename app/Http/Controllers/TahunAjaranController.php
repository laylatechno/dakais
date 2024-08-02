<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\NilaiSiswaHead;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Fungsi untuk menyimpan log histori
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
        // $tahunajaran = TahunAjaran::all();
        $tahunajaran = TahunAjaran::select('id', 'nama_tahun_ajaran', 'status')->get();
        return view('back.tahunajaran.index', compact('tahunajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.tahunajaran.create');
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
            'nama_tahun_ajaran' => 'required',
            'status' => 'required',
        ], [
            'nama_tahun_ajaran.required' => 'Nama Wajib diisi',
            'status.required' => 'Status Wajib diisi',
        ]);
    
        // Cek apakah ada data dengan status 'Aktif'
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();
    
        if ($request->status == 'Aktif' && $activeTahunAjaran) {
            return redirect()->back()->withErrors(['message' => 'Hanya satu Tahun Ajaran yang dapat memiliki status Aktif.']);
        }
    
        $input = $request->all();
        $tahun_ajaran = TahunAjaran::create($input);
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tahun Ajaran', $tahun_ajaran->id, $loggedInUserId, null, json_encode($input));
        return redirect('/tahunajaran')->with('message', 'Data berhasil ditambahkan');
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
        $data = TahunAjaran::where('id', $id)->first();
        return view('back.tahunajaran.edit')->with('data', $data);
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
        $request->validate([
            'nama_tahun_ajaran' => 'required',
            'status' => 'required',
        ], [
            'nama_tahun_ajaran.required' => 'Nama Wajib diisi',
            'status.required' => 'Status Wajib diisi',
        ]);
    
        // Cek apakah ada data dengan status 'Aktif' selain yang sedang diupdate
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->where('id', '!=', $id)->first();
    
        if ($request->status == 'Aktif' && $activeTahunAjaran) {
            return redirect()->back()->with('message', 'Hanya satu Tahun Ajaran yang dapat memiliki status Aktif.');
        }
    
        $data = [
            'nama_tahun_ajaran' => $request->nama_tahun_ajaran,
            'status' => $request->status,
        ];
    
        // Update data tahun ajaran
        $tahun_ajaran = TahunAjaran::findOrFail($id);
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update
        $this->simpanLogHistori('Update', 'Form Tahun Ajaran', $tahun_ajaran->id, $loggedInUserId, json_encode($tahun_ajaran), json_encode($data));
    
        $tahun_ajaran->update($data);
    
        return redirect('/tahunajaran')->with('message', 'Data berhasil diperbarui');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Temukan data tahun_ajaran berdasarkan ID
    $tahun_ajaran = TahunAjaran::find($id);

    // Jika data tidak ditemukan, alihkan dengan pesan kesalahan
    if (!$tahun_ajaran) {
        return redirect('/tahunajaran')->with('messagehapus', 'Data Tahun Ajaran tidak ditemukan');
    }

    // Periksa apakah tahun_ajaran masih terkait dengan tabel nilai_siswa_head
    $related_nilai_siswa_head = NilaiSiswaHead::where('tahun_ajaran_id', $tahun_ajaran->id)->exists();

    // Jika ada keterkaitan, alihkan dengan pesan kesalahan
    if ($related_nilai_siswa_head) {
        return redirect('/tahunajaran')->with('messagehapus', 'Data Tahun Ajaran masih terkait dengan nilai siswa dan tidak bisa dihapus');
    }

    // Mendapatkan ID pengguna yang sedang login
    $loggedInUserId = Auth::id();

    // Simpan informasi data sebelum penghapusan untuk log histori
    $dataLama = json_encode($tahun_ajaran);
    $this->simpanLogHistori('Delete', 'Form Tahun Ajaran', $id, $loggedInUserId, $dataLama, null);

    // Hapus data setelah validasi selesai
    $tahun_ajaran->delete();

    // Redirect ke halaman tahun_ajaran dengan pesan sukses
    return redirect('/tahunajaran')->with('messagehapus', 'Berhasil menghapus data');
}

}
