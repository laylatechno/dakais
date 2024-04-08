@extends('back.layouts.app')
@section('title','Halaman SPP')
@section('subtitle','Menu SPP')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data SPP - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-spp"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tahun Ajaran</th>
              <th>Jumlah SPP</th>
              <th>Tanggal Jatuh Tempo</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($spp as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->tahunAjaran->nama_tahun_ajaran }}</td>
                  <td>Rp. {{ number_format($p->jumlah_spp) }}</td>
                  <td>{{ $p->tanggal_jatuh_tempo }}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-jenis-ujian-edit" data-id="{{ $p->id }}" style="color: black">
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
  <div class="modal fade" id="modal-spp">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form SPP</h4>
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
                <form id="form-jenis-ujian" action="" method="POST">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                 

                    
                    <div class="form-group" id="tahun_ajaran_container">
                      <label for="tahun_ajaran">Tahun Ajaran</label>  
                      <select class="form-control" name="tahun_ajaran_id" id="tahun_ajaran_id">
                        {{-- <option value="">--Pilih Tahun Ajaran--</option> --}}
                        @foreach ($tahunAjaran as $p)
                            <option value="{{ $p->id }}" {{ old('tahun_ajaran_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_tahun_ajaran }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group" id="jumlah_spp_container">
                      <label for="jumlah_spp">Jumlah SPP</label>  
                      <input type="text" class="form-control spp" name="jumlah_spp" id="jumlah_spp" placeholder="Masukkan Jumlah SPP">
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                    <script>
                        $(document).ready(function () {
                            $('.spp').on('input', function (e) {
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
                    <div class="form-group" id="tanggal_jatuh_tempo_container">
                      <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>  
                      <input type="date" class="form-control phone-inputmask" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo">
                    </div>
                                
                    <div class="form-group" id="keterangan_container">
                      <label for="keterangan">Keterangan</label>  
                      <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                    </div>


                    
                  


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save-spp"><i class="fas fa-save"></i> Simpan</button>
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
    <div class="modal fade" id="modal-jenis-ujian-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form SPP</h4>
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
                  <form id="form-jenis-ujian-edit" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
            
                    <div class="card-body">

                      <div class="form-group" id="tahun_ajaran_edit_container">
                        <label for="tahun_ajaran_edit">Tahun Ajaran</label>  
                        <select class="form-control" name="tahun_ajaran_id" id="tahun_ajaran_id_edit">
                          {{-- <option value="">--Pilih Tahun Ajaran--</option> --}}
                          @foreach ($tahunAjaran as $p)
                              <option value="{{ $p->id }}" {{ old('tahun_ajaran_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_tahun_ajaran }}</option>
                          @endforeach
                      </select>
                      </div>
                      <div class="form-group" id="jumlah_spp_edit_container">
                        <label for="jumlah_spp_edit">Jumlah SPP</label>  
                        <input type="text" class="form-control spp_edit" name="jumlah_spp" id="jumlah_spp_edit" placeholder="Masukkan Jumlah SPP">
                      </div>
                      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
                      <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                      <script>
                          $(document).ready(function () {
                              $('.spp_edit').on('input', function (e) {
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
                      <div class="form-group" id="tanggal_jatuh_tempo_edit_container">
                        <label for="tanggal_jatuh_tempo_edit">Tanggal Jatuh Tempo</label>  
                        <input type="date" class="form-control phone-inputmask" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo_edit">
                      </div>
                                  
                      <div class="form-group" id="keterangan_edit_container">
                        <label for="keterangan_edit">Keterangan</label>  
                        <textarea class="form-control" name="keterangan" id="keterangan_edit" cols="30" rows="3"></textarea>
                      </div>
  
  
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-jenis-ujian"><i class="fas fa-save"></i> Simpan</button>
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
    $('#form-jenis-ujian').submit(function(event) {
      event.preventDefault();
      const tombolSimpan = $('#btn-save-spp')

      var formData = $(this).serialize();

      $.ajax({
        url: '{{ route("spp.store") }}',
        type: 'POST',
        data: formData,
        beforeSend: function(){
          $('form').find('.error-message').remove()
          tombolSimpan.prop('disabled', true)
        },
        success: function(response) {
          $('#modal-spp').modal('hide');
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
            $('#modal-spp').modal('hide'); // Sembunyikan modal hanya jika bukan error validasi
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
              spp: 'GET',
                url: '/spp/' + id + '/edit',
                success: function(data) {
                  // console.log(data); // Cek apakah data terisi dengan benar
                      // Fungsi tambahan untuk format angka dengan ribuan
                    function addThousandSeparator(num) {
                        var parts = num.toString().split(".");
                        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        return parts.join(".");
                    }
                    // Mengisi data pada form modal
                    $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                    $('#tahun_ajaran_edit').val(data.tahun_ajaran);
                    $('#tanggal_jatuh_tempo_edit').val(data.tanggal_jatuh_tempo);
                    $('#jumlah_spp_edit').val(data.jumlah_spp);
                     // Mengubah format jumlah_spp_edit sebelum menampilkannya
                    var formattedSpp = addThousandSeparator(data.jumlah_spp); // Format jumlah_spp
                    $('#jumlah_spp_edit').val(formattedSpp);


                    $('#keterangan_edit').val(data.keterangan);
                    $('#modal-jenis-ujian-edit').modal('show');
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
    $('#btn-update-jenis-ujian').click(function(e) {
      e.preventDefault();
      const tombolUpdate = $('#btn-update-jenis-ujian')
      var id = $('#id').val(); // Ambil ID kota dari input tersembunyi
      var formData = new FormData($('#form-jenis-ujian-edit')[0]);

      // Validasi sebelum pengiriman
      var jumlahSpp = $('#jumlah_spp_edit').val();
      var tanggalJatuhTempo = $('#tanggal_jatuh_tempo_edit').val();
  
      // Check apakah ada data kosong sebelum pengiriman
      if (jumlahSpp.trim() === '' || tanggalJatuhTempo.trim() === '') {
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
        url: '/spp/update/' + id,
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
          $('#modal-jenis-ujian-edit').modal('hide');
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
          $('#modal-jenis-ujian-edit').modal('hide');
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
                      url: '/spp/' + id,
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





 