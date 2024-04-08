<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JadwalPelajaranDetail;
use App\Models\TopUpMember;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;
use App\Models\Member;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class TopUpMemberController extends Controller
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
        $siswa = Siswa::all();
        $member = Member::all();
        $top_up_member = TopUpMember::all();
        $guru = Guru::all();
        return view('back.top_up_member.index', compact('top_up_member', 'member', 'siswa', 'guru'));
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
        $request->validate([
            'member_id' => 'required',
            'jumlah_top_up' => 'required|numeric', // Tambahkan validasi untuk jumlah_top_up
        ], [
            'member_id.required' => 'Nama Member diisi',
            'jumlah_top_up.required' => 'Jumlah Top Up diisi',
            'jumlah_top_up.numeric' => 'Jumlah Top Up harus berupa angka',
        ]);

        // Ambil data member berdasarkan member_id
        $member = Member::findOrFail($request->member_id);

        // Hilangkan karakter titik dan koma dari jumlah_top_up
        $jumlahTopUp = str_replace(['.', ','], '', $request->jumlah_top_up);

        // Tambahkan jumlah_top_up ke saldo member
        $member->saldo += $jumlahTopUp;

        // Simpan perubahan saldo member ke database
        $member->save();

        // Simpan data top up member ke database
        $top_up_member = new TopUpMember();
        $top_up_member->fill($request->all());

        // Set kolom 'pic' dengan user yang sedang login
        $top_up_member->pic = Auth::user()->name;

        // Hilangkan karakter titik dan koma dari jumlah_sebelum_top_up, jumlah_top_up, dan jumlah_sesudah_top_up
        $top_up_member->jumlah_sebelum_top_up = str_replace(['.', ','], '', $top_up_member->jumlah_sebelum_top_up);
        $top_up_member->jumlah_top_up = $jumlahTopUp;
        $top_up_member->jumlah_sesudah_top_up = str_replace(['.', ','], '', $top_up_member->jumlah_sesudah_top_up);

        $top_up_member->save();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Create', 'TopUpMember', $top_up_member->id, $loggedInUserId, null, json_encode($top_up_member));

        return response()->json(['message' => 'Data member berhasil disimpan']);
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        // Temukan data top up member yang akan dihapus
        $top_up_member = TopUpMember::find($id);

        // Periksa apakah data top up member ditemukan
        if (!$top_up_member) {
            return response()->json(['message' => 'Data top up member not found'], 404);
        }

        // Ambil nilai jumlah_top_up dari data top up member yang akan dihapus
        $jumlahTopUp = $top_up_member->jumlah_top_up;

        // Ambil data member terkait
        $member = Member::find($top_up_member->member_id);

        // Periksa apakah data member ditemukan
        if (!$member) {
            return response()->json(['message' => 'Data member not found'], 404);
        }

        // Kurangi saldo member dengan nilai jumlah_top_up
        $member->saldo -= $jumlahTopUp;

        // Simpan perubahan saldo member ke database
        $member->save();

        // Hapus data top up member
        $top_up_member->delete();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'TopUpMember', $id, $loggedInUserId, json_encode($top_up_member), null);

        return response()->json(['message' => 'Data top up member berhasil dihapus']);
    }
}
