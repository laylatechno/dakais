@extends('front.app')
@section('title', 'Halaman Kegiatan')
@section('subtitle', 'Menu Kegiatan')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Kegiatan</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Beranda</a></li>
                        <li>Kegiatan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Events Area-->
    <section class="events section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-bookmark"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Kegiatan</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Lihat dan nantikan kegiatan yang akan diadakan di
                            sekolah kami serta tunggu kegiatan menarik lainnya</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($kegiatan as $p)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Event -->
                        <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                            <div class="event-image">
                                <a href="event-details.html"><img src="/upload/kegiatan/{{ $p->gambar }}"
                                        alt="#"></a>
                                @php
                                    // Mengonversi tanggal_kegiatan menjadi format Carbon, lalu memisahkan tanggal dan bulan
                                    $date = \Carbon\Carbon::parse($p->tanggal_kegiatan)->format('d'); // Tanggal saja
                                    $month = \Carbon\Carbon::parse($p->tanggal_kegiatan)->format('F'); // Nama bulan penuh
                                @endphp

                                <p class="date"><span>{{ $date }}<br>{{ $month }}</span></p>

                            </div>
                            <div class="content">
                                <h3><a
                                        href="{{ route('kegiatan_sekolah.kegiatan_sekolah_detail', $p->id) }}">{{ $p->nama_kegiatan }}</a>
                                </h3>
                                @php
                                    $cleaned_text = strip_tags($p->deskripsi); // Menghilangkan semua tag HTML
                                    $truncated_text =
                                        strlen($cleaned_text) > 150
                                            ? substr($cleaned_text, 0, 150) . '...'
                                            : $cleaned_text; // Membatasi hingga 150 karakter
                                @endphp

                                <p>{{ $truncated_text }}</p>
                            </div>
                            <div class="bottom-content">



                                <span class="time">
                                    <i class="lni lni-timer"></i>
                                    <a
                                        href="{{ route('kegiatan_sekolah.kegiatan_sekolah_detail', $p->id) }}">{{ $p->tempat }}</a>
                                    |
                                    <a href="{{ route('kegiatan_sekolah.kegiatan_sekolah_detail', $p->id) }}">{{ $p->tanggal_kegiatan }}
                                        | {{ $p->jam }}</a>
                                    <br>

                                </span>
                            </div>
                        </div>
                        <!-- End Single Event -->
                    </div>
                @endforeach
                <!-- Kontrol Pagination -->
                <div class="pagination center">
                    {{ $kegiatan->links() }} <!-- Ini menampilkan tautan pagination -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Events Area-->



@endsection
