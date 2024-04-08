@extends('back.layouts.app')
@section('title', 'Halaman Member')
@section('subtitle', 'Menu Member')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Member - SMPIT Maryam</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-member"><i
                            class="fas fa-plus-circle"></i> Tambah Data</a>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Member</th>
                                <th>Nama Member</th>
                                <th>Saldo</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($member as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->kode_member }}</td>
                                    <td>{{ $p->nama_member }}</td>
                                    <td>{{ number_format($p->saldo, 0, ',', '.') }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal"
                                            data-target="#modal-member-edit" data-id="{{ $p->id }}"
                                            style="color: black">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}"
                                            style="color: white">
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
    <div class="modal fade" id="modal-member">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Member</h4>
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
                        <form id="form-member" action="" method="POST">
                            @csrf <!-- Tambahkan token CSRF -->
                            <div class="card-body">




                                <div class="form-group" id="kode_member_container">
                                    <label for="kode_member">Kode Member</label>
                                    <input type="text" class="form-control phone-inputmask" name="kode_member"
                                        id="kode_member" placeholder="Masukkan Kode Member">
                                </div>
                                <div class="form-group" id="jenis_member_container">
                                    <label for="jenis_member">Jenis Member</label>
                                    <select name="jenis_member" id="jenis_member" class="form-control">
                                        <option value="Umum">Umum</option>
                                        <option value="Siswa">Siswa</option>
                                        <option value="Guru">Guru</option>
                                    </select>
                                </div>

                                <div class="form-group" id="siswa_id_container">
                                    <label for="siswa_id">Cari Siswa</label>
                                    <select class="form-control select2" id="siswa_id" name="siswa_id">
                                        <option value="">--Pilih Siswa--</option>
                                        @foreach ($siswa as $siswaItem)
                                            <option value="{{ $siswaItem->id }}"
                                                data-nama-siswa="{{ $siswaItem->nama_siswa }}">
                                                {{ $siswaItem->nama_siswa }} - {{ $siswaItem->nama_ayah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="guru_id_container">
                                    <label for="guru_id">Cari Guru</label>
                                    <select class="form-control select2" id="guru_id" name="guru_id">
                                        <option value="">--Pilih Guru--</option>
                                        @foreach ($guru as $guruItem)
                                            <option value="{{ $guruItem->id }}"
                                                data-nama-guru="{{ $guruItem->nama_guru }}">
                                                {{ $guruItem->nama_guru }} - {{ $guruItem->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="member_siswa_id_container" hidden>
                                    <label for="member_siswa_id">Siswa ID</label>
                                    <input type="text" class="form-control phone-inputmask" name="member_siswa_id"
                                        id="member_siswa_id" placeholder="">
                                </div>
                                <div class="form-group" id="member_guru_id_container" hidden>
                                    <label for="member_guru_id">Guru ID</label>
                                    <input type="text" class="form-control phone-inputmask" name="member_guru_id"
                                        id="member_guru_id" placeholder="">
                                </div>
                                <div class="form-group" id="nama_member_container">
                                    <label for="nama_member">Nama Member</label>
                                    <input type="text" class="form-control phone-inputmask" name="nama_member"
                                        id="nama_member" placeholder="Masukkan Nama Member">
                                </div>
                                <div class="form-group" id="saldo_container">
                                    <label for="saldo">Saldo</label>
                                    <input type="text" class="form-control phone-inputmask" name="saldo"
                                        id="saldo" placeholder="0" readonly>
                                </div>
                                <div class="form-group" id="status_container">
                                    <label for="status">Status Member</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                    </select>
                                </div>









                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-save-member"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span> Close</button>

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
    <div class="modal fade" id="modal-member-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Member</h4>
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
                        <form id="form-member-edit" action="" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="id" name="id" />
                            <!-- Input hidden untuk menyimpan ID -->

                            <div class="card-body">

                                <div class="form-group" id="kode_member_edit_container">
                                    <label for="kode_member_edit">Kode Member</label>
                                    <input type="text" class="form-control phone-inputmask" name="kode_member"
                                        id="kode_member_edit" placeholder="Masukkan Kode Member" required>
                                </div>
                                <div class="form-group" id="jenis_member_edit_container">
                                    <label for="jenis_member_edit">Jenis Member</label>
                                    <select name="jenis_member" id="jenis_member_edit" class="form-control">
                                        <option value="Umum">Umum</option>
                                        <option value="Siswa">Siswa</option>
                                        <option value="Guru">Guru</option>
                                    </select>
                                </div>

                                <div class="form-group" id="siswa_id_edit_container">
                                    <label for="siswa_id_edit">Cari Siswa</label>
                                    <select class="form-control select2" id="siswa_id_edit" name="siswa_id">
                                        <option value="">--Pilih Siswa--</option>
                                        @foreach ($siswa as $siswaItem)
                                            <option value="{{ $siswaItem->id }}"
                                                data-nama-siswa="{{ $siswaItem->nama_siswa }}">
                                                {{ $siswaItem->nama_siswa }} - {{ $siswaItem->nama_ayah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="guru_id_edit_container">
                                    <label for="guru_id_edit">Cari Guru</label>
                                    <select class="form-control select2" id="guru_id_edit" name="guru_id">
                                        <option value="">--Pilih Guru--</option>
                                        @foreach ($guru as $guruItem)
                                            <option value="{{ $guruItem->id }}"
                                                data-nama-guru="{{ $guruItem->nama_guru }}">
                                                {{ $guruItem->nama_guru }} - {{ $guruItem->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="member_siswa_id_edit_container" hidden>
                                    <label for="member_siswa_id_edit">Siswa ID</label>
                                    <input type="text" class="form-control phone-inputmask" name="member_siswa_id"
                                        id="member_siswa_id_edit" placeholder="">
                                </div>
                                <div class="form-group" id="member_guru_id_edit_container" hidden>
                                    <label for="member_guru_id_edit">Guru ID</label>
                                    <input type="text" class="form-control phone-inputmask" name="member_guru_id"
                                        id="member_guru_id_edit" placeholder="">
                                </div>
                                <div class="form-group" id="nama_member_edit_container">
                                    <label for="nama_member_edit">Nama Member</label>
                                    <input type="text" class="form-control phone-inputmask" name="nama_member"
                                        id="nama_member_edit" placeholder="Masukkan Nama Member">
                                </div>
                                <div class="form-group" id="saldo_edit_container">
                                    <label for="saldo_edit">Saldo</label>
                                    <input type="text" class="form-control phone-inputmask" name="saldo"
                                        id="saldo_edit" placeholder="Masukkan Saldo" readonly>
                                </div>
                                <div class="form-group" id="status_edit_container">
                                    <label for="status_edit">Status Member</label>
                                    <select name="status" id="status_edit" class="form-control">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                    </select>
                                </div>









                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-update-member"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span> Close</button>
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


    <script>
      $(document).ready(function() {
          // Sembunyikan container siswa_id dan guru_id saat halaman dimuat
          $('#siswa_id_container').hide();
          $('#guru_id_container').hide();
  
          // Tampilkan container siswa_id atau guru_id sesuai dengan pilihan jenis_member
          $('#jenis_member').on('change', function() {
              var selectedJenisMember = $(this).val();
  
              // Semua container disembunyikan terlebih dahulu
              $('#siswa_id_container').hide();
              $('#guru_id_container').hide();
  
              // Tampilkan container yang sesuai dengan pilihan jenis_member
              if (selectedJenisMember === 'Siswa') {
                  $('#siswa_id_container').show();
              } else if (selectedJenisMember === 'Guru') {
                  $('#guru_id_container').show();
              }
          }).change(); // Menjalankan event change pada saat halaman dimuat juga
  
          // Inisialisasi select2 setelah container muncul
          $('#siswa_id').select2();
          $('#guru_id').select2();
  
          $(document).on('select2:open', () => {
              document.querySelector('.select2-search__field').focus();
          });
      });
  </script>

<script>
  $(document).ready(function() {
      // Sembunyikan container siswa_id dan guru_id saat halaman dimuat
      $('#siswa_id_container').hide();
      $('#guru_id_container').hide();

      // Tampilkan container siswa_id atau guru_id sesuai dengan pilihan jenis_member
      $('#jenis_member_edit').on('change', function() {
          var selectedJenisMember = $(this).val();

          // Semua container disembunyikan terlebih dahulu
          $('#siswa_id_edit_container').hide();
          $('#guru_id_edit_container').hide();

          // Tampilkan container yang sesuai dengan pilihan jenis_member
          if (selectedJenisMember === 'Siswa') {
              $('#siswa_id_edit_container').show();
          } else if (selectedJenisMember === 'Guru') {
              $('#guru_id_edit_container').show();
          }
      }).change(); // Menjalankan event change pada saat halaman dimuat juga

      // Inisialisasi select2 setelah container muncul
      $('#siswa_id_edit').select2();
      $('#guru_id_edit').select2();

      $(document).on('select2:open', () => {
          document.querySelector('.select2-search__field').focus();
      });
  });
</script>
  


    <!-- Inisialisasi Select2 -->
    <script>
        $(document).ready(function() {
            $('#siswa_id').select2();
            $('#guru_id').select2();
            $('#guru_id_edit').select2();
            $('#siswa_id_edit').select2();

            // Ketika opsi siswa dipilih
            $('#siswa_id').on('change', function() {
                var selectedSiswa = $(this).find(':selected');
                var idSiswa = selectedSiswa.val(); // Mengambil nilai 'value' dari opsi yang dipilih
                var namaSiswa = selectedSiswa.data(
                'nama-siswa'); // Mengambil data 'nama-siswa' dari opsi yang dipilih
                $('#member_siswa_id').val(
                idSiswa); // Mengisikan nilai 'value' ke dalam input 'member_siswa_id'
                $('#nama_member').val(
                namaSiswa); // Mengisikan nilai 'nama-siswa' ke dalam input 'nama_member'
            });

            // Ketika opsi guru dipilih
            $('#guru_id').on('change', function() {
                var selectedGuru = $(this).find(':selected');
                var idGuru = selectedGuru.val(); // Mengambil nilai 'value' dari opsi yang dipilih
                var namaGuru = selectedGuru.data(
                'nama-guru'); // Mengambil data 'nama-guru' dari opsi yang dipilih
                $('#member_guru_id').val(
                idGuru); // Mengisikan nilai 'value' ke dalam input 'member_guru_id'
                $('#nama_member').val(
                namaGuru); // Mengisikan nilai 'nama-guru' ke dalam input 'nama_member'
            });

            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });
        });
    </script>


    {{-- PERINTAH SIMPAN DATA --}}
    <script>
        $(document).ready(function() {
            $('#form-member').submit(function(event) {
                event.preventDefault();
                const tombolSimpan = $('#btn-save-member')

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('member.store') }}',
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {
                        $('form').find('.error-message').remove()
                        tombolSimpan.prop('disabled', true)
                    },
                    success: function(response) {
                        $('#modal-member').modal('hide');
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
                        if (xhr.status !== 422) { // Cek jika bukan error validasi
                            $('#modal-member').modal(
                                'hide'); // Sembunyikan modal hanya jika bukan error validasi
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
                    member: 'GET',
                    url: '/member/' + id + '/edit',
                    success: function(data) {
                        // console.log(data); // Cek apakah data terisi dengan benar
                        // Mengisi data pada form modal
                        $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                        $('#kode_member_edit').val(data.kode_member);
                        $('#jenis_member_edit').val(data.jenis_member);
                        $('#siswa_id_edit').val(data.siswa_id);
                        $('#guru_id_edit').val(data.guru_id);
                        $('#member_guru_id_edit').val(data.member_guru_id);
                        $('#member_siswa_id_edit').val(data.member_siswa_id);
                        $('#nama_member_edit').val(data.nama_member);
                        $('#saldo_edit').val(data.saldo);
                        $('#status_edit').val(data.status);

                        $('#modal-member-edit').modal('show');
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
            $('#btn-update-member').click(function(e) {
                e.preventDefault();
                const tombolUpdate = $('#btn-update-member')
                var id = $('#id').val(); // Ambil ID kota dari input tersembunyi
                var formData = new FormData($('#form-member-edit')[0]);

                

                // Lakukan permintaan Ajax untuk update data kota
                $.ajax({
                    type: 'POST', // Ganti menjadi POST
                    url: '/member/update/' + id,
                    data: formData,
                    headers: {
                        'X-HTTP-Method-Override': 'PUT' // Menggunakan header untuk menentukan metode PUT
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('form').find('.error-message').remove()
                        tombolUpdate.prop('disabled', true)
                    },
                    success: function(response) {
                        $('#modal-member-edit').modal('hide');
                        // Tampilkan pesan sukses menggunakan SweetAlert
                        Swal.fire({
                            title: 'Sukses!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed || result.isDismissed) {
                                location
                                    .reload(); // Merefresh halaman saat pengguna menekan OK pada SweetAlert
                            }
                        });
                        // Tutup modal atau lakukan sesuatu setelah update berhasil
                        $('#modal-member-edit').modal('hide');
                    },
                    complete: function() {
                        tombolUpdate.prop('disabled', false)
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
                            url: '/member/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed || result
                                        .isDismissed) {
                                        location
                                            .reload(); // Merefresh halaman saat pengguna menekan OK pada SweetAlert
                                    }
                                });
                            },
                            error: function(xhr) {
                                console.log(xhr
                                    .responseText
                                ); // Tampilkan pesan error jika terjadi
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
        .select2-container {
            width: 100% !important;

        }
    </style>
@endpush
