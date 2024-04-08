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
               
                <form action="{{ route('kelas.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama_kelas')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Kelas <small class="text-muted">(Cth : Bagaimana Caranya ?)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_kelas"
                            placeholder="Masukan Nama Kelas" value="{{ $data->nama_kelas }}">
                    </div>
                    
                


                    @error('wali_kelas')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="wali_kelas">Wali Klas  </label>
                        <select class="form-control" name="wali_kelas">
                            <option value="">Pilih Wali Kelas</option>
                            @foreach ($waliKelas as $p)
                                <option value="{{ $p->id }}" {{ old('wali_kelas', $data->wali_kelas) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                   
                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : fas fa-edit.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan urutan" value="{{ $data->urutan }}">
                    </div>
                   
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/kelas" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection