<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTEM AKADEMIK | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- Tempusdominus Bootstrap 4 -->
  {{-- <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
  <!-- JQVMap -->
  {{-- <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/jqvmap/jqvmap.min.css"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  {{-- <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/daterangepicker/daterangepicker.css"> --}}
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('themplete/back')}}/dist/img/AdminLTELogo.png">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('themplete/back')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style>
    /* CSS untuk menyembunyikan div saat mencetak */
    @media print {
        #unhide {
            display: none;
        }
    }
</style>
 

  @stack('css')
   

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    {{-- <img class="animation__shake" src="" alt="Master" height="60" width="60" id="preloaderLogo"> --}}
    <img class="animation__shake" src="{{ asset('upload/profil')}}/preloader.png" alt="Master" height="100" width="100" id="preloaderLogo">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://wa.me/6285320555394" class="nav-link">Kontak Person</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('themplete/back')}}/dist/img/avatar.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('themplete/back')}}/dist/img/avatar.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('themplete/back')}}/dist/img/avatar.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
       
    </ul>
  </nav>
  <!-- /.navbar -->

 
  {{-- Sidebar --}}
    <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/dashboard" class="brand-link">
    <img src="{{ asset('themplete/back')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SISTEM AKADEMIK</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('themplete/back')}}/dist/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name; }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>


    <?php
    // Dapatkan path URL saat ini
    $currentPath = $_SERVER['REQUEST_URI'];
    ?>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
       
        <li class="nav-item">
          <a href="/dashboard" class="nav-link <?php echo $currentPath == '/dashboard' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">Master</li>
        <li class="nav-item <?php echo strpos($currentPath, '/wali_kelas') !== false || strpos($currentPath, '/pengawas') !== false || strpos($currentPath, '/kepala_sekolah') !== false || strpos($currentPath, '/ruangan') !== false || strpos($currentPath, '/jurusan') !== false || strpos($currentPath, '/kurikulum') !== false || strpos($currentPath, '/tahunajaran') !== false || strpos($currentPath, '/guru') !== false || strpos($currentPath, '/siswa') !== false || strpos($currentPath, '/mapel') !== false  || strpos($currentPath, '/kelas') !== false ? 'menu-open active' : ''; ?> ">
          <a href="#" class="nav-link <?php echo strpos($currentPath, '/tahunajaran') !== false || strpos($currentPath, '/guru') !== false || strpos($currentPath, '/mapel') !== false ? 'active' : ''; ?>">
         
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Master Data
             
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/tahunajaran" class="nav-link <?php echo $currentPath == '/tahunajaran' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tahun Ajaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/guru" class="nav-link <?php echo $currentPath == '/guru' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Guru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/siswa" class="nav-link <?php echo $currentPath == '/siswa' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Siswa</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/kelas" class="nav-link <?php echo $currentPath == '/kelas' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kelas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/mapel" class="nav-link <?php echo $currentPath == '/mapel' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Mata Pelajaran</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/kurikulum" class="nav-link <?php echo $currentPath == '/kurikulum' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kurikulum</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/jurusan" class="nav-link <?php echo $currentPath == '/jurusan' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Jurusan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/ruangan" class="nav-link <?php echo $currentPath == '/ruangan' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Ruangan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/kepala_sekolah" class="nav-link <?php echo $currentPath == '/kepala_sekolah' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kepala Sekolah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pengawas" class="nav-link <?php echo $currentPath == '/pengawas' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pengawas</p>
              </a>
            </li>
          
        
        
          </ul>
        </li>
        <li class="nav-header">Akademik</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                  Jadwal Pelajaran
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
                
              <li class="nav-item">
                  <a href="/waktumengajar" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Waktu Mengajar</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/jadwal_pelajaran" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Isi Jadwal Pelajaran</p>
                  </a>
              </li>
              {{-- <li class="nav-item">
                <a href="/tampilkan-jadwal" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lihat Jadwal Pelajaran</p>
                </a>
            </li> --}}
          
          </ul>
        </li> 
        <li class="nav-item">
          <a href="/penempatan_kelas" class="nav-link <?php echo $currentPath == '/penempatan_kelas' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-film"></i>
            <p>
              Penempatan Kelas
            </p>
          </a>
        </li>
        <li class="nav-header">Penilaian</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                  Penilaian Siswa
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
               
              <li class="nav-item">
                  <a href="/jenis_ujian" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Jenis Ujian</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/nilai_siswa" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Nilai Siswa</p>
                  </a>
              </li>
          
          </ul>
        </li>
        <li class="nav-header">Transaksi</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bullseye"></i>
              <p>
                  Keuangan
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
               
              <li class="nav-item">
                  <a href="/pengeluaran" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pengeluaran</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/pemasukan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pemasukan</p>
                  </a>
              </li>
          
          </ul>
        </li>
     
        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                  SPP
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
               
              <li class="nav-item">
                  <a href="/spp" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master SPP</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/bayar_spp" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bayar SPP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tagihan_spp" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tagihan SPP</p>
                </a>
              </li>
             
          
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                  Tabungan
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
               
              <li class="nav-item">
                  <a href="/tabungan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Simpan Tabungan</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/tarik_tabungan" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tarik Tabungan</p>
                </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-brush"></i>
              <p>
                  Sarpras
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
               
              <li class="nav-item">
                  <a href="/kategori_barang" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Kategori Barang</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/barang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang</p>
                </a>
            </li>
              <li class="nav-item">
                <a href="/mutasi_barang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mutasi</p>
                </a>
            </li>
             
          
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                  Administrasi Surat
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
               
              <li class="nav-item">
                  <a href="/surat_masuk" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Surat Masuk</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="/surat_keluar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Surat Keluar</p>
                </a>
            </li>
          </ul>
        </li>
      
      
      
      <li class="nav-header">Website</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-blog"></i>
          <p>
            Blog
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/kategoriberita" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/berita" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Blog</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            Galeri
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/kategorigaleri" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/galeri" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Galeri</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Halaman Depan
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/slider" class="nav-link">
              
              <i class="far fa-circle nav-icon"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/about" class="nav-link">
             <i class="far fa-circle nav-icon"></i>
              <p>
                About Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/alasan" class="nav-link">
              {{-- <i class="nav-icon fas fa-columns"></i> --}}
              <i class="far fa-circle nav-icon"></i>
               
              <p>
                Alasan
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="/faq" class="nav-link">
              {{-- <i class="nav-icon fas fa-search"></i> --}}
              <i class="far fa-circle nav-icon"></i>
               
              <p>
                FAQ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/mitra" class="nav-link">
              
              {{-- <i class="nav-icon far fa-handshake"></i> --}}
              <i class="far fa-circle nav-icon"></i>

              <p>
                Mitra
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kontak" class="nav-link">
              {{-- <i class="nav-icon far fa-address-book"></i> --}}
              <i class="far fa-circle nav-icon"></i>
              <p>
                Kontak
              </p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-header">POS</li>
      <li class="nav-item">
        <a href="/supplier" class="nav-link">
          <i class="nav-icon far fa-user"></i>
          <p>
           Supplier
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/member" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
           Member
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/top_up_member" class="nav-link">
          <i class="nav-icon fas fa-upload"></i>
          <p>
           Top Up Member
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-soap"></i>
          <p>
            Produk
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/satuan_produk" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Satuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/kategori_produk" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/produk" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Produk</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-keyboard"></i>
          <p>
            Transaksi
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/pembelian" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pembelian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/penjualan" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Penjualan</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-swatchbook"></i>
          <p>
            IE
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/kategoriberita" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Income</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/berita" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Expense</p>
            </a>
          </li>

        </ul>
      </li>


        
         
        
   




        <li class="nav-header">Pengaturan</li>
        <li class="nav-item">
          <a href="/profil/1/edit" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
             Profil Umum
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/users" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/backup_database" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Back Up Database
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/log_histori" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Log Histori
            </p>
          </a>
        </li>


        <li class="nav-header">Laporan</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Master
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('laporan.guru') }}" class="nav-link"> <!-- Menggunakan route() untuk tautan guru -->
                        <i class="far fa-circle nav-icon"></i>
                        <p>Guru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.siswa') }}" class="nav-link"> <!-- Menggunakan route() untuk tautan siswa -->
                        <i class="far fa-circle nav-icon"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.kelas') }}" class="nav-link"> <!-- Menggunakan route() untuk tautan kelas -->
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kelas</p>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Akademik
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('laporan.nilai_siswa') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nilai Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tampilkan-jadwal" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jadwal Pelajaran</p>
              </a>
            </li>
 
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Transaksi
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('laporan.keuangan') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keuangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tampilkan-jadwal" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tampilkan-jadwal" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Keluar</p>
              </a>
            </li>
 
          </ul>
        </li>
       

        <li class="nav-header">Logout</li>
        <li class="nav-item">
          <a href="/logout" class="nav-link">
            <i class="nav-icon fas fa-undo"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

 





    
        
        
        
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

  {{-- Akhir Sidebar --}}


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       

        @yield('content')

        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<footer class="main-footer" id="unhide">
  All Rights Reserved by Layla Techno &copy; {{ date('Y')}}. Designed and Developed by <a
  href="https://www.ltpresent.com">Layla Techno</a>.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0
  </div>
</footer>
 
<!-- jQuery -->
<script src="{{ asset('themplete/back')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('themplete/back')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> --}}
<!-- Bootstrap 4 -->
<script src="{{ asset('themplete/back')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
{{-- <script src="{{ asset('themplete/back')}}/plugins/chart.js/Chart.min.js"></script> --}}
<!-- Sparkline -->
{{-- <script src="{{ asset('themplete/back')}}/plugins/sparklines/sparkline.js"></script> --}}
<!-- JQVMap -->
{{-- <script src="{{ asset('themplete/back')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{ asset('themplete/back')}}/plugins/jquery-knob/jquery.knob.min.js"></script> --}}
<!-- daterangepicker -->
<script src="{{ asset('themplete/back')}}/plugins/moment/moment.min.js"></script>
{{-- <script src="{{ asset('themplete/back')}}/plugins/daterangepicker/daterangepicker.js"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('themplete/back')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('themplete/back')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('themplete/back')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('themplete/back')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('themplete/back')}}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('themplete/back')}}/dist/js/pages/dashboard.js"></script> --}}



<!-- DataTables  & Plugins -->
<script src="{{ asset('themplete/back')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('themplete/back')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true, // Aktifkan opsi Show entries
      "lengthMenu": [10, 25, 50, 100], // Tampilkan opsi 5, 10, 25, dan 50 entri
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




 @stack('scripts')

</body>
</html>

{{-- @section('scripts')
    <script defer>
        $(document).ready(function () {
            $('#example1').DataTable({
                "lengthMenu": [5, 10, 25, 50],
                "pageLength": 10 // Jumlah entri default saat halaman dimuat
            });
        });
    </script>
@endsection --}}