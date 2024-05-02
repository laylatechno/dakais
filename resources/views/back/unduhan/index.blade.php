@extends('back.layouts.app')
@section('title','Halaman Unduhan')
@section('subtitle','Menu Unduhan')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Unduhan - {{ $profil->nama_sekolah }}</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-surat-keluar"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Publish</th>
                <th>Nama Unduhan</th>
                <th>Kategori</th>
                <th>Thumbnail</th>
                <th>File</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
  
                @foreach ($unduhan as $p)
                        <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->tanggal_publish }}</td>
                    <td>{{ $p->nama_unduhan }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>
                      @if($p->thumbnail)
                          <a href="/upload/unduhan/{{ $p->thumbnail}}" target="_blank">
                              <img style="max-width:50px; max-height:50px" src="/upload/unduhan/{{ $p->thumbnail}}" alt="">
                          </a>
                      @else
                          <span class="badge badge-warning">Tidak ada thumbnail</span>
                      @endif
                    </td>
            
                    <td>
                      @if($p->file)
                          @php
                              $extension = pathinfo($p->file, PATHINFO_EXTENSION);
                              $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                          @endphp
  
                          @if(in_array($extension, $imageExtensions))
                              <a href="/upload/unduhan/{{ $p->file }}" target="_blank">
                                  <img style="max-width:50px; max-height:50px" src="/upload/unduhan/{{ $p->file }}" alt="">
                              </a>
                          @else
                              <a href="/upload/unduhan/{{ $p->file }}" download>
                                  <i class="fas fa-file"></i> Download
                              </a>
                          @endif
                      @else
                          <span class="badge badge-warning">Tidak ada unduhan</span>
                      @endif
                  </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-surat-keluar-edit" data-id="{{ $p->id }}" style="color: black">
                        <i class="fas fa-edit"></i>  Edit
                     </a>
                     <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}" style="color: white">
                      <i class="fas fa-trash"></i> Delete
                    </button>
                  
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

  {{-- Modal Tambah Data --}}
  <div class="modal fade" id="modal-surat-keluar">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Unduhan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <!-- Main content -->
    
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
               
                <form id="form-surat-keluar" action="" method="POST" enctype="multipart/form-data">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

      
                  <div class="row">  
                    <div class="col-12">
                      <div class="form-group" id="tanggal_publish_container">
                        <label for="tanggal_publish">Tanggal Publish</label>  
                        <input type="date" class="form-control" name="tanggal_publish" id="tanggal_publish" value="{{ now()->format('Y-m-d') }}" >
                      </div>
                    </div>      
                      <div class="col-6">
                        <div class="form-group" id="kategori_container">
                          <label for="kategori">Kategori</label>  
                          <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="nama_unduhan_container">
                          <label for="nama_unduhan">Nama unduhan</label>  
                          <input type="text" class="form-control " name="nama_unduhan" id="nama_unduhan" placeholder="Nama Unduhan">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group" id="link_container">
                          <label for="link">Link</label>  
                          <input type="text" class="form-control " name="link" id="link" placeholder="Link">
                        </div>
                      </div>
                     
                      <div class="col-6">
                        <div class="form-group" id="thumbnail_container">
                          <label for="type">Thumbnail</label>  
                          <input type="file" class="form-control" name="thumbnail" id="thumbnail"  >
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-group" id="file_container">
                          <label for="type">File</label>  
                          <input type="file" class="form-control" name="file" id="file"  >
                        </div>
                      </div> 
                   
                     
                  </div>
                  <!-- /.card-body -->
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-save-surat-keluar"><i class="fas fa-save"></i> Simpan</button>
                      <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                      
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.card -->


        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  {{-- Modal Edit Data --}}
  <div class="modal fade" id="modal-surat-keluar-edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Edit Unduhan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <!-- Main content -->
    
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
               
                <form id="form-surat-keluar-edit" action="" method="POST">
                  @method('PUT')
                  @csrf
                  <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
                  <div class="card-body">

      
                    <div class="row">  
                      <div class="col-12">
                        <div class="form-group" id="tanggal_publish_edit_container">
                          <label for="tanggal_publish_edit">Tanggal Publish</label>  
                          <input type="date" class="form-control" name="tanggal_publish" id="tanggal_publish_edit" value="{{ now()->format('Y-m-d') }}" >
                        </div>
                      </div>      
                        <div class="col-6">
                          <div class="form-group" id="kategori_edit_container">
                            <label for="kategori_edit">Kategori</label>  
                            <input type="text" class="form-control" name="kategori" id="kategori_edit" placeholder="Kategori">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group" id="nama_unduhan_edit_container">
                            <label for="nama_unduhan_edit">Nama unduhan</label>  
                            <input type="text" class="form-control " name="nama_unduhan" id="nama_unduhan_edit" placeholder="Nama Unduhan">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group" id="link_edit_container">
                            <label for="link_edit">Link</label>  
                            <input type="text" class="form-control " name="link" id="link_edit" placeholder="Link">
                          </div>
                        </div>
                       
                        <div class="col-6">
                          <div class="form-group" id="thumbnail_edit_container">
                            <label for="type">Thumbnail</label>  
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail_edit"  >
                          </div>
                        </div>
                        
                        <div class="col-6">
                          <div class="form-group" id="file_edit_container">
                            <label for="type">File</label>  
                            <input type="file" class="form-control" name="file" id="file_edit"  >
                          </div>
                        </div> 
                     
                       
                    </div>

                    </div>
               
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-surat-keluar"><i class="fas fa-save"></i> Update</button>
                      <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                      
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.card -->


        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
   

 
  
  @endsection


 
