<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Siswa;
use App\Models\Tabungan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabunganController extends Controller
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
        $tabungan = Tabungan::orderBy('id', 'desc')->get();
        return view('back.tabungan.index',compact('tabungan','siswa'));
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
        $validator = Validator::make($request->all(), [
            'tanggal_tabungan' => 'required',
            'siswa_id' => 'required',
            'jumlah_tabungan' => 'required',
            'keterangan' => 'required',
            'pic' => 'required',
            'bukti' => 'mimes:jpg,jpeg,png,gif|max:2048',
        ], [
            'tanggal_tabungan.required' => 'Tanggal Tabungan Wajib diisi',
            'siswa_id.required' => 'Nama Siswa Wajib diisi',
            'jumlah_tabungan.required' => 'Jumlah Tabungan Wajib diisi',
            'keterangan.required' => 'Keterangan Wajib diisi',
            'pic.required' => 'PIC Wajib diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->except('jumlah_tabungan');

        if ($request->has('jumlah_tabungan')) {
            $input['jumlah_tabungan'] = str_replace(',', '', $request->input('jumlah_tabungan'));
        }

        // Simpan data ke tabel Tabungan
        $tabungan = Tabungan::create($input);

        // Update nilai jumlah_tabungan pada tabel Siswa
        $siswa = Siswa::findOrFail($tabungan->siswa_id); // Temukan siswa berdasarkan siswa_id di Tabungan
        $siswa->jumlah_tabungan += $tabungan->jumlah_tabungan; // Tambahkan jumlah_tabungan baru ke jumlah_tabungan yang sudah ada
        $siswa->save();

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'tabungan', $tabungan->id, $loggedInUserId, null, json_encode($tabungan));
    

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
        $tabungan = Tabungan::findOrFail($id);
        return response()->json($tabungan);
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
            $tabungan = Tabungan::findOrFail($id);
            $oldData = $tabungan->getOriginal();
            
            $input = $request->except('jumlah_tabungan');

            if ($request->has('jumlah_tabungan')) {
                $input['jumlah_tabungan'] = str_replace(',', '', $request->input('jumlah_tabungan'));
            }

            $validatedData = $request->validate([
                'tanggal_tabungan' => 'required',
                'siswa_id' => 'required',
                'jumlah_tabungan' => 'required',
                'keterangan' => 'required',
                'pic' => 'required',
            ]);

            

            $tabungan->update($input);


           
    
            // Menyimpan data lama sebelum perubahan
           

             // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();
        
            // Simpan log histori untuk operasi Update dengan user_id yang sedang login
            $this->simpanLogHistori('Update', 'tabungan', $tabungan->id, $loggedInUserId, json_encode($oldData), json_encode($tabungan));
        

            return response()->json(['message' => 'Data Berhasil Diupdate']);
        }

     
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
            public function destroy($id)
        {
            $tabungan = Tabungan::find($id);
            
            if (!$tabungan) {
                return response()->json(['message' => 'Data tabungan not found'], 404);
            }

            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($tabungan);

            // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'tabungan', $id, $loggedInUserId, $dataLama, null);

            // Mengambil siswa yang terkait dengan tabungan
            $siswa = $tabungan->siswa;

            if ($siswa) {
                // Mengurangi jumlah_tabungan pada tabel siswa sesuai dengan nilai jumlah_tabungan pada data tabungan yang akan dihapus
                $siswa->jumlah_tabungan -= $tabungan->jumlah_tabungan;
                $siswa->save();
            }

            $tabungan->delete();

            return response()->json(['message' => 'Data Berhasil Dihapus']);
        }

    

}