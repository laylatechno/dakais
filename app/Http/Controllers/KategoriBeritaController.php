<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\LogHistori;

class KategoriBeritaController extends Controller
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
        $kategoriberita = KategoriBerita::all();
        return view('back.kategoriberita.index',compact('kategoriberita'));
    }


    public function datatables()
    {
        $kategoriberita = KategoriBerita::select(['id', 'nama_kategori_berita', 'slug', 'urutan'])->get();
        
        // Tambahkan nomor urut secara manual
        $nomorUrut = 1;
        foreach ($kategoriberita as $kategori) {
            $kategori->DT_RowIndex = $nomorUrut++;
        }
    
        return Datatables::of($kategoriberita)
            ->addColumn('action', function ($kategori) {
                return '<a href="#" class="btn btn-sm btn-warning btn_edit_kategori_berita" data-toggle="modal" data-target="#modal-edit-kategoriberita" data-id="' . $kategori->id . '" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                <button class="btn btn-sm btn-danger btn_delete_kategori_berita" data-id-kategori="' . $kategori->id . '" style="color: white"><i class="fas fa-trash-alt"></i> Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
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
        $request->validate([
            'nama_kategori_berita' => 'required|unique:kategori_berita,nama_kategori_berita',
        ], [
            'nama_kategori_berita.unique' => 'Nama kategori berita sudah ada.',
        ]);
    
        // Simpan data kategori_berita ke database
        $kategori_berita = new KategoriBerita();
        $kategori_berita->nama_kategori_berita = $request->nama_kategori_berita;
        $kategori_berita->slug = $request->slug;
        $kategori_berita->urutan = $request->urutan;
    
        $kategori_berita->save();
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'kategori_berita', $kategori_berita->id, $loggedInUserId, null, json_encode($kategori_berita));
    
        return response()->json(['message' => 'Data kategori berita berhasil disimpan']);
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
        $kategoriberita = KategoriBerita::findOrFail($id);
        return response()->json($kategoriberita);
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
        $kategoriBerita = KategoriBerita::findOrFail($id);
    
        // Menyimpan data lama sebelum perubahan
        $oldData = $kategoriBerita->getOriginal();
    
        $kategoriBerita->nama_kategori_berita = $request->nama_kategori_berita;
        $kategoriBerita->slug = $request->slug;
        $kategoriBerita->urutan = $request->urutan;
        $kategoriBerita->save();
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'kategori_berita', $kategoriBerita->id, $loggedInUserId, json_encode($oldData), json_encode($kategoriBerita));
    
        return response()->json(['message' => 'Data berhasil diupdate']);
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
            // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'kategori_berita', $id, $loggedInUserId, json_encode($kategoriBerita), null);

        $kategoriBerita->delete();

    
        return response()->json(['message' => 'Data berhasil dihapus']);     
    }
    
}
