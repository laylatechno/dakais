@extends('back.layouts.app')
@section('title', 'Halaman Dashboard')
@section('subtitle', 'Menu Dashboard')

@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $count_guru }}</h3>

                    <p>Guru</p>
                </div>
                <div class="icon">
                    <i class="ion-android-contact"></i>
                </div>
                <a href="/guru" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $count_siswa }}</h3>

                    <p>Siswa</p>
                </div>
                <div class="icon">
                    <i class="ion-android-contacts"></i>
                </div>
                <a href="/siswa" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $count_mapel }}</h3>

                    <p>Mata Pelajaran</p>
                </div>
                <div class="icon">
                    <i class="ion-android-chat"></i>
                </div>
                <a href="/mapel" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $count_ruangan }}</h3>

                    <p>Ruangan</p>
                </div>
                <div class="icon">
                    <i class="ion-android-folder-open"></i>
                </div>
                <a href="/ruangan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
    <!-- /.row -->


    <!-- Section for the Gender-based Chart -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Grafik Data Siswa Berdasarkan Jenis Kelamin
                </div>
                <div class="card-body">
                    <canvas id="genderChartSiswa"></canvas> <!-- Periksa apakah ID cocok -->
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Grafik Data Guru Berdasarkan Jenis Kelamin
                </div>
                <div class="card-body">
                    <canvas id="genderChartGuru"></canvas> <!-- Pastikan ID ini benar -->
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Kunjungan Website
                </div>
                <div class="card-body">
                    <canvas id="visitors"></canvas>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Kunjungan Berita
                </div>
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Berita</th>
                                <th>Kategori</th>
                                <th>Jumlah View</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($berita as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->judul_berita }}</td>
                                    <td>{{ $p->kategoriBerita->nama_kategori_berita }}</td>
                                    <td>{{ $p->views }}</td>




                                </tr>
                            @endforeach





                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Siswa Belum Bayar Bulan Sekarang
                </div>
                <div class="card-body">
                    <!-- Menampilkan judul atau heading -->
                    <h3>Daftar Siswa yang Belum Membayar SPP Bulan Ini</h3>



                    <!-- Jika daftar siswa kosong, tampilkan pesan -->
                    @if ($siswaYangBelumBayar->isEmpty())
                        <p>Tidak ada siswa yang belum membayar SPP untuk bulan dan tahun ini.</p>
                    @else
                        <!-- Menampilkan tabel jika ada siswa -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th> <!-- Misalnya, jika ada field kelas -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswaYangBelumBayar as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama_siswa }}</td>
                                        <td>{{ $siswa->kelas }}</td> <!-- Tambahkan informasi lain yang relevan -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif





                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js library -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data for Siswa Chart
            var genderDataSiswa = @json($gender_data_siswa);

            var chartDataSiswa = {
                labels: Object.keys(genderDataSiswa), // 'Laki-laki', 'Perempuan'
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: Object.values(genderDataSiswa), // [count_laki, count_perempuan]
                    backgroundColor: ['#3498db', '#e74c3c'], // Colors for the bars
                }]
            };

            var ctxSiswa = document.getElementById("genderChartSiswa").getContext("2d");

            new Chart(ctxSiswa, {
                type: 'bar', // Use a bar chart
                data: chartDataSiswa,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true // Start the y-axis at zero
                        }
                    }
                }
            });

            // Data for Guru Chart
            var genderDataGuru = @json($gender_data_guru);

            var chartDataGuru = {
                labels: Object.keys(genderDataGuru),
                datasets: [{
                    data: Object.values(genderDataGuru),
                    backgroundColor: ['#3498db', '#e74c3c'], // Colors for the donut segments
                }]
            };

            var ctxGuru = document.getElementById("genderChartGuru").getContext("2d");

            new Chart(ctxGuru, {
                type: 'doughnut', // Use a doughnut chart
                data: chartDataGuru,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top', // Legend position
                        }
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var visitData = @json($visits); // Data dari controller

            var dates = visitData.map(v => v.date); // Ambil tanggal
            var counts = visitData.map(v => v.count); // Ambil jumlah kunjungan

            var ctx = document.getElementById("visitors").getContext("2d");

            new Chart(ctx, {
                type: 'line', // Grafik garis
                data: {
                    labels: dates, // Label sumbu-x
                    datasets: [{
                        label: 'Kunjungan',
                        data: counts, // Data sumbu-y
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang
                        borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                        borderWidth: 1, // Lebar garis
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true, // Mulai sumbu-y dari nol
                        },
                    },
                },
            });
        });
    </script>
@endsection
