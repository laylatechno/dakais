@extends('front.app')
@section('title', 'Halaman Detail Kegiatan')
@section('subtitle', 'Menu Detail Kegiatan')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Detail Kegiatan</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Beranda</a></li>
                        <li>Detail Kegiatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Event Details -->
    <div class="event-details section">
        <div class="container">
            <div class="row">
                <!-- Start Event Details Content -->
                <div class="col-lg-8 col-12">
                    <div class="details-content">
                        <h2 class="title">{{ $kegiatan->nama_kegiatan }}</h2>
                        <ul class="meta-data">
                            <li><i class="lni lni-map-marker"></i> {{ $kegiatan->tempat }}</li>
                            @php
                                // Mendefinisikan format tanggal
                                \Carbon\Carbon::setLocale('id'); // Mengatur lokal ke bahasa Indonesia
                                $formattedDate = \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->isoFormat(
                                    'dddd, D MMMM YYYY',
                                ); // Format lokal
                            @endphp

                            <li><i class="lni lni-calendar"></i> {{ $formattedDate }}</li>

                            <li><i class="lni lni-timer"></i> {{ $kegiatan->jam }}</li>
                        </ul>




                        <!-- Start Gambar -->
                        <div class="map-section">
                            <div class="mapouter">
                                <a href=""><img src="/upload/kegiatan/{{ $kegiatan->gambar }}" width="100%;"
                                        alt="#"></a>
                            </div>

                        </div>
                        <!-- End Gambar -->

                        <div class="text">
                            <p>{{ $kegiatan->deskripsi }}</p>
                        </div>

                        <!-- Start Google-map Area -->
                        <div class="map-section">
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas"
                                        src="{{ $kegiatan->map }}"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                            <p class="location"> <i class="lni lni-map-marker"></i> {{ $kegiatan->tempat }}</p>
                        </div>
                        <!-- End Google-map Area -->


                    </div>
                </div>
                <!-- End Event Details Content -->
                <!-- Start Event Details Sidebar -->
                <div class="col-lg-4 col-12">
                    <div class="event-sidebar">

                        <!-- Start Single Widget -->
                        <div class="single-widget other-event-wedget">
                            <h3 class="sidebar-widget-title">Other Events</h3>
                            <ul class="other-event">
                                @foreach ($kegiatan_all as $p)
                                    <li class="single-event">
                                        <div class="thumbnail">
                                            <a href="{{ route('kegiatan_sekolah.kegiatan_sekolah_detail', $p->id) }}"
                                                class="image"><img src="/upload/kegiatan/{{ $p->gambar }}"
                                                    alt="Event Image"></a>
                                        </div>
                                        <div class="info">
                                            <span class="date"><i class="lni lni-calendar"></i>
                                                {{ $p->tanggal_kegiatan }}</span>
                                            <h6 class="title"><a
                                                    href="{{ route('kegiatan_sekolah.kegiatan_sekolah_detail', $p->id) }}">{{ $p->nama_kegiatan }}.</a>
                                            </h6>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
                <!-- End Event Details Sidebar -->
            </div>
        </div>
    </div>
    <!-- Start Event Details -->

 
@endsection
