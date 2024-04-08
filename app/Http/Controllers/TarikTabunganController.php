<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Siswa;
use App\Models\TarikTabungan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarikTabunganController extends Controller
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
        $tarik_tabungan = TarikTabungan::orderBy('id', 'desc')->get();
        return view('back.tarik_tabungan.index',compact('tarik_tabungan','siswa'));
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
        'tanggal_tarik' => 'required',
        'siswa_id' => 'required',
        'jumlah_tarik' => 'required',
        'keterangan' => 'required',
        'pic' => 'required',
        'bukti' => 'mimes:jpg,jpeg,png,gif|max:2048',
    ], [
        'tanggal_tarik.required' => 'Tanggal Tarik Tabungan Wajib diisi',
        'siswa_id.required' => 'Nama Siswa Wajib diisi',
        'jumlah_tarik.required' => 'Jumlah Tarik Tabungan Wajib diisi',
        'keterangan.required' => 'Keterangan Wajib diisi',
        'pic.required' => 'PIC Wajib diisi',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $input = $request->except('jumlah_tarik');

    if ($request->has('jumlah_tarik')) {
        $input['jumlah_tarik'] = str_replace(',', '', $request->input('jumlah_tarik'));
    }

    // Update nilai jumlah_tarik pada tabel Siswa
    $siswa = Siswa::findOrFail($input['siswa_id']);

    // Check if the withdrawal amount exceeds the available balance
    if ($siswa->jumlah_tabungan < $input['jumlah_tarik']) {
        return response()->json(['error' => 'Tabungan tidak mencukupi untuk ditarik'], 422);
    }

    // Simpan data ke tabel TarikTabungan
    $tarik_tabungan = TarikTabungan::create($input);

    // Update nilai jumlah_tabungan pada tabel Siswa
    $siswa->jumlah_tabungan -= $tarik_tabungan->jumlah_tarik;
    $siswa->save();

    // Mendapatkan ID pengguna yang sedang login
    $loggedInUserId = Auth::id();

    // Simpan log histori untuk operasi Create dengan user_id yang sedang login
    $this->simpanLogHistori('Create', 'tarik_tabungan', $tarik_tabungan->id, $loggedInUserId, null, json_encode($tarik_tabungan));

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
        $tarik_tabungan = TarikTabungan::findOrFail($id);
        return response()->json($tarik_tabungan);
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
            // Remove the comma from jumlah_tarik if present
            $tarik_tabungan = TarikTabungan::findOrFail($id);
            $oldData = $tarik_tabungan->getOriginal();
            
            $input = $request->except('jumlah_tarik');

            if ($request->has('jumlah_tarik')) {
                $input['jumlah_tarik'] = str_replace(',', '', $request->input('jumlah_tarik'));
            }

            $validatedData = $request->validate([
                'tanggal_tarik' => 'required',
                'siswa_id' => 'required',
                'jumlah_tarik' => 'required',
                'keterangan' => 'required',
                'pic' => 'required',
            ]);

            

            $tarik_tabungan->update($input);


           
    
            // Menyimpan data lama sebelum perubahan
           

             // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();
        
            // Simpan log histori untuk operasi Update dengan user_id yang sedang login
            $this->simpanLogHistori('Update', 'tarik_tabungan', $tarik_tabungan->id, $loggedInUserId, json_encode($oldData), json_encode($tarik_tabungan));
        

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
            $tarik_tabungan = TarikTabungan::find($id);
            
            if (!$tarik_tabungan) {
                return response()->json(['message' => 'Data tarik_tabungan not found'], 404);
            }

            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($tarik_tabungan);

            // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'tarik_tabungan', $id, $loggedInUserId, $dataLama, null);

            // Mengambil siswa yang terkait dengan tarik_tabungan
            $siswa = $tarik_tabungan->siswa;

            if ($siswa) {
                // Mengurangi jumlah_tarik pada tabel siswa sesuai dengan nilai jumlah_tarik pada data tarik_tabungan yang akan dihapus
                $siswa->jumlah_tabungan += $tarik_tabungan->jumlah_tarik;
                $siswa->save();
            }

            $tarik_tabungan->delete();

            return response()->json(['message' => 'Data Berhasil Dihapus']);
        }

    

}