@extends('back.layouts.app')
@section('title','Halaman Jurusan')
@section('subtitle','Menu Jurusan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Jurusan</b></h5>
                <br>
                <hr>
                <form action="{{ route('jurusan.store') }}"  method="post" >
                    @csrf
                    @error('kode_jurusan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kode Jurusan <small class="text-muted">(Cth : JK001)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kode_jurusan"
                            placeholder="Masukan Kode Jurusan" value="{{ old('kode_jurusan')}}">
                    </div>


                    @error('nama_jurusan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Jurusan <small class="text-muted">(Cth : TKJ)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_jurusan"
                            placeholder="Masukan Nama Jurusan" value="{{ old('nama_jurusan')}}">
                    </div>
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    
                    

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/jurusan" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection