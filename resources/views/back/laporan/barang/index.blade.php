@extends('back.layouts.app')
@section('title','Laporan Halaman Barang')
@section('subtitle','Menu Barang')

<!-- Add these links in the head section of your layout file -->

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Data Barang - {{ $profil->nama_sekolah }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="tanggal_awal">Tanggal Barang Masuk Awal:</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="start_date" value="{{ $filterStartDate }}">
                        <!-- Let's move the button here -->
                        <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-search"></i> Filter Berdasarkan Range</button>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_akhir">Tanggal Barang Masuk Akhir:</label>
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
                            <th>Tanggal Masuk</th>
                            <th>Kategori Barang</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Jumlah Kondisi Baik</th>
                            <th>Jumlah Kondisi Sedang</th>
                            <th>Jumlah Kondisi Rusak</th>
                            <th>Status</th>
                            <th>Nama Ruangan</th>
                            <th>Harga Perolehan</th>
                            <th>Asal</th>
                            <th>PIC</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $p)
                        <tr>
                            <!-- Add other column data as needed -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->tanggal_masuk }}</td>
                            <td>{{ $p->nama_kategori_barang }}</td>
                            <td>{{ $p->kode_barang }}</td>
                            <td>{{ $p->nama_barang }}</td>
                            <td>{{ $p->merk }}</td>
                            <td>{{ $p->type }}</td>
                            <td>{{ $p->kondisi_baik }}</td>
                            <td>{{ $p->kondisi_sedang }}</td>
                            <td>{{ $p->kondisi_rusak }}</td>
                            <td>{{ $p->status }}</td>
                            <td>{{ $p->nama_ruangan }}</td>
                            <td>Rp. {{ number_format($p->harga_perolehan) }}</td>
                            <td>{{ $p->asal }}</td>
                            <td>{{ $p->pic }}</td>
                            <td>{{ $p->keterangan }}</td>
                             
                            <td>
                                @if($p->gambar)
                                <a href="/upload/barang/{{ $p->gambar }}" target="_blank">
                                    <img style="max-width:50px; max-height:50px" src="/upload/barang/{{ $p->gambar }}" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada gambar</span>
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
