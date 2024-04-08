<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\Mapel;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    // Fungsi untuk menyimpan log histori
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::orderBy('id')->get();
        return view('back.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.guru.create');
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
            'nip' => 'required|unique:guru,nip',
            'nama_guru' => 'required',
            'kode_guru' => 'required|unique:guru,kode_guru',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'honor' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
        ], [
            'nip.required' => 'NIP Wajib diisi',
            'nip.unique' => 'NIP Sudah terdaftar',
            'nama_guru.required' => 'Nama Guru Wajib diisi',
            'kode_guru.required' => 'Kode Guru Wajib diisi',
            'kode_guru.unique' => 'Kode Sudah terdaftar',
            'tempat_lahir.required' => 'Tempat Lahir Wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi',
            'no_telp.required' => 'No Telp Wajib diisi',
         
            'honor.required' => 'Honor Wajib diisi',
            'username.required' => 'Username Wajib diisi',
            'password.required' => 'password Wajib diisi',
            'tanggal_masuk.required' => 'tanggal_masuk Wajib diisi',
            'status.required' => 'Status Wajib diisi',
          
        ]);
        $input = $request->except('honor');

        if ($request->has('honor')) {
            $input['honor'] = str_replace(',', '', $request->input('honor'));
        }

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/guru/';

            // Mengambil nama_guru file asli
            $originalFileName = $image->getClientOriginalName();

            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();

            // Menggabungkan waktu dengan nama_guru file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;

            // Pindahkan file ke lokasi tujuan dengan nama_guru baru
            $image->move($destinationPath, $imageName);

            $input['gambar'] = $imageName;
        }
        /// Membuat guru baru dan mendapatkan data pengguna yang baru dibuat
        $guru = Guru::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan guru_id yang sedang login
        $this->simpanLogHistori('Create', 'Form Tambah Guru', $guru->id, $loggedInUserId, null, json_encode($input));
        return redirect('/guru')->with('message', 'Data berhasil ditambahkan');
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
        $data = Guru::where('id', $id)->first();
        return view('back.guru.edit')->with('data', $data);
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
            'nip' => 'required',
            'nama_guru' => 'required',
            'kode_guru' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
          
            'honor' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'tanggal_masuk' => 'required',
        ], [
            'nip.required' => 'NIP Wajib diisi',
            'nama_guru.required' => 'Nama Guru Wajib diisi',
            'kode_guru.required' => 'Kode Guru Wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib diisi',
            'no_telp.required' => 'No Telp Wajib diisi',
           
            'honor.required' => 'Honor Wajib diisi',
            'username.required' => 'Username Wajib diisi',
            'password.required' => 'password Wajib diisi',
            'tanggal_masuk.required' => 'tanggal_masuk Wajib diisi',
            'status.required' => 'status Wajib diisi',
            'gambar.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB',
        ]);

        $guru = Guru::find($id);
        // Mendapatkan data sebelum diupdate
        $oldData = $guru->getOriginal();

        if (!$guru) {
            return redirect('/guru')->with('error', 'Guru tidak ditemukan');
        }

        $existingImage = $guru->gambar; // Simpan nama gambar yang sudah ada sebelumnya

        if ($image = $request->file('gambar')) {
            $destinationPath = 'upload/guru/';

            // Mengambil nama file asli
            $originalFileName = $image->getClientOriginalName();

            // Mendapatkan ekstensi file
            $extension = $image->getClientOriginalExtension();

            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;
            $image->move($destinationPath, $imageName);

            $guru->gambar = $imageName; // Simpan nama gambar yang baru diupdate

            // Hapus gambar lama hanya jika ada dan bukan direktori
            $existingImagePath = public_path('upload/guru/' . $existingImage);
            if (file_exists($existingImagePath) && is_file($existingImagePath)) {
                unlink($existingImagePath);
            }
        }

        // Perbarui data lainnya
        $guru->nip = $request->input('nip');
        $guru->nama_guru = $request->input('nama_guru');
        $guru->kode_guru = $request->input('kode_guru');
        $guru->tempat_lahir = $request->input('tempat_lahir');
        $guru->tanggal_lahir = $request->input('tanggal_lahir');
        $guru->jenis_kelamin = $request->input('jenis_kelamin');
        $guru->no_telp = $request->input('no_telp');
        $guru->instagram = $request->input('instagram');
        $guru->email = $request->input('email');
        $guru->gelar_depan = $request->input('gelar_depan');
        $guru->gelar_belakang = $request->input('gelar_belakang');
        $guru->alamat = $request->input('alamat');

        $honor = $request->input('honor');
        $honor = str_replace(',', '', $honor);
        $guru->honor = $honor;

        $guru->username = $request->input('username');
        $guru->password = $request->input('password');
        $guru->tanggal_masuk = $request->input('tanggal_masuk');
        $guru->status = $request->input('status');
        $guru->save();



        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Form Update Guru', $id, $loggedInUserId, json_encode($oldData), json_encode($guru));

        return redirect('/guru')->with('message', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);

        if ($guru) {
            // Periksa apakah guru masih terkait dengan tabel kelas
            $kelas = Kelas::where('wali_kelas', $id)->first();

            // Periksa apakah guru masih terkait dengan tabel mapel
            $mapel = Mapel::where('guru_pengampu', 'like', '%' . $id . '%')->first();

            $profil = Profil::where('kepala_sekolah_id', $id)
                ->orWhere('bendahara_sekolah_id', $id)
                ->orWhere('operator_sekolah_id', $id)
                ->first();

            if ($profil || $kelas || $mapel) {
                $message = 'Data guru tidak dapat dihapus karena masih terkait dengan: ';
                $relatedTables = [];

                if ($kelas) {
                    $relatedTables[] = 'tabel kelas';
                }

                if ($mapel) {
                    $relatedTables[] = 'tabel mapel';
                }

                if ($profil) {
                    $relatedTables[] = 'tabel profil';
                }

                $message .= implode(', ', $relatedTables);
                return redirect('/guru')->with('messagehapus', $message);
            }

            $nama_guruFoto = $guru->gambar;


            // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
            $loggedInUserId = Auth::id();
            $this->simpanLogHistori('Delete', 'Form Hapus Guru', $id, $loggedInUserId, json_encode($guru), null);

            // Hapus data dari database
            $guru->delete();

            // Hapus file foto jika ada
            if ($nama_guruFoto && file_exists(public_path('upload/guru/' . $nama_guruFoto))) {
                unlink(public_path('upload/guru/' . $nama_guruFoto));
            }

            return redirect('/guru')->with('messagehapus', 'Berhasil menghapus data');
        } else {
            return redirect('/guru')->with('messagehapus', 'Data tidak ditemukan');
        }
    }
}
