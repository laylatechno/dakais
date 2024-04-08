<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
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
        $jurusan = Jurusan::all();
        return view('back.jurusan.index',compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.jurusan.create');
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
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required|unique:jurusan',
        ], [
            'nama_jurusan.required' => 'Nama Wajib diisi',
            'kode_jurusan.unique' => 'Kode Jurusan sudah ada',
            'kode_jurusan.required' => 'Kode Jurusan Wajib diisi',
        ]);
    
     
        $input = $request->all();
        $jurusan = Jurusan::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan jurusan_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Jurusan', $jurusan->id, $loggedInUserId, null, json_encode($input));

        return redirect('/jurusan')->with('message', 'Data berhasil ditambahkan');
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
        $data = Jurusan::where('id', $id)->first();
        return view('back.jurusan.edit')->with('data', $data);
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
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
             
        ], [
            'nama_jurusan.required' => 'Nama Wajib diisi',
            'kode_jurusan.required' => 'Urutan Wajib diisi',
            
        ]);

        
       
            $data =[
                'kode_jurusan'=>$request->kode_jurusan,
                'nama_jurusan'=>$request->nama_jurusan,
                 
                 
            ];
                // Membuat jurusan baru dan mendapatkan data pengguna yang baru dibuat
                $jurusan = Jurusan::findOrFail($id);

                // Mendapatkan ID pengguna yang sedang login
                $loggedInUserId = Auth::id();
    
                // Simpan log histori untuk operasi Update dengan jurusan_id yang sedang login
                $this->simpanLogHistori('Update', 'Form Update Jurusan', $jurusan->id, $loggedInUserId, json_encode($jurusan), json_encode($data));
    
                $jurusan->update($data);
            return redirect('/jurusan')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        if ($jurusan) {
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($jurusan);

            // Simpan log histori untuk operasi Delete dengan jurusan_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'Form Hapus Jurusan', $id, $loggedInUserId, $dataLama, null);
        }

        
        // Hapus data jurusan dari database jika tidak terkait dengan jadwal pelajaran atau penempatan jurusan
        $jurusan->delete();
        return redirect('/jurusan')->with('messagehapus', 'Berhasil menghapus data');
    }
}
