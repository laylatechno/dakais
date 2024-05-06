@extends('back.layouts.app')
@section('title','Halaman Absensi')
@section('subtitle','Menu Absensi')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><b>Pembuatan Absensi</b></h5>
                <br>
                <hr>
                 
                <form action="{{ route('absensi.store') }}" method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guru_id">Guru</label>
                                <select class="form-control" name="guru_id">
                                    @foreach ($guru as $guruItem)
                                        <option value="{{ $guruItem->id }}">{{ $guruItem->nama_guru }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select class="form-control" id="kelas_id" name="kelas_id">
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kehadiran</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="siswa-table-body">
                            <!-- Diisi oleh JavaScript -->
                        </tbody>
                    </table>
                    
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success" style="color:white;"><i class="fas fa-save"></i> Simpan</button>
                            <a href="/absensi" class="btn btn-danger" style="color:white;"><i class="fas fa-step-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk memperbarui tabel -->
<script>
  document.getElementById('kelas_id').addEventListener('change', function() {
    var kelasId = this.value;
    var siswaTableBody = document.getElementById('siswa-table-body');
    siswaTableBody.innerHTML = ''; // Kosongkan tabel

    if (kelasId) {
        fetch(`/kelas/${kelasId}/siswa`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    data.forEach((siswa, index) => {
                        var row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${siswa.nis}</td>
                                <td class="siswa-name" data-radio-id="hadir_${siswa.id}">${siswa.nama_siswa}</td>
                                <td>
                                    <label class="radio-label" data-radio-id="hadir_${siswa.id}">
                                        <input type="radio" id="hadir_${siswa.id}" name="kehadiran_${siswa.id}" value="Hadir" checked> Hadir
                                    </label>
                                    <label class="radio-label" data-radio-id="alpa_${siswa.id}">
                                        <input type="radio" id="alpa_${siswa.id}" name="kehadiran_${siswa.id}" value="Alpa"> Alpa
                                    </label>
                                    <label class="radio-label" data-radio-id="izin_${siswa.id}">
                                        <input type="radio" id="izin_${siswa.id}" name="kehadiran_${siswa.id}" value="Izin"> Izin
                                    </label>
                                </td>
                                <td><input class="form-control" type="text" name="keterangan_${siswa.id}"></td>
                                <td><input type="hidden" name="siswa_ids[]" value="${siswa.id}"></td>
                            </tr>
                        `;
                        siswaTableBody.insertAdjacentHTML('beforeend', row);
                    });

                    // Tambahkan event listener pada label dan nama siswa untuk memilih radio button
                    var radioLabels = document.querySelectorAll('.radio-label, .siswa-name');
                    radioLabels.forEach(function(element) {
                        element.addEventListener('click', function() {
                            var radioId = this.dataset.radioId;
                            var radioButton = document.getElementById(radioId);
                            if (radioButton) {
                                radioButton.checked = true; // Memilih radio button yang sesuai
                            }
                        });
                    });
                } else {
                    siswaTableBody.innerHTML = '<tr><td colspan="6">Tidak ada siswa dalam kelas ini.</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error:', error); // Menangani kesalahan jika ada
            });
    }
});

</script>
@endsection
