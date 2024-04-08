@extends('back.layouts.app')
@section('title','Halaman User')
@section('subtitle','Menu User')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form User</b></h5>
                <br><hr>
                <form action="{{ route('users.store') }}"  method="post" >
                    @csrf
                    @error('name')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama <small class="text-muted">(Cth : Muhammad Rudi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="name"
                            placeholder="Masukan Nama User" value="{{ old('name')}}">
                    </div>

                    @error('email')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Cth : admin@admin.com)</small></label>
                        <input type="email" class="form-control phone-inputmask" name="email"
                            placeholder="Masukan Email User" value="{{ old('email')}}">
                    </div>

                    @error('role')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Role <small class="text-muted">(Cth : Admin)</small></label>
                        <select class="form-control" id="role" name="role">
                            <option value="">--Pilih Role User--</option>
                            <option value="Superadmin">Superadmin</option>
                            <option value="Guru">Guru</option>
                            <option value="Siswa">Siswa</option>
                            <option value="Operator">Operator</option>
                            <option value="Bendahara">Bendahara</option>
                        </select>
                    </div>
                    
                    @error('password')
                    <small style="color: red">{{ $message }} </small>
                    @enderror            
                    <div class="form-group">
                        <label>Password <small class="text-muted"></small></label>
                        <input type="password" class="form-control phone-inputmask" name="password" id="password"
                            placeholder="Masukkan Password User" value="{{ old('password')}}">
                    </div>
                    
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control phone-inputmask" name="password2" id="password2"
                            placeholder="Masukkan Konfirmasi Password User" value="{{ old('password2')}}">
                            <br>
                            <label for="konfirmasi" id="konfirmasi-text"></label>
                    </div>
                    
    
                    
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/users" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection


