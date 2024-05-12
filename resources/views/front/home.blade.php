@extends('front.app')
@section('title', 'SIAKAD')
@section('subtitle', 'Menu Awal')


@section('content')

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="hero-slider">
            <!-- Single Slider -->
            @foreach ($slider as $p)
                <div class="hero-inner overlay" style="background-image: url('/upload/slider/{{ $p->gambar }}');">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                                <div class="home-slider">
                                    <div class="hero-text">
                                        <h5 class="wow fadeInUp" data-wow-delay=".3s">{{ $profil->nama_sekolah }}</h5>
                                        <h1 class="wow fadeInUp" data-wow-delay=".5s">{{ $p->nama_slider }}</h1>
                                        <p class="wow fadeInUp" data-wow-delay=".7s">{{ $p->keterangan }}</p>
                                        <div class="button wow fadeInUp" data-wow-delay=".9s">
                                            <a href="#tentang-kami" class="btn">Tentang Kami</a>

                                            <a href="courses-grid.html" class="btn alt-btn">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!--/ End Single Slider -->
        </div>
    </section>
    <!--/ End Hero Area -->

    <!-- Start Features Area -->
    <section class="features">
        <div class="container-fluid">
            <div class="single-head">
                <div class="row">
                    @foreach ($about as $p)
                        <div class="col-lg-4 col-md-4 col-12 padding-zero">
                            <!-- Start Single Feature -->
                            <div class="single-feature">
                                <h3><a href="{{ $p->link }}">{{ $p->nama_about }}</a></h3>
                                <p>{{ $p->keterangan }}</p>
                                <div class="button">
                                    <a href="{{ $p->link }}" class="btn">Selengkapnya <i
                                            class="lni lni-arrow-right"></i></a>
                                </div>
                            </div>
                            <!-- End Single Feature -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /End Features Area -->

    <style>
        /* Pop-up dengan posisi fixed dan z-index tinggi */
        .popup {
            display: none;
            /* Tersembunyi secara default */
            position: fixed;
            /* Tetap di tempat meskipun halaman digulir */
            top: 0;
            left: 0;
            width: 100%;
            /* Mengisi seluruh lebar layar */
            height: 100%;
            /* Mengisi seluruh tinggi layar */
            background-color: rgba(0, 0, 0, 0.5);
            /* Latar belakang semi-transparan */
            justify-content: center;
            /* Pusatkan konten secara horizontal */
            align-items: center;
            /* Pusatkan konten secara vertikal */
            z-index: 1000;
            /* Pastikan pop-up berada di lapisan paling atas */
        }

        /* Konten pop-up */
        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            position: relative;
            /* Dibutuhkan untuk tombol penutup */
        }

        /* Tombol penutup */
        .close {
            position: absolute;
            /* Tetap di posisi yang sama dalam konten */
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
    <!-- Start About Us Area -->
    <section class="about-us section" id="tentang-kami">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s">Tentang {{ $profil->nama_sekolah }}</span>
                            <br><br>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Selamat Datang</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s" style="margin-top: -15px;">{{ $profil->deskripsi }}
                            </p>

                            <div class="button wow fadeInUp" data-wow-delay="1s">
                                @php
                                    $no_telp = str_replace(['-', ' ', '+'], '', $profil->no_telp); // Menghapus tanda tambah (+), spasi, dan tanda hubung jika ada
                                    $pesan = 'Hallo.. !! Apakah berkenan saya bertanya terkait informasi sekolah ?';
                                    $encoded_pesan = urlencode($pesan); // Meng-encode pesan agar aman dalam URL
                                    $whatsapp_url = "https://wa.me/{$no_telp}?text={$encoded_pesan}"; // Membuat URL lengkap
                                @endphp
                                <a href="{{ $whatsapp_url }}" class="btn" target="_blank">Selengkapnya</a>
                                <a href="javascript:void(0)" class="video btn" id="openPopup" style="margin: 5px;"> Play
                                    Video <i class="lni lni-play"></i></a>


                                <!-- Pop-up yang berisi iframe YouTube -->
                                <div id="popup" class="popup">
                                    <div class="popup-content">
                                        <!-- Tombol untuk menutup pop-up -->
                                        <span id="closePopup" class="close">&times;</span>
                                        <!-- Video YouTube dalam iframe -->
                                        <iframe id="youtubeVideo" src="" width="450" height="205"
                                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <script>
                                    const youtubeUrl = "{{ $profil->youtube }}";
                                </script>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="/upload/profil/{{ $profil->gambar }}" alt="#" style="border-radius: 5%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End About Us Area -->


    <!-- Start Achivement Area -->
    <section class="our-achievement section overlay">
        <div class="container">
            <div class="row">
                @foreach ($hitung as $p)
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                            <h3 class="counter"><span id="secondo1" class="countup"
                                    cup-end="{{ $p->jumlah }}">{{ $p->hitung }}</span>+</h3>
                            <h4>{{ $p->nama_hitung }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Achivement Area -->

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

                                <a href="{{ route('kegiatan_sekolah.kegiatan_sekolah_detail', $p->id) }}">
                                    <img src="/upload/kegiatan/{{ $p->gambar }}" alt="#" class="event-image">
                                </a>

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
                <div class="button" style="text-align: center; margin-top:25px;">
                    <a href="/kegiatan">
                        <button class="btn">Selengkapnya</button>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- End Events Area-->

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

                <div class="button" style="text-align: center; margin-top:25px;">
                    <a href="/guru_sekolah">
                        <button class="btn">Selengkapnya</button>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!--/ End Teachers Area -->

    <!-- Start Testimonials Area -->
    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Apa kata Alumni</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Testimoni menarik dari para alumni tentang sekolah
                            kami</p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                @foreach ($testimoni as $p)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Testimonial -->
                        <div class="single-testimonial">
                            <div class="text">
                                <p>"{{ $p->keterangan }}"</p>
                            </div>
                            <div class="author">
                                <img src="/upload/testimoni/{{ $p->gambar }}" alt="#">
                                <h4 class="name">
                                    {{ $p->nama_testimoni }}
                                    <span class="deg">~</span>
                                </h4>
                            </div>
                        </div>
                        <!-- End Single Testimonial -->
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->

    <!-- Start Newsletter Area -->
    <section class="newsletter-area section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <div class="newsletter-title">
                        <i class="lni lni-quotation"></i>
                        <h2>Daftarkan Segera</h2>
                        <img src="/upload/profil/{{ $profil->logo }}" alt="Logo" style="width: 150px; height: auto;">
                        <br><br>
                        <p>{{ $profil->alamat }}</p>
                        <hr>
                        <h6>({{ $profil->no_telp }}) - <a href="mailto:{{ $profil->email }}"
                                target="_blank">{{ $profil->email }}</a></h6>
                    </div>
                    <!-- Start Newsletter Form -->
                    <div class="subscribe-text wow fadeInUp" data-wow-delay=".2s">


                        <div class="button">
                            @php
                                $no_telp = str_replace(['-', ' ', '+'], '', $profil->no_telp); // Menghapus tanda tambah (+), spasi, dan tanda hubung jika ada
                                $pesan = 'Hallo.. !! Apakah berkenan saya bertanya terkait pendaftaran peserta didik baru ?';
                                $encoded_pesan = urlencode($pesan); // Meng-encode pesan agar aman dalam URL
                                $whatsapp_url = "https://wa.me/{$no_telp}?text={$encoded_pesan}"; // Membuat URL lengkap
                            @endphp
                            <a href="{{ $whatsapp_url }}"  target="_blank">
                                <button class="btn">Hubungi Via WA</button>
                            </a>
                            <a href="/daftar_sekolah" class="btn">Daftar Sekarang</a>
                            
                        </div>

                        <ul class="newsletter-social">
                            <li><a href="{{ $profil->facebook }}" target="_blank"><i
                                        class="lni lni-facebook-original"></i></a></li>
                            <li><a href="{{ $profil->youtube }}" target="_blank"><i class="lni lni-youtube"></i></a>
                            </li>
                            <li><a href="{{ $profil->instagram }}" target="_blank"><i class="lni lni-instagram"></i></a>
                            </li>

                        </ul>
                    </div>
                    <!-- End Newsletter Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- /End Newsletter Area -->



    <!-- Start Latest News Area -->
    <div class="latest-news-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="section-icon wow zoomIn" data-wow-delay=".4s">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Blog Terakhir</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Dapatkan informasi terbaru yang menarik dan
                            informatif untuk anda semua dari berbagai macam kategori yang ada</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $p)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single News -->
                        <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".2s">
                            <div class="image">
                                <a href=""><img class="thumb" src="/upload/berita/{{ $p->gambar }}"
                                        alt="#"></a>
                            </div>
                            <div class="content-body">
                                <div class="meta-data">
                                    <ul>
                                        <li>
                                            <i class="lni lni-tag"></i>
                                            <a href="javascript:void(0)">
                                                {{ $p->kategoriBerita->nama_kategori_berita }}</a>
                                        </li>
                                        <li>
                                            <i class="lni lni-calendar"></i>
                                            <a href="javascript:void(0)"> {{ $p->tanggal_posting }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="title"><a
                                        href="{{ route('berita_sekolah.berita_sekolah_detail', $p->slug) }}">
                                        {{ $p->judul_berita }}</a></h4>
                                @php
                                    $cleaned_text = strip_tags($p->isi); // Menghilangkan semua tag HTML
                                    $truncated_text =
                                        strlen($cleaned_text) > 150
                                            ? substr($cleaned_text, 0, 150) . '...'
                                            : $cleaned_text; // Membatasi hingga 150 karakter
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
            </div>
        </div>
    </div>
    <!-- End Latest News Area -->
    <br>
    <div class="popular-courses circle carousel-shadow ">
        <div class="container">
            <div class="site-heading text-center mt-2">



                <div class="embedsocial-hashtag" data-ref="b26fd1fe91a65d10f5149e8f3626d0b6f15255aa"></div>
                <script>
                    (function(d, s, id) {
                        var js;
                        if (d.getElementById(id)) {
                            return;
                        }
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://embedsocial.com/cdn/ht.js";
                        d.getElementsByTagName("head")[0].appendChild(js);
                    }(document, "script", "EmbedSocialHashtagScript"));
                </script>



            </div>

        </div>
    </div>

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

    <script>
        document.getElementById("openPopup").addEventListener("click", function() {
            const popup = document.getElementById("popup");
            const youtubeVideo = document.getElementById("youtubeVideo");

            // Ganti "watch?v=" dengan "embed/" untuk digunakan dalam iframe
            const videoId = youtubeUrl.split("watch?v=")[1]; // Ambil ID video
            const embedUrl = "https://www.youtube.com/embed/" + videoId; // Buat URL embed

            youtubeVideo.src = embedUrl; // Setel URL ke iframe
            popup.style.display = "flex"; // Tampilkan pop-up
        });

        document.getElementById("closePopup").addEventListener("click", function() {
            const popup = document.getElementById("popup");
            const youtubeVideo = document.getElementById("youtubeVideo");

            popup.style.display = "none"; // Sembunyikan pop-up
            youtubeVideo.src = ""; // Hentikan video
        });
    </script>
    <script>
        const btnTentangKami = document.querySelector('.btn');
        const sectionTentangKami = document.querySelector('#tentang-kami');

        btnTentangKami.addEventListener('click', function(event) {
            event.preventDefault(); // Cegah tautan default
            smoothScroll(sectionTentangKami);
        });

        function smoothScroll(target) {
            const targetPosition = target.offsetTop;
            const scrollDuration = 500; // Durasi scroll (dalam milidetik)

            const startPosition = window.pageYOffset;
            let currentPosition = startPosition;

            const increment = (targetPosition - currentPosition) / (scrollDuration / 10);

            function animation() {
                currentPosition += increment;
                window.scrollTo(0, currentPosition);

                if (currentPosition < targetPosition) {
                    requestAnimationFrame(animation);
                } else {
                    // Scroll selesai
                }
            }

            animation();
        }
    </script>
@endsection
