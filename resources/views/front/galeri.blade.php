@extends('front.app')
@section('title', 'Halaman Galeri')
@section('subtitle', 'Menu Galeri')

@section('content')

   <!-- Start Breadcrumbs -->
   <div class="breadcrumbs overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Galeri</h1>
                    <p>{{ $profil->nama_sekolah }}</p>
                </div>
                <ul class="breadcrumb-nav">
                    <li><a href="/">Beranda</a></li>
                    <li>Galeri</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
 <!-- Start Photo Gallery -->

    <section class="events section">
        <div class="container">
       
            <div class="row">
                @foreach ($galeri as $p)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Event -->
                        <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                            <div class="event-image">
                                <a href="/upload/galeri/{{ $p->gambar }}" target="_blank"><img src="/upload/galeri/{{ $p->gambar }}"
                                        alt="#"></a>
                              

                            </div>
                           
                            <div class="bottom-content ">



                                <span class="time ">
                                    <i class="lni lni-quotation"></i>
                                    <a href="">{{ $p->nama_galeri }}</a>
                                    

                                </span>
                            </div>
                        </div>
                        <!-- End Single Event -->
                    </div>
                @endforeach
               
            </div>
        </div>
    </section>
<!-- End Photo Gallery -->

    <!-- End Clients Area -->
@endsection
