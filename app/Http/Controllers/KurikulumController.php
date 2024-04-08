<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurikulumController extends Controller
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
        $kurikulum = Kurikulum::all();
        return view('back.kurikulum.index',compact('kurikulum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.kurikulum.create');
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
            'nama_kurikulum' => 'required|unique:kurikulum',
            'status' => 'required',
        ], [
            'nama_kurikulum.required' => 'Nama Wajib diisi',
            'nama_kurikulum.unique' => 'Nama Kurikulum sudah ada',
            'status.required' => 'Status Wajib diisi',
        ]);
    
        // Cek apakah ada data dengan status 'Aktif'
        $activeKurikulum = Kurikulum::where('status', 'Aktif')->first();
    
        if ($request->status == 'Aktif' && $activeKurikulum) {
            return redirect()->back()->with('message', 'Hanya satu Tahun Ajaran yang dapat memiliki status Aktif.');
        }
    
        $input = $request->all();
        $kurikulum = Kurikulum::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan kurikulum_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Kurikulum', $kurikulum->id, $loggedInUserId, null, json_encode($input));

        return redirect('/kurikulum')->with('message', 'Data berhasil ditambahkan');
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
        $data = Kurikulum::where('id', $id)->first();
        return view('back.kurikulum.edit')->with('data', $data);
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
            'nama_kurikulum' => 'required',
            'status' => 'required',
             
        ], [
            'nama_kurikulum.required' => 'Nama Wajib diisi',
            'status.required' => 'Urutan Wajib diisi',
            
        ]);

         // Cek apakah ada data dengan status 'Aktif'
         $activeKurikulum = Kurikulum::where('status', 'Aktif')->first();
    
         if ($request->status == 'Aktif' && $activeKurikulum) {
             return redirect()->back()->with('message', 'Hanya satu Tahun Ajaran yang dapat memiliki status Aktif.');
         }
    
       
            $data =[
                'nama_kurikulum'=>$request->nama_kurikulum,
                'status'=>$request->status,
                 
                 
            ];
                 // Membuat kurikulum baru dan mendapatkan data pengguna yang baru dibuat
                 $kurikulum = Kurikulum::findOrFail($id);

                 // Mendapatkan ID pengguna yang sedang login
                 $loggedInUserId = Auth::id();
     
                 // Simpan log histori untuk operasi Update dengan kurikulum_id yang sedang login
                 $this->simpanLogHistori('Update', 'Form Update Kurikulum', $kurikulum->id, $loggedInUserId, json_encode($kurikulum), json_encode($data));
     
                 $kurikulum->update($data);
            return redirect('/kurikulum')->with('message', 'Data berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kurikulum = Kurikulum::find($id);
              // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
              if ($kurikulum) {
                // Mendapatkan ID pengguna yang sedang login
                $loggedInUserId = Auth::id();

                // Simpan informasi data yang akan dihapus di kolom Data_Lama
                $dataLama = json_encode($kurikulum);

                // Simpan log histori untuk operasi Delete dengan kurikulum_id yang sedang login dan informasi data yang dihapus
                $this->simpanLogHistori('Delete', 'Form Hapus Kurikulum', $id, $loggedInUserId, $dataLama, null);
            }

            
            // Hapus data kurikulum dari database jika tidak terkait dengan jadwal pelajaran atau penempatan kurikulum
            $kurikulum->delete();
        return redirect('/kurikulum')->with('messagehapus', 'Berhasil menghapus data');
    }
}
