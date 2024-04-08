@extends('back.layouts.app')
@section('title', 'Edit Jadwal Pelajaran')
@section('subtitle', 'Menu Edit Jadwal Pelajaran')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Edit Jadwal Pelajaran</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('jadwal_pelajaran.update', $jadwalPelajaran->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari">Hari <small class="text-muted">(Cth : Senin)</small></label>
                                <select class="form-control" name="hari">
                                    <option value="">--Pilih Hari--</option>
                                    <option value="Senin" {{ $jadwalPelajaran->hari === 'Senin' ? 'selected' : '' }}>Senin</option>
                                    <option value="Selasa" {{ $jadwalPelajaran->hari === 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                    <option value="Rabu" {{ $jadwalPelajaran->hari === 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                    <option value="Kamis" {{ $jadwalPelajaran->hari === 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                    <option value="Jumat" {{ $jadwalPelajaran->hari === 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                    <option value="Sabtu" {{ $jadwalPelajaran->hari === 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                    <option value="Minggu" {{ $jadwalPelajaran->hari === 'Minggu' ? 'selected' : '' }}>Minggu</option>
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
                                        <option value="{{ $kelasItem->id }}" {{ $jadwalPelajaran->kelas_id == $kelasItem->id ? 'selected' : '' }}>{{ $kelasItem->nama_kelas }}</option>
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
                                <th colspan="2">Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($waktuMengajar && $mataPelajaran)
                                @foreach ($waktuMengajar as $waktu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td hidden >ID <input type="text" name="waktu_mengajar_id[]" value="{{ $waktu->waktu_mengajar_id }}"></td>
                                        @php
                                            $dataWaktu = \App\Models\WaktuMengajar::find($waktu->waktu_mengajar_id);
                                        @endphp
                                        <td>Jam Ke : {{ $dataWaktu->jam }}</td>
                                        <td>{{ $dataWaktu->waktu }}</td>
                                        <td>
                                            <select class="form-control" name="mapel_id[]">
                                                <option value="">--Ganti Mapel--</option>
                                                @foreach ($mataPelajaran as $mapel)
                                                    <option value="{{ $mapel->id }}">
                                                        {{ $mapel->nama_mapel }}
                                                    </option>
                                                @endforeach
                                            </select>
                                               
                                        </td>
                                        <td>
                                            @php
                                            $mapel = $mataPelajaran->firstWhere('id', $waktu->mapel_id);
                                            @endphp
                                            <b>{{ $mapel ? $mapel->nama_mapel : '' }}</b>
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
                                <th colspan="2">Mata Pelajaran</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                            <a href="/jadwal_pelajaran" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
