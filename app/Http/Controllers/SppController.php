<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Spp;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SppController extends Controller
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
        // $tahunAjaran = TahunAjaran::where('status', 'Aktif')->select('id', 'nama_tahun_ajaran')->get();
        $tahunAjaran = TahunAjaran::select('id', 'nama_tahun_ajaran')->get();
        $spp = Spp::select('id', 'tahun_ajaran_id', 'jumlah_spp','tanggal_jatuh_tempo')->get();
        return view('back.spp.index',compact('spp','tahunAjaran'));
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
            'tahun_ajaran_id' => 'required',
            'jumlah_spp' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            'keterangan' => 'required',
        ], [
            'tahun_ajaran_id.required' => 'Tahun Ajaran Wajib diisi',
            'jumlah_spp.required' => 'Jumlah SPP Wajib diisi',
            'tanggal_jatuh_tempo.required' => 'Tanggal Jatuh Tempo Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Menghapus koma pada jumlah_spp sebelum menyimpan
        $input = $request->all();
        if (isset($input['jumlah_spp'])) {
            $input['jumlah_spp'] = str_replace(',', '', $input['jumlah_spp']);
        }

        // Simpan data spp ke database menggunakan fill()
        $spp = new Spp();
        $spp->fill($input);
        $spp->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'spp', $spp->id, $loggedInUserId, null, json_encode($spp));


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
        $spp = Spp::findOrFail($id);
        return response()->json($spp);
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
         // Ambil data spp yang akan diperbarui
         $spp = Spp::findOrFail($id);
         $oldData = $spp->getOriginal();
     
         // Validasi request
         $validator = Validator::make($request->all(), [
             'tahun_ajaran_id' => 'required',
             'jumlah_spp' => 'required',
             'tanggal_jatuh_tempo' => 'required',
             'keterangan' => 'required',
         ], [
             'tahun_ajaran_id.required' => 'Tahun Ajaran Wajib diisi',
             'jumlah_spp.required' => 'Jumlah SPP Wajib diisi',
             'tanggal_jatuh_tempo.required' => 'Tanggal Jatuh Tempo Wajib diisi',
             'keterangan.required' => 'Keterangan Wajib diisi',
         ]);
     
         if ($validator->fails()) {
             return response()->json(['errors' => $validator->errors()], 422);
         }
     
         // Mengisi data kecuali jumlah_spp
         $spp->fill($request->except('jumlah_spp'));
     
         // Menghapus koma pada jumlah_spp sebelum menyimpan
         if ($request->has('jumlah_spp')) {
             $spp->jumlah_spp = str_replace(',', '', $request->input('jumlah_spp'));
         }
     
         // Simpan perubahan
         $spp->save();

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'spp', $spp->id, $loggedInUserId, json_encode($oldData), json_encode($spp));

     
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
        $spp = Spp::find($id);

        if (!$spp) {
            return response()->json(['message' => 'Data spp not found'], 404);
        }

        $spp->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'spp', $id, $loggedInUserId, json_encode($spp), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

}