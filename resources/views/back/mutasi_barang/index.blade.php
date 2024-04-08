@extends('back.layouts.app')
@section('title','Halaman Mutasi Barang')
@section('subtitle','Menu Mutasi Barang')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Mutasi Barang - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-mutasi-barang"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Mutasi</th>
              <th>Jenis Mutasi Barang</th>
              <th>Nama Barang</th>
              <th>Asal</th>
              <th>Tujuan</th>
              <th>Jumlah</th>
              <th>PIC</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($mutasi_barang as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->tanggal_mutasi }}</td>
                  <td>{{ $p->jenis_mutasi }}</td>
                  <td>{{ $p->barang->nama_barang }}</td>
                  <td>{{ $p->ruangan_asal->nama_ruangan }}</td>
                  <td>{{ $p->ruangan_tujuan->nama_ruangan}}</td>
                  <td>{{ $p->qty }}</td>
                  <td>{{ $p->pic }}</td>
                  <td>
                    @if($p->bukti)
                        <a href="/upload/mutasi_barang/{{ $p->bukti}}" target="_blank">
                            <img style="max-width:50px; max-height:50px" src="/upload/mutasi_barang/{{ $p->bukti}}" alt="">
                        </a>
                    @else
                        <span class="badge badge-warning">Tidak ada bukti</span>
                    @endif
                  </td>
                  <td>
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
  <div class="modal fade" id="modal-mutasi-barang">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Mutasi Barang</h4>
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
                <form id="form-mutasi_barang" action="" method="POST" enctype="multipart/form-data">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                    <div class="form-group" id="jenis_mutasi_container">
                      <label for="jenis_mutasi">Jenis Mutasi Barang</label>  
                      <select class="form-control" name="jenis_mutasi" id="jenis_mutasi">
                          <option value="">--Pilih Jenis Mutasi Barang--</option>
                           
                              <option value="Keluar">Keluar</option>
                              <option value="Masuk">Masuk</option>
                        
                      </select>
                    </div>

                  <div class="row">  
                    <div class="col-6">
                      <div class="form-group" id="tanggal_mutasi_container">
                        <label for="tanggal_mutasi">Tanggal Mutasi Barang</label>  
                        <input type="date" class="form-control" name="tanggal_mutasi" id="tanggal_mutasi" value="{{ now()->format('Y-m-d') }}" >
                      </div>
                    </div>      
                    <div class="col-6">
                      <div class="form-group" id="tanggal_kembali_container">
                        <label for="tanggal_kembali">Rencana Kembali <span>(Opsional)</span></label>  
                        <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
                      </div>
                    </div>      
                      <div class="col-12">
                        <div class="form-group" id="kode_mutasicontainer">
                          <label for="kode_mutasi">Kode Mutasi Barang</label>  
                          <input type="text" class="form-control" name="kode_mutasi" id="kode_mutasi" placeholder="Masukkan Kode Mutasi Barang">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group" id="barang_id_container">
                          <label for="barang_id">Nama Barang</label>  
                          <select class="form-control select2" name="barang_id" id="barang_id">
                            <option value="">--Pilih Barang--</option>
                            @foreach ($barang as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_barang }}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <input type="hidden" name="kondisi_baik_hidden" id="kondisi_baik_hidden">
                      <input type="hidden" name="kondisi_sedang_hidden" id="kondisi_sedang_hidden">
                      <input type="hidden" name="kondisi_rusak_hidden" id="kondisi_rusak_hidden">

                      <div class="col-6">
                        <div class="form-group" id="kondisi_barang_container">
                          <label for="kondisi_barang">Kondisi Barang</label>  
                          <select class="form-control select2" name="kondisi_barang" id="kondisi_barang">
                            <option value="">--Pilih Kondisi Barang--</option>
                            
                                <option value="Baik">Baik</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Rusak">Rusak</option>
                           
                          </select>
                        </div>
                      </div>
                      <script>
                        // Mendengarkan perubahan pada elemen select 'kondisi_barang'
                            document.getElementById('kondisi_barang').addEventListener('change', function() {
                                var kondisi = this.value; // Mendapatkan nilai pilihan

                                // Mendapatkan elemen-elemen input hidden
                                var kondisiBaikInput = document.getElementById('kondisi_baik_hidden');
                                var kondisiSedangInput = document.getElementById('kondisi_sedang_hidden');
                                var kondisiRusakInput = document.getElementById('kondisi_rusak_hidden');

                                // Mendapatkan elemen input 'jumlah_tersedia'
                                var jumlahTersediaInput = document.getElementById('jumlah_tersedia');

                                // Memeriksa nilai pilihan dan menetapkan nilai pada input jumlah_tersedia sesuai kondisi
                                if (kondisi === 'Baik') {
                                    jumlahTersediaInput.value = kondisiBaikInput.value;
                                } else if (kondisi === 'Sedang') {
                                    jumlahTersediaInput.value = kondisiSedangInput.value;
                                } else if (kondisi === 'Rusak') {
                                    jumlahTersediaInput.value = kondisiRusakInput.value;
                                }
                            });

                      </script>
                      <div class="col-6">
                        <div class="form-group" id="jumlah_tersedia_container">
                          <label for="type">Jumlah Tersedia </label>  
                          <input type="number" class="form-control " name="jumlah_tersedia" id="jumlah_tersedia" value="0" readonly>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group" id="qty_container">
                          <label for="type">Jumlah Mutasi</label>  
                          <input type="number" class="form-control " name="qty" id="qty" value="0">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="ruangan_id_asal_container">
                          <label for="type">Ruangan Asal</label>  
                          <input type="text" class="form-control" name="ruangan_id_asal" id="ruangan_id_asal" readonly >
                        </div>
                      </div>
                      <input type="hidden" name="ruangan_id_asal_hidden" id="ruangan_id_asal_hidden">

                      <div class="col-6">
                        <div class="form-group" id="ruangan_id_tujuan_container">
                          <label for="ruangan_id_tujuan">Ruangan Tujuan</label>  
                          <select class="form-control" name="ruangan_id_tujuan" id="ruangan_id_tujuan">
                            <option value="">--Pilih Ruangan Tujuan--</option>
                            @foreach ($ruangan as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_ruangan }}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                     
                      <div class="col-6">
                        <div class="form-group" id="pic_container">
                          <label for="type">PIC</label>  
                          <input type="text" class="form-control" name="pic" id="pic" placeholder="Masukkan PIC">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="bukti_container">
                          <label for="type">Bukti</label>  
                          <input type="file" class="form-control" name="bukti" id="bukti">
                        </div>
                      </div>

                  </div>   
                    <div class="form-group" id="keterangan_container">
                      <label for="keterangan">Keterangan</label>  
                      <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                    </div>
                     
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="btn-save-mutasi-barang"><i class="fas fa-save"></i> Simpan</button>
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
    <div class="modal fade" id="modal-mutasi-barang-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Mutasi Barang</h4>
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
                  <form id="form-mutasi_barang-edit" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
            
                  
                  
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-mutasi-barang"><i class="fas fa-save"></i> Simpan</button>
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

