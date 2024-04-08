@extends('back.layouts.app')
@section('title','Halaman Guru')
@section('subtitle','Menu Guru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Guru</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('guru.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
             

                    @error('nip')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>NIP <small class="text-muted">(Cth : 44354666555)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nip"
                            placeholder="Masukan NIP Guru" value="{{ old('nip')}}">
                    </div>

                    
                    @error('kode_guru')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kode Guru <small class="text-muted">(Cth : GR2234235)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kode_guru"
                            placeholder="Masukan Kode Guru" value="{{ old('kode_guru')}}">
                    </div>
                    
                    @error('nama_guru')
                        <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama <small class="text-muted">(Cth : Muhammad Rafi Heryadi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_guru"
                            placeholder="Masukan Nama Guru" value="{{ old('nama_guru')}}">
                    </div>

                    @error('tempat_lahir')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Tempat Lahir <small class="text-muted">(Cth : Tasikmalaya)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="tempat_lahir"
                            placeholder="Masukan Tempat Lahir" value="{{ old('tempat_lahir')}}">
                    </div>

                    @error('tanggal_lahir')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Tanggal Lahir </label>
                        <input type="date" class="form-control phone-inputmask" name="tanggal_lahir"
                            placeholder="Masukan Tanggal Lahir" value="{{ old('tanggal_lahir')}}">
                    </div>

                    
                    @error('jenis_kelamin')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    

                    @error('no_telp')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>No Telp <small class="text-muted">(Cth : 085320555394)</small></label>
                        <input type="number" class="form-control phone-inputmask" name="no_telp"
                            placeholder="Masukan No Telp" value="{{ old('no_telp')}}">
                    </div>

                    @error('instagram')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Instagram <small class="text-muted">(Cth : @muhraff)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="instagram"
                            placeholder="Masukan Instagram (Opsional)" value="{{ old('instagram')}}">
                    </div>

                    @error('email')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Cth : a@gmail.com)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="email"
                            placeholder="Masukan Email (Opsional)" value="{{ old('email')}}">
                    </div>

                                 
                    @error('alamat')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Alamat <small class="text-muted">(Cth : Jl. Tajur Indah - (Opsional))</small></label>
                        <textarea class="form-control" name="alamat" rows="3">{{ old('alamat')}}</textarea>
                    </div>
                    
                    @error('gelar_depan')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Gelar Depan <small class="text-muted">(Cth : Dr.)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="gelar_depan"
                            placeholder="Masukan Gelar Depan (Opsional)" value="{{ old('gelar_depan')}}">
                    </div>

                    @error('gelar_belakang')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Gelar Belakang <small class="text-muted">(Cth : SH)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="gelar_belakang"
                            placeholder="Masukan Gelar Belakang (Opsional)" value="{{ old('gelar_belakang')}}">
                    </div>


                    
                 
                    @error('honor')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Honor/jam <small class="text-muted">(Rp. 25000)</small></label>
                        <input type="text" class="form-control honor" name="honor"
                            placeholder="Masukan Honor" value="{{ old('honor')}}">
                    </div>
 
                                    <!-- jQuery CDN -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <!-- Script untuk memisahkan ribuan tanpa batasan maksimal -->
                    <script>
                        $(document).ready(function () {
                            $('.honor').on('input', function (e) {
                                var inputVal = $(this).val().replace(/[^\d]/g, ''); // Hapus semua karakter non-digit
                                var formattedVal = addThousandSeparator(inputVal);
                                $(this).val(formattedVal);
                            });

                            function addThousandSeparator(num) {
                                var parts = num.toString().split(".");
                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                return parts.join(".");
                            }
                        });
                    </script>





                    @error('username')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Username <small class="text-muted">(Cth : 1)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="username"
                            placeholder="Masukan Username" value="{{ old('username')}}">
                    </div>


                    @error('password')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Password <small class="text-muted">(Cth : 1)</small></label>
                        <input type="password" class="form-control phone-inputmask" name="password"
                            placeholder="Masukan Password " value="{{ old('password')}}">
                    </div>

                    @error('tanggal_masuk')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Tanggal Masuk </label>
                        <input type="date" class="form-control phone-inputmask" name="tanggal_masuk"
                            placeholder="Masukan Tanggal Masuk" value="{{ old('tanggal_masuk')}}">
                    </div>

                    @error('status')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="">--Pilih Status--</option>
                            <option value="Guru" {{ old('status') == 'Guru' ? 'selected' : '' }}>
                                Guru
                            </option>
                            <option value="Non Guru" {{ old('status') == 'Non Guru' ? 'selected' : '' }}>
                                Non Guru
                            </option>
                        </select>
                    </div>
                    
                   
                    @error('gambar')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Gambar <small class="text-muted">(Masukkan dengan tipe file jpg, png, jpeg & maksimal size 2 mb) - (Opsional)</small> </label>
                        <input type="file" class="form-control phone-inputmask" name="gambar">
                    </div>

                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/guru" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>
</div>
 
@endsection