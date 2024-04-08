@extends('back.layouts.app')
@section('title','Halaman Alasan')
@section('subtitle','Menu Alasan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Alasan</b></h5>
                <br>
                <hr>
               
                <form action="{{ route('alasan.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama_alasan')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Alasan <small class="text-muted">(Cth : Mudah)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_alasan"
                            placeholder="Masukan Nama Alasan" value="{{ $data->nama_alasan }}">
                    </div>
                    
                    @error('keterangan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Keterangan <small class="text-muted">(Cth : Tahapannya simple & ngga ribet)</small></label>
                        <textarea class="form-control" name="keterangan" rows="3">{{ $data->keterangan }}</textarea>
                    </div>
                   
                    @error('ikon')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Link <small class="text-muted">(Cth : fas fa-edit.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="ikon"
                            placeholder="Masukan Icon" value="{{ $data->ikon }}">
                    </div>


                    @error('urutan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Urutan <small class="text-muted">(Cth : 1)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="urutan"
                            placeholder="Masukan Urutan" value="{{ $data->urutan }}">
                    </div>
                   
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/alasan" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection