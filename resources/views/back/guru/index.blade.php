@extends('back.layouts.app')
@section('title','Halaman Guru')
@section('subtitle','Menu Guru')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Guru - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="/guru/create" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
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
              <th>Kode Guru</th>
              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Status</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>


                <?php $i = 1; ?>
                @foreach ($guru as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nip}}</td>
                    <td>{{ $p->kode_guru}}</td>
                    <td>{{ $p->nama_guru}}</td>
                    <td>{{ $p->tempat_lahir}}</td>
                    <td>{{ $p->status}}</td>
                    <td>
                      @if($p->gambar)
                          <a href="/upload/guru/{{ $p->gambar}}" target="_blank">
                              <img style="max-width:50px; max-height:50px" src="/upload/guru/{{ $p->gambar}}" alt="">
                          </a>
                      @else
                          <span class="badge badge-warning">Tidak ada gambar</span>
                      @endif
                    </td>
                    
                     
                
                    <td>
                        <a href="{{ route('guru.edit',$p->id)}}" class="btn btn-sm btn-warning" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ route('guru.destroy',$p->id)}}" class="d-inline" method="POST">
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
              <th>Kode Guru</th>
              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Status</th>
              <th>Gambar</th>
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