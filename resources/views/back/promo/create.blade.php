@extends('back.layouts.app')
@section('title','Halaman PROMO')
@section('subtitle','Menu PROMO')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form PROMO</b></h5>
                <hr>
                <form action="{{ route('promo.store') }}"  method="post" >
                    @csrf
                    @error('nama')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Promo <small class="text-muted">(Cth : Promo Desember)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama"
                            placeholder="Masukan Nama Promo" value="{{ old('nama')}}">
                    </div>
                    
                    @error('kode')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kode Promo <small class="text-muted">(Cth : des2023)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kode"
                            placeholder="Masukan kode PROMO" value="{{ old('kode')}}">
                    </div>
                   
                    @error('diskon')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Diskon (%) <small class="text-muted">(Cth : 10)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="diskon"
                            placeholder="Masukan diskon PROMO" value="{{ old('diskon')}}">
                    </div>
                   

                    @error('kuota')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kuota <small class="text-muted">(Cth : 100)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="kuota"
                            placeholder="Masukan kuota PROMO" value="{{ old('kuota')}}">
                    </div>

                    
                    @error('status')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Status  </label>
                        <select name="status" id="status" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>
                      
                        </select>
                    </div>
                   
                    

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/promo" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection