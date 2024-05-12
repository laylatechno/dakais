<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.graygrids.com/themes/edugrids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2024 10:00:44 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title') - {{ $profil->nama_sekolah }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="/upload/profil/{{ $profil->favicon }}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('themplete/front/1') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('themplete/front/1') }}/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="{{ asset('themplete/front/1') }}/assets/css/animate.css" />
    <link rel="stylesheet" href="{{ asset('themplete/front/1') }}/assets/css/tiny-slider.css" />
    {{-- <link rel="stylesheet" href="{{ asset('themplete/front/1') }}/assets/css/glightbox.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('themplete/front/1') }}/assets/css/main.css" />
    {{-- Add --}}

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="{{ asset('themplete/front/1') }}/https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Toolbar Start -->
        <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="toolbar-social">
                            <ul>
                                <li><span class="title">Ikuti Kami : </span></li>
                                <li><a href="{{ $profil->facebook }}" target="_blank"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="{{ $profil->youtube }}" target="_blank"><i class="lni lni-youtube"></i></a></li>
                                <li><a href="{{ $profil->instagram }}" target="_blank"><i class="lni lni-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="toolbar-login">
                            <div class="button">
                                <a href="/daftar_sekolah">Pendaftaran Siswa Baru</a>
                                @php
                                $no_telp = str_replace(['-', ' ', '+'], '', $profil->no_telp);  // Menghapus tanda tambah (+), spasi, dan tanda hubung jika ada
                                $pesan = "Hallo.. !! Apakah berkenan saya bertanya terkait informasi sekolah ?";
                                $encoded_pesan = urlencode($pesan);  // Meng-encode pesan agar aman dalam URL
                                $whatsapp_url = "https://wa.me/{$no_telp}?text={$encoded_pesan}";  // Membuat URL lengkap
                                @endphp
                                
                                <a href="{{ $whatsapp_url }}" class="btn" target="_blank"><i class="lni lni-whatsapp"></i>&nbsp; Kontak Via WhatsApp</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="/upload/profil/{{ $profil->logo }}" alt="Logo" style="width: 80px; height: auto;">
                        </a>
                        
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto" >
                           
                                <li class="nav-item"><a class="active" href="/">Beranda</a></li>
                                <li class="nav-item">
                                    <a class="page-scroll dd-menu collapsed" href="/javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation" >Profil </a>
                                    <ul class="sub-menu collapse" id="submenu-1-1">
                                        <li class="nav-item"><a href="/tentang">Tentang Sekolah</a></li>
                                        <li class="nav-item"><a href="/guru_sekolah">Guru dan Staf</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="/kegiatan_sekolah">Kegiatan</a></li>
                                <li class="nav-item"><a href="/galeri_sekolah">Galeri</a></li>
                                <li class="nav-item"><a href="/berita_sekolah">Berita</a></li>
                               
                               
                               
                                <li class="nav-item"><a href="/unduhan_sekolah">Unduhan</a></li>
                                <li class="nav-item"><a href="/kontak_sekolah">Kontak</a></li>
                                <li class="nav-item">
                                    <a class="page-scroll dd-menu collapsed" href="javascript:void(0)"
                                        data-bs-toggle="collapse" data-bs-target="#submenu-1-5"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="Toggle navigation">Link </a>
                                    <ul class="sub-menu collapse" id="submenu-1-5">
                                        @foreach ($link as $p)
                                        <li class="nav-item"><a href="{{ $p->link }}" target="_blank">{{ $p->nama_link }}</a></li>
                                         @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex search-form">
                                <input class="form-control me-2" type="search" placeholder="Cari..."
                                    aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i
                                        class="lni lni-search-alt"></i></button>
                            </form>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

     
    @yield('content')


    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Middle Top -->
        {{-- <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a href="{{ asset('themplete/front/1') }}/index.html"><img src="/upload/profil/{{ $profil->logo }}" alt="Logo"></a>
                            </div>
                            <p>{{ $profil->alamat}}</p>
                            <br>
                            <p>{{ $profil->no_telp}}</p>
                            <p>{{ $profil->email}}</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="{{ $profil->facebook }}"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="{{ $profil->instagram }}"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="{{ $profil->youtube }}"><i class="lni lni-linkedin-original"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer sm-custom-border recent-blog">
                            <h3>Berita Terakhir</h3>
                            <ul>
                                <li>
                                    <a href="{{ asset('themplete/front/1') }}/blog-single-sidebar.html"><img src="{{ asset('themplete/front/1') }}/assets/images/blog/footer-news1.jpg" alt="#">
                                        Top 10 books you Must read in 2023
                                    </a>
                                    <span class="date"><i class="lni lni-calendar"></i>July 15, 2023</span>
                                </li>
                                <li>
                                    <a href="{{ asset('themplete/front/1') }}/blog-single-sidebar.html"><img src="{{ asset('themplete/front/1') }}/assets/images/blog/footer-news2.jpg" alt="#">
                                        How to Improve Your Communication Skill
                                    </a>
                                    <span class="date"><i class="lni lni-calendar"></i>July 1, 2023</span>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer sm-custom-border f-link">
                            <h3>Link Terkait</h3>
                            <ul>
                                <li><a href="">Galeri</a></li>
                                <li><a href="">Agenda</a></li>
                                <li><a href="">Unduhan</a></li>
                                <li><a href="">Tentang Sekolah</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer footer-newsletter">
                            <h3>Support</h3>
                            <p>Subscribe to us to always stay in touch with us and get the latest news.</p>
                            <form action="https://demo.graygrids.com/themes/edugrids/mail/mail.php" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" class="common-input"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your email address'" required="" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe Now!</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div> --}}
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="left">
                               <p>© Copyright 2024. All Rights Reserved By {{ $profil->nama_sekolah }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('themplete/front/1') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('themplete/front/1') }}/assets/js/count-up.min.js"></script>
    <script src="{{ asset('themplete/front/1') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('themplete/front/1') }}/assets/js/tiny-slider.js"></script>
    {{-- <script src="{{ asset('themplete/front/1') }}/assets/js/glightbox.min.js"></script> --}}
    <script src="{{ asset('themplete/front/1') }}/assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
        });
        //========= testimonial 
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 3,
                }
            }
        });
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
        //========= glightbox
        // GLightbox({
        //     'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
        //     'type': 'video',
        //     'source': 'youtube', //vimeo, youtube or local
        //     'width': 900,
        //     'autoplayVideos': true,
        // });
    </script>
</body>


<!-- Mirrored from demo.graygrids.com/themes/edugrids/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Apr 2024 10:01:06 GMT -->
</html>