@extends('back.layouts.app')
@section('title', 'Edit Absensi')
@section('subtitle', 'Menu Absensi')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Edit Absensi</b></h5>
                <br>
                <hr>

                <form action="{{ route('absensi.update', $absensi->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <!-- Validasi untuk guru_id -->
                    @error('guru_id')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select class="form-control" name="guru_id">
                            @foreach ($guru as $guruItem)
                                <option value="{{ $guruItem->id }}" {{ $guruItem->id == $absensi->guru_id ? 'selected' : '' }}>
                                    {{ $guruItem->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Validasi untuk siswa_id -->
                    @error('siswa_id')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <select class="form-control" name="siswa_id">
                            @foreach ($siswa as $siswaItem)
                                <option value="{{ $siswaItem->id }}" {{ $siswaItem->id == $absensi->siswa_id ? 'selected' : '' }}>
                                    {{ $siswaItem->nama_siswa }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Validasi untuk status -->
                    @error('status')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label>Status Kehadiran</label>
                        <select class="form-control" name="status">
                            <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Alpa" {{ $absensi->status == 'Alpa' ? 'selected' : '' }}>Alpa</option>
                            <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                        </select>
                    </div>

                    <!-- Validasi untuk keterangan -->
                    @error('keterangan')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ $absensi->keterangan }}</textarea>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('absensi.index') }}" class="btn btn-danger"><i class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
