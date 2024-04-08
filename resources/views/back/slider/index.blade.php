@extends('back.layouts.app')
@section('title','Halaman Slider')
@section('subtitle','Menu Slider')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Slider - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="/slider/create" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
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
              <th>Nama</th>
              <th>Keterangan</th>
              <th>Link</th>
              <th>Urutan</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>


                <?php $i = 1; ?>
                @foreach ($slider as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama_slider}}</td>
                    <td>{{ substr($p->keterangan, 0, 50) }}{{ strlen($p->keterangan) > 50 ? '...' : '' }}</td>

                    <td>{{ $p->link}}</td>
                    <td>{{ $p->urutan}}</td>
                    <td><a href="/upload/slider/{{ $p->gambar}}" target="_blank"><img style="max-width:50px; max-height:50px" src="/upload/slider/{{ $p->gambar}}" alt=""></a></td>
                                  
                     
                     
                
                    <td>
                        <a href="{{ route('slider.edit',$p->id)}}" class="btn btn-sm btn-warning" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ route('slider.destroy',$p->id)}}" class="d-inline" method="POST">
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
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Link</th>
                <th>Urutan</th>
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