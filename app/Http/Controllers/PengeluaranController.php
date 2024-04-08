<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
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
        $pengeluaran = Pengeluaran::orderBy('id', 'desc')->get();
        return view('back.pengeluaran.index',compact('pengeluaran'));
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
        $validator = Validator::make($request->all(), [
         'tanggal_pengeluaran' => 'required',
         'nama_pengeluaran' => 'required',
         'jumlah_pengeluaran' => 'required',
         'keterangan' => 'required',
         'pic' => 'required',
         'bukti' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
     ], [
         'tanggal_pengeluaran.required' => 'Tanggal Pengeluaran Wajib diisi',
         'nama_pengeluaran.required' => 'Nama Pengeluaran Wajib diisi',
         'jumlah_pengeluaran.required' => 'Jumlah Pengeluaran Wajib diisi',
         'keterangan.required' => 'Keterangan Wajib diisi',
         'pic.required' => 'PIC Wajib diisi',
         'bukti.required' => 'Bukti Pengeluaran Wajib diisi',
         'bukti.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
         'bukti.max' => 'Ukuran bukti tidak boleh lebih dari 2 MB',
     ]);
 
     if ($validator->fails()) {
         return response()->json(['errors' => $validator->errors()], 422);
     }
         $input = $request->except('jumlah_pengeluaran');
 
         if ($request->has('jumlah_pengeluaran')) {
             $input['jumlah_pengeluaran'] = str_replace(',', '', $request->input('jumlah_pengeluaran'));
         }
 
         if ($image = $request->file('bukti')) {
             $destinationPath = 'upload/pengeluaran/';
             
             // Mengambil nama_guru file asli
             $originalFileName = $image->getClientOriginalName();
         
             // Mendapatkan ekstensi file
             $extension = $image->getClientOriginalExtension();
         
             // Menggabungkan waktu dengan nama_guru file asli
             $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
         
             // Pindahkan file ke lokasi tujuan dengan nama_guru baru
             $image->move($destinationPath, $imageName);
         
             $input['bukti'] = $imageName;
         }
         $pengeluaran = Pengeluaran::create($input);

            // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'pengeluaran', $pengeluaran->id, $loggedInUserId, null, json_encode($pengeluaran));

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
        $pengeluaran = Pengeluaran::findOrFail($id);
        return response()->json($pengeluaran);
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
    $validatedData = $request->validate([
        'tanggal_pengeluaran' => 'required',
        'nama_pengeluaran' => 'required',
        'jumlah_pengeluaran' => 'required',
        'pic' => 'required',
        'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $pengeluaran = Pengeluaran::findOrFail($id);
    $oldData = $pengeluaran->getOriginal();

    

    // Menghapus bukti lama jika ada bukti baru yang diunggah
    if ($request->hasFile('bukti')) {
        $oldBuktiFileName = $pengeluaran->bukti; // Ini adalah nama file saja, bukan path lengkap

        // Mendapatkan path lengkap dari root folder ke file yang ingin dihapus
        $oldBuktiPath = public_path('upload/pengeluaran/' . $oldBuktiFileName);

        // Jika ada bukti lama, hapus dari penyimpanan
        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }


        // Upload bukti baru
        $file = $request->file('bukti');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = '' . $fileName;
        $file->move(public_path('upload/pengeluaran'), $fileName);
        $validatedData['bukti'] = $filePath;
    }

    // Ubah jumlah_pengeluaran tanpa karakter ,
    if ($request->has('jumlah_pengeluaran')) {
        $validatedData['jumlah_pengeluaran'] = str_replace(',', '', $request->input('jumlah_pengeluaran'));
    }


    $pengeluaran->update($validatedData);

    
             // Mendapatkan ID pengguna yang sedang login
             $loggedInUserId = Auth::id();
        
             // Simpan log histori untuk operasi Update dengan user_id yang sedang login
             $this->simpanLogHistori('Update', 'pengeluaran', $pengeluaran->id, $loggedInUserId, json_encode($oldData), json_encode($pengeluaran));
         

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
        $pengeluaran = Pengeluaran::find($id);
    
        if (!$pengeluaran) {
            return response()->json(['message' => 'Data pengeluaran not found'], 404);
        }
    
        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $pengeluaran->bukti; // Nama file saja
        $oldBuktiPath = public_path('upload/pengeluaran/' . $oldBuktiFileName);
    
        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }
    
        $pengeluaran->delete();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'pengeluaran', $id, $loggedInUserId, json_encode($pengeluaran), null);

    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    

}