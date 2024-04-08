@extends('back.layouts.app')
@section('title','Halaman Supplier')
@section('subtitle','Menu Supplier')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Supplier - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-supplier"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Supplier</th>
              <th>Nama Supplier</th>
              <th>PIC</th>
              <th>No Telp</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($supplier as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->kode_supplier }}</td>
                  <td>{{ $p->nama_supplier }}</td>
                  <td>{{ $p->pic }}</td>
                  <td>{{ $p->no_telp }}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-supplier-edit" data-id="{{ $p->id }}" style="color: black">
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
  <div class="modal fade" id="modal-supplier">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Supplier</h4>
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
                <form id="form-supplier" action="" method="POST">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                 

                    
                    <div class="form-group" id="kode_supplier_container">
                      <label for="kode_supplier">Kode Supplier</label>  
                      <input type="text" class="form-control phone-inputmask" name="kode_supplier" id="kode_supplier" placeholder="Masukkan Kode Supplier">
                    </div>
                    <div class="form-group" id="nama_supplier_container">
                      <label for="nama_supplier">Nama Supplier</label>  
                      <input type="text" class="form-control phone-inputmask" name="nama_supplier" id="nama_supplier" placeholder="Masukkan Nama Supplier">
                    </div>
                    <div class="form-group" id="pic_container">
                      <label for="pic">Nama PIC</label>  
                      <input type="text" class="form-control phone-inputmask" name="pic" id="pic" placeholder="Masukkan Nama PIC">
                    </div>
                    <div class="form-group" id="no_telp_container">
                      <label for="no_telp">No Telp</label>  
                      <input type="text" class="form-control phone-inputmask" name="no_telp" id="no_telp" placeholder="Masukkan No Telp">
                    </div>
                    <div class="form-group" id="alamat_container">
                      <label for="alamat">Alamat</label>  
                      <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2"></textarea>
                    </div>
                    <div class="form-group" id="keterangan_container">
                      <label for="keterangan">Keterangan</label>  
                      <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                    </div>


                    
                  


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save-supplier"><i class="fas fa-save"></i> Simpan</button>
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
    <div class="modal fade" id="modal-supplier-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Supplier</h4>
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
                  <form id="form-supplier-edit" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
            
                    <div class="card-body">
  
  
                      <div class="form-group" id="kode_supplier_edit_container">
                        <label for="kode_supplier_edit">Nama Supplier</label>  
                        <input type="text" class="form-control phone-inputmask" name="kode_supplier" id="kode_supplier_edit" placeholder="Masukkan Kode Supplier">
                      </div>
                      <div class="form-group" id="nama_supplier_edit_container">
                        <label for="nama_supplier_edit">Nama Supplier</label>  
                        <input type="text" class="form-control phone-inputmask" name="nama_supplier" id="nama_supplier_edit" placeholder="Masukkan Nama Supplier">
                      </div>
                      <div class="form-group" id="pic_edit_container">
                        <label for="pic_edit">Nama PIC</label>  
                        <input type="text" class="form-control phone-inputmask" name="pic" id="pic_edit" placeholder="Masukkan Nama PIC">
                      </div>
                      <div class="form-group" id="no_telp_edit_container">
                        <label for="no_telp_edit">No Telp</label>  
                        <input type="text" class="form-control phone-inputmask" name="no_telp" id="no_telp_edit" placeholder="Masukkan No Telp">
                      </div>
                      <div class="form-group" id="alamat_edit_container">
                        <label for="alamat_edit">Alamat</label>  
                        <textarea class="form-control" name="alamat" id="alamat_edit" cols="30" rows="2"></textarea>
                      </div>
                      <div class="form-group" id="keterangan_edit_container">
                        <label for="keterangan_edit">Keterangan</label>  
                        <textarea class="form-control" name="keterangan" id="keterangan_edit" cols="30" rows="3"></textarea>
                      </div>
  
  
                      
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-supplier"><i class="fas fa-save"></i> Simpan</button>
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
    $('#form-supplier').submit(function(event) {
      event.preventDefault();
      const tombolSimpan = $('#btn-save-supplier')

      var formData = $(this).serialize();

      $.ajax({
        url: '{{ route("supplier.store") }}',
        type: 'POST',
        data: formData,
        beforeSend: function(){
          $('form').find('.error-message').remove()
          tombolSimpan.prop('disabled', true)
        },
        success: function(response) {
          $('#modal-supplier').modal('hide');
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
            $('#modal-supplier').modal('hide'); // Sembunyikan modal hanya jika bukan error validasi
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
              supplier: 'GET',
                url: '/supplier/' + id + '/edit',
                success: function(data) {
                  // console.log(data); // Cek apakah data terisi dengan benar
                    // Mengisi data pada form modal
                    $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                    $('#kode_supplier_edit').val(data.kode_supplier);
                    $('#nama_supplier_edit').val(data.nama_supplier);
                    $('#pic_edit').val(data.pic);
                    $('#no_telp_edit').val(data.no_telp);
                    $('#alamat_edit').val(data.alamat);
                    $('#keterangan_edit').val(data.keterangan);
                    
                    $('#modal-supplier-edit').modal('show');
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
    $('#btn-update-supplier').click(function(e) {
      e.preventDefault();
      const tombolUpdate = $('#btn-update-supplier')
      var id = $('#id').val(); // Ambil ID kota dari input tersembunyi
      var formData = new FormData($('#form-supplier-edit')[0]);

      // Validasi sebelum pengiriman
      var namaSupplier = $('#nama_supplier_edit').val();
      var noTelp = $('#no_telp_edit').val();
  
      // Check apakah ada data kosong sebelum pengiriman
      if (namaSupplier.trim() === '' || noTelp.trim() === '') {
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
        url: '/supplier/update/' + id,
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
          $('#modal-supplier-edit').modal('hide');
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
          $('#modal-supplier-edit').modal('hide');
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
                      url: '/supplier/' + id,
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





 