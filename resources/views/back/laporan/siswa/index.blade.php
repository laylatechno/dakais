@extends('back.layouts.app')
@section('title','Laporan Halaman Siswa')
@section('subtitle','Menu Siswa')

<!-- Add these links in the head section of your layout file -->

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Laporan Data Siswa - SMPIT Maryam</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="tanggal_awal">Tanggal lahir Awal:</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="start_date" value="{{ $filterStartDate }}">
                        <!-- Let's move the button here -->
                        <button class="btn btn-sm btn-primary mt-3"><i class="fas fa-search"></i> Filter Berdasarkan Range</button>
                    </div>
                    <div class="col-md-4">
                        <label for="tanggal_akhir">Tanggal lahir Akhir:</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="end_date" value="{{ $filterEndDate }}">
                    </div>
                    <!-- Remove the third column -->
                </div>
                
                
              </form>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!-- Add other column headers as needed -->
                            <th>No</th>
                            <th>Status</th>
                            
                            <th>NIK</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas Sekarang</th>
                            <th>Jumlah Tabungan</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                          
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Alamat</th>
                            <th>Nama Ayah</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Penghasilan Ayah</th>
                            <th>No Telp Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Penghasilan Ibu</th>
                            <th>No Telp Ibu</th>
                            <th>Nama Wali</th>
                            <th>Pekerjaan Wali</th>
                            <th>Penghasilan Wali</th>
                            <th>No Telp Wali</th>
                            <th>Tahun Masuk</th>
                            <th>Sekolah Asal</th>
                            <th>Kelas Sekolah Asal</th>
                            <th>Foto</th>
                            <th>KK</th>
                            <th>Ijazah</th>
                            <th>Akte</th>
                            <th>KTP</th>
                           
                             
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $p)
                        <tr>
                            <!-- Add other column data as needed -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->status }}</td>
                           
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nis }}</td>
                            <td>{{ $p->nama_siswa }}</td>
                            <td>{{ $p->nama_kelas }}</td>
                            <td>Rp. {{ number_format($p->jumlah_tabungan) }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ $p->tempat_lahir }}</td>
                            <td>{{ $p->tanggal_lahir }}</td>
                            <td>{{ $p->provinsi }}</td>
                            <td>{{ $p->kota }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->nama_ayah }}</td>
                            <td>{{ $p->pekerjaan_ayah }}</td>
                            <td>{{ $p->penghasilan_ayah }}</td>
                            <td>{{ $p->no_telp_ayah }}</td>
                            <td>{{ $p->nama_ibu }}</td>
                            <td>{{ $p->pekerjaan_ibu }}</td>
                            <td>{{ $p->penghasilan_ibu }}</td>
                            <td>{{ $p->no_telp_ibu }}</td>
                            <td>{{ $p->nama_wali }}</td>
                            <td>{{ $p->pekerjaan_wali }}</td>
                            <td>{{ $p->penghasilan_wali }}</td>
                            <td>{{ $p->no_telp_wali }}</td>
                            <td>{{ $p->tahun_masuk }}</td>
                            <td>{{ $p->sekolah_asal }}</td>
                            <td>{{ $p->kelas }}</td>
                            <td>
                                @if($p->foto)
                                <a href="/upload/foto_siswa/{{ $p->foto }}" target="_blank">
                                    <img style="max-width:50px; max-height:50px" src="/upload/foto_siswa/{{ $p->foto }}" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                @if($p->kk)
                                <a href="/upload/dokumen/{{ $p->kk }}" target="_blank">
                                    <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada kk</span>
                                @endif
                            </td>
                            <td>
                                @if($p->ijazah)
                                <a href="/upload/dokumen/{{ $p->ijazah }}" target="_blank">
                                    <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada ijazah</span>
                                @endif
                            </td>
                            <td>
                                @if($p->akte)
                                <a href="/upload/dokumen/{{ $p->akte }}" target="_blank">
                                    <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada akte</span>
                                @endif
                            </td>
                            <td>
                                @if($p->ktp)
                                <a href="/upload/dokumen/{{ $p->ktp }}" target="_blank">
                                    <img style="max-width:100px; max-height:100px" src="/upload/dokumen/cover.jpg" alt="">
                                </a>
                                @else
                                <span class="badge badge-warning">Tidak ada ktp</span>
                                @endif
                            </td>
                            
                             
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection

@section('scripts')
 
 

@endsection
