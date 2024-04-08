@extends('back.layouts.app')
@section('title','Halaman Pembelian')
@section('subtitle','Menu Pembelian')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pembelian - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="/pembelian/create" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Tambah Data</a>
            @if ($message = Session::get('message'))
            <div class="alert alert-success" role="alert">
                {{ $message}}
            </div> 
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
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
              <th>Tanggal Pembelian</th>
              <th>Kode Pembelian</th>
              <th>Supplier</th>
              <th>Total</th>
              <th>PIC</th>
              <th width="15%">Aksi</th>
            </tr>
            </thead>
            <tbody>


                <?php $i = 1; ?>
                @foreach ($pembelian as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->tanggal_pembelian}}</td>
                    <td>{{ $p->kode_pembelian}}</td>
                    <td>{{ $p->nama_supplier}}</td>
                    <td>Rp. {{ number_format($p->total_bayar) }}</td>
                    <td>{{ $p->pic}}</td>
                 
                     
                     
                     
                
                    <td>
                        <a href="{{ route('pembelian.edit',$p->id)}}" class="btn btn-sm btn-success" style="color: rgb(250, 247, 247)"><i class="fas fa-print"></i> Cetak Invoice</a>
                        <form onsubmit="return confirm('Yakin mau hapus data?')" action="{{ route('pembelian.destroy',$p->id)}}" class="d-inline" method="POST">
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
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
     
       
 
@endsection