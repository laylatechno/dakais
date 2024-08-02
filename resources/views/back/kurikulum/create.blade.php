@extends('back.layouts.app')
@section('title', 'Halaman Kurikulum')
@section('subtitle', 'Menu Kurikulum')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Kurikulum</b></h5>
                <br>
                <hr>
                <form action="{{ route('kurikulum.store') }}" method="post">
                    @csrf

                    @if (session('message'))
                        <div class="alert alert-danger">{{ session('message') }}</div>
                    @endif

                    <div class="form-group">
                        <label>Nama Kurikulum <small class="text-muted">(Cth : Kurtilas)</small></label>
                        <input type="text" class="form-control" name="nama_kurikulum"
                            placeholder="Masukan Nama Kurikulum" value="{{ old('nama_kurikulum') }}">
                        @error('nama_kurikulum')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status <small class="text-muted">(Cth : Aktif)</small></label>
                        <select class="form-control" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Non Aktif" {{ old('status') == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                        @error('status')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success" style="color:white;">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="/kurikulum" class="btn btn-danger" style="color:white;">
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
