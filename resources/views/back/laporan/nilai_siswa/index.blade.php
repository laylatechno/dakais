@extends('back.layouts.app')
@section('title','Laporan Halaman Kelas')
@section('subtitle','Menu Kelas')

<!-- Add these links in the head section of your layout file -->

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Data Kelas - SMPIT Maryam</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

           
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Total Nilai</th>
                            <th>Keterangan</th>
                            <th>Detail Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai_siswa as $p)
                        <tr>
                            <!-- Add other column data as needed -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_tahun_ajaran }}</td>
                            <td>{{ $p->nama_siswa }}</td>
                            <td>{{ $p->nama_kelas }}</td>
                            <td>{{ $p->nama_mapel }}</td>
                            <td>{{ $p->total_nilai }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{!! $p->detail_nilai !!}</td>


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
