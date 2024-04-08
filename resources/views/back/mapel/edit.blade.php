@extends('back.layouts.app')
@section('title','Halaman Mapel')
@section('subtitle','Menu Mapel')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Mapel</b></h5>
                <br>
                <hr>
               
                <form action="{{ route('mapel.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama_mapel')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Mapel <small class="text-muted">(Cth : Bagaimana Caranya ?)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_mapel"
                            placeholder="Masukan Nama Mapel" value="{{ $data->nama_mapel }}">
                    </div>
                    
                                    @error('guru_pengampu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="guru_pengampu">Guru Pengampu  </label>
                        <select class="form-control" name="guru_pengampu">
                            <option value="">Pilih Kategori</option>
                            @foreach ($guruPengampu as $p)
                                <option value="{{ $p->id }}" {{ old('guru_pengampu', $data->guru_pengampu) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                   
                    @error('kkm')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>KKM <small class="text-muted">(Cth : 80.)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="kkm"
                            placeholder="Masukan kkm" value="{{ $data->kkm }}">
                    </div>
                   
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/mapel" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection