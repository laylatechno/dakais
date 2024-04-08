<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\MutasiBarang;
use App\Models\KategoriMutasiBarang;
use App\Models\Kelas;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;



class MutasiBarangController extends Controller
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
        $ruangan = Ruangan::select('id', 'nama_ruangan')->get();
        $kategori_barang = KategoriBarang::select('id', 'nama_kategori_barang')->get();
        $barang = Barang::orderBy('id', 'desc')->get();
        $mutasi_barang = MutasiBarang::orderBy('id', 'desc')->get();
        return view('back.mutasi_barang.index',compact('mutasi_barang','ruangan','kategori_barang','barang'));
    }

    public function ambilRuangan($barangId)
    {
        $barang = Barang::find($barangId);
        
        if (!$barang) {
            return response()->json(['error' => 'Barang not found'], 404);
        }
        
        $ruanganId = $barang->ruangan_id;
        $ruangan = Ruangan::find($ruanganId);
        
        if (!$ruangan) {
            return response()->json(['error' => 'Ruangan not found'], 404);
        }
        
        $namaRuangan = $ruangan->nama_ruangan;
    
        // Mendapatkan informasi kondisi barang
        $kondisiBaik = $barang->kondisi_baik;
        $kondisiSedang = $barang->kondisi_sedang;
        $kondisiRusak = $barang->kondisi_rusak;
    
        return response()->json([
            'ruangan_id' => $ruanganId,
            'nama_ruangan' => $namaRuangan,
            'kondisi_baik' => $kondisiBaik,
            'kondisi_sedang' => $kondisiSedang,
            'kondisi_rusak' => $kondisiRusak
        ]);
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
                    'jenis_mutasi' => 'required',
                    'kode_mutasi' => 'required|unique:mutasi_barang,kode_mutasi', 
                    'barang_id' => 'required',
                    'tanggal_mutasi' => 'required|date',
                     
                    'qty' => 'required|numeric|min:0',
                    'ruangan_id_asal' => 'required',
                    'ruangan_id_tujuan' => 'required',
                    'kondisi_barang' => 'required',
                 
                    'pic' => 'required',
                    'bukti' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
                ], [
                    'jenis_mutasi.required' => 'Jenis Mutasi wajib diisi',
                    'kode_mutasi.required' => 'Kode Mutasi Barang wajib diisi',
                    'kode_mutasi_barang.unique' => 'Kode Mutasi Barang sudah ada dalam database',
                    'barang_id.required' => 'Nama Barang wajib diisi',
                    'kondisi_barang.required' => 'Kondisi Barang wajib diisi',
                
                    'tanggal_mutasi.required' => 'Tanggal Mutasi Barang wajib diisi',
                    'tanggal_mutasi.date' => 'Format tanggal tidak valid',
                    
                    'qty.required' => 'QTY wajib diisi',
                    'qty.numeric' => 'QTY harus berupa angka',
                    'qty.min' => 'QTY tidak boleh kurang dari 0',
                    'ruangan_id_asal.required' => 'Ruangan Asal wajib diisi',
                    'ruangan_id_tujuan.required' => 'Ruangan Tujuan wajib diisi',
                    'pic.required' => 'PIC wajib diisi',
                    'bukti.required' => 'Bukti Mutasi Barang wajib diisi',
                    'bukti.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
                    'bukti.max' => 'Ukuran bukti tidak boleh lebih dari 2 MB',
                ]);
        
                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }

                // Simpan data MutasiBarang
                $input = $request->except('ruangan_id_asal_hidden', 'kondisi_baik_hidden', 'kondisi_sedang_hidden', 'kondisi_rusak_hidden', '_token'); // Hapus input yang tidak perlu disimpan

                if ($image = $request->file('bukti')) {
                    $destinationPath = 'upload/mutasi_barang/';
                    $originalFileName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
                    $image->move($destinationPath, $imageName);
                    $input['bukti'] = $imageName;
                }

               // Gunakan nilai ruangan_id_asal_hidden untuk ruangan_id_asal
                    $input['ruangan_id_asal'] = $request->ruangan_id_asal_hidden;

                    $mutasiBarang = MutasiBarang::create($input);

                    // Mengambil barang terkait
                    $barang = Barang::find($request->barang_id);

         

                    if ($barang) {
                        // Update ruangan_id pada tabel barang sesuai dengan ruangan_id_asal_hidden
                        $barang->ruangan_id = $request->ruangan_id_tujuan;
                    
                        // Logika untuk menambah atau mengurangi kondisi barang berdasarkan jenis mutasi
                        if ($request->jenis_mutasi == 'Masuk') {
                            // Jika jenis_mutasi adalah 'Masuk', maka menambah kondisi sesuai dengan pilihan kondisi_barang
                            if ($request->kondisi_barang == 'Baik') {
                                $barang->kondisi_baik += $request->qty; // Menambah kondisi_baik
                            } elseif ($request->kondisi_barang == 'Sedang') {
                                $barang->kondisi_sedang += $request->qty; // Menambah kondisi_sedang
                            } elseif ($request->kondisi_barang == 'Rusak') {
                                $barang->kondisi_rusak += $request->qty; // Menambah kondisi_rusak
                            }
                        } elseif ($request->jenis_mutasi == 'Keluar') {
                            // Jika jenis_mutasi adalah 'Keluar', maka mengurangi kondisi sesuai dengan pilihan kondisi_barang
                            if ($request->kondisi_barang == 'Baik') {
                                $barang->kondisi_baik -= $request->qty; // Mengurangi kondisi_baik
                            } elseif ($request->kondisi_barang == 'Sedang') {
                                $barang->kondisi_sedang -= $request->qty; // Mengurangi kondisi_sedang
                            } elseif ($request->kondisi_barang == 'Rusak') {
                                $barang->kondisi_rusak -= $request->qty; // Mengurangi kondisi_rusak
                            }
                        }
                    
                        $barang->save(); // Menyimpan perubahan pada kondisi barang
                        $loggedInUserId = Auth::id();

                        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
                        $this->simpanLogHistori('Create', 'mutasiBarang', $mutasiBarang->id, $loggedInUserId, null, json_encode($mutasiBarang));
                    } else {
                        // Handle jika barang tidak ditemukan
                        return response()->json(['message' => 'Barang not found'], 404);
                    }
            
                return response()->json(['message' => 'Data Berhasil Disimpan', 'mutasiBarang' => $mutasiBarang]);
           
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
       $mutasi_barang = MutasiBarang::findOrFail($id);

        return response()->json($mutasi_barang);
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
     // Validasi request
     $validator = Validator::make($request->all(), [
        'kategori_mutasi_barang_id' => 'required',
        'kode_mutasi_barang' => 'required|unique:mutasi_barang,kode_mutasi_barang', 
        'nama_mutasi_barang' => 'required',
        'merk' => 'required',
        'type' => 'required',
        'tanggal_masuk' => 'required|date',
        'kondisi_baik' => 'required|numeric|min:0',
        'kondisi_sedang' => 'required|numeric|min:0',
        'kondisi_rusak' => 'required|numeric|min:0',
        'ruangan_id' => 'required',
        'status' => 'required',
         
        'asal' => 'required',
        'pic' => 'required',
        'gambar' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
    ], [
        'kategori_mutasi_barang_id.required' => 'Kategori MutasiBarang wajib diisi',
        'kode_mutasi_barang.required' => 'Kode MutasiBarang wajib diisi',
        'kode_mutasi_barang.unique' => 'Kode MutasiBarang sudah ada dalam database',
        'nama_mutasi_barang.required' => 'Nama MutasiBarang wajib diisi',
        'merk.required' => 'Merk MutasiBarang wajib diisi',
        'type.required' => 'Type MutasiBarang wajib diisi',
        'tanggal_masuk.required' => 'Tanggal Masuk MutasiBarang wajib diisi',
        'tanggal_masuk.date' => 'Format tanggal tidak valid',
        'kondisi_baik.required' => 'Jumlah Kondisi Baik wajib diisi',
        'kondisi_baik.numeric' => 'Jumlah Kondisi Baik harus berupa angka',
        'kondisi_baik.min' => 'Jumlah Kondisi Baik tidak boleh kurang dari 0',
        'kondisi_sedang.required' => 'Jumlah Kondisi Sedang wajib diisi',
        'kondisi_sedang.numeric' => 'Jumlah Kondisi Sedang harus berupa angka',
        'kondisi_sedang.min' => 'Jumlah Kondisi Sedang tidak boleh kurang dari 0',
        'kondisi_rusak.required' => 'Jumlah Kondisi Rusak wajib diisi',
        'kondisi_rusak.numeric' => 'Jumlah Kondisi Rusak harus berupa angka',
        'kondisi_rusak.min' => 'Jumlah Kondisi Rusak tidak boleh kurang dari 0',
        'ruangan_id.required' => 'Ruangan wajib diisi',
        'status.required' => 'Status wajib diisi',
        'harga_perolehan.required' => 'Jumlah Harga Perolehan wajib diisi',
     
        'asal.required' => 'Asal wajib diisi',
        'pic.required' => 'PIC wajib diisi',
        'gambar.required' => 'Bukti MutasiBarang wajib diisi',
        'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
        'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
    ]);

    $mutasi_barang = MutasiBarang::findOrFail($id);
    $oldData = $mutasi_barang->getOriginal();
    $input = $request->except('harga_perolehan');
 
    if ($request->has('harga_perolehan')) {
        $input['harga_perolehan'] = str_replace(',', '', $request->input('harga_perolehan'));
    }

     // Upload gambar baru jika ada
     if ($request->hasFile('gambar')) {
        $oldgambarFileName = $mutasi_barang->gambar;
        $destinationPath = 'upload/mutasi_barang/';

        // Hapus gambar lama jika ada sebelum mengganti dengan yang baru
        if ($oldgambarFileName && file_exists(public_path($destinationPath . $oldgambarFileName))) {
            unlink(public_path($destinationPath . $oldgambarFileName));
        }

        $image = $request->file('gambar');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);

        $input['gambar'] = $imageName;
    }

    // Update data mutasi_barang
    $mutasi_barang->update($input);

    $loggedInUserId = Auth::id();
    
    // Simpan log histori untuk operasi Update dengan user_id yang sedang login
    $this->simpanLogHistori('Update', 'mutasi_barang', $mutasi_barang->id, $loggedInUserId, json_encode($oldData), json_encode($mutasi_barang));


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
        $mutasi_barang = MutasiBarang::find($id);
    
        if (!$mutasi_barang) {
            return response()->json(['message' => 'Data mutasi_barang not found'], 404);
        }
    
        // Simpan kondisi dari mutasi_barang
        $jenis_mutasi = $mutasi_barang->jenis_mutasi;
        $kondisi_barang = $mutasi_barang->kondisi_barang;
        $qty = $mutasi_barang->qty;
    
        // Lakukan pengecekan kondisi dan lakukan perubahan pada tabel barang
        if ($jenis_mutasi == 'Keluar') {
            $barang = Barang::find($mutasi_barang->barang_id);
            if ($kondisi_barang == 'Baik') {
                $barang->kondisi_baik += $qty;
            } elseif ($kondisi_barang == 'Sedang') {
                $barang->kondisi_sedang += $qty;
            } elseif ($kondisi_barang == 'Rusak') {
                $barang->kondisi_rusak += $qty;
            }
            $barang->save();
        } elseif ($jenis_mutasi == 'Masuk') {
            $barang = Barang::find($mutasi_barang->barang_id);
            if ($kondisi_barang == 'Baik') {
                $barang->kondisi_baik -= $qty;
            } elseif ($kondisi_barang == 'Sedang') {
                $barang->kondisi_sedang -= $qty;
            } elseif ($kondisi_barang == 'Rusak') {
                $barang->kondisi_rusak -= $qty;
            }
            $barang->save();
        }
    
        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldbuktiFileName = $mutasi_barang->bukti; // Nama file saja
        $oldbuktiPath = public_path('upload/mutasi_barang/' . $oldbuktiFileName);
    
        if ($oldbuktiFileName && file_exists($oldbuktiPath)) {
            unlink($oldbuktiPath);
        }
    
        $mutasi_barang->delete();
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'mutasi_barang', $id, $loggedInUserId, json_encode($mutasi_barang), null);
    
        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }
    
    

}