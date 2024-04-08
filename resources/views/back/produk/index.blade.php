@extends('back.layouts.app')
@section('title', 'Halaman Produk')
@section('subtitle', 'Menu Produk')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Produk - SMPIT Maryam</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-produk"><i
                            class="fas fa-plus-circle"></i> Tambah Data</a>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Produk</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Beli</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($produk as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->kategoriProduk->nama_kategori_produk }}</td>
                                    <td>{{ $p->kode_produk }}</td>
                                    <td>{{ $p->nama_produk }}</td>
                                    <td>Rp. {{ number_format($p->harga_beli) }}</td>
                                    <td>{{ $p->stok }}</td>
                                    <td>{{ $p->status }}</td>
                                    {{-- <td>Rp. {{ number_format($p->jumlah_produk) }}</td> --}}
                                    <td>
                                        @if ($p->gambar)
                                            <a href="/upload/produk/{{ $p->gambar }}" target="_blank">
                                                <img style="max-width:50px; max-height:50px"
                                                    src="/upload/produk/{{ $p->gambar }}" alt="">
                                            </a>
                                        @else
                                            <span class="badge badge-warning">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning btn-edit" data-toggle="modal"
                                            data-target="#modal-produk-edit" data-id="{{ $p->id }}"
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
    <div class="modal fade" id="modal-produk">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Main content -->

                    <!-- Main content -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-produk" action="" method="POST" enctype="multipart/form-data">
                            @csrf <!-- Tambahkan token CSRF -->
                            <div class="card-body">

                                <div class="row">
                                    <!-- First Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori_produk_id">Kategori</label>
                                            <select class="form-control select2" name="kategori_produk_id"
                                                id="kategori_produk_id">
                                                <option value="">--Pilih Kategori--</option>
                                                @foreach ($kategoriProduk as $kategori)
                                                    <option value="{{ $kategori->id }}">
                                                        {{ $kategori->nama_kategori_produk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="nama_produk_container">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control " name="nama_produk" id="nama_produk"
                                                placeholder="Masukkan Nama Produk">
                                        </div>
                                        <div class="form-group" id="type_container">
                                            <label for="type">Type Produk</label>
                                            <input type="text" class="form-control type" name="type" id="type"
                                                placeholder="Masukkan Type Produk">
                                        </div>
                                        <div class="form-group" id="status_container">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" name="status" id="status" required>
                                                <option value="Aktif">Aktif</option>
                                                <option value="NonAktif">NonAktif</option>

                                            </select>
                                        </div>


                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-md-6">

                                        <div class="form-group" id="kode_produk_container">
                                            <label for="kode_produk">Kode Produk</label>
                                            <input type="text" class="form-control " name="kode_produk" id="kode_produk"
                                                placeholder="Masukkan Kode Produk">
                                        </div>
                                        <div class="form-group" id="merk_container">
                                            <label for="merk">Merk Produk</label>
                                            <input type="text" class="form-control" name="merk" id="merk"
                                                placeholder="Masukkan Merk Produk">
                                        </div>
                                        <div class="form-group" id="stok_container">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control" name="stok" id="stok"
                                                placeholder="Masukkan Stok Produk">
                                        </div>
                                        <div class="form-group" id="lokasi_container">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text" class="form-control" name="lokasi" id="lokasi"
                                                placeholder="Masukkan Lokasi Produk">
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <span style="color:brown; font-size:15px;"><i>Masukkan Isi Satuan misal : Satuan 1 =
                                            Karton, Satuan 2 = Pcs, Isi = 1 Karton berisi 12 Pcs</i></span>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="satuan_produk_id_1">Satuan 1</label>
                                            <select class="form-control select2" name="satuan_produk_id_1"
                                                id="satuan_produk_id_1">
                                                <option value="">--Pilih Satuan--</option>
                                                @foreach ($satuanProduk as $satuan)
                                                    <option value="{{ $satuan->id }}">
                                                        {{ $satuan->nama_satuan_produk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="satuan_produk_id_2">Satuan 2</label>
                                            <select class="form-control select2" name="satuan_produk_id_2"
                                                id="satuan_produk_id_2">
                                                <option value="">--Pilih Satuan--</option>
                                                @foreach ($satuanProduk as $satuan)
                                                    <option value="{{ $satuan->id }}">
                                                        {{ $satuan->nama_satuan_produk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="isi_edit">Isi</label>
                                            <input type="number" class="form-control isi" name="isi" id="isi"
                                                placeholder="Masukan Isi">
                                        </div>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-md-12">

                                        <div class="form-group" id="harga_beli_container">
                                            <label for="harga_beli">Harga Beli <span
                                                    style="color:brown; font-size:10px;"><i>(Harga dari Satuan
                                                        1)</i></span></label>
                                            <input type="text" class="form-control harga_beli" name="harga_beli"
                                                id="harga_beli" placeholder="Masukkan Harga Beli">
                                        </div>




                                    </div>
                                    <!-- First Column -->
                                    <div class="col-md-4">


                                        <div class="form-group" id="harga_jual_1_container">
                                            <label for="harga_jual_1">Harga Jual 1</label>
                                            <input type="text" class="form-control harga_jual_1" name="harga_jual_1"
                                                id="harga_jual_1" placeholder="Masukkan Harga Jual 1">
                                        </div>


                                    </div>

                                    <!-- First Column -->
                                    <div class="col-md-4">


                                        <div class="form-group" id="harga_jual_2_container">
                                            <label for="harga_jual_2">Harga Jual 2</label>
                                            <input type="text" class="form-control harga_jual_2" name="harga_jual_2"
                                                id="harga_jual_2" placeholder="Masukkan Harga Jual 2">
                                        </div>


                                    </div>

                                    <!-- First Column -->
                                    <div class="col-md-4">


                                        <div class="form-group" id="harga_jual_3_container">
                                            <label for="harga_jual_3">Harga Jual 3</label>
                                            <input type="text" class="form-control harga_jual_3" name="harga_jual_3"
                                                id="harga_jual_3" placeholder="Masukkan Harga Jual 3">
                                        </div>


                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-md-12">

                                        <div class="form-group" id="gambar_container">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control gambar" name="gambar"
                                                id="gambar">
                                        </div>




                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <script>
                                        $(document).ready(function() {
                                            // Event handler saat input berubah pada input harga_beli dan harga_jual
                                            $('#harga_beli, #harga_jual_1, #harga_jual_2, #harga_jual_3').on('input', function(e) {
                                                var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                                var formattedVal = addThousandSeparator(inputVal);
                                                $(this).val(formattedVal);
                                            });

                                            // Fungsi untuk menambahkan separator ribuan
                                            function addThousandSeparator(num) {
                                                var parts = num.toString().split(".");
                                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                                return parts.join(".");
                                            }
                                        });
                                    </script>


                                    <!-- Second Column -->
                                    <div class="col-md-12">

                                        <div class="form-group" id="deskripsi_container">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="2"></textarea>
                                        </div>




                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-save-produk"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span> Close</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->


                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Modal Edit Data --}}
    <div class="modal fade" id="modal-produk-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Main content -->

                    <!-- Main content -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form-produk-edit" action="" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="id" name="id" />
                            <div class="card-body">

                                <div class="row">
                                    <!-- First Column -->
                                    <div class="col-md-6">


                                        <div class="form-group">
                                            <label for="kategori_produk_id_edit">Kategori</label>
                                            <select class="form-control select2" name="kategori_produk_id"
                                                id="kategori_produk_id_edit">
                                                @foreach ($kategoriProduk as $kategori)
                                                    <option value="{{ $kategori->id }}">
                                                        {{ $kategori->nama_kategori_produk }}</option>
                                                @endforeach
                                            </select>

                                        </div>


                                        <div class="form-group" id="nama_produk_container">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control " name="nama_produk"
                                                id="nama_produk_edit" placeholder="Masukkan Nama Produk">
                                        </div>
                                        <div class="form-group" id="type_container">
                                            <label for="type">Type Produk</label>
                                            <input type="text" class="form-control type" name="type"
                                                id="type_edit" placeholder="Masukkan Type Produk">
                                        </div>
                                        <div class="form-group" id="status_container">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" name="status" id="status_edit"
                                                required>
                                                <option value="">--Pilih Status--</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="NonAktif">NonAktif</option>

                                            </select>
                                        </div>


                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-md-6">

                                        <div class="form-group" id="kode_produk_container">
                                            <label for="kode_produk">Kode Produk</label>
                                            <input type="text" class="form-control " name="kode_produk"
                                                id="kode_produk_edit" placeholder="Masukkan Kode Produk">
                                        </div>
                                        <div class="form-group" id="merk_container">
                                            <label for="merk">Merk Produk</label>
                                            <input type="text" class="form-control" name="merk" id="merk_edit"
                                                placeholder="Masukkan Merk Produk">
                                        </div>
                                        <div class="form-group" id="stok_container">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control" name="stok" id="stok_edit"
                                                placeholder="Masukkan Stok Produk">
                                        </div>
                                        <div class="form-group" id="lokasi_container">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text" class="form-control" name="lokasi" id="lokasi_edit"
                                                placeholder="Masukkan Lokasi Produk">
                                        </div>
                                    </div>

                                    <span style="color:brown; font-size:15px;"><i>Masukkan Isi Satuan misal : Satuan 1 =
                                            Karton, Satuan 2 = Pcs, Isi = 1 Karton berisi 12 Pcs</i></span>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="satuan_produk_id_1_edit">Satuan 1</label>


                                            <select class="form-control select2" name="satuan_produk_id_1"
                                                id="satuan_produk_id_1_edit">
                                                @foreach ($satuanProduk as $satuan)
                                                    <option value="{{ $satuan->id }}"
                                                        {{ old('satuan_produk_id_1') == $satuan->id ? 'selected' : '' }}>
                                                        {{ $satuan->nama_satuan_produk }}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="satuan_produk_id_2_edit">Satuan 2</label>
                                            <select class="form-control select2" name="satuan_produk_id_2"
                                                id="satuan_produk_id_2_edit">

                                                @foreach ($satuanProduk as $satuan)
                                                    <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan_produk }}
                                                    </option>
                                                @endforeach
                                            </select>



                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label for="isi_edit">Isi</label>
                                            <input type="number" class="form-control isi" name="isi" id="isi_edit"
                                                placeholder="Masukan Isi">
                                        </div>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-md-12">

                                        <div class="form-group" id="harga_beli_container">
                                            <label for="harga_beli">Harga Beli <span
                                                    style="color:brown; font-size:10px;"><i>(Harga dari Satuan
                                                        1)</i></span></label>
                                            <input type="text" class="form-control harga_beli" name="harga_beli"
                                                id="harga_beli_edit" placeholder="Masukkan Harga Beli">
                                        </div>




                                    </div>
                                    <!-- First Column -->
                                    <div class="col-md-4">


                                        <div class="form-group" id="harga_jual_1_container">
                                            <label for="harga_jual_1">Harga Jual 1</label>
                                            <input type="text" class="form-control harga_jual_1" name="harga_jual_1"
                                                id="harga_jual_1_edit" placeholder="Masukkan Harga Jual 1">
                                        </div>


                                    </div>

                                    <!-- First Column -->
                                    <div class="col-md-4">


                                        <div class="form-group" id="harga_jual_2_container">
                                            <label for="harga_jual_2">Harga Jual 2</label>
                                            <input type="text" class="form-control harga_jual_2" name="harga_jual_2"
                                                id="harga_jual_2_edit" placeholder="Masukkan Harga Jual 2">
                                        </div>


                                    </div>

                                    <!-- First Column -->
                                    <div class="col-md-4">


                                        <div class="form-group" id="harga_jual_3_container">
                                            <label for="harga_jual_3">Harga Jual 3</label>
                                            <input type="text" class="form-control harga_jual_3" name="harga_jual_3"
                                                id="harga_jual_3_edit" placeholder="Masukkan Harga Jual 3">
                                        </div>


                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-md-12">



                                        <div class="form-group" id="gambar_edit_container">
                                            <label for="gambar_edit">Bukti Produk</label>

                                            <input type="file" class="form-control" name="gambar" id="gambar_edit">

                                            <div id="gambar_image_container"></div>
                                            <br>
                                            <!-- Tautan untuk mengunduh atau melihat gambar -->
                                            <a id="gambar_download_link" href="" target="_blank">

                                            </a>
                                        </div>




                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                    <script>
                                        $(document).ready(function() {
                                            // Event handler saat input berubah pada input harga_beli dan harga_jual
                                            $('#harga_beli_edit, #harga_jual_1_edit, #harga_jual_2_edit, #harga_jual_3_edit').on('input', function(
                                                e) {
                                                var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                                var formattedVal = addThousandSeparator(inputVal);
                                                $(this).val(formattedVal);
                                            });

                                            // Fungsi untuk menambahkan separator ribuan
                                            function addThousandSeparator(num) {
                                                var parts = num.toString().split(".");
                                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                                return parts.join(".");
                                            }
                                        });
                                    </script>


                                    <!-- Second Column -->
                                    <div class="col-md-12">

                                        <div class="form-group" id="deskripsi_container">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi_edit" cols="30" rows="2"></textarea>
                                        </div>




                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-update-produk"><i
                                        class="fas fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span> Close</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->


                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>







@endsection


{{-- @push('css')
    <link rel="stylesheet" href="{{ asset('themplete/back/plugins/select2/css/custom.css') }}">
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush --}}

@push('scripts')
    <!-- Memuat skrip JavaScript Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- Inisialisasi Select2 -->
    <script>
        $(document).ready(function() {
            $('#kategori_produk_id').select2();
            $('#kategori_produk_id_edit').select2();
            $('#satuan_produk_id_1').select2();
            $('#satuan_produk_id_2').select2();
            $('#satuan_produk_id_1_edit').select2();
            $('#satuan_produk_id_2_edit').select2();


        });
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>




    {{-- PERINTAH SIMPAN DATA --}}
    <script>
        $(document).ready(function() {
            $('#form-produk').submit(function(event) {
                event.preventDefault();
                const tombolSimpan = $('#btn-save-produk')

                // Buat objek FormData
                var formData = new FormData(this);

                $.ajax({
                    url: '{{ route('produk.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false, // Menghindari jQuery memproses data
                    contentType: false, // Menghindari jQuery mengatur Content-Type
                    beforeSend: function() {
                        $('form').find('.error-message').remove()
                        tombolSimpan.prop('disabled', true)
                    },
                    success: function(response) {
                        $('#modal-produk').modal('hide');
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
                            $('#modal-produk').modal('hide');
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
                    produk: 'GET',
                    url: '/produk/' + id + '/edit',
                    success: function(data) {
                        // console.log(data); // Cek apakah data terisi dengan benar
                        // Mengisi data pada form modal
                        $('#id').val(data.id); // Menambahkan nilai id ke input tersembunyi
                        $('#kode_produk_edit').val(data.kode_produk);
                        $('#nama_produk_edit').val(data.nama_produk);
                        $('#merk_edit').val(data.merk);
                        $('#type_edit').val(data.type);
                        $('#stok_edit').val(data.stok);
                        $('#status_edit').val(data.status);
                        $('#lokasi_edit').val(data.lokasi);
                        $('#harga_beli_edit').val(formatNumber(data.harga_beli));
                        $('#harga_jual_1_edit').val(formatNumber(data.harga_jual_1));
                        $('#harga_jual_2_edit').val(formatNumber(data.harga_jual_2));
                        $('#harga_jual_3_edit').val(formatNumber(data.harga_jual_3));
                        $('#deskripsi_edit').val(data.deskripsi);
                        $('#kategori_produk_id_edit').val(data.kategori_produk_id).trigger(
                            'change');
                        $('#satuan_produk_id_1_edit').val(data.satuan_produk_id_1).trigger(
                            'change');
                        $('#satuan_produk_id_2_edit').val(data.satuan_produk_id_2).trigger(
                            'change');

                        $('#isi_edit').val(data.isi);
                        // Tambahkan logika untuk menampilkan gambar bukti pada formulir edit
                        if (data.gambar) {
                            var gambarImg = '<img src="/upload/produk/' + data.gambar +
                                '" style="max-width: 100px; max-height: 100px;">';
                            var gambarLink = '<a href="/upload/produk/' + data.gambar +
                                '" target="_blank"><i class="fa fa-eye"></i> Lihat Gambar</a>';
                            $('#gambar_edit_container').append(gambarImg + '<br>' + gambarLink);
                        }

                        function formatNumber(number) {
                            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }

                        $('#modal-produk-edit').modal('show');
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
            $('#btn-update-produk').click(function(e) {
                e.preventDefault();
                const tombolUpdate = $('#btn-update-produk');
                var id = $('#id').val();
                var formData = new FormData($('#form-produk-edit')[0]);

                $.ajax({
                    type: 'POST',
                    url: '/produk/update/' + id,
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
                        $('#modal-produk-edit').modal('hide');
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
                            $('#modal-produk-edit').modal('hide');
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
                            url: '/produk/' + id,
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
