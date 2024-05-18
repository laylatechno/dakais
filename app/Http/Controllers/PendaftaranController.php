<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $pendaftaran = Pendaftaran::all();
        return view('back.pendaftaran.index', compact('pendaftaran'));
    }

    public function index()
    {
        $about = About::all();
        return view('front.daftar', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pendaftaran.create');
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
            'nik' => 'required',
            'nama_siswa' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur validasi sesuai kebutuhan Anda
            // tambahkan validasi lainnya
        ], [
            'nik.required' => 'NIK Wajib diisi',
            'nama_siswa.required' => 'Nama Siswa Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib diisi',
            'foto.required' => 'Foto Wajib diisi',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'foto.max' => 'Ukuran maksimal gambar adalah 2MB',
            // tambahkan pesan validasi lainnya
        ]);

        if ($image = $request->file('foto')) {
            $destinationPath = 'upload/foto_siswa/';

            // Mengambil nama_guru file asli
            $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            // Mendapatkan nama unik dengan waktu
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.webp';

            // Konversi foto ke WebP dan simpan ke folder tujuan
            $img = Image::make($image->getRealPath())->encode('webp', 90); // 90 untuk kualitas foto
            $img->save($destinationPath . $imageName);

            $input['foto'] = $imageName;
        }
        $password = 12345678;
        $siswa = Siswa::create([
            'nik' => $request->nik,
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'no_telp_ayah' => $request->no_telp_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_telp_ibu' => $request->no_telp_ibu,
            'sekolah_asal' => $request->sekolah_asal,
            'kelas' => $request->kelas,
            'password' => Hash::make($password),
            'foto' => $imageName, // Simpan nama file foto
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);



        // Simpan data pendaftaran
        $pendaftaran = Pendaftaran::create([
            'tanggal_pendaftaran' => Carbon::now(), // Tanggal saat ini
            'nik' => $request->nik,
            'siswa_id' => $siswa->id, // Gunakan id siswa yang baru dibuat
            'status' => 'Pending',
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);

        return redirect('/daftar_sekolah#contact-us')->with('message', 'Terima kasih! Pendaftaran berhasil dilakukan, tunggu informasi selanjutnya');
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
        $pendaftaran = Pendaftaran::with('siswa')->findOrFail($id);
        return response()->json($pendaftaran);
    }
    public function editStatus($id)
    {
        $pendaftaran = Pendaftaran::with('siswa')->findOrFail($id);
        return response()->json($pendaftaran);
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
        $validatedData = $request->validate([
            'tanggal_pemasukan' => 'required',
            'nama_pemasukan' => 'required',
            'jumlah_pemasukan' => 'required',
            'pic' => 'required',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pemasukan = Pendaftaran::findOrFail($id);
        $oldData = $pemasukan->getOriginal();

        // Menghapus bukti lama jika ada bukti baru yang diunggah

        if ($request->hasFile('bukti')) {
            $oldBuktiFileName = $pemasukan->bukti; // Ini adalah nama file saja, bukan path lengkap

            // Mendapatkan path lengkap dari root folder ke file yang ingin dihapus
            $oldBuktiPath = public_path('upload/pemasukan/' . $oldBuktiFileName);

            // Jika ada bukti lama, hapus dari penyimpanan
            if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
                unlink($oldBuktiPath);
            }

            // Upload bukti baru
            $file = $request->file('bukti');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('upload/pemasukan/');
            $file->move($destinationPath, $fileName);

            // Konversi gambar ke format WebP
            $img = Image::make($destinationPath . $fileName)->encode('webp', 90); // 90 untuk kualitas
            $img->save($destinationPath . pathinfo($fileName, PATHINFO_FILENAME) . '.webp');

            $validatedData['bukti'] = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
        }


        // Ubah jumlah_pemasukan tanpa karakter ,
        if ($request->has('jumlah_pemasukan')) {
            $validatedData['jumlah_pemasukan'] = str_replace(',', '', $request->input('jumlah_pemasukan'));
        }

        $pemasukan->update($validatedData);


        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'pemasukan', $pemasukan->id, $loggedInUserId, json_encode($oldData), json_encode($pemasukan));


        return response()->json(['message' => 'Data Berhasil Diupdate']);
    }

    // PendaftaranController.php
    public function updateStatus(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        // Optional: update siswa status if needed
        $siswa = Siswa::findOrFail($pendaftaran->siswa_id);
        $siswa->status = $request->status;
        $siswa->save();

        return response()->json(['success' => 'Status updated successfully']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = Pendaftaran::find($id);

        if (!$pemasukan) {
            return response()->json(['message' => 'Data pemasukan not found'], 404);
        }

        // Hapus file terkait jika ada sebelum menghapus entitas dari database
        $oldBuktiFileName = $pemasukan->bukti; // Nama file saja
        $oldBuktiPath = public_path('upload/pemasukan/' . $oldBuktiFileName);

        if ($oldBuktiFileName && file_exists($oldBuktiPath)) {
            unlink($oldBuktiPath);
        }

        $pemasukan->delete();
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'pemasukan', $id, $loggedInUserId, json_encode($pemasukan), null);


        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    public function deleteAll()
    {
        try {
            // Use DB facade to perform a raw SQL delete query
            DB::statement('DELETE FROM pendaftaran');

            // Redirect back with a success message
            return redirect()->route('pendaftaran.home')->with('success', 'All data deleted successfully.');
        } catch (\Exception $e) {
            // Redirect back with an error message if something goes wrong
            return redirect()->route('pendaftaran.home')->with('error', 'Failed to delete data. Please try again.');
        }
    }
}
