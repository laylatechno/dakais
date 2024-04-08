@extends('back.layouts.app')
@section('title','Halaman Kategori Berita')
@section('subtitle','Menu Kategori Berita')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Kategori Berita - SMPIT Maryam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-kategoriberita"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
          <table id="kategoriBeritaTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori Berita</th>
                    <th>Slug</th>
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
  <div class="modal fade" id="modal-kategoriberita">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Kategori Berita</h4>
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
                <form id="form_kategori_berita" action="{{ route('simpan_kategori_berita') }}" method="POST" >
                {{-- <form id="form_kategori_berita" action="{{ route('kota.store') }}" method="POST" enctype="multipart/form-data"> --}}
                   
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="nama_kategori_berita">Nama Kategori Berita</label>
                      <input type="text" class="form-control" id="nama_kategori_berita" name="nama_kategori_berita" placeholder="Masukkan Nama Kategori Berita" required>
                    </div>
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control" id="slug" name="slug" readonly>
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
  <div class="modal fade" id="modal-edit-kategoriberita">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Edit Kategori Berita</h4>
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
                <form id="form_edit_kategori_berita" method="POST">
                  @method('PUT')
                  @csrf <!-- Tambahkan token CSRF -->
                  <input type="hidden" id="id" name="id" value="">
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="nama_kategori_berita_edit">Nama Kategori Berita</label>
                      <input type="text" class="form-control" id="nama_kategori_berita_edit" name="nama_kategori_berita" placeholder="Masukkan Nama Kategori Berita" required>
                    </div>
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control" id="slug_edit" name="slug" readonly>
                    </div>
                    <div class="form-group">
                      <label for="urutan_edit">Urutan</label>
                      <input type="number" class="form-control" id="urutan_edit" name="urutan" placeholder="Masukkan Urutan">
                    </div>


                    
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" id="btn_update_kategori_berita"><i class="fas fa-check"></i> Update</button>
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

{{--SKRIP TAMBAHAN  --}}
{{-- <!-- jQuery -->
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script> --}}
 <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


{{-- perintah data table server side --}}
<script>
  $(function () {
     $('#kategoriBeritaTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('kategoriberita.datatables') }}",
         columns: [
             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
             { data: 'nama_kategori_berita', name: 'nama_kategori_berita' },
             { data: 'slug', name: 'slug' },
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
      $('#nama_kategori_berita').on('input', function() {
          var slug = $(this).val().toLowerCase().replace(/\s+/g, '-');
          $('#slug').val(slug);
      });
  });
</script>

{{-- perintah slug tambah data --}}

{{-- perintah slug edit data--}}
<script>
  $(document).ready(function(){
      $('#nama_kategori_berita_edit').on('input', function() {
          var slug = $(this).val().toLowerCase().replace(/\s+/g, '-');
          $('#slug_edit').val(slug);
      });
  });
</script>

{{-- perintah slug edit data --}}

{{-- perintah simpan data --}}
<script>
  document.getElementById('form_kategori_berita').addEventListener('submit', function(e) {
      e.preventDefault(); // Mencegah form melakukan submit default
  
      var nama_kategori_berita = document.getElementById('nama_kategori_berita').value.trim();
      var slug = document.getElementById('slug').value.trim();
      var urutan = document.getElementById('urutan').value.trim();
  
      if (!nama_kategori_berita || !slug || !urutan) {
          alert('Harap lengkapi semua bidang!');
          return;
      }
      var formData = new FormData(this);
  
      $.ajax({
          url: '/simpan_kategori_berita', // Ganti dengan URL endpoint Anda
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
                      // Reload data table tanpa refresh halaman
                      // Kosongkan nilai input di dalam modal
                      $('#form_kategori_berita').trigger('reset');
                   
                      $('#kategoriBeritaTable').DataTable().ajax.reload();
                      $('#modal-kategoriberita').modal('hide'); // Tutup modal setelah simpan berhasil
                  }
              });
          },
          error: function(xhr, status, error) {
              if (xhr.status === 422) {
                  // Tangkap pesan error validasi dari server
                  var errors = xhr.responseJSON.errors;
                  var errorMessage = '';
                  Object.keys(errors).forEach(function(key) {
                      errorMessage += errors[key][0] + '<br>';
                  });
  
                  // Tampilkan SweetAlert untuk notifikasi error validasi
                  Swal.fire({
                      title: 'Error!',
                      html: errorMessage,
                      icon: 'error',
                      confirmButtonText: 'OK'
                  });
              } else {
                  var errorMessage = xhr.responseText ? xhr.responseText : 'Terjadi kesalahan saat menyimpan data';
                  console.error('Terjadi kesalahan:', error);
                  alert(errorMessage);
              }
          }
      });
  });
  </script>
  
{{-- perintah simpan data --}}

{{-- perintah edit/tampil data --}}
<script>
$(document).on('click', '.btn_edit_kategori_berita', function(e) {
    e.preventDefault();
    var id = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: '/kategori_berita/' + id + '/edit',
        success: function(data) {
            $('#id').val(data.id);
            $('#nama_kategori_berita_edit').val(data.nama_kategori_berita);
            $('#slug_edit').val(data.slug);
            $('#urutan_edit').val(data.urutan);
            $('#modal-edit-kategoriberita').modal('show');
        },
        error: function(error) {
            console.error(error);
        }
    });
});
</script>
{{-- perintah edit/tampil data --}}

{{-- perintah update data --}}
<script>
  $('#btn_update_kategori_berita').on('click', function(e) {
    e.preventDefault();
    var id = $('#id').val();
    var namaKategoriBerita = $('#nama_kategori_berita_edit').val();
    var slug = $('#slug_edit').val();
    var urutan = $('#urutan_edit').val();

    $.ajax({
        type: 'PUT',
        url: '/kategori_berita/' + id,
        data: {
            nama_kategori_berita: namaKategoriBerita,
            slug: slug,
            urutan: urutan,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            Swal.fire({
                title: 'Sukses!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed || result.isDismissed) {
                    $('#form_edit_kategori_berita').trigger('reset');
                    $('#kategoriBeritaTable').DataTable().ajax.reload();
                    $('#modal-edit-kategoriberita').modal('hide');
                }
            });
        },
        error: function(xhr, status, error) {
            var errorMessage = xhr.responseText ? xhr.responseText : 'Terjadi kesalahan saat mengupdate data';
            console.error('Terjadi kesalahan:', error);
            alert(errorMessage);
        }
    });
});
</script>
{{-- perintah update data --}}

{{-- perintah hapus data --}}

<script>
$(document).on('click', '.btn_delete_kategori_berita', function(e) {
    e.preventDefault();
    var id = $(this).data('id-kategori');

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
                url: '/kategoriberita/' + id,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    $('#kategoriBeritaTable').DataTable().ajax.reload();
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

@endpush



 