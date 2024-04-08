<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\NilaiSiswaHead;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Profil;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

 
use Illuminate\Http\Request;
 
 
 

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guru(Request $request)
    {
        $filterStartDate = $request->start_date ?? null;
        $filterEndDate = $request->end_date ?? null;
    
        $guru = Guru::when($filterStartDate && $filterEndDate, function ($q) use ($filterStartDate, $filterEndDate) {
                return $q->whereDate('tanggal_masuk', '>=', $filterStartDate)
                    ->whereDate('tanggal_masuk', '<=', $filterEndDate);
            })
            ->get();
    
        return view('back.laporan.guru.index', compact('guru', 'filterStartDate', 'filterEndDate'));
    }


    public function siswa(Request $request)
    {
        $filterStartDate = $request->start_date ?? null;
        $filterEndDate = $request->end_date ?? null;
    
        $siswa = Siswa::when($filterStartDate && $filterEndDate, function ($q) use ($filterStartDate, $filterEndDate) {
                return $q->whereDate('tanggal_lahir', '>=', $filterStartDate)
                    ->whereDate('tanggal_lahir', '<=', $filterEndDate);
            })
            ->join('penempatan_kelas_detail', 'siswa.id', '=', 'penempatan_kelas_detail.siswa_id')
            ->join('kelas', function ($join) {
                $join->on('penempatan_kelas_detail.kelas_id', '=', 'kelas.id')
                    ->whereRaw('penempatan_kelas_detail.id = (select max(id) from penempatan_kelas_detail where penempatan_kelas_detail.siswa_id = siswa.id)');
            })
            ->select('siswa.*', 'kelas.nama_kelas')
            ->get();
    
        return view('back.laporan.siswa.index', compact('siswa', 'filterStartDate', 'filterEndDate'));
    }

    public function kelas(Request $request)
    {
        $filterStartDate = $request->start_date ?? null;
        $filterEndDate = $request->end_date ?? null;
    
        $kelas = Kelas::when($filterStartDate && $filterEndDate, function ($q) use ($filterStartDate, $filterEndDate) {
                return $q->whereDate('tanggal_masuk', '>=', $filterStartDate)
                    ->whereDate('tanggal_masuk', '<=', $filterEndDate);
            })
            ->join('penempatan_kelas_detail', 'kelas.id', '=', 'penempatan_kelas_detail.kelas_id')
            ->select('kelas.*', 'guru.nama_guru', 'guru.nip', 
            \DB::raw('COUNT(penempatan_kelas_detail.siswa_id) as jumlah_siswa'))
            ->join('guru', 'kelas.wali_kelas', '=', 'guru.id')
            ->groupBy('kelas.id') // Group data berdasarkan kelas_id
            ->get();
    
        return view('back.laporan.kelas.index', compact('kelas', 'filterStartDate', 'filterEndDate'));
    }
    public function nilai_siswa()
    {
        $nilai_siswa = NilaiSiswaHead::join('tahun_ajaran', 'nilai_siswa_head.tahun_ajaran_id', '=', 'tahun_ajaran.id')
            ->join('kelas', 'nilai_siswa_head.kelas_id', '=', 'kelas.id')
            ->join('siswa', 'nilai_siswa_head.siswa_id', '=', 'siswa.id')
            ->join('mapel', 'nilai_siswa_head.mapel_id', '=', 'mapel.id')
            ->leftJoin('nilai_siswa_detail', 'nilai_siswa_head.id', '=', 'nilai_siswa_detail.nilai_siswa_head_id')
            ->leftJoin('jenis_ujian', 'nilai_siswa_detail.jenis_ujian_id', '=', 'jenis_ujian.id')
            ->select('nilai_siswa_head.*', 'tahun_ajaran.nama_tahun_ajaran', 'kelas.nama_kelas', 'siswa.nama_siswa', 'mapel.nama_mapel')
            ->addSelect(\DB::raw('GROUP_CONCAT(CONCAT("<strong>", jenis_ujian.nama_ujian, "</strong>: <em>", nilai_siswa_detail.nilai, "</em>") SEPARATOR ", ") AS detail_nilai'))
            ->groupBy('nilai_siswa_head.id', 'tahun_ajaran.nama_tahun_ajaran', 'kelas.nama_kelas', 'siswa.nama_siswa', 'mapel.nama_mapel')
            ->get();
    
        return view('back.laporan.nilai_siswa.index', compact('nilai_siswa'));
    }

    public function keuangan(Request $request)
    {
        $filterStartDate = $request->start_date ?? Carbon::today()->toDateString();
        $filterEndDate = $request->end_date ?? Carbon::today()->toDateString();
    
        $pemasukan = Pemasukan::when($filterStartDate && $filterEndDate, function ($q) use ($filterStartDate, $filterEndDate) {
                return $q->whereDate('tanggal_pemasukan', '>=', $filterStartDate)
                    ->whereDate('tanggal_pemasukan', '<=', $filterEndDate);
            })
            ->get();

        $pengeluaran = Pengeluaran::when($filterStartDate && $filterEndDate, function ($q) use ($filterStartDate, $filterEndDate) {
                return $q->whereDate('tanggal_pengeluaran', '>=', $filterStartDate)
                    ->whereDate('tanggal_pengeluaran', '<=', $filterEndDate);
            })
            ->get();
     
        $profil = Profil::where('id', 1)->first();
        return view('back.laporan.keuangan.index',compact('pemasukan','pengeluaran','profil','filterStartDate', 'filterEndDate'));
    }

    
    
    
    
    
 
    
 
    


   


    
}
