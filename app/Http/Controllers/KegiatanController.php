<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;
use App\Models\MutasiKegiatan;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\LogHistori;
use Illuminate\Support\Facades\Auth;


class KegiatanController extends Controller
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

        $kegiatan = Kegiatan::orderBy('id', 'desc')->get();
        return view('back.kegiatan.index', compact('kegiatan'));
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required',
            'jam' => 'required',
            'tempat' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'map' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:4048',

        ], [
            'nama_kegiatan.required' => 'Nama Kegiatan wajib diisi',
            'jam.required' => 'Jam wajib diisi',
            'tempat.required' => 'Tempat wajib diisi',
            'tanggal_kegiatan.required' => 'Tanggal Kegiatan wajib diisi',
            'tanggal_kegiatan.date' => 'Format tanggal tidak valid',
            'map.required' => 'Map wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.mimes' => 'Gambar yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 4 MB',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/kegiatan/';

            // Mengambil nama_galeri file asli
            $originalFileName = $image->getClientOriginalName();

            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();

            // Menggabungkan waktu dengan nama_galeri file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;

            // Pindahkan file ke lokasi tujuan dengan nama_galeri baru
            $image->move($destinationPath, $imageName);

            $input['gambar'] = $imageName;
        }
        $kegiatan = Kegiatan::create($input);
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'kegiatan', $kegiatan->id, $loggedInUserId, null, json_encode($kegiatan));
        return response()->json(['message' => 'Data Berhasil Disimpan']);
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
        $kegiatan = Kegiatan::findOrFail($id);

        return response()->json($kegiatan);
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required',
            'jam' => 'required',
            'tempat' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'map' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:4048',

        ], [
            'nama_kegiatan.required' => 'Nama Kegiatan wajib diisi',
            'jam.required' => 'Jam wajib diisi',
            'tempat.required' => 'Tempat wajib diisi',
            'tanggal_kegiatan.required' => 'Tanggal Kegiatan wajib diisi',
            'tanggal_kegiatan.date' => 'Format tanggal tidak valid',
            'map.required' => 'Map wajib diisi',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.mimes' => 'Gambar yang dikeluarkan hanya diperbolehkan berekstensi PDF, WORD, JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 4 MB',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $oldData = $kegiatan->getOriginal();


        $input = $request->all();
        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $oldgambarFileName = $kegiatan->gambar;
            $destinationPath = 'upload/kegiatan/';

            // Hapus gambar lama jika ada sebelum mengganti dengan yang baru
            if ($oldgambarFileName && file_exists(public_path($destinationPath . $oldgambarFileName))) {
                unlink(public_path($destinationPath . $oldgambarFileName));
            }

            $image = $request->file('gambar');
            $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            $input['gambar'] = $imageName;
        }

        // Update data barang
        $kegiatan->update($input);
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'kegiatan', $kegiatan->id, $loggedInUserId, json_encode($oldData), json_encode($kegiatan));



        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json(['message' => 'Data kegiatan not found'], 404);
        }



        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldgambarFileName = $kegiatan->gambar; // Nama file saja
        $oldgambarPath = public_path('upload/kegiatan/' . $oldgambarFileName);

        if ($oldgambarFileName && file_exists($oldgambarPath)) {
            unlink($oldgambarPath);
        }

        $kegiatan->delete();
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kegiatan', $id, $loggedInUserId, json_encode($kegiatan), null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
