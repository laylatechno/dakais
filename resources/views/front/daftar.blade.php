@extends('front.app')
@section('title', 'Halaman Daftar Sekolah')
@section('subtitle', 'Menu Daftar Sekolah')

@section('content')

    <!-- Start Hero Area -->
    <section class="hero-area style3" style="margin-top: -80px;">
        <!-- Single Slider -->
        <div class="hero-inner">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-6 co-12">
                            <div class="hero-text">
                                <h5 class="wow fadeInLeft" data-wow-delay=".3s">Hi, Assalamualaikum.</h5>
                                <h1 class="wow fadeInLeft" data-wow-delay=".5s">Selamat Datang <span>Di Laman Sekolah
                                        Kami</span> yaitu <span> {{ $profil->nama_sekolah }}.</span></h1>
                                <p class="wow fadeInLeft" data-wow-delay=".7s">{{ $profil->deskripsi }}
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="hero-image">
                                <img src="{{ asset('themplete/front/1') }}/assets/images/hero/hero-main2.png"
                                    alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Hero Area -->

    <!-- Start Mission Area -->
    <div class="mission">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow zoomIn" data-wow-delay="0.2s">Pengantar Kepala Sekolah</span>
                        <p class="wow fadeInUp" data-wow-delay=".6s">“There is nothing noble in being superior to your
                            fellow man; true nobility is being superior to your former self.”
                        </p>
                        <img src="{{ asset('themplete/front/1') }}/assets/images/signeture/signeture.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /End Mission Area -->

    <!-- Start Achivement Area -->
    <section class="our-achievement style3 section overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="counter"><span>Yuk Daftar</span></h3>
                        <h4>Sekarang Juga !!!</h4>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Achivement Area -->

    <!-- Start Services Area -->
    <section class="services section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <span class="wow zoomIn" data-wow-delay="0.2s">Tahapan-tahapan </span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Pendaftaran Peserta Didik Baru</h2>

                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                            
                            <br><br>
                            <div class="course-image">
                                <a href="https://smkyaphar.sch.id/wp-content/uploads/2017/11/Screenshot_26.png" style="max-width: 100%; display: inline-block;"><img src="https://smkyaphar.sch.id/wp-content/uploads/2017/11/Screenshot_26.png" alt="#" style="max-width: 100%; height: auto;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Services Area -->

     <!-- Start Contact Area -->
     <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="form-main">
                        <h3 class="title"><span>Apakah siap mendaftar?</span>
                            Mari kita mulai
                        </h3>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('daftar_sekolah.store') }}"  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>NIK Orang Tua</label>
                                        <input id="nik" name="nik" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap Siswa</label>
                                        <input name="nama_siswa" id="nama_siswa" type="text" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input name="tempat_lahir" id="tempat_lahir" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input name="provinsi" id="provinsi" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input name="kota" id="kota" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Alamat</label>
                                        <input name="alamat" id="alamat" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input name="nama_ayah" id="nama_ayah" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>No Telp Ayah</label>
                                        <input type="number" name="no_telp_ayah" id="no_telp_ayah" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <input name="nama_ibu" id="nama_ibu" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>No Telp Ibu</label>
                                        <input type="number" name="no_telp_ibu" id="no_telp_ibu" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Sekolah Asal</label>
                                        <input name="sekolah_asal" id="sekolah_asal" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Kelas (Misal : 6A)</label>
                                        <input name="kelas" id="kelas" placeholder="" required="required" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label>Foto Siswa</label>
                                        <input name="foto" id="foto" placeholder="" type="file"  required="required" >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Simpan Pendaftaran</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->
@endsection
