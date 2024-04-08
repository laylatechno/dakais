@extends('back.layouts.app')
@section('title','Halaman Nilai Siswa')
@section('subtitle','Menu Nilai Siswa')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Pembuatan Nilai Siswa</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('nilai_siswa.store') }}"  method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun_ajaran_id">Tahun Ajaran </label>
                                <select class="form-control" name="tahun_ajaran_id" id="tahun_ajaran_id">
                                    {{-- <option value="">--Pilih Tahun Ajaran--</option> --}}
                                    @foreach ($tahunAjaran as $p)
                                        <option value="{{ $p->id }}" {{ old('tahun_ajaran_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                                        <!-- Bagian lain dari formulir dengan penggunaan old() -->

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kelas_id">Kelas  </label>
                            <select class="form-control" name="kelas_id" id="kelas_id">
                                <option value="">--Pilih Kelas--</option>
                                @foreach ($kelas as $p)
                                    <option value="{{ $p->id }}" {{ old('kelas_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="siswa_id">Siswa</label>
                            <select class="form-control" name="siswa_id" id="siswa_id">
                                <option value="">--Pilih Siswa--</option>
                                @foreach ($siswa as $p)
                                    <option value="{{ $p->id }}" {{ old('siswa_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_siswa }}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mapel_id">Mata Pelajaran </label>
                            <select class="form-control" name="mapel_id" id="mapel_id">
                                <option value="">--Pilih Mata Pelajaran--</option>
                                @foreach ($mataPelajaran as $p)
                                    <option value="{{ $p->id }}" {{ old('mapel_id') == $p->id ? 'selected' : '' }}>{{ $p->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- ... (bagian formulir lainnya) -->

                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan  </label>
                                <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3">{{ old('keterangan') }}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th width="50%">Nama Penilaian</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($jenis_ujian as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td hidden>ID <input type="text" name="jenis_ujian_id[]" value="{{ $p->id }}"></td>
                                    <td>{{ $p->nama_ujian }}</td>
                                    <td>
                                        <input type="number" class="form-control nilai" name="nilai[]" value="{{ old('nilai.'.$loop->index) }}">
                                    </td>
                                </tr>
                            @endforeach
                            <script>
                                // Ambil semua input nilai
                                const inputsNilai = document.querySelectorAll('input[name="nilai[]"]');
                            
                                // Fungsi untuk menghitung total nilai dan mengembalikan nilai rata-rata
                                const hitungRataRata = () => {
                                    let total = 0;
                            
                                    inputsNilai.forEach(input => {
                                        total += parseFloat(input.value) || 0;
                                    });
                            
                                    return total / inputsNilai.length;
                                };
                            
                                // Tambahkan event listener pada setiap input nilai
                                inputsNilai.forEach(input => {
                                    input.addEventListener('input', () => {
                                        const average = hitungRataRata();
                                        document.getElementById('total_nilai').value = average.toFixed(0);
                                    });
                                });
                            </script>
                            
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Penilaian</th>
                                <th>Nilai</th>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="total_nilai">Total Nilai</label>
                                <input style="font-size: 20px; background-color:brown; color:white;" type="number" class="form-control" id="total_nilai" name="total_nilai" value="{{ old('total_nilai') }}" readonly>
                            </div>
                        </div>
                  
                    </div>
                    
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                            <a href="/nilai_siswa" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


 