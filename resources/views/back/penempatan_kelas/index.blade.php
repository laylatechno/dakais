@extends('back.layouts.app')
@section('title','Halaman Penempatan Kelas')
@section('subtitle','Menu Penempatan Kelas')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Penempatan Kelas - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-penempatan_kelas"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Kelas</th>
              <th>Wali Kelas</th>
              <th>Tanggal Penempatan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($penempatan_kelas as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->kelas->nama_kelas }}</td>
                  <td>{{ $p->kelas->guru->nama_guru }}</td>
                  <td>{{ $p->tanggal_penempatan }}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-penempatan_kelas-edit" data-id="{{ $p->id }}" style="color: black">
                      <i class="fas fa-edit"></i>  Edit
                   </a>
                   <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $p->id }}" style="color: white">
                    <i class="fas fa-trash-alt"></i> Delete
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
  <div class="modal fade" id="modal-penempatan_kelas">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Penempatan Kelas</h4>
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
                <form id="form_penempatan_kelas" action="{{ route('simpan.penempatan.kelas') }}" method="POST">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                    <div class="form-group">
                      <label for="kelas_id">Kelas</label>
                        <select class="form-control select2" name="kelas_id" id="kelas_id">
                          <option value="">--Pilih Kelas--</option>
                            @foreach($kelas as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group" id="wali_kelas_container">
                      <label for="wali_kelas">Wali Kelas</label>  
                      <input type="text" class="form-control phone-inputmask" name="wali_kelas" id="wali_kelas" readonly>
                    </div>

                    <div class="form-group">
                      <label for="siswa_id">Siswa</label>  
                      <select class="form-control select2" name="siswa_id[]" id="siswa_id" multiple>
                          <option value="">--Pilih Siswa--</option>
                          @foreach($siswa as $s)
                              <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                          @endforeach
                      </select>
                    </div>
                  


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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

    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="modal-penempatan_kelas-edit">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Penempatan Kelas</h4>
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
                  <form id="form_penempatan_kelas_edit" action="" method="POST">
                    @method('PUT')
                    @csrf
            
                    <div class="card-body">
  
                      <div class="form-group">
                        <label for="kelas_id_edit">Kelas</label>
                          <select class="form-control select2" name="kelas_id" id="kelas_id_edit">
                            <option value="">--Pilih Kelas--</option>
                              @foreach($kelas as $p)
                                  <option value="{{ $p->id }}">{{ $p->nama_kelas }}</option>
                              @endforeach
                          </select>
                      </div>
  
                      
                      <div class="form-group" id="wali_kelas_container">
                        <label for="wali_kelas_edit">Wali Kelas</label>  
                        <input type="text" class="form-control phone-inputmask" name="wali_kelas" id="wali_kelas_edit" readonly>
                      </div>
  
                      <div class="form-group">
                        <label for="siswa_id_edit">Siswa</label>  
                        <select class="form-control select2" name="siswa_id[]" id="siswa_id_edit" multiple>
                            <option value="">--Pilih Siswa--</option>
                            @foreach($siswa as $s)
                                <option value="{{ $s->id }}">{{ $s->nama_siswa }}</option>
                            @endforeach
                        </select>
                      </div>
                    
  
  
                      
                       
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update"><i class="fas fa-save"></i> Simpan</button>
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


<!-- Tampil Wali Kelas-->
<script>
  $(document).ready(function() {
    
      $('#kelas_id').select2({
        minimumInputLength: 1,
      });

      // Event ketika sebuah opsi dipilih pada select2
      $('#kelas_id').on('select2:select', function (e) {
          // Mengatur fokus ke select2 setelah memilih opsi
          $(this).next().find('.select2-selection--single').focus();
        });

      $('#kelas_id_edit').select2({
        minimumInputLength: 1,
      });
      
        $('#kelas_id').change(function() {
          var kelasId = $(this).val();

          $.ajax({
              url: '/ambil-wali-kelas/' + kelasId,
              type: 'GET',
              success: function(response) {
                  $('#wali_kelas').val(response.nama_wali_kelas);
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
              }
          });

        
          
      });


  });

</script>

<!-- Siswa -->
<script>
  $(document).ready(function() {
      $('#siswa_id').select2({
        minimumInputLength: 1,
      });

      $('#siswa_id_edit').select2({
        minimumInputLength: 1,
      });
  
      $(document).on('select2:open', () => {
          document.querySelector('.select2-search__field').focus();
      });
  });
  
  </script>

{{-- Simpan Data --}}
<script>
        $(document).ready(function() {
     
                // Buat AJAX request saat formulir disubmit
      $('#form_penempatan_kelas').submit(function(e) {
          e.preventDefault();

          var form = $(this);
          var url = form.attr('action');
          var method = form.attr('method');
          var data = form.serialize();

          $.ajax({
              type: method,
              url: url,
              data: data,
              success: function(response) {
                  // Tampilkan pesan sukses menggunakan SweetAlert
                  Swal.fire({
                  title: 'Sukses!',
                  text: 'Data berhasil diperbarui.',
                  icon: 'success',
                  confirmButtonText: 'OK'
                  }).then((result) => {

                    if (result.isConfirmed || result.isDismissed) {
                      window.location.href = "/penempatan_kelas";
                      }
                });
                // Tutup modal atau lakukan sesuatu setelah update berhasil
              
              },
              error: function(xhr, status, error) {
                  // Mengambil pesan kesalahan dari respons server jika ada
                  var errorMessage = xhr.responseJSON.message || 'Terjadi kesalahan, data gagal disimpan!';

                  // Tampilkan pesan error menggunakan SweetAlert
                  Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: errorMessage
                  });
              }
          });
      });

          });

</script>

{{-- Edit Data --}}
<script>
  // Script Ajax untuk mengambil data penempatan kelas yang akan diedit
  $(document).on('click', '.btn-edit', function() {
    var id = $(this).data('id');
        var form = $('#form_penempatan_kelas_edit');
        var baseUrl = "{{ route('penempatan_kelas.update', '') }}"; // Ganti dengan base URL Anda

        form.attr('action', baseUrl + '/' + id);
        $.ajax({
            url: '/ambil-penempatan-kelas/' + id, // Ganti dengan URL yang sesuai di backend
            type: 'GET',
            success: function(response) {
                // Mengisikan data ke dalam form edit
                $('#kelas_id_edit').val(response.kelas_id).trigger('change');
                $('#wali_kelas_edit').val(response.wali_kelas);
                
                // Mengatur data siswa yang terpilih di select2
                var selectedSiswa = response.siswa_id.map(String); // Konversi ke string karena select2 menggunakan string
                $('#siswa_id_edit').val(selectedSiswa).trigger('change');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

</script>
 

{{-- Update Data --}}
<script>
  $('#form_penempatan_kelas_edit').submit(function(e) {
    e.preventDefault();

      var form = $(this);
      var url = form.attr('action');
      var method = form.attr('method');
      var data = form.serialize();

      $.ajax({
          type: method,
          url: url,
          data: data,
          success: function(response) {
              // Tampilkan pesan sukses menggunakan SweetAlert
              Swal.fire({
                  title: 'Sukses!',
                  text: 'Data berhasil diperbarui.',
                  icon: 'success',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed || result.isDismissed) {
                      window.location.href = "/penempatan_kelas";
                  }
              });
              // Tutup modal atau lakukan sesuatu setelah update berhasil
          },
          error: function(xhr, status, error) {
              // Tampilkan pesan error jika terjadi kesalahan
              Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Terjadi kesalahan, data gagal diperbarui!'
              });
          }
      });
  });

</script>


{{-- Delete Data --}}
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $(document).on('click', '.btn-delete', function() {
      var id = $(this).data('id');

      Swal.fire({
          title: 'Anda yakin?',
          text: 'Data akan dihapus permanen!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'DELETE',
                  url: '/hapus-penempatan-kelas/' + id,
                  success: function(response) {
                      Swal.fire({
                          title: 'Sukses!',
                          text: 'Data berhasil dihapus.',
                          icon: 'success',
                          confirmButtonText: 'OK'
                      }).then((result) => {
                          if (result.isConfirmed || result.isDismissed) {
                              // Lakukan sesuatu setelah penghapusan berhasil
                              // Contohnya, refresh halaman atau manipulasi UI lainnya
                              window.location.reload(); // Contoh refresh halaman
                          }
                      });
                  },
                  error: function(xhr) {
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Terjadi kesalahan saat menghapus data!'
                      });
                  }
              });
          }
      });
  });

</script>

 
@endpush


@push('css')
<link rel="stylesheet" href="{{ asset('themplete/back/plugins/select2/css/custom.css') }}">
<style>
  .select2-container{
    width: 100% !important;
    
  }
</style>
@endpush





 