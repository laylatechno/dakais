@extends('back.layouts.app')
@section('title','Halaman Galeri')
@section('subtitle','Menu Galeri')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Galeri</b></h5>
                <br>
                <hr>
                <form action="{{ route('galeri.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @error('nama_galeri')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Galeri <small class="text-muted">(Cth : Umum)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_galeri"
                            placeholder="Masukan Nama Galeri" value="{{ old('nama_galeri')}}">
                    </div>

                    @error('kategori_galeri_id')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="kategori_galeri_id">Kategori <small class="text-muted">(Cth : Umum)</small></label>
                        <select class="form-control" name="kategori_galeri_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriGaleris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori_galeri }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : Terdiri dari Data diri sampai Skill)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ old('keterangan')}}</textarea>
                    </div>

                    @error('link')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Link <small class="text-muted">(Cth : https://www.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="link"
                            placeholder="Masukan Link Galeri" value="{{ old('link')}}">
                    </div>
                    
                  
                   


                   
                    @error('gambar')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Gambar <small class="text-muted">(Masukkan dengan tipe file jpg, png, jpeg & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="gambar">
                    </div>

                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan Galeri" value="{{ old('urutan')}}">
                    </div>

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/galeri" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection