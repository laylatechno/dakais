<?php

namespace App\Http\Controllers;

use App\Models\BayarSppHead;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\KategoriBerita;
use App\Models\Mapel;
use App\Models\Ruangan;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
   // Definisikan fungsi di dalam kelas
   private function getIndonesianMonthName($englishMonth)
   {
      $months = [
         'January' => 'Januari',
         'February' => 'Februari',
         'March' => 'Maret',
         'April' => 'April',
         'May' => 'Mei',
         'June' => 'Juni',
         'July' => 'Juli',
         'August' => 'Agustus',
         'September' => 'September',
         'October' => 'Oktober',
         'November' => 'November',
         'December' => 'Desember',
      ];

      return $months[$englishMonth] ?? $englishMonth;
   }

   public function index()
{
    $berita = Cache::remember('berita_cache', 6, function () {
        return Berita::with('kategoriBerita')->get();
    });

    $kategoriBerita = KategoriBerita::all();

    $count_guru = Cache::remember('count_guru_cache', 6, function () {
        return Guru::where('status_aktif', 'Aktif')->count();
    });

    $count_siswa = Cache::remember('count_siswa_cache', 6, function () {
        return Siswa::count();
    });

    $count_mapel = Cache::remember('count_mapel_cache', 6, function () {
        return Mapel::count();
    });

    $count_ruangan = Cache::remember('count_ruangan_cache', 6, function () {
        return Ruangan::count();
    });

    $count_siswa_laki = Cache::remember('count_siswa_laki_cache', 6, function () {
        return Siswa::where('jenis_kelamin', 'Laki-laki')->count();
    });

    $count_siswa_perempuan = Cache::remember('count_siswa_perempuan_cache', 6, function () {
        return Siswa::where('jenis_kelamin', 'Perempuan')->count();
    });

    $count_guru_laki = Cache::remember('count_guru_laki_cache', 6, function () {
        return Guru::where('status_aktif', 'Aktif')->where('jenis_kelamin', 'Laki-laki')->count();
    });

    $count_guru_perempuan = Cache::remember('count_guru_perempuan_cache', 6, function () {
        return Guru::where('status_aktif', 'Aktif')->where('jenis_kelamin', 'Perempuan')->count();
    });

    $gender_data_siswa = Cache::remember('gender_data_siswa_cache', 6, function () use ($count_siswa_laki, $count_siswa_perempuan) {
        return [
            'Laki-laki' => $count_siswa_laki,
            'Perempuan' => $count_siswa_perempuan,
        ];
    });

    $gender_data_guru = Cache::remember('gender_data_guru_cache', 6, function () use ($count_guru_laki, $count_guru_perempuan) {
        return [
            'Laki-laki' => $count_guru_laki,
            'Perempuan' => $count_guru_perempuan,
        ];
    });

    $visits = Cache::remember('visits_cache', 6, function () {
        return Visitor::where('visit_time', '>=', Carbon::now()->subWeek())
            ->selectRaw('DATE(visit_time) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    });

    $bayar_spp = BayarSppHead::all();

   // Dapatkan bulan dan tahun saat ini
   $currentMonth = $this->getIndonesianMonthName(Carbon::now()->format('F'));
   $currentYear = Carbon::now()->format('Y');

   // Dapatkan ID siswa yang membayar SPP pada bulan dan tahun yang sedang berjalan
   $paidSppSiswaIds = BayarSppHead::where('bulan', $currentMonth)
      ->where('tahun', $currentYear)
      ->pluck('siswa_id'); // Mendapatkan daftar ID siswa yang sudah membayar

   // Dapatkan daftar siswa yang tidak ada di daftar yang sudah membayar
   $siswaYangBelumBayar = Siswa::whereNotIn('id', $paidSppSiswaIds)->get();

    return view('back.dashboard', compact(
        'siswaYangBelumBayar',
        'bayar_spp',
        'count_guru',
        'count_siswa',
        'count_mapel',
        'count_ruangan',
        'gender_data_siswa',
        'gender_data_guru',
        'berita',
        'kategoriBerita',
        'visits'
    ));
}

}
