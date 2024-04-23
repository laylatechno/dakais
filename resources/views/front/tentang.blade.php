@extends('front.app')
@section('title', 'Halaman Tentang Sekolah')
@section('subtitle', 'Menu Tentang Sekolah')

@section('content')

   <!-- Start Breadcrumbs -->
   <div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Tentang Sekolah</h1>
                    <p>{{ $profil->nama_sekolah }}</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="/">Beranda</a></li>
                    <li>Tentang Sekolah</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

    <!-- Start Tentang Sekolah Area -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s">Tentang {{ $profil->nama_sekolah }}</span>
                            <br><br>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Selamat Datang</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s" style="margin-top: -10px;">{{ $profil->deskripsi }}
                            </p>

                            <div class="button wow fadeInUp" data-wow-delay="1s">
                                @php
                                $no_telp = str_replace(['-', ' ', '+'], '', $profil->no_telp);  // Menghapus tanda tambah (+), spasi, dan tanda hubung jika ada
                                $pesan = "Hallo.. !! Apakah berkenan saya bertanya terkait informasi sekolah ?";
                                $encoded_pesan = urlencode($pesan);  // Meng-encode pesan agar aman dalam URL
                                $whatsapp_url = "https://wa.me/{$no_telp}?text={$encoded_pesan}";  // Membuat URL lengkap
                                @endphp
                                <a href="{{ $whatsapp_url  }}" class="btn" target="_blank">Selengkapnya</a>
                                <a href="{{ $profil->youtube }}" class="glightbox video btn"> Play Video<i
                                        class="lni lni-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="/upload/profil/{{ $profil->gambar }}"  alt="#" style="border-radius: 5%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End About Us Area -->


    <!-- Start Clients Area -->
    <div class="client-logo-section">
        <div class="container">
            <div class="client-logo-wrapper">
                <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                    @foreach ($mitra as $p)
                        <div class="client-logo">
                            <a href="{{ $p->website }}">
                                <img src="/upload/mitra/{{ $p->gambar }}" alt="">
                            </a>

                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Area -->
@endsection
