<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\PenempatanKelasHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
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
        $kelas = Kelas::orderBy('urutan')->get();
        return view('back.kelas.index', compact('kelas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $waliKelas = Guru::select('id', 'nama_guru')->get();
        return view('back.kelas.create', compact('waliKelas'));
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
            'nama_kelas'=>'required',
            'wali_kelas'=>'required',
            'urutan'=>'required',
   
        ],[
            'nama_kelas.required'=>'Nama Wajib diisi',
            'wali_kelas.required'=>'Wali Kelas Wajib diisi',
            'urutan.required'=>'Urutan Wajib diisi',
             
        ]);
        $input = $request->all();

     
        $kelas = Kelas::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan kelas_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Kelas', $kelas->id, $loggedInUserId, null, json_encode($input));

        return redirect('/kelas')->with('message', 'Data berhasil ditambahkan');

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
        $data = Kelas::where('id', $id)->first();
        $waliKelas = Guru::select('id', 'nama_guru')->get();
    
        return view('back.kelas.edit', compact('data', 'waliKelas'));


        
        
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
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
            'urutan' => 'required',
            
        ], [
            'nama_kelas.required' => 'Nama Wajib diisi',
            'wali_kelas.required' => 'Keterangan Wajib diisi',
            'urutan.required' => 'Urutan Wajib diisi',
            
        ]);
    
       
            $data =[
                'nama_kelas'=>$request->nama_kelas,
                'wali_kelas'=>$request->wali_kelas,
                'urutan'=>$request->urutan,
                 
                 
            ];
               // Membuat kelas baru dan mendapatkan data pengguna yang baru dibuat
            $kelas = Kelas::findOrFail($id);

            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan log histori untuk operasi Update dengan kelas_id yang sedang login
            $this->simpanLogHistori('Update', 'Form Update Kelas', $kelas->id, $loggedInUserId, json_encode($kelas), json_encode($data));

            $kelas->update($data);
            return redirect('/kelas')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
    
        if ($kelas) {
            // Periksa apakah kelas masih terkait dengan tabel jadwal_pelajaran
            $jadwalPelajaran = JadwalPelajaran::where('kelas_id', $id)->first();
    
            // Periksa apakah kelas masih terkait dengan tabel penempatan_kelas_head
            $penempatanKelasHead = PenempatanKelasHead::where('kelas_id', $id)->first();
    
            if ($jadwalPelajaran) {
                return redirect('/kelas')->with('messagehapus', 'Data tidak dapat dihapus karena masih terkait dengan tabel jadwal pelajaran');
            }
    
            if ($penempatanKelasHead) {
                return redirect('/kelas')->with('messagehapus', 'Data tidak dapat dihapus karena masih terkait dengan tabel penempatan kelas');
            }
            
              // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
            if ($kelas) {
                // Mendapatkan ID pengguna yang sedang login
                $loggedInUserId = Auth::id();

                // Simpan informasi data yang akan dihapus di kolom Data_Lama
                $dataLama = json_encode($kelas);

                // Simpan log histori untuk operasi Delete dengan kelas_id yang sedang login dan informasi data yang dihapus
                $this->simpanLogHistori('Delete', 'Form Hapus Kelas', $id, $loggedInUserId, $dataLama, null);
            }

            
            // Hapus data kelas dari database jika tidak terkait dengan jadwal pelajaran atau penempatan kelas
            $kelas->delete();
            return redirect('/kelas')->with('messagehapus', 'Berhasil menghapus data');
        } else {
            return redirect('/kelas')->with('messagehapus', 'Data tidak ditemukan');
        }
    }
    
    
}
