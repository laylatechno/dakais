<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MAU BIKIN CV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('themplete/front')}}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('themplete/front')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('themplete/front')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('themplete/front')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('themplete/front')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('themplete/front')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('themplete/front')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('themplete/front')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('themplete/front')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Flexor
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ $profile->email}}">{{ $profile->email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $profile->no_telp}}</span></i>
      </div>

      <div class="cta d-none d-md-flex align-items-center">
        <a href="#about" class="scrollto">Buat CV Sekarang</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="">MaubikinCV</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ asset('themplete/front')}}/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Profil</a></li>
          {{-- <li><a class="nav-link scrollto" href="#services">Layanan</a></li> --}}
          <li><a class="nav-link scrollto" href="#testimonials">Testimoni</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Pilihan Template</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          {{-- <li><a class="nav-link scrollto" href="#pricing">Biaya</a></li> --}}
          {{-- <li><a href="blog.html">Blog</a></li> --}}
          {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto" href="#clients">Metode Pembayaran</a></li>
          {{-- <li><a class="nav-link scrollto" href="#contact">Kontak</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

 
  <main id="main">

    
    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">
        <h5 class="modal-title" id="exampleModalLabel">Kebijakan & privasi | MaubikinCV.com</h5>
        <div class="row">
          <iframe src="https://drive.google.com/file/d/1d0YbF7ALr2xE7XzWTY-XCXM00thT8Jdp/preview" width="100%" height="600px" style="border:0;"></iframe>
        </div>

      </div>
    </section><!-- End About Section -->

  


    
 

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MaubikinCV</h3>
            <p>
              {{ $profile->alamat}} <br><br>
              <strong>Phone:</strong>   {{ $profile->no_telp}}<br>
              <strong>Email:</strong>  {{ $profile->email}}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">Kebijakan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#myModal2">Syarat & Ketentuan Layanan</a></li>
              
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Blog</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pendidikan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ekonomi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sport</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Gabung bersama kami untukmendapatkan informasi selengkapnya</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          &copy; Copyright <strong><span>MaubikinCV</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
          Designed by <a href="">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
















<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kebijakan | MaubikinCV.com</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://drive.google.com/file/d/1d0YbF7ALr2xE7XzWTY-XCXM00thT8Jdp/preview" width="100%" height="600px" style="border:0;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>




 
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Syarat & Ketentuan | MaubikinCV.com</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://drive.google.com/file/d/1vrITgUqucUbrnEvZRxY5Qk_Dg5kbVvhY/preview" width="100%" height="600px" style="border:0;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>




 




  <!-- Vendor JS Files -->
  <script src="{{ asset('themplete/front')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('themplete/front')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('themplete/front')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('themplete/front')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('themplete/front')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('themplete/front')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('themplete/front')}}/assets/js/main.js"></script>

  

</body>

</html>

