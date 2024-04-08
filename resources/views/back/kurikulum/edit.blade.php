@extends('back.layouts.app')
@section('title','Halaman Kurikulum')
@section('subtitle','Menu Kurikulum')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Kurikulum</b></h5>
                <br>
                <hr>
               
                <form action="{{ route('kurikulum.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('nama_kurikulum')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Kurikulum <small class="text-muted">(Cth : Kurtilas)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_kurikulum"
                            placeholder="Masukan Nama Kurikulum" value="{{ $data->nama_kurikulum }}">
                    </div>
                    

                    @error('status')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="status">Status <small class="text-muted">(Cth : Aktif)</small></label>
                        <select class="form-control" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Aktif" {{ $data->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Non Aktif" {{ $data->status == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                        </select>
                    </div>

             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/kurikulum" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection