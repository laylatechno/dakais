@extends('back.layouts.app')
@section('title','Halaman Kepala Sekolah')
@section('subtitle','Menu Kepala Sekolah')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Kepala Sekolah</b></h5>
                <br>
                <hr>
                <form action="{{ route('kepala_sekolah.store') }}"  method="post" >
                    @csrf
 
                    @error('nip')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>NIP <small class="text-muted">(Cth : 3246255656235)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nip"
                            placeholder="Masukan NIP Kepala Sekolah" value="{{ old('nip')}}">
                    </div>

                 
                    @error('nama_kepala_sekolah')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Kepala Sekolah <small class="text-muted">(Cth : Muhammad Rafi Heryadi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_kepala_sekolah"
                            placeholder="Masukan Nama Kepala Sekolah" value="{{ old('nama_kepala_sekolah')}}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            @error('tanggal_mulai')
                            <small style="color: red">{{ $message }} </small>
                            @enderror
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control phone-inputmask" name="tanggal_mulai"
                                     value="{{ old('tanggal_mulai')}}">
                            </div>
                        </div>
    
    
                        <div class="col-md-6 col-sm-12 col-12">
                            @error('tanggal_akhir')
                            <small style="color: red">{{ $message }} </small>
                            @enderror
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" class="form-control phone-inputmask" name="tanggal_akhir"
                                    value="{{ old('tanggal_akhir')}}">
                            </div>
                        </div>
                    </div>
                   
                    
                    @error('status')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="">--Pilih Status--</option>
                            
                                <option value="Aktif">
                                    Aktif
                                </option>
                                <option value="NonAktif">
                                    NonAktif
                                </option>
                            
                        </select>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/kepala_sekolah" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection