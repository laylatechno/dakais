@extends('back.layouts.app')
@section('title', 'Halaman Lihat Pendaftaran')
@section('subtitle', 'Menu Lihat Pendaftaran')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Lihat Pendaftaran - {{ $profil->nama_sekolah }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <!-- Add this link/button in your view file -->


                    {{-- <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-spp"><i class="fas fa-plus-circle"></i> Tambah Data</a>   --}}
                    <a href="{{ route('pendaftaran.delete-all') }}" class="btn btn-danger mb-3"
                        onclick="return confirm('Apakah Anda Yakin Akan Menghapus Semua Data, silahkan Back Up terlebih dahulu?')"><i
                            class="fa fa-trash"></i> Hapus Semua Data</a>



                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>NIK</th>
                                <th>Siswa</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th style="text-align: center;" width="20%;">Aksi</th>



                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pendaftaran as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->tanggal_pendaftaran }}</td>
                                    <td>{{ $p->nik }}</td>
                                    <td>{{ $p->siswa->nama_siswa }}</td>
                                    <td>{{ $p->siswa->email }}</td>
                                    <td>
                                        @if ($p->status == 'Pending')
                                            <span class="badge badge-warning">{{ $p->status }}</span>
                                        @elseif($p->status == 'Aktif')
                                            <span class="badge badge-success">{{ $p->status }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $p->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($p->siswa->foto)
                                            <a href="/upload/foto_siswa/{{ $p->siswa->foto }}" target="_blank">
                                                <img style="max-width:50px; max-height:50px"
                                                    src="/upload/foto_siswa/{{ $p->siswa->foto }}" alt="">
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;" id="unhide">
                                        <a href="#" class="btn btn-sm btn-primary btn-edit" data-toggle="modal"
                                            data-target="#modal-pendaftaran-edit" data-id="{{ $p->id }}"
                                            style="color: rgb(244, 242, 242)">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>

                                        <a href="#" class="btn btn-sm btn-success btn-status" data-toggle="modal"
                                            data-target="#modal-pendaftaran-status" data-id="{{ $p->id }}"
                                            style="color: rgb(244, 242, 242)">
                                            <i class="fas fa-edit"></i> Ubah Status
                                        </a>
                                        <button class="btn btn-sm btn-danger btn-hapus" data-id="{{ $p->id }}"
                                            style="color: white">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>

                                    </td>


                                </tr>
                                <!-- Modal untuk Ubah Status -->
                                <div class="modal fade" id="modal-pendaftaran-status" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-pendaftaran-status-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-pendaftaran-status-label">Ubah Status
                                                    Pendaftaran</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="statusForm">
                                                    <input type="hidden" id="pendaftaran_id">
                                                    <div class="form-group">
                                                        <label for="nama_siswa_status">Nama Siswa</label>
                                                        <input type="text" class="form-control" id="nama_siswa_status"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="status_select">Status</label>
                                                        <select class="form-control" id="status_select">
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Pending">Pending</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="button" class="btn btn-primary"
                                                    id="saveStatusBtn">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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




    {{-- Modal Edit Data --}}
    <div class="modal fade" id="modal-pendaftaran-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pendaftaran</h4>
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
                        <form id="form-pendaftaran-edit" action="" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="id" name="id" />
                            <!-- Input hidden untuk menyimpan ID -->

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="tanggal_pendaftaran_edit_container">
                                            <label for="tanggal_pendaftaran_edit">Tanggal Pendaftaran</label>
                                            <input type="text" class="form-control " name="tanggal_pendaftaran"
                                                id="tanggal_pendaftaran_edit">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="nik_edit_container">
                                            <label for="nik_edit">Nama Pendaftaran</label>
                                            <input type="text" class="form-control " name="nik" id="nik_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="nama_siswa_edit_container">
                                            <label for="nama_siswa_edit">Nama Siswa</label>
                                            <input type="text" class="form-control nama_siswa_edit" name="nama_siswa"
                                                id="nama_siswa_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="email_edit_container">
                                            <label for="email_edit">Email</label>
                                            <input type="text" class="form-control email_edit" name="email"
                                                id="email_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group" id="jenis_kelamin_edit_container">
                                            <label for="jenis_kelamin_edit">Jenis Kelamin</label>
                                            <input type="text" class="form-control jenis_kelamin_edit"
                                                name="jenis_kelamin" id="jenis_kelamin_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group" id="tempat_lahir_edit_container">
                                            <label for="tempat_lahir_edit">Tempat Lahir</label>
                                            <input type="text" class="form-control tempat_lahir_edit"
                                                name="tempat_lahir" id="tempat_lahir_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <div class="form-group" id="tanggal_lahir_edit_container">
                                            <label for="tanggal_lahir_edit"> <span>(Tahun/Bulan/Tanggal)
                                                    Lahir</span></label>
                                            <input type="text" class="form-control tanggal_lahir_edit"
                                                name="tanggal_lahir" id="tanggal_lahir_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="provinsi_edit_container">
                                            <label for="provinsi_edit">Provinsi</label>
                                            <input type="text" class="form-control provinsi_edit" name="provinsi"
                                                id="provinsi_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="kota_edit_container">
                                            <label for="kota_edit">Kota</label>
                                            <input type="text" class="form-control kota_edit" name="kota"
                                                id="kota_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group" id="alamat_edit_container">
                                            <label for="alamat_edit">Alamat</label>
                                            <input type="text" class="form-control alamat_edit" name="alamat"
                                                id="alamat_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="nama_ayah_edit_container">
                                            <label for="nama_ayah_edit">Nama Ayah</label>
                                            <input type="text" class="form-control nama_ayah_edit" name="nama_ayah"
                                                id="nama_ayah_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="no_telp_ayah_edit_container">
                                            <label for="no_telp_ayah_edit">No Telp Ayah</label>
                                            <input type="text" class="form-control no_telp_ayah_edit"
                                                name="no_telp_ayah" id="no_telp_ayah_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="nama_ibu_edit_container">
                                            <label for="nama_ibu_edit">Nama Ibu</label>
                                            <input type="text" class="form-control nama_ibu_edit" name="nama_ibu"
                                                id="nama_ibu_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="no_telp_ibu_edit_container">
                                            <label for="no_telp_ibu_edit">No Telp Ibu</label>
                                            <input type="text" class="form-control no_telp_ibu_edit"
                                                name="no_telp_ibu" id="no_telp_ibu_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="sekolah_asal_edit_container">
                                            <label for="sekolah_asal_edit">Sekolah Asal</label>
                                            <input type="text" class="form-control sekolah_asal_edit"
                                                name="sekolah_asal" id="sekolah_asal_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group" id="kelas_edit_container">
                                            <label for="kelas_edit">Kelas</label>
                                            <input type="text" class="form-control kelas_edit" name="kelas"
                                                id="kelas_edit">
                                        </div>
                                    </div>
                                    <div class="form-group" id="foto_edit_container">
                                        <label for="foto_edit">Foto Siswa</label>
                                        <div id="foto_image_container"></div>
                                        <br>
                                        <!-- Tautan untuk mengunduh atau melihat gambar -->
                                        <a id="foto_download_link" href="" target="_blank"></a>
                                    </div>









                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                  
                                    <button type="button" class="btn btn-success float-right" id="btn-cetak-pendaftaran"
                                        style="margin-left: 3px;"><i class="fas fa-print"></i> Cetak</button>
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

    <!-- Script JavaScript untuk Tombol Hapus Semua Data -->

    <script>
        $(document).ready(function() {
            // Fungsi untuk menangani klik tombol cetak
            $('#btn-cetak-pendaftaran').click(function() {
                // Ambil semua nilai input dari modal
                var tanggalPendaftaran = $('#tanggal_pendaftaran_edit').val();
                var nik = $('#nik_edit').val();
                var namaSiswa = $('#nama_siswa_edit').val();
                var email = $('#email_edit').val();
                var jenisKelamin = $('#jenis_kelamin_edit').val();
                var tempatLahir = $('#tempat_lahir_edit').val();
                var tanggalLahir = $('#tanggal_lahir_edit').val();
                var provinsi = $('#provinsi_edit').val();
                var kota = $('#kota_edit').val();
                var alamat = $('#alamat_edit').val();
                var namaAyah = $('#nama_ayah_edit').val();
                var noTelpAyah = $('#no_telp_ayah_edit').val();
                var namaIbu = $('#nama_ibu_edit').val();
                var noTelpIbu = $('#no_telp_ibu_edit').val();
                var sekolahAsal = $('#sekolah_asal_edit').val();
                var kelas = $('#kelas_edit').val();
                // Ambil URL foto siswa
                var fotoSiswa = $('#foto_image_container img').attr('src');
    
                // Lakukan pencetakan data, misalnya dengan membuka jendela baru dan menampilkan data
                var printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Data Pendaftaran</title></head><body>');
                printWindow.document.write('<h2>Data Pendaftaran Peserta Didik Baru </h2>');
    
                // Tampilkan foto siswa jika ada
                if (fotoSiswa) {
                    printWindow.document.write('<img src="' + fotoSiswa + '" style="max-width: 200px; max-height: 200px;">');
                } else {
                    printWindow.document.write('<p>Foto siswa tidak tersedia</p>');
                }
    
                printWindow.document.write('<p><b>Tanggal Pendaftaran:</b> ' + tanggalPendaftaran + '</p>');
                printWindow.document.write('<p><b>NIK:</b> ' + nik + '</p>');
                printWindow.document.write('<p><b>Nama Siswa:</b> ' + namaSiswa + '</p>');
                printWindow.document.write('<p><b>Email:</b> ' + email + '</p>');
                printWindow.document.write('<p><b>Jenis Kelamin:</b> ' + jenisKelamin + '</p>');
                printWindow.document.write('<p><b>Tempat Lahir:</b> ' + tempatLahir + '</p>');
                printWindow.document.write('<p><b>Tanggal Lahir:</b> ' + tanggalLahir + '</p>');
                printWindow.document.write('<p><b>Provinsi:</b> ' + provinsi + '</p>');
                printWindow.document.write('<p><b>Kota:</b> ' + kota + '</p>');
                printWindow.document.write('<p><b>Alamat:</b> ' + alamat + '</p>');
                printWindow.document.write('<p><b>Nama Ayah:</b> ' + namaAyah + '</p>');
                printWindow.document.write('<p><b>No Telp Ayah:</b> ' + noTelpAyah + '</p>');
                printWindow.document.write('<p><b>Nama Ibu:</b> ' + namaIbu + '</p>');
                printWindow.document.write('<p><b>No Telp Ibu:</b> ' + noTelpIbu + '</p>');
                printWindow.document.write('<p><b>Sekolah Asal:</b> ' + sekolahAsal + '</p>');
                printWindow.document.write('<p><b>Kelas:</b> ' + kelas + '</p>');
    
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print(); // Cetak jendela baru
            });
        });
    </script>
    
    


    <script>
        $(document).ready(function() {
            // Event handler untuk tombol edit
            $('.btn-edit').click(function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '/pendaftaran/' + id + '/edit',
                    success: function(data) {
                        console.log(data); // Pastikan data diterima

                        if (data.siswa) {
                            $('#nama_siswa_edit').val(data.siswa
                                .nama_siswa); // Mengisi nama siswa

                            // Mengisi data lainnya pada form modal
                            $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                            $('#tanggal_pendaftaran_edit').val(data.tanggal_pendaftaran);
                            $('#nik_edit').val(data.nik);
                            $('#email_edit').val(data.siswa.email);
                            $('#jenis_kelamin_edit').val(data.siswa.jenis_kelamin);
                            $('#tempat_lahir_edit').val(data.siswa.tempat_lahir);
                            $('#tanggal_lahir_edit').val(data.siswa.tanggal_lahir);
                            $('#provinsi_edit').val(data.siswa.provinsi);
                            $('#kota_edit').val(data.siswa.kota);
                            $('#alamat_edit').val(data.siswa.alamat);
                            $('#nama_ayah_edit').val(data.siswa.nama_ayah);
                            $('#no_telp_ayah_edit').val(data.siswa.no_telp_ayah);
                            $('#nama_ibu_edit').val(data.siswa.nama_ibu);
                            $('#no_telp_ibu_edit').val(data.siswa.no_telp_ibu);
                            $('#sekolah_asal_edit').val(data.siswa.sekolah_asal);
                            $('#kelas_edit').val(data.siswa.kelas);

                            // Tambahkan logika untuk menampilkan gambar foto pada formulir edit
                            if (data.siswa.foto) {
                                var fotoImg = '<img src="/upload/foto_siswa/' + data.siswa
                                    .foto + '" style="max-width: 300px; max-height: 300px;">';
                                var fotoLink = '<a href="/upload/foto_siswa/' + data.siswa
                                    .foto + '" target="_blank"></a>';
                                $('#foto_image_container').html(fotoImg + '<br>' + fotoLink);
                            } else {
                                $('#foto_image_container').html(
                                    ''); // Kosongkan jika tidak ada foto
                            }
                        } else {
                            console.error('Data siswa tidak ditemukan');
                        }

                        $('#modal-pendaftaran-edit').modal('show');
                        $('#id').val(id);
                    },

                    error: function(xhr) {
                        // Tangani kesalahan jika ada
                        alert('Error: ' + xhr.statusText);
                    }
                });
            });

            // Event handler untuk tombol status
            $('.btn-status').click(function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: '/pendaftaran/' + id + '/edit',
                    success: function(data) {
                        if (data.siswa) {
                            $('#pendaftaran_id').val(data.id);
                            $('#nama_siswa_status').val(data.siswa.nama_siswa);
                            $('#status_select').val(data.status); // set initial status
                            $('#modal-pendaftaran-status').modal('show');
                        } else {
                            console.error('Data siswa tidak ditemukan');
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.statusText);
                    }
                });
            });

            $('#saveStatusBtn').click(function() {
                var id = $('#pendaftaran_id').val();
                var status = $('#status_select').val();

                $.ajax({
                    type: 'PUT',
                    url: '/pendaftaran/' + id + '/status',
                    data: {
                        status: status,
                        _token: '{{ csrf_token() }}' // pastikan CSRF token dikirim
                    },
                    success: function(response) {
                        $('#modal-pendaftaran-status').modal('hide');
                        // Tampilkan pesan sukses menggunakan SweetAlert
                        Swal.fire({
                            title: 'Sukses memperbaharui status!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed || result.isDismissed) {
                                location
                                    .reload(); // Merefresh halaman saat pengguna menekan OK pada SweetAlert
                            }
                        });
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.statusText);
                    }
                });
            });
        });
    </script>




    {{-- PERINTAH UPDATE DATA --}}
    <script>
        $(document).ready(function() {
            $('#btn-update-pendaftaran').click(function(e) {
                e.preventDefault();
                const tombolUpdate = $('#btn-update-pendaftaran');
                var id = $('#id').val();
                var formData = new FormData($('#form-pendaftaran-edit')[0]);

                $.ajax({
                    type: 'POST',
                    url: '/pendaftaran/update/' + id,
                    data: formData,
                    headers: {
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('form').find('.error-message').remove();
                        tombolUpdate.prop('disabled', true);
                    },
                    success: function(response) {
                        $('#modal-pendaftaran-edit').modal('hide');
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
                        if (xhr.status !== 422) {
                            $('#modal-pendaftaran-edit').modal('hide');
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
                            url: '/pendaftaran/' + id,
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
