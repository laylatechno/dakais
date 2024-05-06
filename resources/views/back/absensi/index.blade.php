@extends('back.layouts.app')
@section('title', 'Halaman Absensi')
@section('subtitle', 'Menu Absensi')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Absensi - {{ $profil->nama_sekolah }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="/absensi/create" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @endif

                    @if ($message = Session::get('messagehapus'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Hari</th>
                                <th>Guru</th>
                                <th>Siswa</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
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
                                    <td>
                                        <a href="{{ route('absensi.edit', $p->id) }}" class="btn btn-sm btn-warning"
                                            style="color: black"><i class="fas fa-edit"></i> Edit</a>
                                        <form onsubmit="return confirm('Yakin mau hapus data?')"
                                            action="{{ route('absensi.destroy', $p->id) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" style="color: white">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
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
