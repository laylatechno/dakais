@extends('back.layouts.app')
@section('title','Halaman Siswa')
@section('subtitle','Menu Siswa')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Siswa</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('siswa.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
             

                    @error('nik')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>NIK <small class="text-muted">(Cth : 44354666555)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nik"
                            placeholder="Masukan NIK Siswa" value="{{ old('nik')}}">
                    </div>

                    @error('nis')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>NIS <small class="text-muted">(Cth : N027567333)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nis"
                            placeholder="Masukan NIS Siswa" value="{{ old('nis')}}">
                    </div>
                    
                    @error('nama_siswa')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Siswa <small class="text-muted">(Cth : Ramdan)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_siswa"
                            placeholder="Masukan Nama Siswa" value="{{ old('nama_siswa')}}">
                    </div>

                    @error('email')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Cth : ramdan@gmail.com)</small></label>
                        <input type="email" class="form-control phone-inputmask" name="email"
                            placeholder="Masukan Email" value="{{ old('email')}}">
                    </div>

                    @error('jenis_kelamin')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki" @if(old('jenis_kelamin') == 'Laki-laki') selected @endif>
                                Laki-laki
                            </option>
                            <option value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') selected @endif>
                                Perempuan
                            </option>
                        </select>
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

                    @error('provinsi')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Provinsi <small class="text-muted">(Cth : Jawa Barat)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="provinsi"
                            placeholder="Masukan Provinsi" value="{{ old('provinsi')}}">
                    </div>
                    


                    @error('kota')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kota <small class="text-muted">(Cth : Tasikmalaya)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kota"
                            placeholder="Masukan Kota" value="{{ old('kota')}}">
                    </div>

                                                 
                    @error('alamat')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Alamat <small class="text-muted">(Cth : Jl. Tajur Indah)</small></label>
                        <textarea class="form-control" name="alamat" rows="8">{{ old('alamat')}}</textarea>
                    </div>
                    

                    

                
 
             
                
            </div>
        </div>
     
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Form Orang Tua</b></h5>
                <br>
                <hr>
                 
                 
             

                   

                    @error('nama_ayah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Ayah <small class="text-muted">(Cth : Supardi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_ayah"
                            placeholder="Masukan Nama Ayah" value="{{ old('nama_ayah')}}">
                    </div>

                    @error('pekerjaan_ayah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pekerjaan Ayah <small class="text-muted">(Cth : Wiraswasta)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pekerjaan_ayah"
                            placeholder="Masukan Pekerjaan Ayah" value="{{ old('pekerjaan_ayah')}}">
                    </div>

                    @error('penghasilan_ayah')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah</label>
                        <select class="form-control" name="penghasilan_ayah">
                            <option value="">--Pilih Penghasilan--</option>
                            <option value="0-2 Jt" @if(old('penghasilan_ayah') == '0-2 Jt') selected @endif>
                                0-2 Jt
                            </option>
                            <option value="2-5 Jt" @if(old('penghasilan_ayah') == '2-5 Jt') selected @endif>
                                2-5 Jt
                            </option>
                            <option value=">5 Jt" @if(old('penghasilan_ayah') == '>5 Jt') selected @endif>
                                >5 Jt
                            </option>
                        </select>
                    </div>




                    @error('no_telp_ayah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>No Telp Ayah <small class="text-muted">(Cth : 085320555394)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="no_telp_ayah"
                            placeholder="Masukan No Telp Ayah" value="{{ old('no_telp_ayah')}}">
                    </div>


                    @error('nama_ibu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Ibu <small class="text-muted">(Cth : Ainur)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_ibu"
                            placeholder="Masukan Nama Ibu" value="{{ old('nama_ibu')}}">
                    </div>

                    @error('pekerjaan_ibu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pekerjaan Ibu <small class="text-muted">(Cth : Ibu Rumah Tangga)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pekerjaan_ibu"
                            placeholder="Masukan Pekerjaan Ibu" value="{{ old('pekerjaan_ibu')}}">
                    </div>

                    @error('penghasilan_ibu')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu</label>
                        <select class="form-control" name="penghasilan_ibu">
                            <option value="">--Pilih Penghasilan--</option>
                            <option value="0-2 Jt" @if(old('penghasilan_ibu') == '0-2 Jt') selected @endif>
                                0-2 Jt
                            </option>
                            <option value="2-5 Jt" @if(old('penghasilan_ibu') == '2-5 Jt') selected @endif>
                                2-5 Jt
                            </option>
                            <option value=">5 Jt" @if(old('penghasilan_ibu') == '>5 Jt') selected @endif>
                                >5 Jt
                            </option>
                        </select>
                    </div>

                    @error('no_telp_ibu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>No Telp Ibu <small class="text-muted">(Cth : 085320555394)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="no_telp_ibu"
                            placeholder="Masukan No Telp Ibu" value="{{ old('no_telp_ibu')}}">
                    </div>


                    @error('nama_wali')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Wali <small class="text-muted">(Cth : Rusman)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_wali"
                            placeholder="Masukan Nama Wali" value="{{ old('nama_wali')}}">
                    </div>

                    @error('pekerjaan_wali')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pekerjaan Wali <small class="text-muted">(Cth : Polisi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pekerjaan_wali"
                            placeholder="Masukan Pekerjaan Wali" value="{{ old('pekerjaan_wali')}}">
                    </div>

                    @error('penghasilan_wali')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                    <div class="form-group">
                        <label for="penghasilan_wali">Penghasilan Wali</label>
                        <select class="form-control" name="penghasilan_wali">
                            <option value="">--Pilih Penghasilan--</option>
                            <option value="0-2 Jt" @if(old('penghasilan_wali') == '0-2 Jt') selected @endif>
                                0-2 Jt
                            </option>
                            <option value="2-5 Jt" @if(old('penghasilan_wali') == '2-5 Jt') selected @endif>
                                2-5 Jt
                            </option>
                            <option value=">5 Jt" @if(old('penghasilan_wali') == '>5 Jt') selected @endif>
                                >5 Jt
                            </option>
                        </select>
                    </div>

                    @error('no_telp_wali')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>No Telp Wali <small class="text-muted">(Cth : 085320555394)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="no_telp_wali"
                            placeholder="Masukan No Telp Wali" value="{{ old('no_telp_wali')}}">
                    </div>



            </div>
        </div>
     
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Dokumentasi</b></h5>
                <br>
                <hr>
                     
                    @error('tahun_masuk')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Tahun Masuk <small class="text-muted">(Cth : 2022)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="tahun_masuk"
                            placeholder="Masukan Tahun Masuk" value="{{ old('tahun_masuk')}}">
                    </div>

                    @error('sekolah_asal')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Sekolah Asal <small class="text-muted">(Cth : Sekolah Alam Nusantara)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="sekolah_asal"
                            placeholder="Masukan Sekolah Asal" value="{{ old('sekolah_asal')}}">
                    </div>

                    @error('kelas')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kelas <small class="text-muted">(Cth : 6A/9B)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kelas"
                            placeholder="Masukan Kelas" value="{{ old('kelas')}}">
                    </div>


                                       
                    @error('foto')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Foto <small class="text-muted">(Masukkan dengan tipe file jpg, png, jpeg & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="foto">
                    </div>

                    @error('kk')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>KK <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="kk">
                    </div>

                    @error('ijazah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Ijazah <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="ijazah">
                    </div>

                    @error('akte')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Akte <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="akte">
                    </div>

                    
                    @error('ktp')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>KTP <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="ktp">
                    </div>


                
 
             
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/siswa" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
     
    </div>


</div>
 
@endsection