@extends('back.layouts.app')
@section('title','Halaman Mitra')
@section('subtitle','Menu Mitra')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Mitra</b></h5>
                <br>
                <hr>
                <form action="{{ route('mitra.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @error('nama_mitra')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Mitra <small class="text-muted">(Cth : PT. Dekan)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_mitra"
                            placeholder="Masukan Nama Mitra" value="{{ old('nama_mitra')}}">
                    </div>

                    @error('no_telp')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>No Telp <small class="text-muted">(Cth : 085320555394)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="no_telp"
                            placeholder="Masukan No Telp Mitra" value="{{ old('no_telp')}}">
                    </div>

                    @error('email')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Cth : a@.admin.com)</small></label>
                        <input type="email" class="form-control phone-inputmask" name="email"
                            placeholder="Masukan Email Mitra" value="{{ old('email')}}">
                    </div>


                    @error('instagram')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Instagram <small class="text-muted">(Cth : @muhraff)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="instagram"
                            placeholder="Masukan Instagram Mitra" value="{{ old('instagram')}}">
                    </div>

                    @error('youtube')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Youtube <small class="text-muted">(Cth : muhraff)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="youtube"
                            placeholder="Masukan Youtube Mitra" value="{{ old('youtube')}}">
                    </div>

                    @error('website')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Website <small class="text-muted">(Cth : https://a.com)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="website"
                            placeholder="Masukan Website Mitra" value="{{ old('website')}}">
                    </div>


                  
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : Terdiri dari Data diri sampai Skill)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ old('keterangan')}}</textarea>
                    </div>
 
                  
                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan Mitra" value="{{ old('urutan')}}">
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
                        <a href="/mitra" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection