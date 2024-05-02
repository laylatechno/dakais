@extends('back.layouts.app')
@section('title', 'Halaman Rekap SPP')
@section('subtitle', 'Menu Rekap SPP')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Rekap SPP - {{ $profil->nama_sekolah }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="unhide">



                    <table id="example4" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>No Telp Ayah</th>
                                <th>No Telp Ibu</th>
                                <th>No Telp Wali</th>


                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rekap_spp_head as $group)
                                <!-- ini adalah kelompok dari siswa_id -->
                                @foreach ($group as $p)
                                    <!-- ini adalah iterasi pada item dalam kelompok -->
                                    <tr>
                                        <td>{{ $loop->parent->iteration }}</td>
                                        <!-- parent untuk mendapatkan iteration dari kelompok -->
                                        <td>{{ $p->siswa->nis }}</td>
                                        <td>{{ $p->siswa->nama_siswa }}</td>
                                        <td>{{ $p->penempatanKelas->nama_kelas ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $p->siswa->no_telp_ayah ?? '-' }}</td>
                                        <td>{{ $p->siswa->no_telp_ibu ?? '-' }}</td>
                                        <td>{{ $p->siswa->no_telp_wali ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('rekap_spp.index', ['siswa_id' => $p->siswa_id]) }}"
                                                class="btn btn-sm btn-warning" style="color: black"
                                                data-nama-siswa="{{ $p->siswa->nama_siswa }}"> <!-- Tambahkan nama siswa -->
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>



                                        </td>
                                    </tr>
                                @break

                                <!-- Hanya ambil item pertama dari setiap kelompok -->
                            @endforeach
                        @endforeach
                    





                    </tbody>

                </table>



            </div>


            <div class="card-body" id="tabel2">
             

                <h3>Bulan Sudah Dibayarkan: <span id="nama_siswa_belum_bayar">{{ $nama_siswa ?? 'Belum Ada Siswa' }}</span></h3>
                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="background-color: grey; color:azure;">No</th>
                            <th style="background-color: grey; color:azure;">Kode Pembayaran</th>
                            <th style="background-color: grey; color:azure;">Tanggal Rekap</th>
                            <th style="background-color: grey; color:azure;">NIS</th>
                            <th style="background-color: grey; color:azure;">Nama Siswa</th>
                            <th style="background-color: grey; color:azure;">Jumlah SPP per bulan</th>
                            <th style="background-color: grey; color:azure;">Jumlah Bayar</th>
                            <th style="background-color: grey; color:azure;">Bulan</th>
                            <th style="background-color: grey; color:azure;">Tahun</th>
                            <th style="background-color: grey; color:azure;">Metode Pembayaran</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($rekap_spp_detail as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kode_pembayaran }}</td>
                                <td>{{ $p->tanggal_bayar }}</td>
                                <td>{{ $p->siswa->nis }}</td>
                                <td>{{ $p->siswa->nama_siswa }}</td>
                                <td>Rp. {{ number_format($p->jumlah_spp) }}</td>
                                <td>Rp. {{ number_format($p->jumlah_bayar) }}</td>
                                <td>{{ $p->sppRelasi->bulan }}
                                <td>{{ $p->sppRelasi->tahun }}
                                </td>


                                <td>{{ $p->metode_pembayaran }}</td>

                            </tr>
                        @endforeach





                    </tbody>

                </table>
              
                <br>
                <hr>
                <!-- Pada bagian view di mana Anda ingin menampilkan nama siswa -->
<h3>Bulan Yang Belum Dibayarkan: <span id="nama_siswa_belum_bayar">{{ $nama_siswa ?? 'Belum Ada Siswa' }}</span></h3>

                <table id="" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            {{-- <th style="background-color: grey; color:azure;">ID</th> --}}
                            <th style="background-color: grey; color:azure;">Bulan</th>
                            <th style="background-color: grey; color:azure;">Tahun</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($unpaid_spp as $spp)
                            <tr>

                                {{-- <td>{{ $spp->id }}</td> --}}
                                <td>{{ $spp->bulan }}</td>
                                <td>{{ $spp->tahun }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr><br>
                <div id="unhide">
                    <a href="/rekap_spp" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>

                    <button id="btnPrint" class="btn btn-success" style="color:white;"><i class="fas fa-print"></i>
                        Cetak</button>
                </div>
               




            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>









@endsection



@push('scripts')
<!-- Memuat skrip JavaScript Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script>
    // Fungsi untuk membuka jendela cetak saat tombol cetak diklik
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnPrint').addEventListener('click', function() {
            window.print();
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
        $('#btn-simpan-bayar-spp').on('click', function(e) {
            e.preventDefault();
            const tombolSimpan = $('#btn-simpan-bayar-spp')
            var formData = new FormData($('#form_bayar-spp')[0]);

            $.ajax({
                url: '/simpan/bayar/spp',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('form').find('.error-message').remove()
                    tombolSimpan.prop('disabled', true)
                },
                success: function(response) {
                    // Tindakan jika permintaan berhasil
                    console.log(response);

                    // Tampilkan notifikasi Sukses menggunakan SweetAlert dengan tombol OK
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: response.message || 'Data berhasil disimpan.',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Di sini, jika pengguna menekan tombol OK, Anda bisa melakukan tindakan lain jika diperlukan
                        if (result.isConfirmed) {
                            // Misalnya, mengarahkan ke halaman lain, melakukan refresh, dll.
                            window.location
                                .reload(); // Contoh: melakukan refresh halaman
                        }
                    });

                    // Lakukan tindakan seperti mengosongkan formulir, dll.
                },
                complete: function() {
                    tombolSimpan.prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    // Tindakan jika ada kesalahan
                    console.error(error);

                    // Tampilkan pesan error dari server di SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message ||
                            'Terjadi kesalahan saat menyimpan data.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>



{{-- Edit Data --}}
<script>
    $(document).on('click', '.btn-edit', function() {
        var id = $(this).data('id');

        $.ajax({
            url: '/ambil-bayar-spp/' + id, // Ganti dengan URL yang sesuai di backend
            type: 'GET',
            success: function(response) {
                // Mengisikan data ke dalam form edit
                function addThousandSeparator(num) {
                    var parts = num.toString().split(".");
                    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    return parts.join(".");
                }
                var pembayaran = response;
                $('#siswa_id_edit').val(pembayaran.siswa_id).trigger('change');
                $('#kode_pembayaran_edit').val(pembayaran.kode_pembayaran);
                $('#tanggal_bayar_edit').val(pembayaran.tanggal_bayar);
                $('#spp_edit').val(pembayaran.spp);


                $('#jumlah_bayar_edit').val(pembayaran.jumlah_bayar);
                // Mengubah format jumlah_spp_edit sebelum menampilkannya
                var formattedSpp = addThousandSeparator(pembayaran
                    .jumlah_bayar); // Format jumlah_spp
                $('#jumlah_bayar_edit').val(formattedSpp);


                $('#jumlah_spp_edit').val(pembayaran.jumlah_spp);
                // Mengubah format jumlah_spp_edit sebelum menampilkannya
                var formattedSpp = addThousandSeparator(pembayaran.jumlah_spp); // Format jumlah_spp
                $('#jumlah_spp_edit').val(formattedSpp);


                $('#metode_pembayaran_edit').val(pembayaran.metode_pembayaran);
                $('#keterangan_edit').val(pembayaran.keterangan);
                $('#id').val(pembayaran.id);


                // Mengatur data siswa yang terpilih di select2
                var selectedBulan = pembayaran.bulan_id.map(
                    String); // Konversi ke string karena select2 menggunakan string
                $('#bulan_id_edit').val(selectedBulan).trigger('change');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
</script>


{{-- PERINTAH UPDATE DATA --}}
<script>
    $(document).ready(function() {
        $('#btn-update-spp').click(function(e) {
            e.preventDefault();
            const tombolUpdate = $('#btn-update-spp');
            var id = $('#id').val();
            var formData = new FormData($('#form_bayar-spp-edit')[0]);

            $.ajax({
                type: 'POST',
                url: '/bayar/spp/' + id,
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
                    $('#modal-pemasukan-edit').modal('hide');
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
                        $('#modal-pemasukan-edit').modal('hide');
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
                    url: '/hapus-bayar-spp/' + id,
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
    .select2-container {
        width: 100% !important;

    }
</style>
@endpush
