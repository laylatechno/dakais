<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JadwalPelajaranDetail;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
 

class MemberController extends Controller
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
        $member = Member::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('back.member.index',compact('member','siswa','guru'));
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
            'nama_member' => 'required',
        ], [
            'nama_member.required' => 'Nama Member diisi',
        ]);
    
        // Simpan data member ke database
        $input = $request->all();
    
        $member = new Member();
        $member->fill($input);
        $member->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Member', $member->id, $loggedInUserId, null, json_encode($member));

    
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
        $member = Member::findOrFail($id);
        return response()->json($member);
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
        // Remove the comma from jumlah_tabungan if present
        $member = Member::findOrFail($id);
        $oldData = $member->getOriginal();
    
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_member' => 'required',
        ], [
            'nama_member.required' => 'Nama Ujian Wajib diisi',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    
        // Simpan perubahan pada instance yang sudah ada
        $member->update($request->all());
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'member', $member->id, $loggedInUserId, json_encode($oldData), json_encode($member));
    
        return response()->json(['message' => 'Data berhasil diupdate']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     // Cek apakah ID member ada dalam tabel jadwal_pelajaran_detail
    //     $isRelated = DB::table('jadwal_pelajaran_detail')->where('member_id', $id)->exists();
    
    //     if ($isRelated) {
    //         // Jika terkait, beri notifikasi bahwa data tidak dapat dihapus
    //         return response()->json(['error_terkait' => 'Data tidak dapat dihapus karena masih terkait dengan jadwal pelajaran.']);
    //     }
    
    //     $member = Member::findOrFail($id);
    //     $loggedInUserId = Auth::id();
    
    //     // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
    //     $this->simpanLogHistori('Delete', 'member', $id, $loggedInUserId, json_encode($member), null);
    
    //     $member->delete();
    
    //     return response()->json(['message' => 'Data berhasil dihapus']);
    // }

    public function destroy($id)
    {
        $member = Member::find($id);
    
        if (!$member) {
            return response()->json(['message' => 'Data member not found'], 404);
        }
    
       
    
        $member->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'member', $id, $loggedInUserId, json_encode($member), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    
    
    
}
