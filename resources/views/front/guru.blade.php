@extends('front.app')
@section('title', 'Halaman Guru & Staf')
@section('subtitle', 'Menu Guru & Staf')

@section('content')

   <!-- Start Breadcrumbs -->
   <div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Guru & Staf</h1>
                    <p>{{ $profil->nama_sekolah }}</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="/">Beranda</a></li>
                    <li>Guru & Staf</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

   <!-- Start Teachers -->
   <section id="teachers" class="teachers section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                        <i class="lni lni-users"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Guru Berpengalaman</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Siap mendampingi tumbuh kembang anak anda dengan
                        kualitas terbaik.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($guru as $p)
                <!-- Single Team -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <!-- Image -->
                                <div class="image">
                                    <img src="/upload/guru/{{ $p->gambar }}" alt="#">
                                </div>
                                <!-- End Image -->
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="info-head">
                                    <!-- Info Box -->
                                    <div class="info-box">
                                        <span class="designation">{{ $p->posisi }}</span>
                                        <h4 class="name"><a href="">{{ $p->nama_guru }}</a>
                                        </h4>
                                        <p>{{ $p->motto }}.</p>
                                    </div>
                                    <!-- End Info Box -->
                                    <!-- Social -->
                                    <ul class="social">

                                        <li><a href="mailto:{{ trim($p->email) }}" target="_blank"><i
                                                    class="lni lni-envelope"></i></a></li>


                                        <li><a href="{{ $p->instagram }}" target="_blank"><i
                                                    class="lni lni-instagram"></i></a>
                                        </li>

                                    </ul>
                                    <!-- End Social -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            @endforeach

        </div>
    </div>
</section>
<!--/ End Teachers Area -->


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
