@extends('back.layouts.app')
@section('title','Halaman Mapel')
@section('subtitle','Menu Mapel')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Mapel</b></h5>
                <br>
                <hr>
                <form action="{{ route('mapel.store') }}"  method="post" >
                    @csrf
                    @error('nama_mapel')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Mapel <small class="text-muted">(Cth : Matematika )</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_mapel"
                            placeholder="Masukan Nama Mapel" value="{{ old('nama_mapel')}}">
                    </div>
                    
                    @error('guru_pengampu')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                    
                    <div class="form-group">
                        <label for="guru_pengampu">Guru Pengampu <small class="text-muted">(Cth : Tedi)</small></label>
                        <select class="form-control" name="guru_pengampu">
                            <option value="">--Pilih Wali Mapel--</option>
                            @foreach ($guruPengampu as $guru)
                                <option value="{{ $guru->id }}" {{ old('guru_pengampu') == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                   
                    @error('kkm')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>KKM <small class="text-muted">(Cth : 75)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="kkm"
                            placeholder="Masukan KKM Mapel" value="{{ old('kkm')}}">
                    </div>
            
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/mapel" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection