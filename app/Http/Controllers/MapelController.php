<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\LogHistori;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
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
        $mapel = Mapel::all();
        return view('back.mapel.index',compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guruPengampu = Guru::select('id', 'nama_guru')->get();
        return view('back.mapel.create', compact('guruPengampu'));
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
            'nama_mapel'=>'required',
            'guru_pengampu'=>'required',
            'kkm'=>'required',
   
        ],[
            'nama_mapel.required'=>'Nama Wajib diisi',
            'guru_pengampu.required'=>'Wali Mapel Wajib diisi',
            'kkm.required'=>'KKM Wajib diisi',
             
        ]);
        $input = $request->all();

     
        $mapel = Mapel::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan mapel_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Mapel', $mapel->id, $loggedInUserId, null, json_encode($input));

        return redirect('/mapel')->with('message', 'Data berhasil ditambahkan');

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
        $data = Mapel::where('id', $id)->first();
        $guruPengampu = Guru::select('id', 'nama_guru')->get();
    
        return view('back.mapel.edit', compact('data', 'guruPengampu'));


        
        
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
            'nama_mapel' => 'required',
            'guru_pengampu' => 'required',
            'kkm' => 'required',
            
        ], [
            'nama_mapel.required' => 'Nama Wajib diisi',
            'guru_pengampu.required' => 'Wali Mapel Wajib diisi',
            'kkm.required' => 'KKM Wajib diisi',
            
        ]);
    
       
            $data =[
                'nama_mapel'=>$request->nama_mapel,
                'guru_pengampu'=>$request->guru_pengampu,
                'kkm'=>$request->kkm,
                 
                 
            ];
            $mapel = Mapel::findOrFail($id);

            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan log histori untuk operasi Update dengan mapel_id yang sedang login
            $this->simpanLogHistori('Update', 'Form Update Mapel', $mapel->id, $loggedInUserId, json_encode($mapel), json_encode($data));

            $mapel->update($data);
            return redirect('/mapel')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::find($id);
           // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
           if ($mapel) {
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($mapel);

            // Simpan log histori untuk operasi Delete dengan mapel_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'Form Hapus Mapel', $id, $loggedInUserId, $dataLama, null);
        }

        
        // Hapus data mapel dari database jika tidak terkait dengan jadwal pelajaran atau penempatan mapel
        $mapel->delete();
        return redirect('/mapel')->with('messagehapus', 'Berhasil menghapus data');
    }
}
