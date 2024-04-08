<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RuanganController extends Controller
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
        $ruangan = Ruangan::all();
        return view('back.ruangan.index',compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.ruangan.create');
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
            'nama_ruangan' => 'required',
            'kode_ruangan' => 'required|unique:ruangan',
        ], [
            'nama_ruangan.required' => 'Nama Wajib diisi',
            'kode_ruangan.unique' => 'Kode Ruangan sudah ada',
            'kode_ruangan.required' => 'Kode Ruangan Wajib diisi',
        ]);
    
     
        $input = $request->all();
        $ruangan = Ruangan::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan ruangan_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Ruangan', $ruangan->id, $loggedInUserId, null, json_encode($input));

        return redirect('/ruangan')->with('message', 'Data berhasil ditambahkan');
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
        $data = Ruangan::where('id', $id)->first();
        return view('back.ruangan.edit')->with('data', $data);
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
            'nama_ruangan' => 'required',
            'kode_ruangan' => 'required',
             
        ], [
            'nama_ruangan.required' => 'Nama Wajib diisi',
            'kode_ruangan.required' => 'Urutan Wajib diisi',
            
        ]);

        
       
            $data =[
                'kode_ruangan'=>$request->kode_ruangan,
                'nama_ruangan'=>$request->nama_ruangan,
                 
                 
            ];
                // Membuat ruangan baru dan mendapatkan data pengguna yang baru dibuat
                $ruangan = Ruangan::findOrFail($id);

                // Mendapatkan ID pengguna yang sedang login
                $loggedInUserId = Auth::id();
    
                // Simpan log histori untuk operasi Update dengan ruangan_id yang sedang login
                $this->simpanLogHistori('Update', 'Form Update Ruangan', $ruangan->id, $loggedInUserId, json_encode($ruangan), json_encode($data));
    
                $ruangan->update($data);
            return redirect('/ruangan')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);
           // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
           if ($ruangan) {
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($ruangan);

            // Simpan log histori untuk operasi Delete dengan ruangan_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'Form Hapus Ruangan', $id, $loggedInUserId, $dataLama, null);
        }

        
        // Hapus data ruangan dari database jika tidak terkait dengan jadwal pelajaran atau penempatan ruangan
        $ruangan->delete();
        return redirect('/ruangan')->with('messagehapus', 'Berhasil menghapus data');
    }
}
