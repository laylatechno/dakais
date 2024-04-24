@extends('front.app')
@section('title', 'Halaman Kontak')
@section('subtitle', 'Menu Kontak')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Kontak</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Beranda</a></li>
                        <li>Kontak</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="form-main">
                        <h3 class="title"><span>Siap Untuk Memulai?</span>
                            Mari Kontak Kami
                        </h3>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('kontak_sekolah.store') }}"  method="post" >
                            @csrf
             

                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input name="nama_kontak" id="nama_kontak" type="text" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Subjek</label>
                                        <input name="subjek" id="subjek" type="text" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" id="email" type="email" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input name="no_telp" id="no_telp" type="text" placeholder=""
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Isi Pesan</label>
                                        <textarea name="isi" id="isi" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-info">
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-map-marker"></i>
                            <h4>Kunjungi Sekolah Kami</h4>
                            <p class="no-margin-bottom">{{ $profil->alamat }}
                            </p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-phone"></i>
                            <h4>Hubungi Untuk Info Selengkapnya</h4>
                            <p class="no-margin-bottom">Phone: {{ $profil->no_telp }}</p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-envelope"></i>
                            <h4>E-mail Kami</h4>
                            <p class="no-margin-bottom"><a href="mailto:{{ $profil->email }}">{{ $profil->email }}</a>
                            </p>
                        </div>
                        <!-- End Single Info -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->


    <!-- Start Google-map Area -->
    <div class="map-section">
        <div class="mapouter">
            <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="{{ $profil->map }}"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>
    <!-- End Google-map Area -->
@endsection
