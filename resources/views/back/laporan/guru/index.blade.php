@extends('back.layouts.app')
@section('title','Laporan Halaman Guru')
@section('subtitle','Menu Guru')

<!-- Add these links in the head section of your layout file -->

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Data Guru - SMPIT Maryam</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="tanggal_awal">Tanggal Masuk Awal:</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="start_date" value="{{ $filterStartDate }}">
                        <!-- Let's move the button here -->
                        <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-search"></i> Filter Berdasarkan Range</button>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_akhir">Tanggal Masuk Akhir:</label>
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
                            <th>NIP</th>
                            <th>Kode Guru</th>
                            <th>Nama</th>
                            <th>Gelar Depan</th>
                            <th>Gelar Belakang</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th>Email</th>
                            <th>Instagram</th>
                            <th>Honor</th>
                            <th>Tunjangan 1</th>
                            <th>Tunjangan 2</th>
                            <th>Tunjangan 3</th>
                            <th>Tunjangan 4</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $p)
                        <tr>
                            <!-- Add other column data as needed -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nip }}</td>
                            <td>{{ $p->kode_guru }}</td>
                            <td>{{ $p->nama_guru }}</td>
                            <td>{{ $p->gelar_depan }}</td>
                            <td>{{ $p->gelar_belakang }}</td>
                            <td>{{ $p->tempat_lahir }}</td>
                            <td>{{ $p->tanggal_lahir }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->no_telp }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->instagram }}</td>
                            <td>{{ $p->honor }}</td>
                            <td>{{ $p->tunjangan_1 }}</td>
                            <td>{{ $p->tunjangan_2 }}</td>
                            <td>{{ $p->tunjangan_3 }}</td>
                            <td>{{ $p->tunjangan_4 }}</td>
                            <td>{{ $p->tanggal_masuk }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                @if($p->gambar)
                                <a href="/upload/guru/{{ $p->gambar }}" target="_blank">
                                    <img style="max-width:50px; max-height:50px" src="/upload/guru/{{ $p->gambar }}" alt="">
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
