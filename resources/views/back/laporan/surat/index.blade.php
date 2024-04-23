@extends('back.layouts.app')
@section('title', 'Administrasi Surat')
@section('subtitle', 'Menu Administrasi Surat')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" id="unhide">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tanggal_awal">Tanggal Awal:</label>
                                <input type="date" class="form-control" id="tanggal_awal" name="start_date"
                                    value="{{ $filterStartDate ?? date('Y-m-d') }}">
                                <!-- Let's move the button here -->
                                <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-search"></i> Filter Berdasarkan
                                    Range</button>
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal_akhir">Tanggal Akhir:</label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="end_date"
                                    value="{{ $filterEndDate ?? date('Y-m-d') }}">
                            </div>
                            <!-- Remove the third column -->
                        </div>


                    </form>
                    <br>
                    <div id="unhide">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="radio_surat_masuk"
                                onclick="toggleSurat('surat_masuk')">
                            <label class="form-check-label" for="radio_surat_masuk">Surat Masuk</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="radio_surat_keluar"
                                onclick="toggleSurat('surat_keluar')">
                            <label class="form-check-label" for="radio_surat_keluar">Surat Keluar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_surat" id="radio_keduanya"
                                onclick="toggleSurat('keduanya')">
                            <label class="form-check-label" for="radio_keduanya">Keduanya</label>
                        </div>
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
                    <hr>
                    <br>


                    <div class="col-md-12" id="surat_masuk">
                        {{-- <div class="form-group"> --}}
                        <label for="hari">Surat Masuk : </label>
                        {{-- </div> --}}


                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Nomor Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Perihal</th>
                                    <th>Pengirim</th>
                                    <th>Disposisi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masuk as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->tanggal_masuk }}</td>
                                        <td>{{ $p->nomor_surat }}</td>
                                        <td>{{ $p->jenis_surat }}</td>
                                        <td>{{ $p->perihal }}</td>
                                        <td>{{ $p->pengirim }}</td>
                                        <td>{{ $p->disposisi }}</td>
                                        <td>{{ $p->keterangan }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>




                    <div class="col-md-12" id="surat_keluar">
                        {{-- <div class="form-group"> --}}
                        <label for="hari">Surat Keluar : </label>
                        {{-- </div> --}}


                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Nomor Surat</th>
                                    <th>Penerima</th>
                                    <th>Jenis Surat</th>
                                    <th>Perihal</th>
                                    <th>Tindak Lanjut</th>

                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluar as $p)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->tanggal_keluar }}</td>
                                        <td>{{ $p->nomor_surat }}</td>
                                        <td>{{ $p->penerima }}</td>
                                        <td>{{ $p->jenis_surat }}</td>
                                        <td>{{ $p->perihal }}</td>
                                        <td>{{ $p->tindak_lanjut }}</td>
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
        function toggleSurat(id) {
            var surat_masuk = document.getElementById('surat_masuk');
            var surat_keluar = document.getElementById('surat_keluar');

            // Sembunyikan semua elemen terlebih dahulu
            surat_masuk.style.display = 'none';
            surat_keluar.style.display = 'none';

            // Tampilkan elemen berdasarkan pilihan radio yang dipilih
            if (id === 'surat_masuk') {
                surat_masuk.style.display = 'block';
            } else if (id === 'surat_keluar') {
                surat_keluar.style.display = 'block';
            } else if (id === 'keduanya') {
                surat_masuk.style.display = 'block';
                surat_keluar.style.display = 'block';
            }
        }
    </script>

    <script>
        // Fungsi untuk membuka jendela cetak saat tombol cetak diklik
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnPrint').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
@endpush
