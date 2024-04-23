@extends('front.app')
@section('title', 'Halaman Berita')
@section('subtitle', 'Menu Berita')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Berita</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Beranda</a></li>
                        <li>Berita</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Singel Area -->
    <section class="section latest-news-area blog-grid-page">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
                        @if ($berita->isEmpty()) <!-- Jika tidak ada hasil -->
                            <div class="col-12">
                                <div class="alert alert-warning text-center">
                                    Tidak ada berita yang ditemukan dengan kata kunci "{{ request('q') }}".
                                </div>
                            </div>
                        @else
                            @foreach ($berita as $p)
                                <!-- Jika ada hasil -->
                                <div class="col-lg-6 col-12">
                                    <!-- Single News -->
                                    <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".2s">
                                        <div class="image">
                                            <a href="{{ route('berita_sekolah.berita_sekolah_detail', $p->slug) }}">
                                                <img class="thumb" src="/upload/berita/{{ $p->gambar }}" alt="#">
                                            </a>
                                        </div>
                                        <div class="content-body">
                                            <div class="meta-data">
                                                <ul>
                                                    <li>
                                                        <i class="lni lni-tag"></i>
                                                        <a
                                                            href="javascript:void(0)">{{ $p->kategoriBerita->nama_kategori_berita }}</a>
                                                    </li>
                                                    <li>
                                                        <i class="lni lni-calendar"></i>
                                                        <a href="javascript:void(0)">{{ $p->tanggal_posting }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h4 class="title">
                                                <a href="{{ route('berita_sekolah.berita_sekolah_detail', $p->slug) }}">
                                                    {{ $p->judul_berita }}
                                                </a>
                                            </h4>
                                            @php
                                                $cleaned_text = strip_tags($p->isi);
                                                $truncated_text =
                                                    strlen($cleaned_text) > 150
                                                        ? substr($cleaned_text, 0, 150) . '...'
                                                        : $cleaned_text;
                                            @endphp
                                            <p>{{ $truncated_text }}</p>
                                            <div class="button">
                                                <a href="{{ route('berita_sekolah.berita_sekolah_detail', $p->slug) }}"
                                                    class="btn">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single News -->
                                </div>
                            @endforeach
                        @endif
                    </div>




                    <div class="pagination center">
                        {{ $berita->links() }} <!-- Menampilkan kontrol pagination -->
                    </div>

                </div>


                <aside class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar">
                        <!-- Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title">Cari Disini</h5>
                            <form action="{{ route('berita_sekolah.cari_berita') }}" method="GET">
                                <input type="text" name="q" placeholder="Cari Berita...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>


                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="widget popular-feeds">
                            <h5 class="widget-title">Berita Terakhir</h5>
                            <div class="popular-feed-loop">
                                @foreach ($berita_all as $p)
                                    <div class="single-popular-feed">
                                        <div class="feed-img">
                                            <a href="{{ route('berita_sekolah.berita_sekolah_detail', $p->slug) }}"><img
                                                    src="/upload/berita/{{ $p->gambar }}" alt="#"></a>
                                        </div>
                                        <div class="feed-desc">
                                            <h6 class="post-title"><a
                                                    href="{{ route('berita_sekolah.berita_sekolah_detail', $p->slug) }}">{{ $p->judul_berita }}</a>
                                            </h6>
                                            <span class="time"><i class="lni lni-calendar"></i>
                                                {{ $p->tanggal_posting }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="widget categories-widget">
                            <h5 class="widget-title">Kategori</h5>
                            <ul class="custom">
                                @foreach ($kategori_berita as $p)
                                    <li>
                                        <a href="{{ route('berita_sekolah.by_category_id', $p->id) }}">{{ $p->nama_kategori_berita }}
                                            <span>{{ $p->berita_count }}</span></a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->

                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->



@endsection
