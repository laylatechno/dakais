@extends('back.layouts.app')
@section('title','Halaman Surat Masuk')
@section('subtitle','Menu Surat Masuk')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Surat Masuk - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-surat-masuk"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Jenis Surat Masuk</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Disposisi</th>
                <th>Lampiran</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
  
                @foreach ($surat_masuk as $p)
                        <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->jenis_surat }}</td>
                    <td>{{ $p->pengirim }}</td>
                    <td>{{ $p->perihal }}</td>
                    <td>{{ $p->disposisi }}</td>
                    <td>
                      @if($p->lampiran)
                          @php
                              $extension = pathinfo($p->lampiran, PATHINFO_EXTENSION);
                              $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                          @endphp
  
                          @if(in_array($extension, $imageExtensions))
                              <a href="/upload/surat_masuk/{{ $p->lampiran }}" target="_blank">
                                  <img style="max-width:50px; max-height:50px" src="/upload/surat_masuk/{{ $p->lampiran }}" alt="">
                              </a>
                          @else
                              <a href="/upload/surat_masuk/{{ $p->lampiran }}" download>
                                  <i class="fas fa-file"></i> Download
                              </a>
                          @endif
                      @else
                          <span class="badge badge-warning">Tidak ada lampiran</span>
                      @endif
                  </td>
                    <td>
                      <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-surat-masuk-edit" data-id="{{ $p->id }}" style="color: black">
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
  <div class="modal fade" id="modal-surat-masuk">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Surat Masuk</h4>
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
               
                <form id="form-surat-masuk" action="" method="POST" enctype="multipart/form-data">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

      
                  <div class="row">  
                    <div class="col-12">
                      <div class="form-group" id="tanggal_masuk_container">
                        <label for="tanggal_masuk">Tanggal Masuk</label>  
                        <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="{{ now()->format('Y-m-d') }}" >
                      </div>
                    </div>      
                      <div class="col-6">
                        <div class="form-group" id="nomor_surat_container">
                          <label for="nomor_surat">Nomor Surat Masuk</label>  
                          <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Masukkan Nomor Surat Masuk">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="pengirim_container">
                          <label for="pengirim">Pengirim</label>  
                          <input type="text" class="form-control " name="pengirim" id="pengirim" placeholder="Masukkan Pengirim">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="jenis_surat_container">
                          <label for="jenis_surat">Jenis Surat</label>  
                          <select class="form-control" name="jenis_surat" id="jenis_surat">
                                  <option value="">--Pilih Jenis Surat--</option>
                                  <option value="Undangan">Undangan</option>
                                  <option value="Perintah">Perintah</option>
                                  <option value="Umum">Umum</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="perihal_container">
                          <label for="perihal">Perihal</label>  
                          <input type="text" class="form-control " name="perihal" id="perihal" placeholder="Masukkan Perihal">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="lampiran_container">
                          <label for="type">Lampiran</label>  
                          <input type="file" class="form-control" name="lampiran" id="lampiran"  >
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="disposisi_container">
                          <label for="disposisi">Disposisi</label>  
                          <input type="text" class="form-control" name="disposisi" id="disposisi" placeholder="Masukkan Disposisi">
                        </div>
                      </div>

                      <div class="col-12">
                        <div class="form-group" id="keterangan_container">
                          <label for="keterangan">Keterangan</label>  
                      <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                        </div>
                      </div>
                   
                     
                  </div>
                  <!-- /.card-body -->
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-save-surat-masuk"><i class="fas fa-save"></i> Simpan</button>
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
  <div class="modal fade" id="modal-surat-masuk-edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Edit Surat Masuk</h4>
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
               
                <form id="form-surat-masuk-edit" action="" method="POST">
                  @method('PUT')
                  @csrf
                  <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
                  <div class="card-body">

      
                    <div class="row">  
                      <div class="col-12">
                          <div class="form-group" id="tanggal_masuk_container_edit">
                              <label for="tanggal_masuk_edit">Tanggal Masuk</label>  
                              <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk_edit" value="{{ now()->format('Y-m-d') }}">
                          </div>
                      </div>      
                      <div class="col-6">
                          <div class="form-group" id="nomor_surat_container_edit">
                              <label for="nomor_surat_edit">Nomor Surat Masuk</label>  
                              <input type="text" class="form-control" name="nomor_surat" id="nomor_surat_edit" placeholder="Masukkan Nomor Surat Masuk">
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group" id="pengirim_container_edit">
                              <label for="pengirim_edit">Pengirim</label>  
                              <input type="text" class="form-control" name="pengirim" id="pengirim_edit" placeholder="Masukkan Pengirim">
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group" id="jenis_surat_container_edit">
                              <label for="jenis_surat_edit">Jenis Surat</label>  
                              <select class="form-control" name="jenis_surat" id="jenis_surat_edit">
                                  <option value="">--Pilih Jenis Surat--</option>
                                  <option value="Undangan">Undangan</option>
                                  <option value="Perintah">Perintah</option>
                                  <option value="Umum">Umum</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group" id="perihal_container_edit">
                              <label for="perihal_edit">Perihal</label>  
                              <input type="text" class="form-control" name="perihal" id="perihal_edit" placeholder="Masukkan Perihal">
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group" id="lampiran_container_edit">
                              <label for="lampiran_edit">Lampiran</label>  
                              <input type="file" class="form-control" name="lampiran" id="lampiran_edit">
                          </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="disposisi_container_edit">
                            <label for="disposisi_edit">Disposisi</label>
                            <input type="text" class="form-control" name="disposisi" id="disposisi_edit" placeholder="Masukkan Disposisi">
                        </div>
                    </div>
                    
                      <div class="col-12">
                          <div class="form-group" id="keterangan_container_edit">
                              <label for="keterangan_edit">Keterangan</label>  
                              <textarea class="form-control" name="keterangan" id="keterangan_edit" cols="30" rows="2"></textarea>
                          </div>
                      </div>
                    </div>
               
  
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-surat-masuk"><i class="fas fa-save"></i> Update</button>
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
      $('#form-surat-masuk').submit(function(event) {
        event.preventDefault();
        const tombolSimpan = $('#btn-save-surat-masuk')

        // Buat objek FormData
        var formData = new FormData(this);

        $.ajax({
          url: '{{ route("surat_masuk.store") }}',
          type: 'POST',
          data: formData,
          processData: false, // Menghindari jQuery memproses data
          contentType: false, // Menghindari jQuery mengatur Content-Type
          beforeSend: function() {
            $('form').find('.error-message').remove()
            tombolSimpan.prop('disabled', true)
          },
          success: function(response) {
            $('#modal-surat-masuk').modal('hide');
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
              $('#modal-surat-masuk').modal('hide');
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
                url: '/surat_masuk/' + id + '/edit',
                success: function(data) {
                  $('#id').val(data.id);
                  $('#tanggal_masuk_edit').val(data.tanggal_masuk);
                  $('#nomor_surat_edit').val(data.nomor_surat);
                  $('#pengirim_edit').val(data.pengirim);
                  $('#jenis_surat_edit').val(data.jenis_surat);
                  $('#perihal_edit').val(data.perihal);
                  $('#disposisi_edit').val(data.disposisi); // Pastikan kode ini ada di dalam success
                  $('#keterangan_edit').val(data.keterangan);

                   

                   
                    
                    $('#modal-surat-masuk-edit').modal('show');
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
      $('#btn-update-surat-masuk').click(function(e) {
          e.preventDefault();
          const tombolUpdate = $('#btn-update-surat-masuk');
          var id = $('#id').val();
          var formData = new FormData($('#form-surat-masuk-edit')[0]);

          $.ajax({
              type: 'POST',
              url: '/surat_masuk/update/' + id,
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
                  $('#modal-surat-masuk-edit').modal('hide');
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
                      $('#modal-surat-masuk-edit').modal('hide');
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
            url: '/surat_masuk/' + id,
            type: 'DELETE',
            data: {
              "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
              if (response.hasOwnProperty('message') && response.message.includes('terkait dengan mutasi_surat-masuk')) {
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





 