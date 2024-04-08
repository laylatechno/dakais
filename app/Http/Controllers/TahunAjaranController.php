<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
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
            return redirect()->back()->with('message', 'Hanya satu Tahun Ajaran yang dapat memiliki status Aktif.');
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
            'status.required' => 'Urutan Wajib diisi',

        ]);

        // Cek apakah ada data dengan status 'Aktif'
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        if ($request->status == 'Aktif' && $activeTahunAjaran) {
            return redirect()->back()->with('message', 'Hanya satu Tahun Ajaran yang dapat memiliki status Aktif.');
        }

        $data = [
            'nama_tahun_ajaran' => $request->nama_tahun_ajaran,
            'status' => $request->status,


        ];



        // Membuat user baru dan mendapatkan data pengguna yang baru dibuat
        $tahun_ajaran = TahunAjaran::findOrFail($id);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan tahun_ajaran_id yang sedang login
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
        $tahun_ajaran = TahunAjaran::find($id);

        // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
        if ($tahun_ajaran) {
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($tahun_ajaran);

            // Simpan log histori untuk operasi Delete dengan tahun_ajaran_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'Form Tahun Ajaran', $id, $loggedInUserId, $dataLama, null);
        }

        // Hapus data
        TahunAjaran::destroy($id);
        return redirect('/tahunajaran')->with('messagehapus', 'Berhasil menghapus data');
    }
}
