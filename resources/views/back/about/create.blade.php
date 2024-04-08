@extends('back.layouts.app')
@section('title','Halaman About')
@section('subtitle','Menu About')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form About</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('about.store') }}"  method="post">
                    @csrf
                    @error('nama_about')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama <small class="text-muted">(Cth : Jasa Programming)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_about"
                            placeholder="Masukan Nama About" value="{{ old('nama_about')}}">
                    </div>
                    
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : Jasa Programming)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ old('keterangan')}}</textarea>
                    </div>
                   
                    @error('link')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Link <small class="text-muted">(Cth : https://wwww.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="link"
                            placeholder="Masukan Link About" value="{{ old('link')}}">
                    </div>

                    @error('ikon')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Ikon <small class="text-muted">(Cth : fa-address-book)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="ikon"
                            placeholder="Masukan Ikon About" value="{{ old('ikon')}}">
                    </div>

                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan About" value="{{ old('urutan')}}">
                    </div>
                   
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/about" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection