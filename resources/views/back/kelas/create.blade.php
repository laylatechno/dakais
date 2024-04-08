@extends('back.layouts.app')
@section('title','Halaman Kelas')
@section('subtitle','Menu Kelas')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Kelas</b></h5>
                <br>
                <hr>
                <form action="{{ route('kelas.store') }}"  method="post" >
                    @csrf
                    @error('nama_kelas')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Kelas <small class="text-muted">(Cth : VII - A )</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_kelas"
                            placeholder="Masukan Nama Kelas" value="{{ old('nama_kelas')}}">
                    </div>
                    
                    @error('wali_kelas')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                    
                    <div class="form-group">
                        <label for="wali_kelas">Wali Kelas  </label>
                        <select class="form-control" name="wali_kelas">
                            <option value="">--Pilih Wali Kelas--</option>
                            @foreach ($waliKelas as $guru)
                                <option value="{{ $guru->id }}" {{ old('wali_kelas') == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    


                   
                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan urutan Kelas" value="{{ old('urutan')}}">
                    </div>
                   
                    

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/kelas" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection