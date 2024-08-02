@extends('back.layouts.app')
@section('title', 'Halaman Tahun Ajaran')
@section('subtitle', 'Menu Tahun Ajaran')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0"><b>Form Tahun Ajaran</b></h5>
                    <br>
                    <hr>
                    <form action="{{ route('tahunajaran.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @if (session('message'))
                            <div class="alert alert-danger">{{ session('message') }}</div>
                        @endif

                        <div class="form-group">
                            <label>Nama Tahun Ajaran <small class="text-muted">(Cth : 2022/2023)</small></label>
                            <input type="text" class="form-control phone-inputmask" name="nama_tahun_ajaran"
                                placeholder="Masukan Nama Tahun Ajaran" value="{{ old('nama_tahun_ajaran', $data->nama_tahun_ajaran) }}">
                            @error('nama_tahun_ajaran')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status <small class="text-muted">(Cth : Aktif)</small></label>
                            <select class="form-control" name="status">
                                <option value="">Pilih Status</option>
                                <option value="Aktif" {{ old('status', $data->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Non Aktif" {{ old('status', $data->status) == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                            </select>
                            @error('status')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success" style="color:white;">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="/tahunajaran" class="btn btn-danger" style="color:white;">
                                    <i class="fas fa-step-backward"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
