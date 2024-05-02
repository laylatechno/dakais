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
      $berita = Berita::all();
      $kategoriBerita = KategoriBerita::all();


      $count_guru = Guru::where('status_aktif', 'Aktif')->count();
      $count_siswa = Siswa::count();
      $count_mapel = Mapel::count();
      $count_ruangan = Ruangan::count();

      // Data untuk grafik batang siswa berdasarkan jenis kelamin
      $count_siswa_laki = Siswa::where('jenis_kelamin', 'Laki-laki')->count();
      $count_siswa_perempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();

      // Data untuk grafik donat guru berdasarkan jenis kelamin
      $count_guru_laki = Guru::where('status_aktif', 'Aktif')->where('jenis_kelamin', 'Laki-laki')->count();
      $count_guru_perempuan = Guru::where('status_aktif', 'Aktif')->where('jenis_kelamin', 'Perempuan')->count();

      $gender_data_siswa = [
         'Laki-laki' => $count_siswa_laki,
         'Perempuan' => $count_siswa_perempuan,
      ];

      $gender_data_guru = [
         'Laki-laki' => $count_guru_laki,
         'Perempuan' => $count_guru_perempuan,
      ];

      // Data kunjungan per hari selama seminggu terakhir
      $visits = Visitor::where('visit_time', '>=', Carbon::now()->subWeek())
         ->selectRaw('DATE(visit_time) as date, COUNT(*) as count')
         ->groupBy('date')
         ->orderBy('date')
         ->get();


      $currentMonth = $this->getIndonesianMonthName(Carbon::now()->format('F'));
      $currentYear = Carbon::now()->format('Y');

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
         'siswaYangBelumBayar', // Daftar siswa yang belum membayar
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



      return view('back.dashboard', compact(
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
