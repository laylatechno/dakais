@extends('back.layouts.app')
@section('title','Halaman Kategori Barang')
@section('subtitle','Menu Kategori Barang')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Kategori Barang - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-kategori_barang"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori Barang</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($kategori_barang as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->nama_kategori_barang }}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-kategori-barang-edit" data-id="{{ $p->id }}" style="color: black">
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
  <div class="modal fade" id="modal-kategori_barang">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Kategori Barang</h4>
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
                <form id="form-kategori-barang" action="" method="POST">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                 

                    
                    <div class="form-group" id="nama_kategori_barang_container">
                      <label for="nama_kategori_barang">Nama Kategori Barang</label>  
                      <input type="text" class="form-control phone-inputmask" name="nama_kategori_barang" id="nama_kategori_barang">
                    </div>
                                
                    


                    
                  


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save-kategori_barang"><i class="fas fa-save"></i> Simpan</button>
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
    <div class="modal fade" id="modal-kategori-barang-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Kategori Barang</h4>
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
                  <form id="form-kategori-barang-edit" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
            
                    <div class="card-body">

                      
                      <div class="form-group" id="nama_kategori_barang_edit_container">
                        <label for="nama_kategori_barang_edit">Nama Kategori Barang</label>  
                        <input type="text" class="form-control phone-inputmask" name="nama_kategori_barang" id="nama_kategori_barang_edit">
                      </div>
                                  
                     
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-kategori-barang"><i class="fas fa-save"></i> Simpan</button>
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
    $('#form-kategori-barang').submit(function(event) {
      event.preventDefault();
      const tombolSimpan = $('#btn-save-kategori_barang')

      var formData = $(this).serialize();

      $.ajax({
        url: '{{ route("kategori_barang.store") }}',
        type: 'POST',
        data: formData,
        beforeSend: function(){
          $('form').find('.error-message').remove()
          tombolSimpan.prop('disabled', true)
        },
        success: function(response) {
          $('#modal-kategori_barang').modal('hide');
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
          if(xhr.status !== 422) { // Cek jika bukan error validasi
            $('#modal-kategori_barang').modal('hide'); // Sembunyikan modal hanya jika bukan error validasi
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
              kategori_barang: 'GET',
                url: '/kategori_barang/' + id + '/edit',
                success: function(data) {
                  // console.log(data); // Cek apakah data terisi dengan benar
                      // Fungsi tambahan untuk format angka dengan ribuan
                    
                    // Mengisi data pada form modal
                    $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                   
                    $('#nama_kategori_barang_edit').val(data.nama_kategori_barang);
                    


                 
                    $('#modal-kategori-barang-edit').modal('show');
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
    $('#btn-update-kategori-barang').click(function(e) {
      e.preventDefault();
      const tombolUpdate = $('#btn-update-kategori-barang')
      var id = $('#id').val(); // Ambil ID kota dari input tersembunyi
      var formData = new FormData($('#form-kategori-barang-edit')[0]);

      // Validasi sebelum pengiriman
      var nama_kategori_barang = $('#nama_kategori_barang_edit').val();
  
      // Check apakah ada data kosong sebelum pengiriman
      if (nama_kategori_barang.trim() === '') {
        // Tampilkan SweetAlert jika ada data kosong
        Swal.fire({
          title: 'Error!',
          text: 'Silakan lengkapi semua field.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
        return; // Hentikan pengiriman jika ada data kosong
      }

      // Lakukan permintaan Ajax untuk update data kota
      $.ajax({
        type: 'POST', // Ganti menjadi POST
        url: '/kategori_barang/update/' + id,
        data: formData,
        headers: {
          'X-HTTP-Method-Override': 'PUT' // Menggunakan header untuk menentukan metode PUT
        },
        contentType: false,
        processData: false,
        beforeSend: function(){
            $('form').find('.error-message').remove()
            tombolUpdate.prop('disabled',true)
        },
        success: function(response) {
          $('#modal-kategori-barang-edit').modal('hide');
          // Tampilkan pesan sukses menggunakan SweetAlert
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
          // Tutup modal atau lakukan sesuatu setelah update berhasil
          $('#modal-kategori-barang-edit').modal('hide');
        },
        complete: function()
          {tombolUpdate.prop('disabled',false)}
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
            url: '/kategori_barang/' + id,
            type: 'DELETE',
            data: {
              "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
              console.log(response); // Periksa respons yang diterima di konsol

              if (response.hasOwnProperty('message') && response.message.includes('terkait dengan data barang')) {
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





 