@extends('back.layouts.app')
@section('title', 'Keuangan')
@section('subtitle', 'Menu Keuangan')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" id="unhide">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tanggal_awal">Tanggal Awal:</label>
                                <input type="date" class="form-control" id="tanggal_awal" name="start_date" value="{{ $filterStartDate ?? date('Y-m-d') }}">
                                <!-- Let's move the button here -->
                                <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-search"></i> Filter Berdasarkan Range</button>
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal_akhir">Tanggal Akhir:</label>
                                <input type="date" class="form-control" id="tanggal_akhir" name="end_date" value="{{ $filterEndDate ?? date('Y-m-d') }}">
                            </div>
                            <!-- Remove the third column -->
                        </div>
                        
                        
                      </form>
                      <br><hr>
                    <h5 class="card-title mb-0"><b>{{ $profil->nama_sekolah }}</b></h5>
                    <br><br>
                    <a href="/upload/profil/{{ $profil->logo }}" target="_blank">
                        <img class="" width="50px" height="50px;" src="/upload/profil/{{ $profil->logo }}"
                            alt="user image">
                    </a>
                    <br><br>
                    <h5 class="card-title mb-3">Alamat : <br>
                    {{ $profil->alamat }} <br>
                    {{ $profil->deskripsi }}</h5>
                    <br><br><br>
                    <hr>
                    <br>
                  
                   
                    <div class="col-md-12">
                        {{-- <div class="form-group"> --}}
                        <label for="hari">Pemasukan : </label>
                        {{-- </div> --}}
                    </div>

                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th >Tanggal Pemasukan</th>
                                <th >Nama Pemasukan</th>
                                <th >Keterangan</th>
                                <th >PIC</th>
                                <th >Jumlah Pemasukan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemasukan as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->tanggal_pemasukan }}</td>
                                    <td>{{ $p->nama_pemasukan }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>{{ $p->pic }}</td>
                                    <td>Rp. {{ number_format($p->jumlah_pemasukan) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" style="text-align: right;">Total Summary</td>
                                <td>Rp. {{ number_format($pemasukan->sum('jumlah_pemasukan')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    

                    <br>
                    <hr>
                    <div class="col-md-12">
                        {{-- <div class="form-group"> --}}
                        <label for="hari">Pengeluaran : </label>
                        {{-- </div> --}}
                    </div>

                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th >Tanggal Pengeluaran</th>
                                <th >Nama Pengeluaran</th>
                                <th >Keterangan</th>
                                <th >PIC</th>
                                <th >Jumlah Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengeluaran as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->tanggal_pengeluaran }}</td>
                                    <td>{{ $p->nama_pengeluaran }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>{{ $p->pic }}</td>
                                    <td>Rp. {{ number_format($p->jumlah_pengeluaran) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" style="text-align: right;">Total Summary</td>
                                <td>Rp. {{ number_format($pengeluaran->sum('jumlah_pengeluaran')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table id="summary" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 
                                <th >Jumlah Pemasukan</th>
                                <th >Jumlah Pengeluaran</th>
                                <th >Selisih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                 
                                <td>Rp. {{ number_format($pemasukan->sum('jumlah_pemasukan')) }}</td>
                                <td>Rp. {{ number_format($pengeluaran->sum('jumlah_pengeluaran')) }}</td>
                                <td>Rp. {{ number_format($pemasukan->sum('jumlah_pemasukan') - $pengeluaran->sum('jumlah_pengeluaran')) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    


                    {{-- akhir bagian looping  --}}

                    <div class="border-top" id="unhide">
                        <div class="card-body">
                            <button id="btnPrint" class="btn btn-success" style="color:white;"><i class="fas fa-print"></i>
                                Cetak</button>


                            <a href="/tampilkan-jadwal" class="btn btn-danger" style="color:white;"><i
                                    class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        // Fungsi untuk membuka jendela cetak saat tombol cetak diklik
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnPrint').addEventListener('click', function() {
                window.print();
            });
        });
    </script>
@endpush
