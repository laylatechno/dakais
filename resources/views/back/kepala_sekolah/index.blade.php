@extends('back.layouts.app')
@section('title','Halaman Kepala Sekolah')
@section('subtitle','Menu Kepala Sekolah')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Kepala Sekolah - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="/kepala_sekolah/create" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
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
              <th>NIP</th>
              <th>Nama Kepala Sekolah</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Akhir</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>


                <?php $i = 1; ?>
                @foreach ($kepala_sekolah as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nip}}</td>
                    <td>{{ $p->nama_kepala_sekolah}}</td>
                    <td>{{ $p->tanggal_mulai}}</td>
                    <td>{{ $p->tanggal_akhir}}</td>
                    <td>
                      @if ($p->status == 'Aktif')
                          <span class="badge badge-success">Aktif</span>
                      @elseif ($p->status == 'NonAktif')
                          <span class="badge badge-danger">NonAktif</span>
                      @else
                          <span class="badge badge-secondary">Tidak Diketahui</span>
                      @endif
                  </td>
                     
                     
                
                    <td>
                        <a href="{{ route('kepala_sekolah.edit',$p->id)}}" class="btn btn-sm btn-warning" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ route('kepala_sekolah.destroy',$p->id)}}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" name="submit" style="color: white">
                                <i class="fas fa-trash-alt"></i> Delete</a>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
                @endforeach
            
  
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama Kepala Sekolah</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Akhir</th>
              <th>Status</th>
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