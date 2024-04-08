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


  <style>
    
    
    #myBtn {
      display: none;
      position: fixed;
      bottom: 80px;
      right: 13px;
      z-index: 99;
      font-size: 14px;
      border: none;
      outline: none;
      background-color: #057bcc;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }
    
    #myBtn:hover {
      background-color: #555;
    }
    </style>
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
        {{-- <h1><a href="/">MaubikinCV</a></h1> --}}
        <a href="/"><img src="{{ asset('themplete/front')}}/assets/img/logo.png" alt="" class="img-fluid"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ asset('themplete/front')}}/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          {{-- <li><a class="nav-link scrollto" href="#services">Layanan</a></li> --}}
          {{-- <li><a class="nav-link scrollto" href="#testimonials">Testimoni</a></li> --}}
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
          <li><a class="nav-link scrollto" href="#clients"><i class="bx bx-user"></i> . Akun Saya</a></li>
          {{-- <li><a class="nav-link scrollto" href="#contact">Kontak</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container" data-aos="fade-in">
      <h1>Selamat Datang Di <span style="color: #f4ac1e">Maubikincv.com</span></h1>
      <h2>Bikin CV Online dan Surat Lamaran Kerja Cepat dan Mudah</h2>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="/customers" class="btn-get-started scrollto">Buat CV Sekarang</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-xl-4 col-lg-5" data-aos="fade-up">
            <div class="content">
              <h3>Kenapa memilih MaubikinCV?</h3>
              <p>
                <?php ?>
                @foreach ($profils as $p)
                <p>{{ $p->keterangan}}</p>
                <?php ?>
                @endforeach
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-flex">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">



                <?php ?>
                @foreach ($alasans as $p)
                
                  
                  
                    <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                      <div class="icon-box mt-4 mt-xl-0">
                        <i class="{{ $p->icon}}"></i>
                        <h4>{{ $p->nama}}</h4>
                        <p>{{ $p->keterangan}}</p>
                      </div>
                    </div>
                     
                     
                
                  
                <?php ?>
                @endforeach


              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative" data-aos="fade-right">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h4 data-aos="fade-up">About us</h4>
            <h3 data-aos="fade-up">Tentang Kami MaubikinCV</h3>
            <p data-aos="fade-up">MaubikinCV adalah platform untuk membuat CV (Curriculum Vitae) / Resume secara online
              dengan mudah dan praktis. MaubikinCV memiliki berbagai pilihan template desain CV yang
              menarik. Hanya dengan beberapa klik, Anda akan memiliki CV profesional yang bisa
              membedakan Anda di mata pemberi kerja.</p>

            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Layanan 1</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Layanan 2</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Layanan 3</a></h4>
              <p class="description">Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

 
  

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

       

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
           
          <form action="http://127.0.0.1:8000/customers2"  >
            <div class="text-center php-email-form">
              <button type="submit" style="color:white;"  >Buat CV Sekarang</button>
            </div>
          </form>
          
         
          

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container position-relative" data-aos="fade-up">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">


            
            <?php ?>
            @foreach ($testimonis as $p)
            
              
              
               
            
              
         

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/upload/{{ $p->gambar}}" class="testimonial-img" alt="">
                <h3>{{ $p->nama}}</h3>
                {{-- <h4>Ceo &amp; Founder</h4> --}}
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ $p->keterangan}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <?php ?>
            @endforeach
 

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

  
    


      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="section-title">
            <h2 data-aos="fade-up">Contoh Themplete</h2>
            <p data-aos="fade-up">"Kami hadirkan The Complete Curriculum Vitae - solusi unggulan untuk memaksimalkan potensi karier Anda. Ini adalah panduan komprehensif yang akan membantu Anda membuat CV yang menarik dan profesional. Dengan templat yang modern, tips penulisan yang canggih, dan panduan langkah demi langkah.</p>
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                {{-- <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li> --}}
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

              
            <?php ?>
            @foreach ($portofolios as $p)
            
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="/upload/{{ $p->gambar}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>{{ $p->nama}}</h4>
                <p>{{ $p->keterangan}}</p>
                <a href="/upload/{{ $p->gambar}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $p->nama}}"><i class="bx bx-plus"></i></a>
                <a href="{{ $p->link}}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
  

            <?php ?>
            @endforeach
  
       
    
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->



      
 




           <!-- ======= F.A.Q Section ======= -->
     <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">F.A.Q</h2>
          <p data-aos="fade-up">Pertanyaan yang Sering Diajukan (FAQ) kami adalah sumber informasi penting untuk memahami lebih dalam tentang produk atau layanan kami. Di sini, Anda akan menemukan jawaban yang lengkap dan jelas untuk pertanyaan-pertanyaan umum yang sering diajukan oleh pelanggan kami</p>
        </div>

        <div class="faq-list">
          <ul>

            
            <?php ?>
            @foreach ($faqs as $p)
            
                  
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-{{ $p->urutan}}" class="collapsed">{{ $p->pertanyaan}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{ $p->urutan}}" class="collapse" data-bs-parent=".faq-list">
                <p>
                  {{ $p->jawaban}}
                </p>
              </div>
            </li>

  

            <?php ?>
            @endforeach


 
          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->


    <!-- ======= Clients Section ======= -->
     <section id="clients" class="clients">
      <div class="section-title">
        <h2 data-aos="fade-up">Metode Pembayaran</h2>
        <p data-aos="fade-up">Kini anda lebih mudah dan praktis untuk melakukan pembayaran kapanpun dan dimanapun</p>
      </div>
      <div class="container" data-aos="fade-up">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">

            <?php ?>
            @foreach ($metodes as $p)
            
                  
            <div class="swiper-slide"><img src="/upload/{{ $p->gambar}}" class="img-fluid" alt="{{ $p->nama}}"></div>
  

            <?php ?>
            @endforeach

           
 
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>  
    </section><!-- End Clients Section -->



    
 

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <a href="/"><img src="{{ asset('themplete/front')}}/assets/img/logo.png" alt="" class="img-fluid"></a>
            <p>
              {{ $profile->alamat}} <br><br>
              <strong>Phone:</strong>   {{ $profile->no_telp}}<br>
              <strong>Email:</strong>  {{ $profile->email}}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
             
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">Kebijakan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#" data-bs-toggle="modal" data-bs-target="#myModal2">Syarat & Ketentuan Layanan</a></li>
              
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
             
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
               
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            
              <h4 style="display: inline-block;">Join Our Newsletter</h4>
            
            <p>Gabung bersama kami untuk mendapatkan informasi selengkapnya</p>
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

  
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bx bx-unite"></i> Buat CV Sekarang</button>



<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
  mybutton.onclick = function() {
  window.location.href = "/customers";
}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>

</html>

