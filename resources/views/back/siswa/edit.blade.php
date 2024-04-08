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
                 
                <form action="{{ route('siswa.update', $data->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
             

                    @error('nik')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>NIK <small class="text-muted">(Cth : 44354666555)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nik"
                            placeholder="Masukan NIK Siswa" value="{{ $data->nik }}">
                    </div>

                    @error('nis')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>NIS <small class="text-muted">(Cth : N027567333)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nis"
                            placeholder="Masukan NIS Siswa" value="{{ $data->nis }}">
                    </div>
                    
                    @error('nama_siswa')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Siswa <small class="text-muted">(Cth : Ramdan)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_siswa"
                            placeholder="Masukan Nama Siswa" value="{{ $data->nama_siswa }}">
                    </div>

                    @error('email')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Email <small class="text-muted">(Cth : ramdan@gmail.com)</small></label>
                        <input type="email" class="form-control phone-inputmask" name="email"
                            placeholder="Masukan Email" value="{{ $data->email }}">
                    </div>

                    @error('jenis_kelamin')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
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
                            placeholder="Masukan Tempat Lahir" value="{{ $data->tempat_lahir }}">
                    </div>

                    @error('tanggal_lahir')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Tanggal Lahir </label>
                        <input type="date" class="form-control phone-inputmask" name="tanggal_lahir"
                            placeholder="Masukan Tanggal Lahir" value="{{ $data->tanggal_lahir }}">
                    </div>

                    @error('provinsi')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Provinsi <small class="text-muted">(Cth : Jawa Barat)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="provinsi"
                            placeholder="Masukan Provinsi" value="{{ $data->provinsi }}">
                    </div>
                    


                    @error('kota')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kota <small class="text-muted">(Cth : Tasikmalaya)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kota"
                            placeholder="Masukan Kota" value="{{ $data->kota }}">
                    </div>

                    @error('alamat')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Alamat <small class="text-muted">(Cth : Jl. Tajur Indahl)</small></label>
                        <textarea class="form-control" name="alamat" rows="8">{{ $data->alamat }}</textarea>
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
                            placeholder="Masukan Nama Ayah" value="{{ $data->nama_ayah }}">
                    </div>

                    @error('pekerjaan_ayah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pekerjaan Ayah <small class="text-muted">(Cth : Wiraswasta)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pekerjaan_ayah"
                            placeholder="Masukan Pekerjaan Ayah" value="{{ $data->pekerjaan_ayah }}">
                    </div>


                    @error('penghasilan_ayah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah</label>
                        <select class="form-control" name="penghasilan_ayah">
                            <option value="">--Pilih Penghasilan--</option>
                            <option value="0-2 Jt" @if(old('penghasilan_ayah', $data->penghasilan_ayah) == '0-2 Jt') selected @endif>
                                0-2 Jt
                            </option>
                            <option value="2-5 Jt" @if(old('penghasilan_ayah', $data->penghasilan_ayah) == '2-5 Jt') selected @endif>
                                2-5 Jt
                            </option>
                            <option value=">5 Jt" @if(old('penghasilan_ayah', $data->penghasilan_ayah) == '>5 Jt') selected @endif>
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
                            placeholder="Masukan No Telp Ayah" value="{{ $data->no_telp_ayah }}">
                    </div>


                    @error('nama_ibu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Ibu <small class="text-muted">(Cth : Ainur)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_ibu"
                            placeholder="Masukan Nama Ibu" value="{{ $data->nama_ibu }}">
                    </div>

                    @error('pekerjaan_ibu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pekerjaan Ibu <small class="text-muted">(Cth : Ibu Rumah Tangga)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pekerjaan_ibu"
                            placeholder="Masukan Pekerjaan Ibu" value="{{ $data->pekerjaan_ibu }}">
                    </div>

                    @error('penghasilan_ibu')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu</label>
                        <select class="form-control" name="penghasilan_ibu">
                            <option value="">--Pilih Penghasilan--</option>
                            <option value="0-2 Jt" @if(old('penghasilan_ibu', $data->penghasilan_ibu) == '0-2 Jt') selected @endif>
                                0-2 Jt
                            </option>
                            <option value="2-5 Jt" @if(old('penghasilan_ibu', $data->penghasilan_ibu) == '2-5 Jt') selected @endif>
                                2-5 Jt
                            </option>
                            <option value=">5 Jt" @if(old('penghasilan_ibu', $data->penghasilan_ibu) == '>5 Jt') selected @endif>
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
                            placeholder="Masukan No Telp Ibu" value="{{ $data->no_telp_ibu }}">
                    </div>


                    @error('nama_wali')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Nama Wali <small class="text-muted">(Cth : Rusman)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="nama_wali"
                            placeholder="Masukan Nama Wali" value="{{ $data->nama_wali }}">
                    </div>

                    @error('pekerjaan_wali')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Pekerjaan Wali <small class="text-muted">(Cth : Polisi)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="pekerjaan_wali"
                            placeholder="Masukan Pekerjaan Wali" value="{{ $data->pekerjaan_wali }}">
                    </div>

                    @error('penghasilan_wali')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label for="penghasilan_wali">Penghasilan Ibu</label>
                        <select class="form-control" name="penghasilan_wali">
                            <option value="">--Pilih Penghasilan--</option>
                            <option value="0-2 Jt" @if(old('penghasilan_wali', $data->penghasilan_wali) == '0-2 Jt') selected @endif>
                                0-2 Jt
                            </option>
                            <option value="2-5 Jt" @if(old('penghasilan_wali', $data->penghasilan_wali) == '2-5 Jt') selected @endif>
                                2-5 Jt
                            </option>
                            <option value=">5 Jt" @if(old('penghasilan_wali', $data->penghasilan_wali) == '>5 Jt') selected @endif>
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
                            placeholder="Masukan No Telp Wali" value="{{ $data->no_telp_wali }}">
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
                            placeholder="Masukan Tahun Masuk" value="{{ $data->tahun_masuk }}">
                    </div>

                    @error('sekolah_asal')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Sekolah Asal <small class="text-muted">(Cth : Sekolah Alam Nusantara)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="sekolah_asal"
                            placeholder="Masukan Sekolah Asal" value="{{ $data->sekolah_asal }}">
                    </div>

                    @error('kelas')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        <label>Kelas <small class="text-muted">(Cth : 6A/9B)</small></label>
                        <input type="text" class="form-control phone-inputmask" name="kelas"
                            placeholder="Masukan Kelas" value="{{ $data->kelas }}">
                    </div>


                                       
                    @error('foto')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        @if ($data->foto)
                        <a href="/upload/foto_siswa/{{ $data->foto }}" target="_blank">
                        <img style="max-width:100px; max-height:100px" src="/upload/foto_siswa/{{ $data->foto }}" alt="">
                        </a>
                        @endif
                        <br>
                        <label>Foto <small class="text-muted">(Masukkan dengan tipe file jpg, png, jpeg & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="foto">
                    </div>
                    
                    @error('kk')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        @if ($data->kk)
                        <a href="/upload/dokumen/{{ $data->kk }}" target="_blank">
                            <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                        </a>
                        @endif
                        <br>
                        <label>Kartu Keluarga <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="kk">
                    </div>

                    @error('ijazah')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        @if ($data->ijazah)
                        <a href="/upload/dokumen/{{ $data->ijazah }}" target="_blank">
                            <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                        </a>
                        @endif
                        <br>
                        <label>Ijazah <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="ijazah">
                    </div>

                    @error('akte')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        @if ($data->akte)
                        <a href="/upload/dokumen/{{ $data->akte }}" target="_blank">
                            <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                        </a>
                        @endif
                        <br>
                        <label>Akte <small class="text-muted">(Masukkan dengan tipe file pdf & maksimal size 2 mb) </small> </label>
                        <input type="file" class="form-control phone-inputmask" name="akte">
                    </div>

                    @error('ktp')
                    <small style="color: red">{{ $message }} </small>
                    @enderror
                    <div class="form-group">
                        @if ($data->ktp)
                        <a href="/upload/dokumen/{{ $data->ktp }}" target="_blank">
                            <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                        </a>
                        @endif
                        <br>
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