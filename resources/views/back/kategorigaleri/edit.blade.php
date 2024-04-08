@extends('back.layouts.app')
@section('title','Halaman Kategori Galeri')
@section('subtitle','Menu Kategori Galeri')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Kategori Galeri</b></h5>
                <br>
                <hr>
               
                <form action="{{ route('kategorigaleri.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama_kategori_galeri')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Kategori Galeri <small class="text-muted">(Cth : Pendidikan)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_kategori_galeri"
                            placeholder="Masukan Nama Kategori Galeri" value="{{ $data->nama_kategori_galeri }}">
                    </div>
                    

                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan Galeri <small class="text-muted">(Cth : 1)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan  Urutan Galeri" value="{{ $data->urutan }}">
                    </div>
                     
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/kategorigaleri" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection