@extends('back.layouts.app')
@section('title','Halaman Berita')
@section('subtitle','Menu Berita')

<link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/summernote/summernote-bs4.min.css">
<!-- Memuat CSS untuk Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Berita - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-berita"><i class="fas fa-plus-circle"></i> Tambah Data</a>
         
          <table id="BeritaTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Posting</th>
                    <th>Penulis</th>
                    <th>Ringkasan</th>
                    <th>Gambar</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
          </table>
        
                
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  {{-- Modal Tambah Data --}}
  <div class="modal fade" id="modal-berita">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Berita</h4>
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
                <form id="form_berita" action="{{ route('simpan_berita') }}" method="POST" enctype="multipart/form-data">
                   
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">
                    <div class="form-group">
                      <label for="tanggal_posting">Tanggal Posting</label>
                      <input type="date" class="form-control" id="tanggal_posting" name="tanggal_posting" required>
                    </div>
                    <script>
                        // Dapatkan elemen input tanggal
                          const inputTanggal = document.getElementById('tanggal_posting');
  
                          // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
                          const today = new Date().toISOString().split('T')[0];
  
                          // Set nilai default input tanggal menjadi tanggal hari ini
                          inputTanggal.value = today;
  
                      </script>
                    <div class="form-group">
                      <label for="judul_berita">Judul Berita</label>
                      <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Masukkan Judul Berita" required>
                    </div>
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" readonly>
                    </div>
                    <div class="form-group">
                      <label for="penulis">Penulis</label>
                      <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Penulis Berita" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori_berita_id">Kategori</label>
                          <select class="form-control select2" name="kategori_berita_id" id="kategori_berita_id">
                              @foreach($kategoriBerita as $kategori)
                                  <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori_berita }}</option>
                              @endforeach
                          </select>
                    </div>
                     
                    
                    <div class="form-group">
                      <label for="ringkasan">Ringkasan</label>
                      <input type="text" class="form-control" id="ringkasan" name="ringkasan" placeholder="Masukkan Ringkasan">
                    </div>
                    <div class="form-group">
                      <label for="isi">Isi</label>
                      <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                      <label for="gambar">Gambar Berita</label>
                      <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                      <label for="sumber">Sumber</label>
                      <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Masukkan Sumber">
                    </div>

                    <div class="form-group">
                      <label for="urutan">Urutan</label>
                      <input type="number" class="form-control" id="urutan" name="urutan" placeholder="Masukkan Urutan">
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

  {{-- Modal Edit Data --}}
  <div class="modal fade" id="modal-berita-edit">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Edit Berita</h4>
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
                <form id="form-edit-berita" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf <!-- Tambahkan token CSRF -->
                  <input type="hidden" id="id" name="id" value="">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="tanggal_posting_edit">Tanggal Posting</label>
                      <input type="date" class="form-control" id="tanggal_posting_edit" name="tanggal_posting" required>
                    </div>
                    <script>
                        // Dapatkan elemen input tanggal
                          const inputTanggal2 = document.getElementById('tanggal_posting_edit');
  
                          // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
                          const today2 = new Date().toISOString().split('T')[0];
  
                          // Set nilai default input tanggal menjadi tanggal hari ini
                          inputTanggal2.value = today2;
  
                      </script>
                    <div class="form-group">
                      <label for="judul_berita_edit">Judul Berita</label>
                      <input type="text" class="form-control" id="judul_berita_edit" name="judul_berita" placeholder="Masukkan Judul Berita" required>
                    </div>
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control" id="slug_edit" name="slug" readonly>
                    </div>
                    <div class="form-group">
                      <label for="penulis_edit">Penulis</label>
                      <input type="text" class="form-control" id="penulis_edit" name="penulis" placeholder="Masukkan Penulis Berita" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori_berita_id_edit">Kategori</label>
                          <select class="form-control select2" name="kategori_berita_id" id="kategori_berita_id_edit">
                              @foreach($kategoriBerita as $kategori)
                                  <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori_berita }}</option>
                              @endforeach
                          </select>
                    </div>
                     
                    
                    <div class="form-group">
                      <label for="ringkasan_edit">Ringkasan</label>
                      <input type="text" class="form-control" id="ringkasan_edit" name="ringkasan" placeholder="Masukkan Ringkasan">
                    </div>
                    <div class="form-group">
                      <label for="isi2">Isi</label>
                      {{-- <textarea id="isi2" name="isi" cols="30" rows="10" class="form-control" ></textarea> --}}
                      <textarea id="isi2" name="isi"></textarea>
                    </div>
                    {{-- <div class="form-group">
                      <input type="text" id="isi2">
                    </div> --}}
                    <div class="form-group">
                      <label for="link-gambar">Gambar Berita</label>
                      <input type="file" class="form-control" id="link-gambar" name="gambar">
                      <br>
                      <a id="link-gambar" href="#" target="_blank">
                        <img id="gambar-berita" style="max-width:100px; max-height:100px" src="#" alt="Gambar">
                      </a>
                    </div>
                    <div class="form-group">
                      <label for="sumber_edit">Sumber</label>
                      <input type="text" class="form-control" id="sumber_edit" name="sumber" placeholder="Masukkan Sumber">
                    </div>

                    <div class="form-group">
                      <label for="urutan_edit">Urutan</label>
                      <input type="number" class="form-control" id="urutan_edit" name="urutan" placeholder="Masukkan Urutan">
                    </div>


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btn_update_berita"><i class="fas fa-save"></i> Update</button>
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

  @push('css')
  <link rel="stylesheet" href="{{ asset('themplete/back/plugins/select2/css/custom.css') }}">
  <style>
    .select2-container{
      width: 100% !important;
    }
  </style>
  @endpush

@push('scripts')

 <!-- Pastikan jQuery dimuat terlebih dahulu -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- Memuat skrip JavaScript Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

{{-- 
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script> --}}
{{--SKRIP TAMBAHAN  --}}
<script src="{{ asset('themplete/back')}}/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<!-- Inisialisasi Select2 -->
<script>
  $(document).ready(function() {
      $('#kategori_berita_id').select2();
  });
  $(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
  });
</script>



{{-- perintah data table server side --}}
<script>
  $(function () {
     $('#BeritaTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('berita.datatables') }}",
         columns: [
             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
             { data: 'judul_berita', name: 'judul_berita' },
             { data: 'tanggal_posting', name: 'tanggal_posting' },
             { data: 'penulis', name: 'penulis' },
             { data: 'ringkasan', name: 'ringkasan' },
             {
                  data: 'gambar',
                  name: 'gambar',
                  render: function(data) {
                    return '<a href="' + data + '" target="_blank"><img src="' + data + '" width="50"/></a>';
           
                  },
                  orderable: false,
                  searchable: false
              },
             { data: 'urutan', name: 'urutan' },
             { data: 'action', name: 'action', orderable: false, searchable: false }
         ],
         "createdRow": function(row, data, dataIndex) {
             $(row).attr('id', 'row_' + (dataIndex + 1)); // Menambahkan ID untuk setiap baris
         }
     });
 });
 
 </script>
 {{-- perintah data table server side --}}

{{-- perintah slug tambah data--}}
<script>
  $(document).ready(function(){
      $('#judul_berita').on('input', function() {
          var slug = $(this).val().toLowerCase().replace(/\s+/g, '-');
          $('#slug').val(slug);
      });
  });
</script>

{{-- perintah slug tambah data --}}

{{-- perintah slug edit data--}}
<script>
  $(document).ready(function(){
      $('#judul_berita_edit').on('input', function() {
          var slug = $(this).val().toLowerCase().replace(/\s+/g, '-');
          $('#slug_edit').val(slug);
      });
  });
</script>

{{-- perintah slug edit data --}}

{{-- perintah simpan data --}}
<script>
  document.getElementById('form_berita').addEventListener('submit', function(e) {
    e.preventDefault(); // Mencegah form melakukan submit default

    var tanggal_posting = document.getElementById('tanggal_posting').value.trim();
    var judul_berita = document.getElementById('judul_berita').value.trim();
    var slug = document.getElementById('slug').value.trim();
    var penulis = document.getElementById('penulis').value.trim();
    var kategori_berita_id = document.getElementById('kategori_berita_id').value.trim();
    var ringkasan = document.getElementById('ringkasan').value.trim();
    var isi = document.getElementById('isi').value.trim();
    var sumber = document.getElementById('sumber').value.trim();
    var urutan = document.getElementById('urutan').value.trim();
    var gambar = document.getElementById('gambar').files[0];
    if (!tanggal_posting || !judul_berita || !slug || !penulis || !kategori_berita_id || !ringkasan || !isi || !sumber || !urutan || !gambar) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Harap lengkapi semua bidang!',
    });
    return;
}

    var formData = new FormData(this);

    $.ajax({
        url: '/simpan_berita', // Ganti dengan URL endpoint Anda
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Tampilkan SweetAlert untuk notifikasi berhasil
            Swal.fire({
                title: 'Sukses!',
                text: 'Data berhasil disimpan.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed || result.isDismissed) {
                  $('#form_berita').trigger('reset');
                  $('#BeritaTable').DataTable().ajax.reload();
                  $('#modal-berita').modal('hide'); // Tutup modal setelah simpan berhasil
                }
            });
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText ? xhr.responseText : 'Terjadi kesalahan saat menyimpan data';
            console.error('Terjadi kesalahan:', error);
            alert(errorMessage);
        }
    });
});
</script>
{{-- perintah simpan data --}}



 
{{-- perintah edit data --}}
<script>
$(document).on('click', '.btn_edit_berita', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
        // Ajax request untuk mendapatkan data berita
        $.ajax({
          type: 'GET',
          url: '/berita/' + id + '/edit',
          success: function(data) {
            
              // Mengisi data pada form modal
              $('#id').val(data.id)// Menambahkan nilai id ke input tersembunyi
              $('#tanggal_posting_edit').val(data.tanggal_posting);
              $('#judul_berita_edit').val(data.judul_berita);
              $('#slug_edit').val(data.slug);
              $('#penulis_edit').val(data.penulis);
              $('#kategori_berita_id_edit').val(data.kategori_berita_id);
              $('#ringkasan_edit').val(data.ringkasan);
              $('#sumber_edit').val(data.sumber);
              $('#urutan_edit').val(data.urutan);
              // $('#isi2').val(data.isi);
              $('#isi2').summernote('code', data.isi);
      
              var gambar = '/upload/berita/' + data.gambar;
              $('#modal-berita-edit #gambar-berita').attr('src', gambar);
              $('#modal-berita-edit #link-gambar').attr('href', gambar);
              // Menampilkan modal
              $('#modal-berita-edit').modal('show');
          },
          error: function(error) {
              console.log(error);
          }
      });
  
      
  });
</script>
{{-- perintah edit data --}}
 

{{-- perintah update data --}}
<script>
  $(document).ready(function() {
    

    // Sisanya adalah script AJAX yang sudah ada sebelumnya
    $('#btn_update_berita').click(function(e) {
      e.preventDefault();

      var id = $('#id').val(); // Ambil ID pengeluaran dari input tersembunyi
      var formData = new FormData($('#form-edit-berita')[0]);

      // Lakukan permintaan Ajax untuk update data pengeluaran
      $.ajax({
        type: 'POST', // Ganti menjadi POST
        url: '/berita/update/' + id,
        data: formData,
        headers: {
          'X-HTTP-Method-Override': 'PUT' // Menggunakan header untuk menentukan metode PUT
        },
        contentType: false,
        processData: false,
        success: function(response) {
          // Tampilkan pesan sukses menggunakan SweetAlert
          Swal.fire({
            title: 'Sukses!',
            text: 'Data berhasil diperbarui.',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed || result.isDismissed) {
                  $('#form-edit-berita').trigger('reset');
                  $('#BeritaTable').DataTable().ajax.reload();
                  $('#modal-berita-edit').modal('hide'); // Tutup modal setelah simpan berhasil
                }
          });
          // Tutup modal atau lakukan sesuatu setelah update berhasil
          $('#modal-pengeluaran-edit').modal('hide');
        },
        error: function(xhr, status, error) {
          console.error('Terjadi kesalahan saat update:', error);
          Swal.fire({
            title: 'Error!',
            text: 'Terjadi kesalahan saat melakukan pembaruan.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    });
  });
</script>

{{-- perintah update data --}}
 

{{-- perintah hapus data --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
<script>
  $(document).on('click', '.btn_delete_berita', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
  
      Swal.fire({
          title: 'Yakin mau hapus data?',
          text: 'Anda tidak akan dapat mengembalikan ini!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Hapus',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'DELETE',
                  url: '/berita/' + id,
                  data: {
                      "_token": "{{ csrf_token() }}"
                  },
                  success: function(data) {
                      $('#BeritaTable').DataTable().ajax.reload();
                      Swal.fire({
                          title: 'Terhapus!',
                          text: 'Data telah terhapus.',
                          icon: 'success',
                          confirmButtonText: 'OK'
                      });
                  },
                  error: function(error) {
                      console.error(error);
                  }
              });
          }
      });
  });
  
  </script>

{{-- perintah hapus data --}}


{{-- Summernote --}}
<script>
  $(function () {
    // Summernote
    $('#isi').summernote({
      height: 200
    });

      // CodeMirror
  // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
  //   mode: "htmlmixed",
  //   theme: "monokai"
  // });
  })
</script>
{{-- Summernote --}}

 

 <script>
  $(function () {
    // Inisialisasi Summernote
    $('#isi2').summernote({
        height: 200,
        callbacks: {
            // Fungsi setelah Summernote selesai dimuat
            onInit: function() {
                // Set nilai pada Summernote
                $('#isi2').summernote('code', data.isi);
            }
        }
    });
});

 </script>
@endpush



 
 
   
 

 