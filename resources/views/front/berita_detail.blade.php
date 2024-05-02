@extends('front.app')
@section('title', 'Halaman Detail Berita')
@section('subtitle', 'Menu Detail Berita')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Detail Berita</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Beranda</a></li>
                        <li>Detail Berita</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Singel Area -->
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-thumbnils">
                            <img src="/upload/berita/{{ $berita->gambar }}" alt="#">
                        </div>
                        <div class="post-details">
                            <div class="detail-inner">
                                <!-- post meta -->
                                <ul class="custom-flex post-meta">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-tag"></i>
                                            {{ $berita->kategoriBerita->nama_kategori_berita }}</a>
                                    </li>
                                    <li>
                                        @php
                                            // Mendefinisikan format tanggal
                                            \Carbon\Carbon::setLocale('id'); // Mengatur lokal ke bahasa Indonesia
                                            $formattedDate = \Carbon\Carbon::parse($berita->tanggal_posting)->isoFormat(
                                                'dddd, D MMMM YYYY',
                                            ); // Format lokal
                                        @endphp


                                        <a href="javascript:void(0)">
                                            <i class="lni lni-calendar"></i>
                                            {{ $formattedDate }}
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-comments"></i>
                                            35 Comments
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-eye"></i>
                                            {{ $berita->views }} x dilihat
                                        </a>
                                    </li>

                                </ul>
                                <h2 class="post-title">
                                    <a href="javascript:void(0)">{{ $berita->judul_berita }}</a>
                                </h2>
                                @php
                                    $cleaned_text = strip_tags($berita->isi); // Menghilangkan semua tag HTML
                                    $truncated_text = $cleaned_text; // Membatasi hingga 150 karakter
                                @endphp

                                <p>{{ $truncated_text }}</p>


                                <blockquote>
                                    <div class="icon">
                                        <i class="lni lni-quotation"></i>
                                    </div>
                                    <h4>"{{ $profil->deskripsi }}"</h4>
                                    <span>{{ $profil->nama_sekolah }}</span>
                                </blockquote>

                                <div class="post-tags-media">
                                    <div class="post-tags popular-tag-widget mb-xl-40">
                                        <h5 class="tag-title">Penulis</h5>
                                        <div class="tags">
                                            <a href="javascript:void(0)">{{ $berita->penulis }}</a>

                                        </div>
                                    </div>
                                    {{-- <div class="post-social-media">
                                        <h5 class="share-title">Bagikan ke</h5>
                                        <ul class="custom-flex">
                                            <li>
                                                <a href="javascript:void(0)" class="facebook">
                                                    <i class="lni lni-facebook-original"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="twitter">
                                                    <i class="lni lni-twitter-original"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="google">
                                                    <i class="lni lni-google"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="pinterest">
                                                    <i class="lni lni-pinterest"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="vimeo">
                                                    <i class="lni lni-vimeo"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <div class="post-social-media">
                                        <h5 class="share-title">Bagikan ke</h5>
                                        <ul class="custom-flex">
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('berita_sekolah.berita_sekolah_detail', $berita->slug) }}"
                                                    class="facebook">
                                                    <i class="lni lni-facebook-original"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?url={{ route('berita_sekolah.berita_sekolah_detail', $berita->slug) }}&text={{ $berita->judul }}"
                                                    class="twitter">
                                                    <i class="lni lni-twitter-original"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://wa.me/?text={{ route('berita_sekolah.berita_sekolah_detail', $berita->slug) }} - {{ $berita->judul }}" class="whatsapp">
                                                  <i class="lni lni-whatsapp"></i>
                                                </a>
                                              </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <!-- Comments -->
                            {{-- <div class="post-comments">
                                <h3 class="comment-title">Post comments</h3>
                                <ul class="comments-list">
                                    <li>
                                        <div class="comment-img">
                                            <img src="assets/images/blog/comment1.png" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Rosalina Kelian</h6>
                                                <span class="date">19th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Donec aliquam ex ut odio dictum, ut consequat leo interdum. Aenean nunc
                                                ipsum, blandit eu enim sed, facilisis convallis orci. Etiam commodo
                                                lectus
                                                quis vulputate tincidunt. Mauris tristique velit eu magna maximus
                                                condimentum.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comment-img">
                                            <img src="assets/images/blog/comment2.png" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Arista Williamson <span class="saved"><i
                                                            class="lni lni-bookmark"></i></span></h6>
                                                <span class="date">15th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment-img">
                                            <img src="assets/images/blog/comment3.png" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Arista Williamson</h6>
                                                <span class="date">12th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i
                                                        class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title">Leave a comment</h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="#"
                                                    class="form-control form-control-custom" placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="#"
                                                    class="form-control form-control-custom" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="#"
                                                    class="form-control form-control-custom" placeholder="Your Subject" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea name="#" rows="6" class="form-control form-control-custom" placeholder="Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn mouse-dir white-bg">Post Comment <span
                                                        class="dir-part"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->


@endsection
