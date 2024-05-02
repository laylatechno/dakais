@extends('back.layouts.app')
@section('title','Laporan Halaman Mutasi Barang')
@section('subtitle','Menu Mutasi Barang')

<!-- Add these links in the head section of your layout file -->

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Data Mutasi Barang - {{ $profil->nama_sekolah }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="tanggal_awal">Tanggal Mutasi Barang Masuk Awal:</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="start_date" value="{{ $filterStartDate }}">
                        <!-- Let's move the button here -->
                        <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-search"></i> Filter Berdasarkan Range</button>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_akhir">Tanggal Mutasi Barang Masuk Akhir:</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="end_date" value="{{ $filterEndDate }}">
                    </div>
                    <!-- Remove the third column -->
                </div>
                
                
              </form>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!-- Add other column headers as needed -->
                            <th>No</th>
                            <th>Tanggal Mutasi</th>
                            <th>Tanggal Kembali</th>
                            <th>Jenis Mutasi</th>
                            <th>Kode Mutasi</th>
                            <th>Nama Barang</th>
                            <th>qty</th>
                            <th>Kondisi Barang</th>
                            <th>Jumlah Tersedia</th>
                            <th>Ruangan Asal</th>
                            <th>Ruangan Tujuan</th>
                            <th>PIC</th>
                            <th>Keterangan</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasi_barang as $p)
                        <tr>
                            <!-- Add other column data as needed -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->tanggal_mutasi }}</td>
                            <td>{{ $p->tanggal_kembali }}</td>
                            <td>{{ $p->jenis_mutasi }}</td>
                            <td>{{ $p->kode_mutasi }}</td>
                            <td>{{ $p->nama_barang }}</td>
                             
                            <td>{{ $p->qty }}</td>
                            <td>{{ $p->kondisi_barang }}</td>
                            <td>{{ $p->jumlah_tersedia }}</td>
                            <td>{{ $p->nama_ruangan_asal }}</td>
                            <td>{{ $p->nama_ruangan_tujuan }}</td>
                            <td>{{ $p->pic }}</td>
                            <td>{{ $p->keterangan }}</td>
                             
                            <td>
                                @if($p->bukti)
                                <a href="/upload/mutasi_barang/{{ $p->bukti }}" target="_blank">
                                    <img style="max-width:50px; max-height:50px" src="/upload/mutasi_barang/{{ $p->bukti }}" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada bukti</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection

@section('scripts')
 
 

@endsection
