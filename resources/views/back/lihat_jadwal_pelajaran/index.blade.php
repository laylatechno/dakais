@extends('back.layouts.app')
@section('title','Halaman Jadwal Pelajaran')
@section('subtitle','Menu Jadwal Pelajaran')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lihat Jadwal Pelajaran - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
             
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>


              @foreach ($jadwal_pelajaran as $kelas_id => $jadwal_per_kelas)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jadwal_per_kelas->first()->kelas->nama_kelas }}</td>
                  <td>
                      <a href="{{ route('tampilkan-jadwal', ['kelasId' => $kelas_id]) }}" class="btn btn-sm btn-warning" style="color: black"><i class="fas fa-edit"></i> Detail</a>
                  </td>
              </tr>
              @endforeach
          
          

          </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
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