@extends('back.layouts.app')
@section('title', 'Lihat Jadwal Pelajaran')
@section('subtitle', 'Menu Lihat Jadwal Pelajaran')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0"><b>Lihat Jadwal Pelajaran</b></h5>
                    <br>
                    <hr>

                    <div class="col-md-12">
                        <div class="form-group">
                            @php $firstJadwal = $jadwalPelajaran->first(); @endphp
                            <label>Kelas : {{ $firstJadwal->kelas->nama_kelas }}</label>
                        </div>

                    </div>


                    {{-- awal bagian looping  --}}
                    @foreach ($jadwalPelajaranDetails as $hari => $details)
                        <br>
                        <div class="col-md-12">
                            {{-- <div class="form-group"> --}}
                            <label for="hari">Hari : {{ $hari }}</label>
                            {{-- </div> --}}
                        </div>

                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="background-color: grey; color:azure;">No</th>
                                    <th style="background-color: grey; color:azure;">Jam Mengajar</th>
                                    <th style="background-color: grey; color:azure;">Waktu Mengajar</th>
                                    <th style="background-color: grey; color:azure;">Mata Pelajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td hidden>ID <input type="text" name="waktu_mengajar_id[]"
                                                value="{{ $detail->waktuMengajar->id }}"></td>
                                        <td>Jam Ke : {{ $detail->waktuMengajar->jam }}</td>
                                        <td>{{ $detail->waktuMengajar->waktu }}</td>
                                        <td>
                                            <b>{{ $detail->mapel ? $detail->mapel->nama_mapel : '-' }}</b>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jam Mengajar</th>
                                <th>Waktu Mengajar</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </tfoot> --}}
                        </table>
                    @endforeach

                    {{-- akhir bagian looping  --}}

                    <div class="border-top" id="unhide">
                        <div class="card-body">
                            <button id="btnPrint" class="btn btn-success" style="color:white;"><i class="fas fa-print"></i>
                                Cetak</button>


                            <a href="/tampilkan-jadwal" class="btn btn-danger" style="color:white;"><i
                                    class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        // Fungsi untuk membuka jendela cetak saat tombol cetak diklik
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnPrint').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
@endpush
