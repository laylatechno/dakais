@extends('back.layouts.app')
@section('title','Halaman Slider')
@section('subtitle','Menu Slider')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Slider</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('slider.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @error('nama_slider')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama <small class="text-muted">(Cth : Ucapan Selamat Datang)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_slider"
                            placeholder="Masukan Nama Slider" value="{{ old('nama_slider')}}">
                    </div>
                    
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : Detail dari ucapan selamat datang)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ old('keterangan')}}</textarea>
                    </div>
                   
                    @error('link')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Link <small class="text-muted">(Cth : https://wwww.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="link"
                            placeholder="Masukan Link Slider" value="{{ old('link')}}">
                    </div>

                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan Slider" value="{{ old('urutan')}}">
                    </div>
                   
                    @error('gambar')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Gambar <small class="text-muted">(Masukkan dengan tipe file jpg, png, jpeg & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="gambar">
                    </div>

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/slider" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection