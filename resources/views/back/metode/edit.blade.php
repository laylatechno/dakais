@extends('back.layouts.app')
@section('title','Halaman Metode')
@section('subtitle','Menu Metode')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Metode</b></h5>
                <hr>
               
                <form action="{{ route('metode.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama <small class="text-muted">(Cth : Muhammad Wiliam Heryadi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama"
                            placeholder="Masukan Nama Metode" value="{{ $data->nama }}">
                    </div>
                    
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : MasyaAlloh pelayanan maksimal biaya terjangkau)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                    </div>
                   
                    @error('gambar')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <img style="max-width:100px; max-height:100px" src="/upload/{{ $data->gambar}}" alt="">
                        <br>
                        <label>Gambar <small class="text-muted">(Masukkan dengan tipe file jpg, png, jpeg & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="gambar">
                    </div>

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/metode" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection