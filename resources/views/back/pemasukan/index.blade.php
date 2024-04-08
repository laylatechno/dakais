@extends('back.layouts.app')
@section('title','Halaman Pemasukan')
@section('subtitle','Menu Pemasukan')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pemasukan - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-pemasukan"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pemasukan</th>
              <th>Nama Pemasukan</th>
              <th>Jumlah Pemasukan</th>
              <th>PIC</th>
              <th>Bukti</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($pemasukan as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->tanggal_pemasukan }}</td>
                  <td>{{ $p->nama_pemasukan }}</td>
                  <td>Rp. {{ number_format($p->jumlah_pemasukan) }}</td>
                  <td>{{ $p->pic }}</td>
                  <td>
                    @if($p->bukti)
                        <a href="/upload/pemasukan/{{ $p->bukti}}" target="_blank">
                            <img style="max-width:50px; max-height:50px" src="/upload/pemasukan/{{ $p->bukti}}" alt="">
                        </a>
                    @else
                        <span class="badge badge-warning">Tidak ada bukti</span>
                    @endif
                  </td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-pemasukan-edit" data-id="{{ $p->id }}" style="color: black">
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
  <div class="modal fade" id="modal-pemasukan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Pemasukan</h4>
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
                <form id="form-pemasukan" action="" method="POST" enctype="multipart/form-data">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                 

                    
                    <div class="form-group" id="tanggal_pemasukan_container">
                      <label for="tanggal_pemasukan">Tanggal Pemasukan</label>  
                      <input type="date" class="form-control " name="tanggal_pemasukan" id="tanggal_pemasukan" value="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div class="form-group" id="nama_pemasukan_container">
                      <label for="nama_pemasukan">Nama Pemasukan</label>  
                      <input type="text" class="form-control " name="nama_pemasukan" id="nama_pemasukan" placeholder="Masukkan Nama Pemasukan">
                    </div>
                    <div class="form-group" id="jumlah_pemasukan_container">
                      <label for="jumlah_pemasukan">Jumlah Pemasukan</label>  
                      <input type="text" class="form-control jumlah_pemasukan" name="jumlah_pemasukan" id="jumlah_pemasukan" placeholder="Masukkan Jumlah Pemasukan">
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                    <script>
                        $(document).ready(function () {
                            $('.jumlah_pemasukan').on('input', function (e) {
                                var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                var formattedVal = addThousandSeparator(inputVal);
                                $(this).val(formattedVal);
                            });

                            function addThousandSeparator(num) {
                                var parts = num.toString().split(".");
                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                return parts.join(".");
                            }
                        });
                    </script>

                    <div class="form-group" id="keterangan_container">
                      <label for="keterangan">Keterangan</label>  
                      <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group" id="pic_container">
                      <label for="pic">PIC Pemasukan</label>  
                      <input type="text" class="form-control " name="pic" id="pic" placeholder="Masukkan PIC">
                    </div>
                   
                    <div class="form-group" id="bukti_container">
                      <label for="bukti">Bukti Pemasukan</label>  
                      <input type="file" class="form-control" name="bukti" id="bukti">
                    </div>


                    
                  


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save-pemasukan"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
                    
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
    <div class="modal fade" id="modal-pemasukan-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Pemasukan</h4>
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
                  <form id="form-pemasukan-edit" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
            
                    <div class="card-body">
  
   
                      <div class="form-group" id="tanggal_pemasukan_edit_container">
                        <label for="tanggal_pemasukan_edit">Tanggal Pemasukan</label>  
                        <input type="date" class="form-control " name="tanggal_pemasukan" id="tanggal_pemasukan_edit">
                      </div>
                      <div class="form-group" id="nama_pemasukan_edit_container">
                        <label for="nama_pemasukan_edit">Nama Pemasukan</label>  
                        <input type="text" class="form-control " name="nama_pemasukan" id="nama_pemasukan_edit" placeholder="Masukkan Nama Pemasukan">
                      </div>
                      <div class="form-group" id="jumlah_pemasukan_edit_container">
                        <label for="jumlah_pemasukan_edit">Jumlah Pemasukan</label>  
                        <input type="text" class="form-control jumlah_pemasukan_edit" name="jumlah_pemasukan" id="jumlah_pemasukan_edit" placeholder="Masukkan Jumlah Pemasukan">
                      </div>
  
                      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
                      <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                      <script>
                          $(document).ready(function () {
                              $('.jumlah_pemasukan_edit').on('input', function (e) {
                                  var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                  var formattedVal = addThousandSeparator(inputVal);
                                  $(this).val(formattedVal);
                              });
  
                              function addThousandSeparator(num) {
                                  var parts = num.toString().split(".");
                                  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                  return parts.join(".");
                              }
                          });
                      </script>
  
                      <div class="form-group" id="keterangan_edit_container">
                        <label for="keterangan_edit">Keterangan</label>  
                        <textarea class="form-control" name="keterangan" id="keterangan_edit" cols="30" rows="3"></textarea>
                      </div>
                      <div class="form-group" id="pic_edit_container">
                        <label for="pic_edit">PIC Pemasukan</label>  
                        <input type="text" class="form-control " name="pic" id="pic_edit" placeholder="Masukkan PIC">
                      </div>
                     
                      <div class="form-group" id="bukti_edit_container">
                        <label for="bukti_edit">Bukti Pemasukan</label>  
                 
                        <input type="file" class="form-control" name="bukti" id="bukti_edit">
                   
                        <div id="bukti_image_container"></div>
                        <br>
                        <!-- Tautan untuk mengunduh atau melihat gambar -->
                        <a id="bukti_download_link" href="" target="_blank">
                          
                        </a>
                      </div>
  
  
  
                      
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-pemasukan"><i class="fas fa-save"></i> Simpan</button>
                      <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span aria-hidden="true">&times;</span> Close</button>
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
      $('#form-pemasukan').submit(function(event) {
        event.preventDefault();
        const tombolSimpan = $('#btn-save-pemasukan')

        // Buat objek FormData
        var formData = new FormData(this);

        $.ajax({
          url: '{{ route("pemasukan.store") }}',
          type: 'POST',
          data: formData,
          processData: false, // Menghindari jQuery memproses data
          contentType: false, // Menghindari jQuery mengatur Content-Type
          beforeSend: function() {
            $('form').find('.error-message').remove()
            tombolSimpan.prop('disabled', true)
          },
          success: function(response) {
            $('#modal-pemasukan').modal('hide');
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
              $('#modal-pemasukan').modal('hide');
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
              pemasukan: 'GET',
                url: '/pemasukan/' + id + '/edit',
                success: function(data) {
                  // console.log(data); // Cek apakah data terisi dengan benar
                    // Mengisi data pada form modal
                    $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                    $('#tanggal_pemasukan_edit').val(data.tanggal_pemasukan);
                    $('#nama_pemasukan_edit').val(data.nama_pemasukan);
                    $('#jumlah_pemasukan_edit').val(data.jumlah_pemasukan);
                    $('#keterangan_edit').val(data.keterangan);
                    $('#pic_edit').val(data.pic);
                   // Tambahkan logika untuk menampilkan gambar bukti pada formulir edit
                    if (data.bukti) {
                      var buktiImg = '<img src="/upload/pemasukan/' + data.bukti + '" style="max-width: 100px; max-height: 100px;">';
                      var buktiLink = '<a href="/upload/pemasukan/' + data.bukti + '" target="_blank"><i class="fa fa-eye"></i> Lihat Bukti</a>';
                      $('#bukti_edit_container').append(buktiImg + '<br>' + buktiLink);
                    }
                    
                    $('#modal-pemasukan-edit').modal('show');
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
      $('#btn-update-pemasukan').click(function(e) {
          e.preventDefault();
          const tombolUpdate = $('#btn-update-pemasukan');
          var id = $('#id').val();
          var formData = new FormData($('#form-pemasukan-edit')[0]);

          $.ajax({
              type: 'POST',
              url: '/pemasukan/update/' + id,
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
                  $('#modal-pemasukan-edit').modal('hide');
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
                      $('#modal-pemasukan-edit').modal('hide');
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
                      url: '/pemasukan/' + id,
                      type: 'DELETE',
                      data: {
                          "_token": "{{ csrf_token() }}",
                      },
                      success: function(response){
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
                      },
                      error: function(xhr) {
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





 