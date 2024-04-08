@extends('back.layouts.app')
@section('title','Halaman Barang')
@section('subtitle','Menu Barang')

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Barang - SMPIT Maryam</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-barang"><i class="fas fa-plus-circle"></i> Tambah Data</a>         
      
            
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Kategori Barang</th>
              <th>Nama Barang</th>
              <th>Jumlah Barang Baik</th>
              <th>Jumlah Barang Sedang</th>
              <th>Jumlah Barang Rusak</th>
              <th>Ruangan</th>
              <th>PIC</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

              @foreach ($barang as $p)
                      <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->kategori_barang->nama_kategori_barang }}</td>
                  <td>{{ $p->nama_barang }}</td>
                  <td>{{ $p->kondisi_baik }}</td>
                  <td>{{ $p->kondisi_sedang }}</td>
                  <td>{{ $p->kondisi_rusak }}</td>
                  <td>{{ $p->ruangan->nama_ruangan }}</td>
                  <td>{{ $p->pic }}</td>
                  <td>
                    @if($p->gambar)
                        <a href="/upload/barang/{{ $p->gambar}}" target="_blank">
                            <img style="max-width:50px; max-height:50px" src="/upload/barang/{{ $p->gambar}}" alt="">
                        </a>
                    @else
                        <span class="badge badge-warning">Tidak ada gambar</span>
                    @endif
                  </td>
                  <td>
                    <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal" data-target="#modal-barang-edit" data-id="{{ $p->id }}" style="color: black">
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
  <div class="modal fade" id="modal-barang">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Barang</h4>
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
                <form id="form-barang" action="" method="POST" enctype="multipart/form-data">
                  @csrf <!-- Tambahkan token CSRF -->
                  <div class="card-body">

                    <div class="form-group" id="kategori_barang_id_container">
                      <label for="kategori_barang_id">Kategori Barang</label>  
                      <select class="form-control" name="kategori_barang_id" id="kategori_barang_id">
                          <option value="">--Pilih Kategori Barang--</option>
                          @foreach ($kategori_barang as $p)
                              <option value="{{ $p->id }}">{{ $p->nama_kategori_barang }}</option>
                          @endforeach
                      </select>
                    </div>

                  <div class="row">        
                      <div class="col-6">
                        <div class="form-group" id="kode_barang_container">
                          <label for="kode_barang">Kode Barang</label>  
                          <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="nama_barang_container">
                          <label for="nama_barang">Nama Barang</label>  
                          <input type="text" class="form-control " name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="merk_container">
                          <label for="merk">Merk Barang</label>  
                          <input type="text" class="form-control " name="merk" id="merk" placeholder="Masukkan Merk Barang">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="type_container">
                          <label for="type">Type Barang</label>  
                          <input type="text" class="form-control" name="type" id="type" placeholder="Masukkan Type Barang">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="tanggal_masuk_container">
                          <label for="tanggal_masuk">Tanggal Masuk Barang</label>  
                          <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="{{ now()->format('Y-m-d') }}" >
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="kondisi_baik_container">
                          <label for="type">Jumlah Kondisi Baik</label>  
                          <input type="number" class="form-control " name="kondisi_baik" id="kondisi_baik" value="0">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="kondisi_sedang_container">
                          <label for="type">Jumlah Kondisi Sedang</label>  
                          <input type="number" class="form-control " name="kondisi_sedang" id="kondisi_sedang" value="0">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="kondisi_rusak_container">
                          <label for="type">Jumlah Kondisi Rusak</label>  
                          <input type="number" class="form-control " name="kondisi_rusak" id="kondisi_rusak" value="0">
                        </div>
                      </div>
                      
                      <div class="col-6">
                        <div class="form-group" id="ruangan_id_container">
                          <label for="ruangan_id">Ruangan</label>  
                          <select class="form-control" name="ruangan_id" id="ruangan_id">
                              <option value="">--Pilih Ruangan--</option>
                              @foreach ($ruangan as $p)
                                  <option value="{{ $p->id }}">{{ $p->nama_ruangan }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="status_container">
                          <label for="status">Status</label>  
                          <select class="form-control" name="status" id="status">
                                  <option value="">--Pilih Status--</option>
                                  <option value="Baru">Baru</option>
                                  <option value="Bekas">Bekas</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="harga_perolehan_container">
                          <label for="type">Jumlah Harga Perolehan</label>  
                          <input type="text" class="form-control harga_perolehan" name="harga_perolehan" id="harga_perolehan" placeholder="Masukkan Jumlah Harga Perolehan">
                        </div>
                      </div>
                      
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                    <script>
                        $(document).ready(function () {
                            $('.harga_perolehan').on('input', function (e) {
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

                      <div class="col-6">
                        <div class="form-group" id="asal_container">
                          <label for="type">Asal</label>  
                          <input type="text" class="form-control" name="asal" id="asal" placeholder="Masukkan Asal">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="pic_container">
                          <label for="type">PIC</label>  
                          <input type="text" class="form-control" name="pic" id="pic" placeholder="Masukkan PIC">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group" id="gambar_container">
                          <label for="type">Gambar</label>  
                          <input type="file" class="form-control" name="gambar" id="gambar">
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
                    <button type="submit" class="btn btn-primary" id="btn-save-barang"><i class="fas fa-save"></i> Simpan</button>
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
    <div class="modal fade" id="modal-barang-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Form Barang</h4>
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
                  <form id="form-barang-edit" action="" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="id" name="id" /> <!-- Input hidden untuk menyimpan ID -->
            
                    <div class="card-body">

                      <div class="form-group" id="kategori_barang_id_edit_container">
                        <label for="kategori_barang_id_edit">Kategori Barang</label>  
                        <select class="form-control" name="kategori_barang_id" id="kategori_barang_id_edit">
                          <option value="">--Pilih Kategori Barang--</option>
                          @foreach ($kategori_barang as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_kategori_barang }}</option>
                          @endforeach
                      </select>
                      
                     </div>
                    
                    
                  
                      <div class="row">        
                          <div class="col-6">
                              <div class="form-group" id="kode_barang_edit_container">
                                  <label for="kode_barang_edit">Kode Barang</label>  
                                  <input type="text" class="form-control" name="kode_barang" id="kode_barang_edit" placeholder="Masukkan Kode Barang">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="nama_barang_edit_container">
                                  <label for="nama_barang_edit">Nama Barang</label>  
                                  <input type="text" class="form-control " name="nama_barang" id="nama_barang_edit" placeholder="Masukkan Nama Barang">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="merk_edit_container">
                                  <label for="merk_edit">Merk Barang</label>  
                                  <input type="text" class="form-control " name="merk" id="merk_edit" placeholder="Masukkan Merk Barang">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="type_edit_container">
                                  <label for="type_edit">Type Barang</label>  
                                  <input type="text" class="form-control" name="type" id="type_edit" placeholder="Masukkan Type Barang">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="tanggal_masuk_edit_container">
                                  <label for="tanggal_masuk_edit">Tanggal Masuk Barang</label>  
                                  <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk_edit" value="{{ now()->format('Y-m-d') }}" >
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="kondisi_baik_edit_container">
                                  <label for="type_edit">Jumlah Kondisi Baik</label>  
                                  <input type="number" class="form-control " name="kondisi_baik" id="kondisi_baik_edit" value="0">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="kondisi_sedang_edit_container">
                                  <label for="type_edit">Jumlah Kondisi Sedang</label>  
                                  <input type="number" class="form-control " name="kondisi_sedang" id="kondisi_sedang_edit" value="0">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="kondisi_rusak_edit_container">
                                  <label for="type_edit">Jumlah Kondisi Rusak</label>  
                                  <input type="number" class="form-control " name="kondisi_rusak" id="kondisi_rusak_edit" value="0">
                              </div>
                          </div>
                          
                         

                          
                          <div class="col-6">
                              <div class="form-group" id="ruangan_id_edit_container">
                                  <label for="ruangan_id_edit">Ruangan</label>  
                                  <select class="form-control" name="ruangan_id" id="ruangan_id_edit">
                                      <option value="">--Pilih Ruangan--</option>
                                      @foreach ($ruangan as $p)
                                          <option value="{{ $p->id }}">{{ $p->nama_ruangan }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="status_edit_container">
                                  <label for="status_edit">Status</label>  
                                  <select class="form-control" name="status" id="status_edit">
                                      <option value="">--Pilih Status--</option>
                                      <option value="Baru">Baru</option>
                                      <option value="Bekas">Bekas</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group" id="harga_perolehan_edit_container">
                                  <label for="type_edit">Jumlah Harga Perolehan</label>  
                                  <input type="text" class="form-control harga_perolehan_edit" name="harga_perolehan" id="harga_perolehan_edit" placeholder="Masukkan Jumlah Harga Perolehan">
                              </div>
                          </div>
                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                          <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                          <script>
                              $(document).ready(function () {
                                  $('.harga_perolehan_edit').on('input', function (e) {
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

                        <div class="col-6">
                          <div class="form-group" id="asal_edit_container">
                              <label for="type_edit">Asal</label>  
                              <input type="text" class="form-control asal" name="asal" id="asal_edit" placeholder="Masukkan Asal">
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group" id="pic_edit_container">
                            <label for="type">PIC</label>  
                            <input type="text" class="form-control" name="pic" id="pic_edit" placeholder="Masukkan PIC">
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group" id="gambar_container">
                            <label for="type">Gambar</label>  
                            <input type="file" class="form-control" name="gambar" id="gambar">
                          </div>
                        </div>

                        {{-- <div class="form-group" id="gambar_edit_container">
                           
                    
                     
                          <div id="gambar_image_container"></div>
                          <br>
                          <!-- Tautan untuk mengunduh atau melihat gambar -->
                          <a id="gambar_download_link" href="" target="_blank">
                            
                          </a>
                        </div> --}}
                  
                      </div>   

                    

                      <div class="form-group" id="keterangan_edit_container">
                          <label for="keterangan_edit">Keterangan</label>  
                          <textarea class="form-control" name="keterangan" id="keterangan_edit" cols="30" rows="2"></textarea>
                      </div>
                                       
                    </div>
                  
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="btn-update-barang"><i class="fas fa-save"></i> Simpan</button>
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
      $('#form-barang').submit(function(event) {
        event.preventDefault();
        const tombolSimpan = $('#btn-save-barang')

        // Buat objek FormData
        var formData = new FormData(this);

        $.ajax({
          url: '{{ route("barang.store") }}',
          type: 'POST',
          data: formData,
          processData: false, // Menghindari jQuery memproses data
          contentType: false, // Menghindari jQuery mengatur Content-Type
          beforeSend: function() {
            $('form').find('.error-message').remove()
            tombolSimpan.prop('disabled', true)
          },
          success: function(response) {
            $('#modal-barang').modal('hide');
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
              $('#modal-barang').modal('hide');
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
              barang: 'GET',
                url: '/barang/' + id + '/edit',
                success: function(data) {

                


                  $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                  $('#kategori_barang_id_edit').val(data.kategori_barang_id); // Menambahkan nilai gambar ke input gambar_edit
                  $('#kode_barang_edit').val(data.kode_barang); // Menambahkan nilai kode_barang ke input kode_barang_edit
                  $('#nama_barang_edit').val(data.nama_barang); // Menambahkan nilai nama_barang ke input nama_barang_edit
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
                      var gambarImg = '<img src="/upload/barang/' + data.gambar + '" style="max-width: 100px; max-height: 100px;">';
                      var gambarLink = '<a href="/upload/barang/' + data.gambar + '" target="_blank"><i class="fa fa-eye"></i> Lihat Gambar</a>';
                      $('#gambar_edit_container').append(gambarImg + '<br>' + gambarLink);
                    }
                    
                    $('#modal-barang-edit').modal('show');
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
      $('#btn-update-barang').click(function(e) {
          e.preventDefault();
          const tombolUpdate = $('#btn-update-barang');
          var id = $('#id').val();
          var formData = new FormData($('#form-barang-edit')[0]);

          $.ajax({
              type: 'POST',
              url: '/barang/update/' + id,
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
                  $('#modal-barang-edit').modal('hide');
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
                      $('#modal-barang-edit').modal('hide');
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
            url: '/barang/' + id,
            type: 'DELETE',
            data: {
              "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
              if (response.hasOwnProperty('message') && response.message.includes('terkait dengan mutasi_barang')) {
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





 