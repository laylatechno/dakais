@extends('back.layouts.app')
@section('title', 'Halaman Top Up Member')
@section('subtitle', 'Menu Top Up Member')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Top Up Member - SMPIT Maryam</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-member"><i
                            class="fas fa-plus-circle"></i> Tambah Data</a>


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Top Up</th>
                                <th>Member</th>
                                <th>Saldo Sebelum Top UP</th>
                                <th>Jumlah Top Up</th>
                                <th>Saldo Sesudah Top UP</th>
                                <th>PIC</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($top_up_member as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->tanggal_top_up }}</td>
                                <td>{{ $p->member->nama_member }}</td>
                                <td>{{ number_format($p->jumlah_sebelum_top_up, 0, ',', '.') }}</td> <!-- Format jumlah_sebelum_top_up -->
                                <td>{{ number_format($p->jumlah_top_up, 0, ',', '.') }}</td> <!-- Format jumlah_top_up -->
                                <td>{{ number_format($p->jumlah_sesudah_top_up, 0, ',', '.') }}</td> <!-- Format jumlah_sesudah_top_up -->
                                <td>{{ $p->pic }}</td>
                                <td>
                                    
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




                                <div class="form-group" id="tanggal_top_up_container">
                                    <label for="tanggal_top_up">Tanggal Top Up</label>
                                    <input type="date" class="form-control" id="tanggal_top_up" name="tanggal_top_up"
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>

                                <div class="form-group" id="member_id_container">
                                    <label for="member_id">Cari Member</label>
                                    <select class="form-control select2" id="member_id" name="member_id">
                                        <option value="">--Pilih Member--</option>
                                        @foreach ($member as $memberItem)
                                            <option value="{{ $memberItem->id }}"
                                                data-saldo-member="{{ $memberItem->saldo }}">
                                                {{ $memberItem->nama_member }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" id="jumlah_sebelum_top_up_container">
                                    <label for="jumlah_sebelum_top_up">Saldo</label>
                                    <input type="text" class="form-control phone-inputmask" name="jumlah_sebelum_top_up"
                                        id="jumlah_sebelum_top_up" placeholder="0" readonly>
                                </div>
                                <div class="form-group" id="jumlah_top_up_container">
                                    <label for="jumlah_top_up">Saldo</label>
                                    <input type="text" class="form-control phone-inputmask" name="jumlah_top_up"
                                        id="jumlah_top_up" placeholder="Masukkan Saldo">
                                </div>
                                <div class="form-group" id="jumlah_sesudah_top_up_container">
                                    <label for="jumlah_sesudah_top_up">Saldo</label>
                                    <input type="text" class="form-control phone-inputmask" name="jumlah_sesudah_top_up"
                                        id="jumlah_sesudah_top_up" placeholder="0" readonly>
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

 



@endsection



@push('scripts')
    <!-- Memuat skrip JavaScript Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>







    <!-- Inisialisasi Select2 -->
    <script>
        $(document).ready(function() {
            $('#member_id').select2();
    
            // Ketika opsi siswa dipilih
            $('#member_id').on('change', function() {
                var selectedMember = $(this).find(':selected');
                var saldoMember = selectedMember.data('saldo-member'); // Mengambil data 'saldo-member' dari opsi yang dipilih
               
                // Mengisikan nilai saldo dengan separator ribuan ke dalam input 'jumlah_sebelum_top_up'
                $('#jumlah_sebelum_top_up').val(saldoMember.toLocaleString('id-ID')); // Ganti 'id-ID' sesuai dengan kode bahasa dan negara yang sesuai
                updateJumlahSesudahTopUp();
            });
    
            // Ketika input jumlah_top_up berubah
            $('#jumlah_top_up').on('input', function() {
                // Menghapus semua karakter selain angka dari nilai input
                var nilaiInput = $(this).val().replace(/[^0-9]/g, '');
                // Mengambil nilai input yang sudah bersih dari karakter non-angka
                var nilaiInputBersih = parseFloat(nilaiInput);
                // Memformat nilai input dengan menambahkan separator ribuan
                var nilaiFormatted = nilaiInputBersih.toLocaleString('id-ID');
                // Menetapkan nilai formatted ke input jumlah_top_up
                $(this).val(nilaiFormatted);
                updateJumlahSesudahTopUp();
            });
    
            // Fungsi untuk menghitung jumlah_sesudah_top_up
            function updateJumlahSesudahTopUp() {
                var jumlahSebelumTopUp = parseFloat($('#jumlah_sebelum_top_up').val().replace(/[^0-9]/g, '')) || 0; // Mengambil angka saja dari nilai input
                var jumlahTopUp = parseFloat($('#jumlah_top_up').val().replace(/[^0-9]/g, '')) || 0; // Mengambil angka saja dari nilai input
                var jumlahSesudahTopUp = jumlahSebelumTopUp + jumlahTopUp;
                $('#jumlah_sesudah_top_up').val(jumlahSesudahTopUp.toLocaleString('id-ID')); // Menetapkan jumlah_sesudah_top_up dengan 2 angka desimal dan separator ribuan
            }
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
                    url: '{{ route('top_up_member.store') }}',
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
                            url: '/top_up_member/' + id,
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
