<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AlasanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BayarSppController;
use App\Http\Controllers\BeritaController;
 
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\JenisUjianController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriGaleriController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LihatJadwalPelajaranController;
use App\Http\Controllers\LihatKontakController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LogHistoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MutasiBarangController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PenempatanKelasController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekapSppController;
use App\Http\Controllers\SatuanProdukController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\TarikTabunganController;
use App\Http\Controllers\TopUpMemberController;
use App\Http\Controllers\UnduhanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\WaktuMengajarController;
use App\Models\Absensi;
use App\Models\BayarSppHead;
use App\Models\Pendaftaran;
use App\Models\Penjualan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login_user', [LoginController::class, 'login'])->name('login');

// Home
Route::get('/auth', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);

// MASTER
Route::resource('tahunajaran', TahunAjaranController::class)->middleware('auth');
Route::resource('guru', GuruController::class)->middleware('auth');
Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('kelas', KelasController::class)->middleware('auth');
Route::resource('mapel', MapelController::class)->middleware('auth');
Route::resource('kurikulum', KurikulumController::class)->middleware('auth');
Route::resource('jurusan', JurusanController::class)->middleware('auth');






Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/galeri_sekolah', [HomeController::class, 'galeri_sekolah']);
Route::get('/guru_sekolah', [HomeController::class, 'guru_sekolah']);
Route::get('/kegiatan_sekolah', [HomeController::class, 'kegiatan_sekolah']);
Route::get('/kegiatan_sekolah/{id}', [HomeController::class, 'kegiatan_sekolah_detail'])->name('kegiatan_sekolah.kegiatan_sekolah_detail');

Route::get('/berita_sekolah', [HomeController::class, 'berita_sekolah']);
Route::get('/berita_sekolah/{slug}', [HomeController::class, 'berita_sekolah_detail'])->name('berita_sekolah.berita_sekolah_detail');
Route::get('/berita_sekolah/kategori/{id}', [HomeController::class, 'berita_sekolah_by_category_id'])->name('berita_sekolah.by_category_id');
Route::get('/berita_sekolah/cari', [HomeController::class, 'cari_berita'])->name('berita_sekolah.cari_berita');



// Route::get('/kontak_sekolah', [HomeController::class, 'kontak_sekolah']);
Route::resource('/kontak_sekolah', KontakController::class);
Route::get('/unduhan_sekolah', [HomeController::class, 'unduhan_sekolah']);
 

Route::resource('/daftar_sekolah', PendaftaranController::class);



// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);


// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

 
Route::resource('profil', ProfilController::class)->middleware('auth');
Route::resource('alasan', AlasanController::class)->middleware('auth');
Route::resource('testimoni', TestimoniController::class)->middleware('auth');
Route::resource('faq', FaqController::class)->middleware('auth');
Route::resource('metode', MetodeController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('slider', SliderController::class)->middleware('auth');
Route::resource('about', AboutController::class)->middleware('auth');
Route::resource('mitra', MitraController::class)->middleware('auth');
 







Route::resource('ruangan', RuanganController::class)->middleware('auth');
Route::resource('kepala_sekolah', KepalaSekolahController::class)->middleware('auth');


Route::resource('pembelian', PembelianController::class)->middleware('auth');
Route::resource('penjualan', PenjualanController::class)->middleware('auth');

// Tahun Ajaran 


// Supplier 
Route::resource('supplier', SupplierController::class)->middleware('auth');
Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

// Member 
Route::resource('member', MemberController::class)->middleware('auth');
Route::put('/member/update/{id}', [MemberController::class, 'update'])->name('member.update');
Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');


// Top Up Member 
Route::resource('top_up_member', TopUpMemberController::class)->middleware('auth');
Route::put('/top_up_member/update/{id}', [TopUpMemberController::class, 'update'])->name('top_up_member.update');
Route::delete('/top_up_member/{id}', [TopUpMemberController::class, 'destroy'])->name('top_up_member.destroy');



// KategoriProduk 
Route::resource('kategori_produk', KategoriProdukController::class)->middleware('auth');
Route::put('/kategori_produk/update/{id}', [KategoriProdukController::class, 'update'])->name('kategori_produk.update');
Route::delete('/kategori_produk/{id}', [KategoriProdukController::class, 'destroy'])->name('kategori_produk.destroy');

// SatuanProduk 
Route::resource('satuan_produk', SatuanProdukController::class)->middleware('auth');
Route::put('/satuan_produk/update/{id}', [SatuanProdukController::class, 'update'])->name('satuan_produk.update');
Route::delete('/satuan_produk/{id}', [SatuanProdukController::class, 'destroy'])->name('satuan_produk.destroy');

// Produk 
Route::resource('produk', ProdukController::class)->middleware('auth');
Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');



// Jadwal Pelajaran
Route::resource('jadwal_pelajaran', JadwalPelajaranController::class)->middleware('auth');
Route::get('/tampilkan-jadwal', [LihatJadwalPelajaranController::class, 'index']);
Route::get('/tampilkan-jadwal/{kelasId}', [LihatJadwalPelajaranController::class, 'tampilkanJadwalKelas'])->name('tampilkan-jadwal');

// Absensi
Route::resource('absensi', AbsensiController::class)->middleware('auth');
Route::get('/kelas/{kelasId}/siswa', [AbsensiController::class, 'getSiswaByKelas'])->name('absensi.getSiswaByKelas');


// Pendaftaran 
Route::get('/pendaftaran', [PendaftaranController::class, 'home']);




// PROFIL
Route::put('/profil/update_media_sosial/{id}', [ProfilController::class, 'update_media_sosial'])->name('profil.update_media_sosial'); 
Route::put('/profil/update_umum/{id}', [ProfilController::class, 'update_umum'])->name('profil.update_umum'); 
Route::put('/profil/update_sdm/{id}', [ProfilController::class, 'update_sdm'])->name('profil.update_sdm'); 
Route::put('/profil/update_display/{id}', [ProfilController::class, 'update_display'])->name('profil.update_display'); 


// Waktu Mengajar
Route::resource('waktumengajar', WaktuMengajarController::class)->middleware('auth');
// serverside
Route::get('datatables/waktumengajar', [WaktuMengajarController::class, 'datatables'])->name('waktumengajar.datatables');
// Simpan
Route::post('/simpan_waktu_mengajar', [WaktuMengajarController::class, 'store'])->name('simpan_waktu_mengajar'); 
// perintah edit
Route::get('/waktu_mengajar/{id}/edit', [WaktuMengajarController::class, 'edit']);
// update
Route::put('/waktu_mengajar/{id}', [WaktuMengajarController::class, 'update'])->name('waktu_mengajar.update'); 
Route::delete('/waktu_mengajar/{id}', [WaktuMengajarController::class, 'destroy'])->name('waktu_mengajar.destroy'); 
// delete



// Penempatan Kelas
Route::resource('penempatan_kelas', PenempatanKelasController::class)->middleware('auth');
Route::get('/ambil-wali-kelas/{kelasId}', [PenempatanKelasController::class, 'ambilWaliKelas']);
Route::post('simpan/penempatan/kelas', [PenempatanKelasController::class, 'simpanPenempatanKelas'])->name('simpan.penempatan.kelas');
Route::get('/ambil-penempatan-kelas/{id}', [PenempatanKelasController::class, 'getPenempatanKelasById'])->name('edit.penempatan.kelas');
// Route::put('penempatan_kelas/{id}', [PenempatanKelasController::class, 'updatePenempatanKelas'])->name('penempatan_kelas.update');
Route::put('/update-penempatan-kelas/{id}', [PenempatanKelasController::class, 'updatePenempatanKelas'])->name('penempatan_kelas.update');
Route::delete('/penempatan-kelas/{id}', [PenempatanKelasController::class, 'destroy'])->name('penempatan_kelas.destroy');
Route::delete('/hapus-penempatan-kelas/{id}', [PenempatanKelasController::class, 'hapusPenempatanKelas'])->name('penempatan_kelas.hapusPenempatanKelas');

// Bayar SPP
Route::resource('bayar_spp', BayarSppController::class)->middleware('auth');
Route::post('/simpan/bayar/spp', [BayarSppController::class, 'simpanBayarSpp'])->name('simpan.bayar.spp');
Route::get('/ambil-bayar-spp/{id}', [BayarSppController::class, 'getBayarSppById'])->name('edit.bayar.spp');
Route::put('/update-bayar-spp/{id}', [BayarSppController::class, 'updateBayarSpp'])->name('bayar_spp.update');
// Route::get('/tagihan_spp', [BayarSppController::class, 'tagihanSpp'])->name('tagihan.spp');


// Rekap Spp
Route::resource('rekap_spp', RekapSppController::class)->middleware('auth');
Route::get('/rekap-spp/{siswa_id?}', [RekapSppController::class, 'index'])->name('rekap_spp.index');


 

Route::put('/bayar/spp/{id}', [BayarSppController::class, 'update'])->name('bayar.update');
Route::get('/spp/{id}/details',  [BayarSppController::class, 'getSppDetails'])->name('bayar.getSppDetails');

Route::delete('/hapus-bayar-spp/{id}', [BayarSppController::class, 'hapusBayarSpp'])->name('bayar_spp.hapusBayarSpp');



// Jenis Ujian
Route::resource('jenis_ujian', JenisUjianController::class)->middleware('auth');
 
Route::get('/jenis_ujian/{id}/edit', [JenisUjianController::class, 'edit'])->name('jenis_ujian.edit');
Route::put('/jenis_ujian/update/{id}', [JenisUjianController::class, 'update'])->name('jenis_ujian.update');
Route::delete('/jenis_ujian/{id}', [JenisUjianController::class, 'destroy'])->name('jenis_ujian.destroy');

// Tabungan
Route::resource('tabungan', TabunganController::class)->middleware('auth');
 
Route::get('/tabungan/{id}/edit', [TabunganController::class, 'edit'])->name('tabungan.edit');
Route::put('/tabungan/update/{id}', [TabunganController::class, 'update'])->name('tabungan.update');
Route::delete('/tabungan/{id}', [TabunganController::class, 'destroy'])->name('tabungan.destroy');


// Tarik Tabungan
Route::resource('tarik_tabungan', TarikTabunganController::class)->middleware('auth');
 
Route::get('/tarik_tabungan/{id}/edit', [TarikTabunganController::class, 'edit'])->name('tarik_tabungan.edit');
Route::put('/tarik_tabungan/update/{id}', [TarikTabunganController::class, 'update'])->name('tarik_tabungan.update');
Route::delete('/tarik_tabungan/{id}', [TarikTabunganController::class, 'destroy'])->name('tarik_tabungan.destroy');




// Pengeluaran
Route::resource('pengeluaran', PengeluaranController::class)->middleware('auth');
 
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::put('/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');


// Pemasukan
Route::resource('pemasukan', PemasukanController::class)->middleware('auth');
 
Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
Route::put('/pemasukan/update/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update');
Route::delete('/pemasukan/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');


// SPP
Route::resource('spp', SppController::class)->middleware('auth');
Route::get('/spp/{id}/edit', [SppController::class, 'edit'])->name('spp.edit');
Route::put('/spp/update/{id}', [SppController::class, 'update'])->name('spp.update');
Route::delete('/spp/{id}', [SppController::class, 'destroy'])->name('spp.destroy');



// Link
Route::resource('link', LinkController::class)->middleware('auth');
Route::get('/link/{id}/edit', [LinkController::class, 'edit'])->name('link.edit');
Route::put('/link/update/{id}', [LinkController::class, 'update'])->name('link.update');
Route::delete('/link/{id}', [LinkController::class, 'destroy'])->name('link.destroy');



// Log History
Route::resource('log_histori', LogHistoriController::class)->middleware('auth');
Route::get('/log-histori/delete-all', [LogHistoriController::class, 'deleteAll'])->name('log-histori.delete-all');



// Lihat Kontak
Route::resource('lihat_kontak', LihatKontakController::class)->middleware('auth');
Route::get('/lihat-kontak/delete-all', [LihatKontakController::class, 'deleteAll'])->name('lihat-kontak.delete-all');



// Visitor
Route::resource('visitor', VisitorController::class)->middleware('auth');
Route::get('/visitor/delete-all', [VisitorController::class, 'deleteAll'])->name('visitor.delete-all');

// Kategori Barang
Route::resource('kategori_barang', KategoriBarangController::class)->middleware('auth');
Route::get('/kategori_barang/{id}/edit', [KategoriBarangController::class, 'edit'])->name('kategori_barang.edit');
Route::put('/kategori_barang/update/{id}', [KategoriBarangController::class, 'update'])->name('kategori_barang.update');
Route::delete('/kategori_barang/{id}', [KategoriBarangController::class, 'destroy'])->name('kategori_barang.destroy');

// Barang
Route::resource('barang', BarangController::class)->middleware('auth');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

// Surat Masuk
Route::resource('surat_masuk', SuratMasukController::class)->middleware('auth');
Route::get('/surat_masuk/{id}/edit', [SuratMasukController::class, 'edit'])->name('surat_masuk.edit');
Route::put('/surat_masuk/update/{id}', [SuratMasukController::class, 'update'])->name('surat_masuk.update');
Route::delete('/surat_masuk/{id}', [SuratMasukController::class, 'destroy'])->name('surat_masuk.destroy');

// Surat Keluar
Route::resource('surat_keluar', SuratKeluarController::class)->middleware('auth');
Route::get('/surat_keluar/{id}/edit', [SuratKeluarController::class, 'edit'])->name('surat_keluar.edit');
Route::put('/surat_keluar/update/{id}', [SuratKeluarController::class, 'update'])->name('surat_keluar.update');
Route::delete('/surat_keluar/{id}', [SuratKeluarController::class, 'destroy'])->name('surat_keluar.destroy');

// Unduhan
Route::resource('unduhan', UnduhanController::class)->middleware('auth');
Route::get('/unduhan/{id}/edit', [UnduhanController::class, 'edit'])->name('unduhan.edit');
Route::put('/unduhan/update/{id}', [UnduhanController::class, 'update'])->name('unduhan.update');
Route::delete('/unduhan/{id}', [UnduhanController::class, 'destroy'])->name('unduhan.destroy');


// Mutasi Barang
Route::resource('mutasi_barang', MutasiBarangController::class)->middleware('auth');
Route::get('/mutasi_barang/{id}/edit', [MutasiBarangController::class, 'edit'])->name('mutasi_barang.edit');
Route::put('/mutasi_barang/update/{id}', [MutasiBarangController::class, 'update'])->name('mutasi_barang.update');
Route::delete('/mutasi_barang/{id}', [MutasiBarangController::class, 'destroy'])->name('mutasi_barang.destroy');
Route::get('/ambil-ruangan/{barangId}', [MutasiBarangController::class, 'ambilRuangan']);

// Nilai Siswa
Route::resource('nilai_siswa', NilaiSiswaController::class)->middleware('auth');
Route::post('/nilai_siswa/store', [NilaiSiswaController::class, 'store'])->name('nilai_siswa.store');
// Rute untuk menampilkan form edit
Route::get('/nilai_siswa/{id}/edit', [NilaiSiswaController::class, 'edit'])->name('nilai_siswa.edit');
Route::put('/nilai_siswa/{id}', [NilaiSiswaController::class, 'update'])->name('nilai_siswa.update');
 



// Kategori Berita
Route::resource('kategoriberita', KategoriBeritaController::class)->middleware('auth');
// serverside
Route::get('datatables/kategoriberita', [KategoriBeritaController::class, 'datatables'])->name('kategoriberita.datatables');
// Simpan
Route::post('/simpan_kategori_berita', [KategoriBeritaController::class, 'store'])->name('simpan_kategori_berita'); 
// perintah edit
Route::get('/kategori_berita/{id}/edit', [KategoriBeritaController::class, 'edit']);
// update
Route::put('/kategori_berita/{id}', [KategoriBeritaController::class, 'update'])->name('kategori_berita.update'); 
// delete
Route::delete('/kategori_berita/{id}', 'KategoriBeritaController@destroy')->name('kategori_berita.destroy');


// Berita
Route::resource('berita', BeritaController::class)->middleware('auth');
// serverside
Route::get('datatables/berita', [BeritaController::class, 'datatables'])->name('berita.datatables');
// Simpan
Route::post('/simpan_berita', [BeritaController::class, 'store'])->name('simpan_berita'); 
// perintah edit
Route::get('/berita/{id}/edit', [BeritaController::class, 'edit']);

// update
Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->name('update_berita'); 
// delete
Route::delete('/berita/{id}', [BeritaController::class, 'delete'])->name('delete_berita'); 

Route::get('/getKategoriBeritaData', [BeritaController::class, 'getKategoriBeritaData'])->name('getKategoriBeritaData');






// Galeri
Route::resource('kategorigaleri', KategoriGaleriController::class)->middleware('auth');
Route::resource('galeri', GaleriController::class)->middleware('auth');
Route::get('/assets', [GaleriController::class, 'assets']);


 

 
Route::resource('hitung', HitungController::class)->middleware('auth');
Route::get('/hitung/{id}/edit', [HitungController::class, 'edit'])->name('hitung.edit');
Route::put('/hitung/update/{id}', [HitungController::class, 'update'])->name('hitung.update');
Route::delete('/hitung/{id}', [HitungController::class, 'destroy'])->name('hitung.destroy');


Route::resource('kegiatan', KegiatanController::class)->middleware('auth');
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');




// LAPORAN

Route::get('laporan/guru', [LaporanController::class, 'guru'])->middleware('auth')->name('laporan.guru');
Route::get('laporan/siswa', [LaporanController::class, 'siswa'])->middleware('auth')->name('laporan.siswa');
Route::get('laporan/kelas', [LaporanController::class, 'kelas'])->middleware('auth')->name('laporan.kelas');
Route::get('laporan/nilai_siswa', [LaporanController::class, 'nilai_siswa'])->middleware('auth')->name('laporan.nilai_siswa');
Route::get('laporan/keuangan', [LaporanController::class, 'keuangan'])->middleware('auth')->name('laporan.keuangan');
Route::get('laporan/surat', [LaporanController::class, 'surat'])->middleware('auth')->name('laporan.surat');
Route::get('laporan/absensi', [LaporanController::class, 'absensi'])->middleware('auth')->name('laporan.absensi');
Route::get('laporan/barang', [LaporanController::class, 'barang'])->middleware('auth')->name('laporan.barang');
Route::get('laporan/mutasi_barang', [LaporanController::class, 'mutasi_barang'])->middleware('auth')->name('laporan.mutasi_barang');