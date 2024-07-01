<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Hitung;
use App\Models\KategoriBerita;
use App\Models\Kegiatan;
use App\Models\Kontak;
use App\Models\Mitra;
use App\Models\Visitor;
use App\Models\Slider;
use App\Models\Testimoni;
use App\Models\Unduhan;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent; // Pustaka untuk mengurai user-



class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent(); // Buat instance untuk mengurai user-agent

        // Simpan visitor
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $visit_time = date('Y-m-d H:i:s');
        $session_id = session_id(); // Ambil ID sesi
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Ambil informasi tentang perangkat dan OS
        $device = $agent->device(); // Nama perangkat (misalnya, iPhone, Android)
        $platform = $agent->platform(); // Nama OS (misalnya, Windows, iOS)
        $browser = $agent->browser(); // Nama browser (misalnya, Chrome, Safari)

        Visitor::create([
            'ip_address' => $ip_address,
            'visit_time' => $visit_time,
            'session_id' => $session_id,
            'user_agent' => $user_agent,
            'device' => $device,
            'platform' => $platform,
            'browser' => $browser,
        ]);

        // Data lainnya yang diperlukan untuk tampilan
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

    public function guru_sekolah()
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

        // Tambahkan kode untuk memperbarui views:
        $berita->views = $berita->views + 1;
        $berita->save();

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
        $berita_all = Berita::where('status', 'Aktif')->take(6)->get();
        $kategori_berita = KategoriBerita::withCount('berita')->get();


        return view('front.berita', compact('berita', 'mitra','berita_all','kategori_berita')); // Mengembalikan tampilan dengan hasil pencarian
    }


    public function galeri_sekolah()
    {

        $about = About::all();
        $galeri = Galeri::all();
        return view('front.galeri', compact('about', 'galeri'));
    }

    public function unduhan_sekolah()
    {

        $about = About::all();
        $unduhan = Unduhan::orderBy('id', 'desc')->get();
        return view('front.unduhan', compact('about', 'unduhan'));
    }

   

    
}
