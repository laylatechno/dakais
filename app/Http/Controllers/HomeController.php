<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Hitung;
use App\Models\KategoriBerita;
use App\Models\Kegiatan;
use App\Models\Mitra;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        $kegiatan = Kegiatan::where('status', 'Aktif')->take(3)->get();
        $about = About::all();
        $testimoni = Testimoni::all();
        $mitra = Mitra::all();
        $hitung = Hitung::all();
        $berita = Berita::with('kategoriBerita')->get();
        $guru = Guru::where('status_aktif', 'Aktif')->take(4)->get();
        return view('front.home', compact('slider', 'about', 'guru', 'testimoni', 'berita', 'mitra', 'hitung', 'kegiatan'));
    }


    public function tentang()
    {

        $about = About::all();
        $mitra = Mitra::all();
        return view('front.tentang', compact('about', 'mitra'));
    }

    public function guru()
    {

        $guru = Guru::where('status_aktif', 'Aktif')->get();
        $mitra = Mitra::all();
        return view('front.guru', compact('guru', 'mitra'));
    }

    public function kegiatan_sekolah()
    {
        $kegiatan = Kegiatan::where('status', 'Aktif')->paginate(6);
    
        $mitra = Mitra::all();
    
        return view('front.kegiatan', compact('kegiatan', 'mitra'));
    }

    public function kegiatan_sekolah_detail($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan_all = Kegiatan::where('status', 'Aktif')->take(3)->get();
        $mitra = Mitra::all();
        return view('front.kegiatan_detail', compact('kegiatan', 'mitra', 'kegiatan_all'));
    }

    public function berita_sekolah()
    {

        $kategori_berita = KategoriBerita::withCount('berita')->get();
        $berita = Berita::with('kategoriBerita')->paginate(6);
        $berita_all = Berita::where('status', 'Aktif')->take(3)->get();
        $mitra = Mitra::all();
        return view('front.berita', compact('berita', 'mitra', 'berita_all', 'kategori_berita'));
    }


    public function berita_sekolah_detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita_all = Berita::where('status', 'Aktif')->take(3)->get();
        $mitra = Mitra::all();
        return view('front.berita_detail', compact('berita', 'mitra', 'berita_all'));
    }

    public function berita_sekolah_by_category_id($id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        $berita = Berita::where('kategori_berita_id', $kategori->id)->paginate(6);

        $kategori_berita = KategoriBerita::withCount('berita')->get();

        $berita_all = Berita::where('status', 'Aktif')->take(6)->get();

        $mitra = Mitra::all();

        return view('front.berita', compact('berita', 'kategori_berita', 'mitra', 'berita_all', 'kategori'));
    }


    public function cari_berita(Request $request)
    {
        $keyword = $request->input('q');
    
        $berita = Berita::where('judul_berita', 'LIKE', "%$keyword%")
                        ->orWhere('isi', 'LIKE', "%$keyword%")
                        ->paginate(2); // Menggunakan pagination
    
        $mitra = Mitra::all();
    
        return view('front.berita', compact('berita', 'mitra')); // Mengembalikan tampilan dengan hasil pencarian
    }


    public function blog()
    {
        return view('front.blog');
    }

    public function kontak()
    {
        return view('front.kontak');
    }

    public function kebijakan()
    {
        $profile = Profil::first();
        return view('front.kebijakan', compact('profile'));
    }

    public function syarat()
    {
        $profile = Profil::first();
        return view('front.syarat', compact('profile'));
    }
}
