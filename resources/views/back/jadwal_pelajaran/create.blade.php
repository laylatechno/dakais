@extends('back.layouts.app')
@section('title','Halaman Jadwal Pelajaran')
@section('subtitle','Menu Jadwal Pelajaran')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Pembuatan Jadwal Pelajaran</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('jadwal_pelajaran.store') }}"  method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari">Hari <small class="text-muted">(Cth : Senin)</small></label>
                                <select class="form-control" name="hari">
                                    <option value="">--Pilih Hari--</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                    <!-- Tambahkan opsi hari yang lain sesuai kebutuhan -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas_id">Kelas <small class="text-muted">(Cth : 6A)</small></label>
                                <select class="form-control" name="kelas_id">
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jam Mengajar</th>
                                <th>Waktu Mengajar</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($waktu_mengajar && $mataPelajaran)
                                @foreach ($waktu_mengajar as $waktu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td hidden>ID <input type="text" name="waktu_mengajar_id[]" value="{{ $waktu->id }}"></td>
                                        <td>Jam Ke : {{ $waktu->jam }}</td>
                                        <td>{{ $waktu->waktu }}</td>
                                        <td>
                                            <select class="form-control" name="mapel_id[]">
                                                <option value="">--Pilih Mapel--</option>
                                                @foreach ($mataPelajaran as $mapel)
                                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jam Mengajar</th>
                                <th>Waktu Mengajar</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                            <a href="/jadwal_pelajaran" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
