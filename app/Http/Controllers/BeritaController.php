<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
 

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        $kategoriBerita = KategoriBerita::all();
        return view('back.berita.index',compact('berita','kategoriBerita'));
    }


    public function datatables()
    {
        $berita = Berita::select(['id', 
                                'judul_berita', 
                                'tanggal_posting', 
                                'slug', 
                                'penulis', 
                                'kategori_berita_id', 
                                'ringkasan', 
                                'isi', 
                                'gambar', 
                                'sumber', 
                                'urutan'
                                ])->get();
        
        // Tambahkan nomor urut secara manual
        $nomorUrut = 1;
        foreach ($berita as $p) {
            $p->DT_RowIndex = $nomorUrut++;
        }
    
        return Datatables::of($berita)
            ->addColumn('action', function ($p) {
                return '<a href="#" class="btn btn-sm btn-warning btn_edit_berita" data-toggle="modal" data-target="#modal-berita-edit" data-id="' . $p->id . '" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                <button class="btn btn-sm btn-danger btn_delete_berita" id="hapus_' . $p->id . '" data-id="' . $p->id . '" style="color: white"><i class="fas fa-trash-alt"></i> Delete</button>';
            })
            
            ->addColumn('gambar', function($data) {
                return '/upload/berita/'.$data->gambar.'';
            })
            
            
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function getKategoriBeritaData(Request $request)
    {
        $term = $request->term;
        $data = KategoriBerita::where('nama_kategori_berita', 'LIKE', '%' . $term . '%')->get();
    
        return response()->json($data);
    }
    

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriBerita = KategoriBerita::select('id', 'nama_kategori_berita')->get();

        return view('back.berita.create', compact('kategoriBerita'));
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
                'tanggal_posting' => 'required',
                'judul_berita' => 'required|unique:berita,judul_berita',
                'penulis' => 'required',
                'kategori_berita_id' => 'required',
                'ringkasan' => 'required',
                'isi' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file bukti
            ], [
                'judul_berita.required' => 'judul berita wajib terisi.',
                'judul_berita.unique' => 'judul berita sudah ada.',
            ]);
        
    
        // Simpan data pengeluaran ke database
        $berita = new Berita();
        $berita->tanggal_posting = $request->tanggal_posting;
        $berita->judul_berita = $request->judul_berita;
        $berita->slug = $request->slug;
        $berita->penulis = $request->penulis;
        $berita->kategori_berita_id = $request->kategori_berita_id;
        $berita->ringkasan = $request->ringkasan;
        $berita->isi = $request->isi;
        $berita->sumber = $request->sumber;
        $berita->urutan = $request->urutan;
        
        
           // Simpan file gambar ke direktori yang diinginkan (misalnya: uploads/gambar_berita)
           $gambar = $request->file('gambar');
           $namaFile = time().'.'.$gambar->getClientOriginalExtension();
           $gambar->move(public_path('upload/berita'), $namaFile);
     
           // Simpan nama file gambar ke dalam database
           $berita->gambar = $namaFile;
    
        
    
        $berita->save();
    
        return response()->json(['message' => 'Data berita berhasil disimpan']);
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
        $berita = Berita::findOrFail($id); // Ganti "Berita" dengan model yang sesuai
        return response()->json($berita);
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
        // Ambil data pengeluaran yang akan diperbarui
       
        $berita = Berita::where('id', $id)->firstOrFail();
        
        // Validasi request
        $request->validate([
            'tanggal_posting' => 'required',
            'judul_berita' => 'required',
            'penulis' => 'required',
            'kategori_berita_id' => 'required',
            'ringkasan' => 'required',
            'isi' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ], [
            'judul_berita.required' => 'judul berita wajib terisi.',
        ]);
    
         // Update data berita
        
         $berita->fill($request->except(['gambar','id'])); // Isi data kecuali gambar
         $berita->gambar = $berita->gambar; // Tetap gunakan gambar lama jika tidak ada gambar baru
     
         // Cek apakah ada file gambar yang diunggah
         if ($request->hasFile('gambar')) {
            $request->validate([
                // 'nama_konsumen' => 'required',
                'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            ]);
             if ($berita->gambar) {
                 // Hapus gambar dari penyimpanan (misalnya folder uploads)
                 $gambarPath = public_path('upload/berita/' . $berita->gambar);
                 if (file_exists($gambarPath)) {
                     unlink($gambarPath);
                 }
             }
     
             // Simpan gambar baru
             $gambarFile = $request->file('gambar');
             $namaFile = time() . '.' . $gambarFile->getClientOriginalExtension();
             $gambarFile->move(public_path('upload/berita'), $namaFile);
     
             // Update atribut gambar pada berita
             $berita->gambar = $namaFile;
         }
    
     
        $berita->tanggal_posting = $request->tanggal_posting;
        $berita->judul_berita = $request->judul_berita;
        $berita->slug = $request->slug;
        $berita->penulis = $request->penulis;
        $berita->kategori_berita_id = $request->kategori_berita_id;
        $berita->ringkasan = $request->ringkasan;
        $berita->isi = $request->isi;
        $berita->sumber = $request->sumber;
        $berita->urutan = $request->urutan;
    
        
    
        // Simpan perubahan
        $berita->save();
    
        return response()->json(['message' => 'Data berita berhasil diperbarui']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);
    
        if (!$berita) {
            return response()->json(['message' => 'Data berita tidak ditemukan'], 404);
        }
    
        // Hapus gambar terkait sebelum menghapus data berita
        if (file_exists(public_path('upload/berita/' . $berita->gambar))) {
            unlink(public_path('upload/berita/' . $berita->gambar));
        }
    
        $berita->delete();
    
        return response()->json(['message' => 'Data berita berhasil dihapus']);
    }
    
    
}