<!-- barang -->
<script>
$(document).ready(function() {
    $('#barang_id').select2({
        minimumInputLength: 1,
    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $('#barang_id').change(function() {
        var barangId = $(this).val();

        $.ajax({
            url: '/ambil-ruangan/' + barangId,
            type: 'GET',
            success: function(response) {
                console.log(response); // Periksa respons di console log
                $('#ruangan_id_asal').val(response.nama_ruangan); // Tampilkan nama ruangan
                $('#ruangan_id_asal_hidden').val(response.ruangan_id); // Simpan ID ruangan di input hidden
                $('#kondisi_baik_hidden').val(response.kondisi_baik); // Simpan ID ruangan di input hidden
                $('#kondisi_sedang_hidden').val(response.kondisi_sedang); // Simpan ID ruangan di input hidden
                $('#kondisi_rusak_hidden').val(response.kondisi_rusak); // Simpan ID ruangan di input hidden
              

            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

  
</script>


{{-- PERINTAH SIMPAN DATA --}}
<script>
    $(document).ready(function() {
      $('#form-mutasi_barang').submit(function(event) {
        event.preventDefault();
        const tombolSimpan = $('#btn-save-mutasi-barang')

        // Buat objek FormData
        var formData = new FormData(this);

        $.ajax({
          url: '{{ route("mutasi_barang.store") }}',
          type: 'POST',
          data: formData,
          processData: false, // Menghindari jQuery memproses data
          contentType: false, // Menghindari jQuery mengatur Content-Type
          beforeSend: function() {
            $('form').find('.error-message').remove()
            tombolSimpan.prop('disabled', true)
          },
          success: function(response) {
            $('#modal-mutasi-barang').modal('hide');
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
              $('#modal-mutasi-barang').modal('hide');
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
              mutasi_barang: 'GET',
                url: '/mutasi_barang/' + id + '/edit',
                success: function(data) {

                


                  $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                  $('#kategori_mutasi_barang_id_edit').val(data.kategori_mutasi_barang_id); // Menambahkan nilai gambar ke input gambar_edit
                  $('#kode_mutasi_barang_edit').val(data.kode_mutasi_barang); // Menambahkan nilai kode_mutasi_barang ke input kode_mutasi_barang_edit
                  $('#nama_mutasi_barang_edit').val(data.nama_mutasi_barang); // Menambahkan nilai nama_mutasi_barang ke input nama_mutasi_barang_edit
                  $('#merk_edit').val(data.merk); // Menambahkan nilai merk ke input merk_edit
                  $('#type_edit').val(data.type); // Menambahkan nilai type ke input type_edit
                  $('#tanggal_masuk_edit').val(data.tanggal_masuk); // Menambahkan nilai tanggal_masuk ke input tanggal_masuk_edit
                  $('#kondisi_baik_edit').val(data.kondisi_baik); // Menambahkan nilai kondisi_baik ke input kondisi_baik_edit
                  $('#kondisi_sedang_edit').val(data.kondisi_sedang); // Menambahkan nilai kondisi_sedang ke input kondisi_sedang_edit
                  $('#kondisi_rusak_edit').val(data.kondisi_rusak); // Menambahkan nilai kondisi_rusak ke input kondisi_rusak_edit
                  $('#qty_edit').val(data.qty); // Menambahkan nilai qty ke input qty_edit
                  $('#ruangan_id_edit').val(data.ruangan_id); // Menambahkan nilai ruangan_id ke input ruangan_id_edit
                  $('#status_edit').val(data.status); // Menambahkan nilai status ke input status_edit
                
                  
                  $('#harga_perolehan_edit').val(addThousandSeparator(data.harga_perolehan));
                  
                 
                  $('#asal_edit').val(data.asal); // Menambahkan nilai asal ke input asal_edit
                  $('#pic_edit').val(data.pic); // Menambahkan nilai pic ke input pic_edit
                  $('#keterangan_edit').val(data.keterangan); // Menambahkan nilai keterangan ke input keterangan_edit

                   // Tambahkan logika untuk menampilkan gambar gambar pada formulir edit
                    if (data.gambar) {
                      var gambarImg = '<img src="/upload/mutasi_barang/' + data.gambar + '" style="max-width: 100px; max-height: 100px;">';
                      var gambarLink = '<a href="/upload/mutasi_barang/' + data.gambar + '" target="_blank"><i class="fa fa-eye"></i> Lihat Gambar</a>';
                      $('#gambar_edit_container').append(gambarImg + '<br>' + gambarLink);
                    }
                    
                    $('#modal-mutasi-barang-edit').modal('show');
                    $('#id').val(id);
                },

                error: function(xhr) {
                    // Tangani kesalahan jika ada
                    alert('Error: ' + xhr.statusText);
                }
            });
          });
          function addThousandSeparator(num) {
    var parts = num.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}
  });
</script>
{{-- PERINTAH EDIT DATA --}}


{{-- PERINTAH UPDATE DATA --}}
<script>
  $(document).ready(function() {
      $('#btn-update-mutasi-barang').click(function(e) {
          e.preventDefault();
          const tombolUpdate = $('#btn-update-mutasi-barang');
          var id = $('#id').val();
          var formData = new FormData($('#form-mutasi_barang-edit')[0]);

          $.ajax({
              type: 'POST',
              url: '/mutasi_barang/update/' + id,
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
                  $('#modal-mutasi-barang-edit').modal('hide');
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
                      $('#modal-mutasi-barang-edit').modal('hide');
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
                      url: '/mutasi_barang/' + id,
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





 