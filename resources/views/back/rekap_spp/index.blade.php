@extends('back.layouts.app')
@section('title', 'Halaman Rekap SPP')
@section('subtitle', 'Menu Rekap SPP')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Rekap SPP - {{ $profil->nama_sekolah }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="unhide">



                    <table id="example4" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>No Telp Ayah</th>
                                <th>No Telp Ibu</th>
                                <th>No Telp Wali</th>


                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rekap_spp_head as $group)
                                <!-- ini adalah kelompok dari siswa_id -->
                                @foreach ($group as $p)
                                    <!-- ini adalah iterasi pada item dalam kelompok -->
                                    <tr>
                                        <td>{{ $loop->parent->iteration }}</td>
                                        <!-- parent untuk mendapatkan iteration dari kelompok -->
                                        <td>{{ $p->siswa->nis }}</td>
                                        <td>{{ $p->siswa->nama_siswa }}</td>
                                        <td>{{ $p->penempatanKelas->nama_kelas ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $p->siswa->no_telp_ayah ?? '-' }}</td>
                                        <td>{{ $p->siswa->no_telp_ibu ?? '-' }}</td>
                                        <td>{{ $p->siswa->no_telp_wali ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('rekap_spp.index', ['siswa_id' => $p->siswa_id]) }}"
                                                class="btn btn-sm btn-warning" style="color: black"
                                                data-nama-siswa="{{ $p->siswa->nama_siswa }}"> <!-- Tambahkan nama siswa -->
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>



                                        </td>
                                    </tr>
                                @break

                                <!-- Hanya ambil item pertama dari setiap kelompok -->
                            @endforeach
                        @endforeach






                    </tbody>

                </table>



            </div>


            <div class="card-body" id="tabel2">


                <h3>Bulan Sudah Dibayarkan: <span
                        id="nama_siswa_belum_bayar">{{ $nama_siswa ?? 'Belum Ada Siswa' }}</span></h3>
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="background-color: grey; color:azure;">No</th>
                            <th style="background-color: grey; color:azure;">Kode Pembayaran</th>
                            <th style="background-color: grey; color:azure;">Tanggal Rekap</th>
                            <th style="background-color: grey; color:azure;">NIS</th>
                            <th style="background-color: grey; color:azure;">Nama Siswa</th>
                            <th style="background-color: grey; color:azure;">Jumlah SPP per bulan</th>
                            <th style="background-color: grey; color:azure;">Jumlah Bayar</th>
                            <th style="background-color: grey; color:azure;">Bulan</th>
                            <th style="background-color: grey; color:azure;">Tahun</th>
                            <th style="background-color: grey; color:azure;">Metode Pembayaran</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($rekap_spp_detail as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kode_pembayaran }}</td>
                                <td>{{ $p->tanggal_bayar }}</td>
                                <td>{{ $p->siswa->nis }}</td>
                                <td>{{ $p->siswa->nama_siswa }}</td>
                                <td>Rp. {{ number_format($p->jumlah_spp) }}</td>
                                <td>Rp. {{ number_format($p->jumlah_bayar) }}</td>
                                <td>{{ $p->sppRelasi->bulan }}
                                <td>{{ $p->sppRelasi->tahun }}
                                </td>


                                <td>{{ $p->metode_pembayaran }}</td>

                            </tr>
                        @endforeach





                    </tbody>

                </table>

                <br>
                <hr>
                <!-- Pada bagian view di mana Anda ingin menampilkan nama siswa -->
                <h3>Bulan Yang Belum Dibayarkan: <span
                        id="nama_siswa_belum_bayar">{{ $nama_siswa ?? 'Belum Ada Siswa' }}</span></h3>

                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            {{-- <th style="background-color: grey; color:azure;">ID</th> --}}
                            <th style="background-color: grey; color:azure;">Bulan</th>
                            <th style="background-color: grey; color:azure;">Tahun</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unpaid_spp as $spp)
                            <tr>

                                {{-- <td>{{ $spp->id }}</td> --}}
                                <td>{{ $spp->bulan }}</td>
                                <td>{{ $spp->tahun }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr><br>
                <div id="unhide">
                    <a href="/rekap_spp" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>

                    <button id="btnPrint" class="btn btn-success" style="color:white;"><i class="fas fa-print"></i>
                        Cetak</button>
                </div>





            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
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

 