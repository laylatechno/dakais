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
                            <!-- Add other column headers as needed -->
                            <th width="5%">No</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $p)
                        <tr>
                            <!-- Add other column data as needed -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_kelas }}</td>
                            <td>{{ $p->nama_guru }}</td>
                            <td>{{ $p->jumlah_siswa }}</td> <!-- Menampilkan jumlah siswa -->
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
