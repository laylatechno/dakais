@extends('back.layouts.app')
@section('title', 'Halaman Kegiatan')
@section('subtitle', 'Menu Kegiatan')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kegiatan - {{ $profil->nama_sekolah }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-surat-masuk"><i
                            class="fas fa-plus-circle"></i> Tambah Data</a>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Jam</th>
                                <th>Tempat</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th id="unhide">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($kegiatan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama_kegiatan }}</td>
                                    <td>{{ $p->tanggal_kegiatan }}</td>
                                    <td>{{ $p->jam }}</td>
                                    <td>{{ $p->tempat }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td><a href="/upload/kegiatan/{{ $p->gambar }}" target="_blank"><img
                                                style="max-width:50px; max-height:50px"
                                                src="/upload/kegiatan/{{ $p->gambar }}" alt=""></a></td>
                                    <td id="unhide">
                                        <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal"
                                            data-target="#modal-surat-masuk-edit" data-id="{{ $p->id }}"
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
    <div class="modal fade" id="modal-surat-masuk">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Kegiatan</h4>
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

                        <form id="form-surat-masuk" action="" method="POST" enctype="multipart/form-data">
                            @csrf <!-- Tambahkan token CSRF -->
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" id="tanggal_kegiatan_container">
                                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                            <input type="date" class="form-control" name="tanggal_kegiatan"
                                                id="tanggal_kegiatan" value="{{ now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id="jam_container">
                                            <label for="jam">Jam</label>
                                            <input type="text" class="form-control " name="jam" id="jam"
                                                placeholder="Masukkan Jam">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="nama_kegiatan_container">
                                            <label for="nama_kegiatan">Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="nama_kegiatan"
                                                id="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group" id="tempat_container">
                                            <label for="tempat">Tempat</label>
                                            <input type="text" class="form-control " name="tempat" id="tempat"
                                                placeholder="Masukkan Tempat">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id="gambar_container">
                                            <label for="type">Gambar</label>
                                            <input type="file" class="form-control" name="gambar" id="gambar">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="map_container">
                                            <label for="map">Map</label>
                                            <input type="text" class="form-control " name="map" id="map"
                                                placeholder="Masukkan Map">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="status_container">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">--Pilih Status--</option>
                                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="Non Aktif" {{ old('status') == 'Non Aktif' ? 'selected' : '' }}>
                                                    Non Aktif
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group" id="deskripsi_container">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-save-surat-masuk"><i
                                            class="fas fa-save"></i> Simpan</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span> Close</button>

                                </div>
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
    <div class="modal fade" id="modal-surat-masuk-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Edit Kegiatan</h4>
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

                        <form id="form-surat-masuk-edit" action="" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="id" name="id" />
                            <!-- Input hidden untuk menyimpan ID -->
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group" id="tanggal_kegiatan_container_edit">
                                            <label for="tanggal_kegiatan_edit">Tanggal Kegiatan</label>
                                            <input type="date" class="form-control" name="tanggal_kegiatan"
                                                id="tanggal_kegiatan_edit" value="{{ now()->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id="jam_container_edit">
                                            <label for="jam_edit">Jam</label>
                                            <input type="text" class="form-control " name="jam" id="jam_edit"
                                                placeholder="Masukkan Jam">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="nama_kegiatan_container_edit">
                                            <label for="nama_kegiatan_edit">Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="nama_kegiatan"
                                                id="nama_kegiatan_edit" placeholder="Masukkan Nama Kegiatan">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group" id="tempat_container_edit">
                                            <label for="tempat_edit">Tempat</label>
                                            <input type="text" class="form-control " name="tempat" id="tempat_edit"
                                                placeholder="Masukkan Tempat">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group" id="gambar_container_edit">
                                            <label for="type">Gambar</label>
                                            <input type="file" class="form-control" name="gambar" id="gambar_edit">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group" id="map_container_edit">
                                            <label for="map_edit">Map</label>
                                            <input type="text" class="form-control " name="map" id="map_edit"
                                                placeholder="Masukkan Map">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group" id="status_container_edit">
                                            <label for="status_edit">Status</label>
                                            <select class="form-control" name="status" id="status_edit">
                                                <option value="">--Pilih Status--</option>
                                                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                                    Aktif
                                                </option>
                                                <option value="Non Aktif" {{ old('status') == 'Non Aktif' ? 'selected' : '' }}>
                                                    Non Aktif
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group" id="deskripsi_container_edit">
                                            <label for="deskripsi_edit">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi_edit" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>


                                </div>




                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="btn-update-surat-masuk"><i
                                            class="fas fa-save"></i> Update</button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span> Close</button>

                                </div>
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
            $('#form-surat-masuk').submit(function(event) {
                event.preventDefault();
                const tombolSimpan = $('#btn-save-surat-masuk')

                // Buat objek FormData
                var formData = new FormData(this);

                $.ajax({
                    url: '{{ route('kegiatan.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false, // Menghindari jQuery memproses data
                    contentType: false, // Menghindari jQuery mengatur Content-Type
                    beforeSend: function() {
                        $('form').find('.error-message').remove()
                        tombolSimpan.prop('disabled', true)
                    },
                    success: function(response) {
                        $('#modal-surat-masuk').modal('hide');
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
                            $('#modal-surat-masuk').modal('hide');
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
                    method: 'GET',
                    url: '/kegiatan/' + id + '/edit',
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#tanggal_kegiatan_edit').val(data.tanggal_kegiatan);
                        $('#nama_kegiatan_edit').val(data.nama_kegiatan);
                        $('#jam_edit').val(data.jam);
                        $('#map_edit').val(data.map);
                        $('#tempat_edit').val(data.tempat);
                        $('#status_edit').val(data.status);

                        $('#deskripsi_edit').val(data.deskripsi);





                        $('#modal-surat-masuk-edit').modal('show');
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
            $('#btn-update-surat-masuk').click(function(e) {
                e.preventDefault();
                const tombolUpdate = $('#btn-update-surat-masuk');
                var id = $('#id').val();
                var formData = new FormData($('#form-surat-masuk-edit')[0]);

                $.ajax({
                    type: 'POST',
                    url: '/kegiatan/update/' + id,
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
                        $('#modal-surat-masuk-edit').modal('hide');
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
                            $('#modal-surat-masuk-edit').modal('hide');
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
                            url: '/kegiatan/' + id,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                if (response.hasOwnProperty('message') && response
                                    .message.includes(
                                        'terkait dengan mutasi_surat-masuk')) {
                                    Swal.fire({
                                        title: 'Oops!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                } else if (response.hasOwnProperty('message') &&
                                    response.message === 'Data Berhasil Dihapus') {
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
                                } else {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: response.message ||
                                            'Gagal menghapus data',
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
