@extends('front.app')
@section('title', 'Halaman Unduhan')
@section('subtitle', 'Menu Unduhan')

@section('content')



    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Unduhan</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <li><a href="/">Beranda</a></li>
                        <li>Unduhan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Photo Gallery -->

    <section class="events section">
        <div class="container">

            <div class="row">
                @foreach ($unduhan as $p)
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Start Single Event -->
                        <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Publish</th>
                                        <th>Nama Unduhan</th>
                                        <th>Kategori</th>
                                        <th>Thumbnail</th>
                                        <th>File</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($unduhan as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->tanggal_publish }}</td>
                                            <td>{{ $p->nama_unduhan }}</td>
                                            <td>{{ $p->kategori }}</td>
                                            <td>
                                                @if ($p->thumbnail)
                                                    <a href="/upload/unduhan/{{ $p->thumbnail }}" target="_blank">
                                                        <img style="max-width:50px; max-height:50px"
                                                            src="/upload/unduhan/{{ $p->thumbnail }}" alt="">
                                                    </a>
                                                @else
                                                    <span class="badge badge-warning">Tidak ada thumbnail</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($p->file)
                                                    @php
                                                        $extension = pathinfo($p->file, PATHINFO_EXTENSION);
                                                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                    @endphp

                                                    @if (in_array($extension, $imageExtensions))
                                                        <a href="/upload/unduhan/{{ $p->file }}" target="_blank">
                                                            <img style="max-width:50px; max-height:50px"
                                                                src="/upload/unduhan/{{ $p->file }}" alt="">
                                                        </a>
                                                    @else
                                                        <a href="/upload/unduhan/{{ $p->file }}" download>
                                                            <i class="fas fa-file"></i> Download
                                                        </a>
                                                    @endif
                                                @else
                                                    <span class="badge badge-warning">Tidak ada unduhan</span>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach





                                </tbody>

                            </table>
                        </div>
                        <!-- End Single Event -->
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Photo Gallery -->

     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('themplete/back') }}/dist/css/adminlte.min.css">
     <!-- overlayScrollbars -->
   
     <!-- DataTables -->
     <link rel="stylesheet"
         href="{{ asset('themplete/back') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 





       <!-- jQuery -->
       <script src="{{ asset('themplete/back') }}/plugins/jquery/jquery.min.js"></script>
       <!-- jQuery UI 1.11.4 -->
       <script src="{{ asset('themplete/back') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
       <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     
 
         
   
   
   
       <!-- DataTables  & Plugins -->
       <script src="{{ asset('themplete/back') }}/plugins/datatables/jquery.dataTables.min.js"></script>
       <script src="{{ asset('themplete/back') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
       <script src="{{ asset('themplete/back') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
       <script src="{{ asset('themplete/back') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
       
      
   
   
   
   
       <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true, // Aktifkan opsi Show entries
                "lengthMenu": [10, 25, 50, 100], // Tampilkan opsi 10, 25, 50, dan 100 entri
                "autoWidth": false
                // Opsi "buttons" dihapus
            });
        });
    </script>
    

@endsection
