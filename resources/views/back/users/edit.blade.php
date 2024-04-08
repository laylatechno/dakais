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
               
                <form action="{{ route('users.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @error('name')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama User <small class="text-muted">(Cth : Muhamamd Rafi Heryadi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="name"
                            placeholder="Masukan Nama User" value="{{ $data->name }}">
                    </div>
                    
                    @error('email')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Cth : admin@admin.com)</small></label>
                        <textarea class="form-control" name="email" rows="3">{{ $data->email }}</textarea>
                    </div>

                    @error('role')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Role <small class="text-muted">(Cth : Admin)</small></label>
                        <select class="form-control" id="role" name="role">
                            <option value="">--Pilih Role User--</option>
                            <option value="Superadmin" {{ $data->role == 'Superadmin' ? 'selected' : '' }}>Superadmin</option>
                            <option value="Guru" {{ $data->role == 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Siswa" {{ $data->role == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                            <option value="Operator" {{ $data->role == 'Operator' ? 'selected' : '' }}>Operator</option>
                            <option value="Bendahara" {{ $data->role == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                        </select>
                    </div>

                    @error('passwordlama')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Password Lama <small class="text-muted">(Diperlukan untuk verifikasi)</small></label>
                        <input type="password" class="form-control" name="passwordlama" placeholder="Masukkan Password Lama">
                    </div>
                                        <!-- ... Bagian formulir yang sudah ada ... -->

                    @error('password')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                    <label>Password Baru <small class="text-muted">(Kosongkan jika tidak ingin merubah)</small></label>
                    <input type="password" class="form-control"  id="password" placeholder="Masukkan Password Baru">
                    </div>

                    @error('password_confirmation')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" name="password_confirmation"  id="password2" placeholder="Konfirmasi Password Baru">
                    <br>
                            <label for="konfirmasi" id="konfirmasi-text"></label>
                    </div>

                    <!-- ... Bagian formulir yang sudah ada ... -->

                    
                    
                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Update</button>
                        <a href="/users" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection