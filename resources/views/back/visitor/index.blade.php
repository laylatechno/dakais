@extends('back.layouts.app')
@section('title','Halaman Visitor')
@section('subtitle','Menu Visitor')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Visitor - {{ $profil->nama_sekolah }}</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
          
          <!-- Add this link/button in your view file -->
            

            {{-- <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-spp"><i class="fas fa-plus-circle"></i> Tambah Data</a>   --}}
            <a href="{{ route('lihat-kontak.delete-all') }}" class="btn btn-danger mb-3" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Semua Data, silahkan Back Up terlebih dahulu?')"><i class="fa fa-trash"></i> Hapus Semua Data</a>       
      
           
           
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Waktu</th>
              <th>IP Address</th>
              <th>User Agent</th>
              <th>Device</th>
              <th>Platform</th>
              <th>Browser</th>
              
              
            </tr>
            </thead>
            <tbody>

              @foreach ($visitor as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->visit_time }}</td>
                  <td>{{ $p->ip_address }}</td>
                  <td>{{ $p->user_agent }}</td>
                  <td>{{ $p->device }}</td>
                  <td>{{ $p->platform }}</td>
                  <td>{{ $p->browser }}</td>
                  
                 
                 
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


 
@push('scripts')
 
<!-- Memuat skrip JavaScript Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
 <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 
<!-- Script JavaScript untuk Tombol Hapus Semua Data -->
 

 
 

 
@endpush


@push('css')
<link rel="stylesheet" href="{{ asset('themplete/back/plugins/select2/css/custom.css') }}">
<style>
  .select2-container{
    width: 100% !important;
    
  }
</style>
@endpush





 