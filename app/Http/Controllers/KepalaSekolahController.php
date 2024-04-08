<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepalaSekolahController extends Controller
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
        $kepala_sekolah = KepalaSekolah::all();
        return view('back.kepala_sekolah.index',compact('kepala_sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kepala_sekolah.create');
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
            'nip'=>'required',
            'nama_kepala_sekolah'=>'required',
            'tanggal_mulai'=>'required',
            'tanggal_akhir'=>'required',
            'status'=>'required',
   
        ],[
            'nip.required'=>'NIP Wajib diisi',
            'nama_kepala_sekolah.required'=>'Nama Kepala Sekolah Wajib diisi',
            'tanggal_mulai.required'=>'Tahun Mulai Wajib diisi',
            'tanggal_akhir.required'=>'Tahun Akhir Wajib diisi',
            'status.required'=>'Status Wajib diisi',
             
        ]);
        
        // Cek apakah ada data dengan status 'Aktif'
        $activeKepalaSekolah = KepalaSekolah::where('status', 'Aktif')->first();
    
        if ($request->status == 'Aktif' && $activeKepalaSekolah) {
            return redirect()->back()->with('message', 'Hanya satu Kepala Sekolah yang dapat memiliki status Aktif.');
        }
        $input = $request->all();

     
        $kepala_sekolah = KepalaSekolah::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan kepal$kepala_sekolah_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Kepala Sekolah', $kepala_sekolah->id, $loggedInUserId, null, json_encode($input));

        return redirect('/kepala_sekolah')->with('message', 'Data berhasil ditambahkan');

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
        $data = KepalaSekolah::where('id', $id)->first();
        return view('back.kepala_sekolah.edit')->with('data', $data);
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
            'nip'=>'required',
            'nama_kepala_sekolah'=>'required',
            'tanggal_mulai'=>'required',
            'tanggal_akhir'=>'required',
            'status'=>'required',
   
        ],[
            'nip.required'=>'NIP Wajib diisi',
            'nama_kepala_sekolah.required'=>'Nama Kepala Sekolah Wajib diisi',
            'tanggal_mulai.required'=>'Tahun Mulai diisi',
            'tanggal_akhir.required'=>'Tahun Akhir Wajib diisi',
            'status.required'=>'Status Wajib diisi',
             
        ]);
         // Cek apakah ada data dengan status 'Aktif'
         $activeKepalaSekolah = KepalaSekolah::where('status', 'Aktif')->first();
    
         if ($request->status == 'Aktif' && $activeKepalaSekolah) {
             return redirect()->back()->with('message', 'Hanya satu Kepala Sekolah yang dapat memiliki status Aktif.');
         }
    
       
            $data =[
                'nip'=>$request->nip,
                'nama_kepala_sekolah'=>$request->nama_kepala_sekolah,
                'tanggal_mulai'=>$request->tanggal_mulai,
                'tanggal_akhir'=>$request->tanggal_akhir,
                'status'=>$request->status,
                 
                 
            ];
                 // Membuat kepala_sekolah baru dan mendapatkan data pengguna yang baru dibuat
                 $kepala_sekolah = KepalaSekolah::findOrFail($id);

                 // Mendapatkan ID pengguna yang sedang login
                 $loggedInUserId = Auth::id();
     
                 // Simpan log histori untuk operasi Update dengan kepala_sekolah_id yang sedang login
                 $this->simpanLogHistori('Update', 'Form Update Kepala Sekolah', $kepala_sekolah->id, $loggedInUserId, json_encode($kepala_sekolah), json_encode($data));
     
                 $kepala_sekolah->update($data);
            return redirect('/kepala_sekolah')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepala_sekolah = KepalaSekolah::find($id);
           // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
           if ($kepala_sekolah) {
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($kepala_sekolah);

            // Simpan log histori untuk operasi Delete dengan kepal$kepala_sekolah_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'Form Hapus Kepala Sekolah', $id, $loggedInUserId, $dataLama, null);
        }

        
        // Hapus data kepal$kepala_sekolah dari database jika tidak terkait dengan jadwal pelajaran atau penempatan kepal$kepala_sekolah
        $kepala_sekolah->delete();
        return redirect('/kepala_sekolah')->with('messagehapus', 'Berhasil menghapus data');
    }
}
