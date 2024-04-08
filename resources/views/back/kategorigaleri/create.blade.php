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
                <form action="{{ route('kategorigaleri.store') }}"  method="post" >
                    @csrf
                    @error('nama_kategori_galeri')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Kategori Galeri <small class="text-muted">(Cth : Sosial)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_kategori_galeri"
                            placeholder="Masukan Nama Kategori Galeri" value="{{ old('nama_kategori_galeri')}}">
                    </div>

                    @error('urutan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan Galeri <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan Galeri" value="{{ old('urutan')}}">
                    </div>
                    
                    
                    

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/kategorigaleri" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection