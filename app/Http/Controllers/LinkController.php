<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Link;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
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

        $link = Link::all();
        return view('back.link.index', compact('link'));
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
            'nama_link' => 'required',
            'link' => 'required',
            'urutan' => 'required',
        ], [
            'nama_link.required' => 'Nama Link Wajib diisi',
            'link.required' => 'Link Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Menghapus koma pada jumlah_link sebelum menyimpan
        $input = $request->all();


        // Simpan data link ke database menggunakan fill()
        $link = new Link();
        $link->fill($input);
        $link->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'link', $link->id, $loggedInUserId, null, json_encode($link));


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
        $link = Link::findOrFail($id);
        return response()->json($link);
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
        // Ambil data link yang akan diperbarui
        $link = Link::findOrFail($id);
        $oldData = $link->getOriginal();

        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_link' => 'required',
            'link' => 'required',
            'urutan' => 'required',
        ], [
            'nama_link.required' => 'Nama Link Wajib diisi',
            'link.required' => 'Link Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }



        // Pastikan data baru disetel pada model
        $link->nama_link = $request->nama_link;
        $link->link = $request->link;
        $link->urutan = $request->urutan;

        // Simpan perubahan ke basis data
        $link->save();


        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'link', $link->id, $loggedInUserId, json_encode($oldData), json_encode($link));


        return response()->json(['message' => 'Data Berhasil Diperbaharui']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);

        if (!$link) {
            return response()->json(['message' => 'Data link not found'], 404);
        }

        $link->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'link', $id, $loggedInUserId, json_encode($link), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
}
