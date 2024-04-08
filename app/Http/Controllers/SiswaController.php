<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
     {
         $log = new LogHistori();
         $log->tabel_asal = $tabelAsal;
         $log->id_entitas = $idEntitas;
         $log->aksi = $aksi;
         $log->waktu = now(); // Menggunakan waktu saat ini
         $log->pengguna = $pengguna;
         $log->data_lama = $dataLama;
         $log->data_baru = $dataBaru;
         $log->save();
     }

    public function index()
    {
        $siswa = Siswa::all();
        return view('back.siswa.index',compact('siswa'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'nik'=>'required',
            'nis'=>'required',
            'nama_siswa'=>'required',
            'email'=>'required',
            'jenis_kelamin'=>'required',
            'tanggal_lahir'=>'required',
            'provinsi'=>'required',
            'kota'=>'required',
            'alamat'=>'required',
            'nama_ayah'=>'required',
            'pekerjaan_ayah'=>'required',
            'penghasilan_ayah'=>'required',
            'no_telp_ayah'=>'required',
            'nama_ibu'=>'required',
            'pekerjaan_ibu'=>'required',
            'penghasilan_ibu'=>'required',
            'no_telp_ibu'=>'required',
            'nama_wali'=>'required',
            'pekerjaan_wali'=>'required',
            'penghasilan_wali'=>'required',
            'no_telp_wali'=>'required',
            'tahun_masuk'=>'required',
            'sekolah_asal'=>'required',
            'kelas'=>'required',
            'foto'=>'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
            'kk'=>'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
            'ijazah'=>'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
            'akte'=>'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
            'ktp'=>'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
 
           
        ],[
            'nip.required'=>'NIP Wajib diisi',
            'nama_siswa.required'=>'Nama Siswa Wajib diisi',
            'kode_siswa.required'=>'Kode Siswa Wajib diisi',
            'tempat_lahir.required'=>'Tempat Lahir Wajib diisi',
            'tanggal_lahir.required'=>'Tanggal Lahir Wajib diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin Wajib diisi',
            'no_telp.required'=>'No Telp Wajib diisi',
            'instagram.required'=>'Instagram Wajib diisi',
            'email.required'=>'Email Wajib diisi',
            'alamat.required'=>'Alamat Wajib diisi',
            'honor.required'=>'Honor Wajib diisi',
            'gelar_depan.required'=>'Gelar Depan Wajib diisi',
            'gelar_belakang.required'=>'Gelar Belakang Wajib diisi',
            'username.required'=>'Username Wajib diisi',
            'password.required'=>'password Wajib diisi',
            'tanggal_masuk.required'=>'tanggal_masuk Wajib diisi',
            'foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi pdf',
            'foto.max' => 'Ukuran foto tidak boleh lebih dari 2 MB',
            'kk.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
            'kk.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
            'ijazah.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
            'ijazah.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
            'akte.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
            'akte.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
            'ktp.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
            'ktp.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
        ]);
        $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'upload/foto_siswa';
            
            // Mengambil nama_siswa file asli
            $originalFileName = $image->getClientOriginalName();
        
            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();
        
            // Menggabungkan waktu dengan nama_siswa file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
        
            // Pindahkan file ke lokasi tujuan dengan nama_siswa baru
            $image->move($destinationPath, $imageName);
        
            $input['foto'] = $imageName;
        }

        if ($kkFile = $request->file('kk')) {
            $kkDestinationPath = 'upload/dokumen/';
            $kkOriginalFileName = $kkFile->getClientOriginalName();
            $kkExtension = $kkFile->getClientOriginalExtension();
            $kkFileName = date('YmdHis') . '_' . str_replace(' ', '_', $kkOriginalFileName) . '.' . $kkExtension;
            $kkFile->move($kkDestinationPath, $kkFileName);
            $input['kk'] = $kkFileName;
        }
        
        if ($akteFile = $request->file('akte')) {
            $akteDestinationPath = 'upload/dokumen/';
            $akteOriginalFileName = $akteFile->getClientOriginalName();
            $akteExtension = $akteFile->getClientOriginalExtension();
            $akteFileName = date('YmdHis') . '_' . str_replace(' ', '_', $akteOriginalFileName) . '.' . $akteExtension;
            $akteFile->move($akteDestinationPath, $akteFileName);
            $input['akte'] = $akteFileName;
        }
        
        if ($ijazahFile = $request->file('ijazah')) {
            $ijazahDestinationPath = 'upload/dokumen/';
            $ijazahOriginalFileName = $ijazahFile->getClientOriginalName();
            $ijazahExtension = $ijazahFile->getClientOriginalExtension();
            $ijazahFileName = date('YmdHis') . '_' . str_replace(' ', '_', $ijazahOriginalFileName) . '.' . $ijazahExtension;
            $ijazahFile->move($ijazahDestinationPath, $ijazahFileName);
            $input['ijazah'] = $ijazahFileName;
        }
        
        if ($ktpFile = $request->file('ktp')) {
            $ktpDestinationPath = 'upload/dokumen/';
            $ktpOriginalFileName = $ktpFile->getClientOriginalName();
            $ktpExtension = $ktpFile->getClientOriginalExtension();
            $ktpFileName = date('YmdHis') . '_' . str_replace(' ', '_', $ktpOriginalFileName) . '.' . $ktpExtension;
            $ktpFile->move($ktpDestinationPath, $ktpFileName);
            $input['ktp'] = $ktpFileName;
        }

        
        // Buat entitas siswa baru
        $siswa = Siswa::create($input);

        // Dapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Siswa', $siswa->id, $loggedInUserId, null, json_encode($input));
        return redirect('/siswa')->with('message', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('back.siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nik' => 'required',
        'nis' => 'required',
        'nama_siswa' => 'required',
        'email' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required',
        'provinsi' => 'required',
        'kota' => 'required',
        'alamat' => 'required',
        'nama_ayah' => 'required',
        'pekerjaan_ayah' => 'required',
        'penghasilan_ayah' => 'required',
        'no_telp_ayah' => 'required',
        'nama_ibu' => 'required',
        'pekerjaan_ibu' => 'required',
        'penghasilan_ibu' => 'required',
        'no_telp_ibu' => 'required',
        'nama_wali' => 'required',
        'pekerjaan_wali' => 'required',
        'penghasilan_wali' => 'required',
        'no_telp_wali' => 'required',
        'tahun_masuk' => 'required',
        'sekolah_asal' => 'required',
        'kelas' => 'required',
        'foto' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        'kk' => 'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
        'ijazah' => 'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
        'akte' => 'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
        'ktp' => 'mimes:pdf|max:2048', // Max 2 MB (2048 KB)
    ], [
        'nik.required' => 'NIK Wajib diisi',
        'nis.required' => 'NIS Wajib diisi',
        'nama_siswa.required' => 'Nama Siswa Wajib diisi',
        'email.required' => 'Email Wajib diisi',
        'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir Wajib diisi',
        'provinsi.required' => 'Provinsi Wajib diisi',
        'kota.required' => 'Kota Wajib diisi',
        'alamat.required' => 'Alamat Wajib diisi',
        'nama_ayah.required' => 'Nama Ayah Wajib diisi',
        'pekerjaan_ayah.required' => 'Pekerjaan Ayah Wajib diisi',
        'penghasilan_ayah.required' => 'Penghasilan Ayah Wajib diisi',
        'no_telp_ayah.required' => 'No. Telp Ayah Wajib diisi',
        'nama_ibu.required' => 'Nama Ibu Wajib diisi',
        'pekerjaan_ibu.required' => 'Pekerjaan Ibu Wajib diisi',
        'penghasilan_ibu.required' => 'Penghasilan Ibu Wajib diisi',
        'no_telp_ibu.required' => 'No. Telp Ibu Wajib diisi',
        'nama_wali.required' => 'Nama Wali Wajib diisi',
        'pekerjaan_wali.required' => 'Pekerjaan Wali Wajib diisi',
        'penghasilan_wali.required' => 'Penghasilan Wali Wajib diisi',
        'no_telp_wali.required' => 'No. Telp Wali Wajib diisi',
        'tahun_masuk.required' => 'Tahun Masuk Wajib diisi',
        'sekolah_asal.required' => 'Sekolah Asal Wajib diisi',
        'kelas.required' => 'Kelas Wajib diisi',
        'foto.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi pdf',
        'foto.max' => 'Ukuran foto tidak boleh lebih dari 2 MB',
        'kk.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
        'kk.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
        'ijazah.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
        'ijazah.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
        'akte.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
        'akte.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
        'ktp.mimes' => 'File yang dimasukkan hanya diperbolehkan berekstensi pdf',
        'ktp.max' => 'Ukuran file tidak boleh lebih dari 2 MB',
    ]);

    $siswa = SIswa::find($id);

    if (!$siswa) {
        return redirect('/siswa')->with('error', 'Siswa tidak ditemukan');
    }

    $input = $request->all();

    if ($image = $request->file('foto')) {
        $destinationPath = 'upload/foto_siswa';
        
        // Mengambil nama file asli
        $originalFileName = $image->getClientOriginalName();
    
        // Mendapatkan ekstensi file
        $extension = $image->getClientOriginalExtension();
    
        // Menggabungkan waktu dengan nama file asli
        $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
    
        // Pindahkan file ke lokasi tujuan dengan nama baru
        $image->move($destinationPath, $imageName);
    
        $input['foto'] = $imageName;
    }

    if ($kkFile = $request->file('kk')) {
        $kkDestinationPath = 'upload/dokumen/';
        $kkOriginalFileName = $kkFile->getClientOriginalName();
        $kkExtension = $kkFile->getClientOriginalExtension();
        $kkFileName = date('YmdHis') . '_' . str_replace(' ', '_', $kkOriginalFileName) . '.' . $kkExtension;
        $kkFile->move($kkDestinationPath, $kkFileName);
        $input['kk'] = $kkFileName;
    }
    
    if ($akteFile = $request->file('akte')) {
        $akteDestinationPath = 'upload/dokumen/';
        $akteOriginalFileName = $akteFile->getClientOriginalName();
        $akteExtension = $akteFile->getClientOriginalExtension();
        $akteFileName = date('YmdHis') . '_' . str_replace(' ', '_', $akteOriginalFileName) . '.' . $akteExtension;
        $akteFile->move($akteDestinationPath, $akteFileName);
        $input['akte'] = $akteFileName;
    }
    
    if ($ijazahFile = $request->file('ijazah')) {
        $ijazahDestinationPath = 'upload/dokumen/';
        $ijazahOriginalFileName = $ijazahFile->getClientOriginalName();
        $ijazahExtension = $ijazahFile->getClientOriginalExtension();
        $ijazahFileName = date('YmdHis') . '_' . str_replace(' ', '_', $ijazahOriginalFileName) . '.' . $ijazahExtension;
        $ijazahFile->move($ijazahDestinationPath, $ijazahFileName);
        $input['ijazah'] = $ijazahFileName;
    }
    
    if ($ktpFile = $request->file('ktp')) {
        $ktpDestinationPath = 'upload/dokumen/';
        $ktpOriginalFileName = $ktpFile->getClientOriginalName();
        $ktpExtension = $ktpFile->getClientOriginalExtension();
        $ktpFileName = date('YmdHis') . '_' . str_replace(' ', '_', $ktpOriginalFileName) . '.' . $ktpExtension;
        $ktpFile->move($ktpDestinationPath, $ktpFileName);
        $input['ktp'] = $ktpFileName;
    }

     // Mendapatkan ID pengguna yang sedang login
     $loggedInUserId = Auth::id();

     // Simpan log histori untuk operasi Update dengan user_id yang sedang login
     $this->simpanLogHistori('Update', 'Form Update Siswa', $siswa->id, $loggedInUserId, json_encode($siswa), json_encode($input));

    $siswa->update($input);

    return redirect('/siswa')->with('message', 'Data berhasil diperbarui');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect('/siswa')->with('messagehapus', 'Data tidak ditemukan');
        }

        $dataLama = json_encode($siswa);
        // Hapus data dari database
        $siswa->delete();

        // Hapus foto siswa
        if ($siswa->foto && file_exists(public_path('upload/foto_siswa/' . $siswa->foto))) {
            unlink(public_path('upload/foto_siswa/' . $siswa->foto));
        }

        // Hapus file KK
        if ($siswa->kk && file_exists(public_path('upload/dokumen/' . $siswa->kk))) {
            unlink(public_path('upload/dokumen/' . $siswa->kk));
        }

        // Hapus file ijazah
        if ($siswa->ijazah && file_exists(public_path('upload/dokumen/' . $siswa->ijazah))) {
            unlink(public_path('upload/dokumen/' . $siswa->ijazah));
        }

        // Hapus file akte
        if ($siswa->akte && file_exists(public_path('upload/dokumen/' . $siswa->akte))) {
            unlink(public_path('upload/dokumen/' . $siswa->akte));
        }

        // Hapus file KTP
        if ($siswa->ktp && file_exists(public_path('upload/dokumen/' . $siswa->ktp))) {
            unlink(public_path('upload/dokumen/' . $siswa->ktp));
        }
        // Dapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'Form Hapus Siswa', $id, $loggedInUserId, $dataLama, null);

        return redirect('/siswa')->with('messagehapus', 'Berhasil menghapus data dan file-file terkait');
    }

    
}
