<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD | @yield('title')</title>



    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('themplete/back') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/plugins/jqvmap/jqvmap.min.css">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/plugins/daterangepicker/daterangepicker.css">

    <!-- Google Font: Source Sans Pro -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('themplete/back') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/upload/profil/{{ $profil->favicon }}">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('themplete/back') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('themplete/back') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('themplete/back') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <img class="animation__shake" src="{{ asset('upload/profil') }}/preloader.png" alt="Master"
                height="100" width="100" id="preloaderLogo">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://wa.me/628971033234" class="nav-link">Kontak Person</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" target="_blank" class="nav-link">Lihat Website</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
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
                </li> --}}

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" style="color: rgb(5, 5, 5);">
                         <span>({{ Auth::user()->role }})</span>
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link"  style="color: red;">
                        <i class="far fa-envelope"></i> <b>Kontak Masuk
                        </b>
                    </a>

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

                <img src="/upload/profil/{{ $profil->logo }}" alt="" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SISTEM AKADEMIK</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if(Auth::user()->picture)
                            <img src="{{ asset('upload/user/' . Auth::user()->picture) }}"
                                 class="img-circle elevation-2"
                                 alt="User Image">
                        @else
                            <img src="{{ asset('themplete/back') }}/dist/img/avatar.png"
                                 class="img-circle elevation-2"
                                 alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                

                <!-- SidebarSearch Form -->
                {{-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}


                <?php
                // Dapatkan path URL saat ini
                $currentPath = $_SERVER['REQUEST_URI'];
                ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link <?php echo $currentPath == '/dashboard' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @if(Auth::check() && (Auth::user()->role == 'Superadmin' || Auth::user()->role == 'Operator'))
                        <li class="nav-header">Master</li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/wali_kelas') !== false || strpos($currentPath, '/pengawas') !== false || strpos($currentPath, '/kepala_sekolah') !== false || strpos($currentPath, '/ruangan') !== false || strpos($currentPath, '/jurusan') !== false || strpos($currentPath, '/kurikulum') !== false || strpos($currentPath, '/tahunajaran') !== false || strpos($currentPath, '/guru') !== false || strpos($currentPath, '/siswa') !== false || strpos($currentPath, '/mapel') !== false || strpos($currentPath, '/kelas') !== false ? 'menu-open active' : ''; ?> ">

                            <a href="#" class="nav-link">

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




                            </ul>
                        </li>
                        @endif
                        
                        @if(in_array(Auth::user()->role, ['Superadmin', 'Operator', 'Bendahara']))
                        <li class="nav-header">Transaksi</li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/pengeluaran') !== false || strpos($currentPath, '/pemasukan') !== false ? 'menu-open active' : ''; ?> ">

                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-bullseye"></i>
                                <p>
                                    Keuangan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="/pengeluaran" class="nav-link <?php echo $currentPath == '/pengeluaran' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengeluaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pemasukan" class="nav-link <?php echo $currentPath == '/pemasukan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemasukan</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/spp') !== false || strpos($currentPath, '/bayar_spp') !== false || strpos($currentPath, '/rekap_spp') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    SPP
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/spp" class="nav-link <?php echo $currentPath == '/spp' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Master SPP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/bayar_spp" class="nav-link <?php echo $currentPath == '/bayar_spp' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bayar SPP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/rekap_spp" class="nav-link <?php echo $currentPath == '/rekap_spp' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rekap SPP</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/tabungan') !== false || strpos($currentPath, '/tarik_tabungan') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Tabungan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/tabungan" class="nav-link <?php echo $currentPath == '/tabungan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simpan Tabungan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/tarik_tabungan" class="nav-link <?php echo $currentPath == '/tarik_tabungan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tarik Tabungan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/kategori_barang') !== false || strpos($currentPath, '/barang') !== false || strpos($currentPath, '/mutasi_barang') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-brush"></i>
                                <p>
                                    Sarpras
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/kategori_barang" class="nav-link <?php echo $currentPath == '/kategori_barang' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/barang" class="nav-link <?php echo $currentPath == '/barang' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/mutasi_barang" class="nav-link <?php echo $currentPath == '/mutasi_barang' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mutasi</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/surat_masuk') !== false || strpos($currentPath, '/surat_keluar') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Administrasi Surat
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/surat_masuk" class="nav-link <?php echo $currentPath == '/surat_masuk' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Surat Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/surat_keluar" class="nav-link <?php echo $currentPath == '/surat_keluar' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Surat Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role, ['Superadmin','Guru']))
                        <li class="nav-header">Akademik</li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/waktumengajar') !== false || strpos($currentPath, '/jadwal_pelajaran') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Jadwal Pelajaran
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/waktumengajar" class="nav-link <?php echo $currentPath == '/waktumengajar' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Waktu Mengajar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jadwal_pelajaran" class="nav-link <?php echo $currentPath == '/jadwal_pelajaran' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Isi Jadwal Pelajaran</p>
                                    </a>
                                </li>


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
                        <li class="nav-item">
                            <a href="/absensi" class="nav-link <?php echo $currentPath == '/absensi' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-book"></i>

                                <p>
                                    Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pendaftaran" class="nav-link <?php echo $currentPath == '/pendaftaran' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-inbox"></i>

                                <p>
                                    Pendaftaran Siswa
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Penilaian</li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/jenis_ujian') !== false || strpos($currentPath, '/nilai_siswa') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-calculator"></i>
                                <p>
                                    Penilaian Siswa
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/jenis_ujian" class="nav-link <?php echo $currentPath == '/jenis_ujian' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Ujian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/nilai_siswa" class="nav-link <?php echo $currentPath == '/nilai_siswa' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nilai Siswa</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif



                        @if(in_array(Auth::user()->role, ['Superadmin','Operator']))
                        <li class="nav-header">Website</li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/kategoriberita') !== false || strpos($currentPath, '/berita') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-blog"></i>
                                <p>
                                    Blog
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/kategoriberita" class="nav-link <?php echo $currentPath == '/kategoriberita' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/berita" class="nav-link <?php echo $currentPath == '/berita' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Blog</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/kategorigaleri') !== false || strpos($currentPath, '/galeri') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Galeri
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/kategorigaleri" class="nav-link <?php echo $currentPath == '/kategorigaleri' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/galeri" class="nav-link <?php echo $currentPath == '/galeri' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Galeri</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/slider') !== false || strpos($currentPath, '/about') !== false || strpos($currentPath, '/alasan') !== false || strpos($currentPath, '/faq') !== false || strpos($currentPath, '/mitra') !== false || strpos($currentPath, '/hitung') !== false || strpos($currentPath, '/kegiatan') !== false || strpos($currentPath, '/testimoni') !== false || strpos($currentPath, '/link') !== false || strpos($currentPath, '/lihat_kontak') !== false || strpos($currentPath, '/visitor') !== false || strpos($currentPath, '/unduhan') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-globe"></i>
                                <p>
                                    Halaman Depan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/slider" class="nav-link <?php echo $currentPath == '/slider' ? 'active' : ''; ?>">

                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Slider
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/about" class="nav-link <?php echo $currentPath == '/about' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            About Us
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/alasan" class="nav-link <?php echo $currentPath == '/alasan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Alasan
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/faq" class="nav-link <?php echo $currentPath == '/faq' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            FAQ
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/mitra" class="nav-link <?php echo $currentPath == '/mitra' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Mitra
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/hitung" class="nav-link <?php echo $currentPath == '/hitung' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Hitungan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kegiatan" class="nav-link <?php echo $currentPath == '/kegiatan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Kegiatan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/testimoni" class="nav-link <?php echo $currentPath == '/testimoni' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Testimoni
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/link" class="nav-link <?php echo $currentPath == '/link' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>

                                        <p>
                                            Link
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/lihat_kontak" class="nav-link <?php echo $currentPath == '/lihat_kontak' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Kontak
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/visitor" class="nav-link <?php echo $currentPath == '/visitor' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Visitor
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/unduhan" class="nav-link <?php echo $currentPath == '/unduhan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Unduhan
                                        </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif


                        @if(in_array(Auth::user()->role, ['Superadmin','Bendahara']))
                        <li class="nav-header">POS</li>
                        <li class="nav-item">
                            <a href="/supplier" class="nav-link <?php echo $currentPath == '/supplier' ? 'active' : ''; ?>">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    Supplier
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/member" class="nav-link <?php echo $currentPath == '/member' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Member
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/top_up_member" class="nav-link <?php echo $currentPath == '/top_up_member' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>
                                    Top Up Member
                                </p>
                            </a>
                        </li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/satuan_produk') !== false || strpos($currentPath, '/kategori_produk') !== false || strpos($currentPath, '/produk') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-soap"></i>
                                <p>
                                    Produk
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <a href="/satuan_produk" class="nav-link <?php echo $currentPath == '/satuan_produk' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Satuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/kategori_produk" class="nav-link <?php echo $currentPath == '/kategori_produk' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/produk" class="nav-link <?php echo $currentPath == '/produk' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Produk</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/pembelian') !== false || strpos($currentPath, '/penjualan') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-keyboard"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/pembelian" class="nav-link <?php echo $currentPath == '/pembelian' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pembelian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/penjualan" class="nav-link <?php echo $currentPath == '/penjualan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penjualan</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/income') !== false || strpos($currentPath, '/expense') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-swatchbook"></i>
                                <p>
                                    IE
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/income" class="nav-link <?php echo $currentPath == '/income' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Income</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/expense" class="nav-link <?php echo $currentPath == '/expense' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif


                        @if(in_array(Auth::user()->role, ['Superadmin','Operator']))
                        <li class="nav-header">Pengaturan</li>
                        <li class="nav-item">
                            <a href="/profil/1/edit" class="nav-link <?php echo $currentPath == '/profil/1/edit' ? 'active' : ''; ?>">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Profil Umum
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link <?php echo $currentPath == '/users' ? 'active' : ''; ?>">
                                <i class="nav-icon far fa-user"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backup_database" class="nav-link <?php echo $currentPath == '/backup_database' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Back Up Database
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/log_histori" class="nav-link <?php echo $currentPath == '/log_histori' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Log Histori
                                </p>
                            </a>
                        </li>
                        @endif


                       
                        <li class="nav-header">Laporan</li>
                        @if(in_array(Auth::user()->role, ['Superadmin','Operator']))
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/laporan/guru') !== false || strpos($currentPath, '/laporan/siswa') !== false || strpos($currentPath, '/laporan/kelas') !== false ? 'menu-open active' : ''; ?> ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('laporan.guru') }}" class="nav-link <?php echo $currentPath == '/laporan/guru' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.siswa') }}" class="nav-link <?php echo $currentPath == '/laporan/siswa' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.kelas') }}" class="nav-link <?php echo $currentPath == '/laporan/kelas' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        

                        @if(in_array(Auth::user()->role, ['Superadmin','Guru']))
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/laporan/nilai_siswa') !== false || strpos($currentPath, '/tampilkan-jadwal') !== false || strpos($currentPath, '/laporan/absensi') !== false ? 'menu-open active' : ''; ?> ">

                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Akademik
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                        <a href="{{ route('laporan.nilai_siswa') }}" class="nav-link <?php echo $currentPath == '/laporan/nilai_siswa' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nilai Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    
                                        <a href="/tampilkan-jadwal" class="nav-link <?php echo $currentPath == '/tampilkan-jadwal' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jadwal Pelajaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.absensi') }}" class="nav-link <?php echo $currentPath == '/laporan/absensi' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Absensi</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endif

                        @if(in_array(Auth::user()->role, ['Superadmin', 'Operator', 'Bendahara']))
                        <li class="nav-item 
                        <?php echo strpos($currentPath, '/laporan/keuangan') !== false || strpos($currentPath, '/laporan/surat') !== false || strpos($currentPath, '/laporan/barang') !== false || strpos($currentPath, '/laporan/mutasi_barang') !== false ? 'menu-open active' : ''; ?> ">

                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('laporan.keuangan') }}" class="nav-link <?php echo $currentPath == '/laporan/keuangan' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Keuangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.surat') }}" class="nav-link <?php echo $currentPath == '/laporan/surat' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Administrasi Surat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.barang') }}" class="nav-link <?php echo $currentPath == '/laporan/barang' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Aset Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('laporan.mutasi_barang') }}" class="nav-link <?php echo $currentPath == '/laporan/mutasi_barang' ? 'active' : ''; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mutasi Aset Barang</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        @endif

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
        All Rights Reserved by Layla Techno &copy; {{ date('Y') }}. Designed and Developed by <a
            href="https://www.ltpresent.com">Layla Techno</a>.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>


    <!-- jQuery -->
    <script src="{{ asset('themplete/back') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('themplete/back') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>


    <!-- Sparkline -->
    <script src="{{ asset('themplete/back') }}/plugins/sparklines/sparkline.js"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('themplete/back') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->

    <script src="{{ asset('themplete/back') }}/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('themplete/back') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->

    <script src="{{ asset('themplete/back') }}/plugins/moment/moment.min.js"></script>


    </script>
    <!-- Summernote -->
    <script src="{{ asset('themplete/back') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('themplete/back') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('themplete/back') }}/dist/js/adminlte.js"></script>


    <script src="{{ asset('themplete/back') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('themplete/back') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('themplete/back') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "lengthMenu": [10, 25, 50, 100],
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": true,
                "lengthMenu": [5, 10, 25, 50, 100],
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            // Tambahkan konfigurasi untuk example4 yang sama dengan example1
            $("#example4").DataTable({
                "responsive": true,
                "lengthChange": true,
                "lengthMenu": [10, 25, 50, 100],
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
        });
    </script>




    @stack('scripts')

</body>

</html>
