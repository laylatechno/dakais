@extends('back.layouts.app')
@section('title','Halaman Nilai Siswa')
@section('subtitle','Menu Nilai Siswa')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Nilai Siswa - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="/nilai_siswa/create" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
            @if ($message = Session::get('message'))
            <div class="alert alert-success" role="alert">
                {{ $message}}
            </div> 
            @endif

            @if ($message = Session::get('messagehapus'))
            <div class="alert alert-danger" role="alert">
                {{ $message}}
            </div> 
            @endif
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tahun Ajaran</th>
              <th>Siswa</th>
              <th>Kelas</th>
              <th>Mapel</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>


                
                @foreach ($nilai_siswa as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->tahunAjaran->nama_tahun_ajaran}}</td>
                    <td>{{ $p->siswa->nama_siswa}}</td>
                    <td>{{ $p->kelas->nama_kelas}}</td>
                    <td>{{ $p->mapel->nama_mapel}}</td>
                     
                     
                     
                
                    <td>
                        <a href="{{ route('nilai_siswa.edit',$p->id)}}" class="btn btn-sm btn-warning" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ route('nilai_siswa.destroy',$p->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" name="submit" style="color: white">
                                <i class="fas fa-trash-alt"></i> Delete</a>
                            </button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            
  
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>Tahun Ajaran</th>
              <th>Siswa</th>
              <th>Kelas</th>
              <th>Mapel</th>
              <th>Aksi</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
     
       
 
@endsection