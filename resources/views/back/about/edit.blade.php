@extends('back.layouts.app')
@section('title','Halaman About')
@section('subtitle','Menu About')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form About</b></h5>
                <hr>
               
                <form action="{{ route('about.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama_about')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama <small class="text-muted">(Cth : Ucapan Selamat Datang)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_about"
                            placeholder="Masukan Nama About" value="{{ $data->nama_about }}">
                    </div>
                    
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : Detail dari ucapan selamat datang)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                    </div>
                   
                    @error('link')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Link <small class="text-muted">(Cth : https://wwww.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="link"
                            placeholder="Masukan Link About" value="{{ $data->link }}">
                    </div>


                     
                    @error('ikon')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : fa-address-book)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="ikon"
                            placeholder="Masukan Ikon About" value="{{ $data->ikon }}">
                    </div>
                   

                                         
                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan About" value="{{ $data->urutan }}">
                    </div>
                   
                     
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/about" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection