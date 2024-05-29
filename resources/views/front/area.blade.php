@extends('front.app')
@section('title', 'Halaman Area')
@section('subtitle', 'Menu Area')
<style>
    .update-button {
        background-color: #28a745;
        /* Warna latar belakang hijau */
        color: white;
        /* Warna teks putih */
        border: none;
        /* Menghilangkan border */
        padding: 10px 20px;
        /* Padding untuk ukuran tombol */
        font-size: 16px;
        /* Ukuran font */
        border-radius: 5px;
        /* Sudut border melengkung */
        cursor: pointer;
        /* Menampilkan pointer pada hover */
    }

    .update-button:hover {
        background-color: #218838;
        /* Warna latar belakang hijau gelap saat hover */
    }
</style>
@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title"> Selamat Datang Di Area Depan</h1>
                        <p>{{ $profil->nama_sekolah }}</p>
                    </div>
                    <ul class="breadcrumb-nav">
                        <a href="">
                            <h4 style="color: white;">{{ $loggedInSiswa->nama_siswa }}</h4>
                        </a>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Faq Area -->
    <div class="faq section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general"
                                aria-selected="true">Data Diri</button>
                            <button class="nav-link" id="nav-admission-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-admission" type="button" role="tab" aria-controls="nav-admission"
                                aria-selected="false">Bayar Spp</button>
                            <button class="nav-link" id="nav-courses-tab" data-bs-toggle="tab" data-bs-target="#nav-courses"
                                type="button" role="tab" aria-controls="nav-courses" aria-selected="false">Lihat
                                Nilai</button>
                            <button class="nav-link" id="nav-career-tab" data-bs-toggle="tab" data-bs-target="#nav-career"
                                type="button" role="tab" aria-controls="nav-career"
                                aria-selected="false">Tabungan</button>
                            <button class="nav-link" id="nav-notice-tab" data-bs-toggle="tab" data-bs-target="#nav-notice"
                                type="button" role="tab" aria-controls="nav-notice" aria-selected="false">Agenda
                                Sekolah</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-general" role="tabpanel">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne1" aria-expanded="true"
                                            aria-controls="collapseOne1">
                                            <span>Jika terdapat kesalahan input data siswa, silahkan hubungi pihak sekolah
                                                untuk segera di perbaiki !</span><i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>





                                    <div id="collapseOne1" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne1" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if (session('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        
                                            <form action="{{ route('area.update', ['area' => $loggedInSiswa->id]) }}" method="post">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-lg-12 col-12"
                                                        style="margin-bottom: 10px; text-align: center;">
                                                        <div class="form-group">
                                                            <a href="/upload/foto_siswa/{{ $loggedInSiswa->foto }}"
                                                                target="_blank">
                                                                <img style="max-width:300px; max-height:300px; display: inline-block;"
                                                                    src="/upload/foto_siswa/{{ $loggedInSiswa->foto }}"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-lg-12 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>NIS</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->nis }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->nama_siswa }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Jenis Kelamin</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text"
                                                                value="{{ $loggedInSiswa->jenis_kelamin }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Tempat Lahir</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->tempat_lahir }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text"
                                                                value="{{ $loggedInSiswa->tanggal_lahir }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Provinsi</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->provinsi }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Kota</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->kota }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea class="form-control" name="" id="" cols="30" rows="3" readonly>{{ $loggedInSiswa->alamat }}</textarea>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Nama Ayah</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->nama_ayah }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>No telp Ayah</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->no_telp_ayah }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Nama Ibu</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->nama_ibu }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>No telp Ibu</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->no_telp_ibu }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Sekolah Asal</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->sekolah_asal }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Kelas</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->kelas }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <hr>
                                                    <div class="col-lg-4 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input name="" class="form-control" id=""
                                                                type="text" value="{{ $loggedInSiswa->email }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Ganti Password</label>
                                                            <input name="password" class="form-control" id="password"
                                                                type="password" value=""
                                                                placeholder="Kosongkan jika tidak ada perubahan">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-12" style="margin-bottom: 10px;">
                                                        <div class="form-group">
                                                            <label>Konfirmasi Password</label>
                                                            <input name="password_confirmation" class="form-control" id="password2" type="password" value="" placeholder="Kosongkan jika tidak ada perubahan">

                                                        </div>
                                                    </div>




                                                </div>
                                                <br>
                                                <div class="hero-text">
                                                    <div class="button wow fadeInUp" data-wow-delay=".2s">
                                                        <button type="submit" class="btn alt-btn"><i
                                                                class="lni lni-save"></i> Update Data</button>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-admission" role="tabpanel"
                            aria-labelledby="nav-admission-tab">
                            <div class="accordion" id="accordionExample2">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne11">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne11" aria-expanded="true"
                                            aria-controls="collapseOne11">
                                            <span>Sekarang anda dapat melakukan pembayaran Spp secara online untuk
                                                mempermudah transaksi anda !</span><i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseOne11" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne11" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor.</p>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                adipisci veritatis!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-courses" role="tabpanel" aria-labelledby="nav-courses-tab">
                            <div class="accordion" id="accordionExample3">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne111">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne111" aria-expanded="true"
                                            aria-controls="collapseOne111">
                                            <span>Monitoring nilai bisa anda lakukan dengan mudah dan real time !</span><i
                                                class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseOne111" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne111" data-bs-parent="#accordionExample3">
                                        <div class="accordion-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor.</p>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                adipisci veritatis!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-career" role="tabpanel" aria-labelledby="nav-career-tab">
                            <div class="accordion" id="accordionExample4">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne1111">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne1111" aria-expanded="true"
                                            aria-controls="collapseOne1111">
                                            <span>Monitoring Tabungan anda baik setoran ataupun penarikan !</span><i
                                                class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseOne1111" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne1111" data-bs-parent="#accordionExample4">
                                        <div class="accordion-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor.</p>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                adipisci veritatis!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-notice" role="tabpanel" aria-labelledby="nav-notice-tab">
                            <div class="accordion" id="accordionExample5">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne11111">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne11111" aria-expanded="true"
                                            aria-controls="collapseOne11111">
                                            <span>Pantau agenda sekolah dengan mudah dan cepat !</span><i
                                                class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id="collapseOne11111" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne11111" data-bs-parent="#accordionExample5">
                                        <div class="accordion-body">
                                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                                skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                Brunch 3 wolf moon tempor.</p>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis
                                                repellat autem dolor expedita minima quidem vero ipsa ea tempore dolorem
                                                nobis eius, modi molestiae dignissimos assumenda aliquid molestias
                                                adipisci veritatis!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Faq Area -->
@endsection
