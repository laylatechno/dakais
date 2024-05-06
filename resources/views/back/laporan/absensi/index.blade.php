@extends('back.layouts.app')
@section('title', 'Administrasi Absensi')
@section('subtitle', 'Menu Administrasi Absensi')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="unhide">
                        <form action="" method="GET" id="filterForm">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tanggal_awal">Tanggal Awal:</label>
                                    <input type="date" class="form-control" id="tanggal_awal" name="start_date" value="{{ $filterStartDate }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="tanggal_akhir">Tanggal Akhir:</label>
                                    <input type="date" class="form-control" id="tanggal_akhir" name="end_date" value="{{ $filterEndDate }}">
                                </div>
                            </div>
                            <br>
                            <div>
                                <label>Status:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="radio_hadir" value="hadir" {{ $status === 'hadir' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio_hadir">Hadir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="radio_izin" value="izin" {{ $status === 'izin' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio_izin">Izin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="radio_alpa" value="alpa" {{ $status === 'alpa' ? 'checked' : '' }}>
                                    <label class="form-check-label" for='radio_alpa'>Alpa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="radio_semua" value="semua" {{ $status === 'semua' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="radio_semua">Semua</label>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-sm btn-primary mt-3" type="submit"><i class="fas fa-search"></i> Filter Berdasarkan Range</button>
                        </form>
                    </div>
                   
                    




                    <hr>
                    <h5 class="card-title mb-0"><b>{{ $profil->nama_sekolah }}</b></h5>
                    <br><br>
                    <a href="/upload/profil/{{ $profil->logo }}" target="_blank">
                        <img class="" width="50px" height="50px;" src="/upload/profil/{{ $profil->logo }}"
                            alt="user image">
                    </a>
                    <br><br>
                    <h5 class="card-title mb-3">Alamat : <br>
                        {{ $profil->alamat }} <br>
                        {{ $profil->deskripsi }}</h5>
                    <br><br><br>

                    <br>


                    <div class="col-md-12" id="masuk">
                        {{-- <div class="form-group"> --}}
                        <label for="hari">Status Hadir : </label>
                        {{-- </div> --}}


                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>x
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Guru</th>
                                    <th>Siswa</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->tanggal_absensi }}</td>
                                        <td>{{ $p->tanggal_absensi }}</td>
                                        <!-- Gunakan optional untuk menghindari kesalahan jika siswa adalah null -->
                                        <td>{{ optional($p->guru)->nama_guru ?? 'Siswa tidak ditemukan' }}</td>
                                        <td>{{ optional($p->siswa)->nama_siswa ?? 'Siswa tidak ditemukan' }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>{{ $p->keterangan }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>







                    {{-- akhir bagian looping  --}}

                    <div class="border-top" id="unhide">
                        <div class="card-body">
                            <button id="btnPrint" class="btn btn-success" style="color:white;"><i class="fas fa-print"></i>
                                Cetak</button>


                            <a href="/tampilkan-jadwal" class="btn btn-danger" style="color:white;"><i
                                    class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        // Fungsi untuk membuka jendela cetak saat tombol cetak diklik
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnPrint').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
@endpush