@push('scripts')
 
<!-- Memuat skrip JavaScript Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
 <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



{{-- PERINTAH SIMPAN DATA --}}
<script>
    $(document).ready(function() {
      $('#form-surat-keluar').submit(function(event) {
        event.preventDefault();
        const tombolSimpan = $('#btn-save-surat-keluar')

        // Buat objek FormData
        var formData = new FormData(this);

        $.ajax({
          url: '{{ route("unduhan.store") }}',
          type: 'POST',
          data: formData,
          processData: false, // Menghindari jQuery memproses data
          contentType: false, // Menghindari jQuery mengatur Content-Type
          beforeSend: function() {
            $('form').find('.error-message').remove()
            tombolSimpan.prop('disabled', true)
          },
          success: function(response) {
            $('#modal-surat-keluar').modal('hide');
            Swal.fire({
              title: 'Sukses!',
              text: response.message,
              icon: 'success',
              confirmButtonText: 'OK'
            }).then(function() {
              location.reload();
            });
          },
          complete: function() {
            tombolSimpan.prop('disabled', false);
          },
          error: function(xhr) {
            if (xhr.status !== 422) {
              $('#modal-surat-keluar').modal('hide');
            }
            var errorMessages = xhr.responseJSON.errors;
            var errorMessage = '';
            $.each(errorMessages, function(key, value) {
              errorMessage += value + '<br>';
            });
            Swal.fire({
              title: 'Error!',
              html: errorMessage,
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        });
      });
    });

</script>
{{-- PERINTAH SIMPAN DATA --}}



{{-- PERINTAH EDIT DATA --}}
<script>
  $(document).ready(function() {
    // $('.dataTable tbody').on('click', 'td .btn-edit', function(e) {
    $('.btn-edit').click(function(e) {
        e.preventDefault();
         
        var id = $(this).data('id');

            $.ajax({
              method: 'GET',
                url: '/unduhan/' + id + '/edit',
                success: function(data) {
                  $('#id').val(data.id);
                  $('#tanggal_publish_edit').val(data.tanggal_publish);
                  $('#nama_unduhan_edit').val(data.nama_unduhan);
                  $('#kategori_edit').val(data.kategori);
                  $('#link_edit').val(data.link);
                  $('#thumbnail_edit').val(data.thumbnail);
                  $('#file_edit').val(data.file);  

                   

                   
                    
                    $('#modal-surat-keluar-edit').modal('show');
                    $('#id').val(id);
                },

                error: function(xhr) {
                    // Tangani kesalahan jika ada
                    alert('Error: ' + xhr.statusText);
                }
            });
          });
         
  });
</script>
{{-- PERINTAH EDIT DATA --}}


{{-- PERINTAH UPDATE DATA --}}
<script>
  $(document).ready(function() {
      $('#btn-update-surat-keluar').click(function(e) {
          e.preventDefault();
          const tombolUpdate = $('#btn-update-surat-keluar');
          var id = $('#id').val();
          var formData = new FormData($('#form-surat-keluar-edit')[0]);

          $.ajax({
              type: 'POST',
              url: '/unduhan/update/' + id,
              data: formData,
              headers: {
                  'X-HTTP-Method-Override': 'PUT'
              },
              contentType: false,
              processData: false,
              beforeSend: function(){
                  $('form').find('.error-message').remove();
                  tombolUpdate.prop('disabled', true);
              },
              success: function(response) {
                  $('#modal-surat-keluar-edit').modal('hide');
                  Swal.fire({
                      title: 'Sukses!',
                      text: response.message,
                      icon: 'success',
                      confirmButtonText: 'OK'
                  }).then((result) => {
                      if (result.isConfirmed || result.isDismissed) {
                          location.reload();
                      }
                  });
              },
              complete: function() {
                  tombolUpdate.prop('disabled', false);
              },
              error: function(xhr) {
                  if(xhr.status !== 422) {
                      $('#modal-surat-keluar-edit').modal('hide');
                  }
                  var errorMessages = xhr.responseJSON.errors;
                  var errorMessage = '';
                  $.each(errorMessages, function(key, value) {
                      errorMessage += value + '<br>';
                  });
                  Swal.fire({
                      title: 'Error!',
                      html: errorMessage,
                      icon: 'error',
                      confirmButtonText: 'OK'
                  });
              }
          });
      });
  });

</script>
{{-- PERINTAH UPDATE DATA --}}

{{-- PERINTAH DELETE DATA --}}
<script>
  $(document).ready(function() {
    $('.dataTable tbody').on('click', 'td .btn-hapus', function(e) {
      e.preventDefault();
      var id = $(this).data('id');

      Swal.fire({
        title: 'Apakah yakin akan menghapus data ?',
        text: "data tidak bisa dikembalikan jika sudah dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Jika dikonfirmasi, lakukan permintaan AJAX ke endpoint penghapusan
          $.ajax({
            url: '/unduhan/' + id,
            type: 'DELETE',
            data: {
              "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
              if (response.hasOwnProperty('message') && response.message.includes('terkait dengan mutasi_surat-keluar')) {
                Swal.fire({
                  title: 'Oops!',
                  text: response.message,
                  icon: 'error',
                  confirmButtonText: 'OK'
                });
              } else if (response.hasOwnProperty('message') && response.message === 'Data Berhasil Dihapus') {
                Swal.fire({
                  title: 'Sukses!',
                  text: response.message,
                  icon: 'success',
                  confirmButtonText: 'OK'
                }).then((result) => {
                  if (result.isConfirmed || result.isDismissed) {
                    location.reload(); // Merefresh halaman saat pengguna menekan OK pada SweetAlert
                  }
                });
              } else {
                Swal.fire({
                  title: 'Gagal!',
                  text: response.message || 'Gagal menghapus data',
                  icon: 'error',
                  confirmButtonText: 'OK'
                });
              }
            },
            error: function(xhr) {
              Swal.fire({
                title: 'Error!',
                text: 'Terjadi kesalahan saat menghapus data/masih terkait dengan tabel lain',
                icon: 'error',
                confirmButtonText: 'OK'
              });
              console.log(xhr.responseText); // Tampilkan pesan error jika terjadi
            }
          });
        }
      });
    });
  });
</script>
{{-- PERINTAH DELETE DATA --}}



 
@endpush


@push('css')
<link rel="stylesheet" href="{{ asset('themplete/back/plugins/select2/css/custom.css') }}">
<style>
  .select2-container{
    width: 100% !important;
    
  }
</style>
@endpush





 