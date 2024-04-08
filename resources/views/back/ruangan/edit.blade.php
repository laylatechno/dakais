@extends('back.layouts.app')
@section('title','Halaman Ruangan')
@section('subtitle','Menu Ruangan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Ruangan</b></h5>
                <br>
                <hr>
               
                <form action="{{ route('ruangan.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('kode_ruangan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kode Ruangan <small class="text-muted">(Cth : R001)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kode_ruangan"
                            placeholder="Masukan Kode Ruangan" value="{{ $data->kode_ruangan }}">
                    </div>
                    

                    @error('nama_ruangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Ruangan <small class="text-muted">(Cth : Aula)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_ruangan"
                            placeholder="Masukan Nama Ruangan" value="{{ $data->nama_ruangan }}">
                    </div>
                    
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/ruangan" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection