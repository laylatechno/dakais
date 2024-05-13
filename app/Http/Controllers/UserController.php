<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('back.users.index', compact('users'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.users.create');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Nama Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'password.required' => 'Password Wajib diisi',
            'role.required' => 'Role Wajib diisi',
        ]);

        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'upload/user/';

            // Mengambil nama file asli dan ekstensinya
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();

            // Menggabungkan waktu dengan nama file asli
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $originalFileName) . '.' . $extension;

            // Mengambil objek gambar dari file yang diunggah
            $img = Image::make($image)->encode('webp', 90); // Konversi ke format WebP dengan kualitas 90
            $img->save($destinationPath . pathinfo($imageName, PATHINFO_FILENAME) . '.webp'); // Simpan gambar dalam format WebP


            // Simpan nama picture baru (WebP) ke dalam array input
            $input['picture'] = pathinfo($imageName, PATHINFO_FILENAME) . '.webp';
        }

        // Hash password
        $hashedPassword = Hash::make($request->password);
        $input['password'] = $hashedPassword;

        /// Membuat user baru dan mendapatkan data pengguna yang baru dibuat
        $user = User::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'users', $user->id, $loggedInUserId, null, json_encode($input));

        return redirect('/users')->with('message', 'Data berhasil ditambahkan');
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
        $data = User::where('id', $id)->first();
        return view('back.users.edit')->with('data', $data);
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
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'passwordlama' => 'nullable', // Mengubah menjadi nullable
            'password' => 'nullable|min:6|confirmed',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk gambar baru
        ], [
            'name.required' => 'Nama Wajib diisi',
            'email.required' => 'Email Wajib diisi',
            'role.required' => 'Role Wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'picture.image' => 'File harus berupa gambar',
            'picture.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif',
            'picture.max' => 'Ukuran gambar maksimal 2MB',
        ]);
    
        $user = User::findOrFail($id);
    
        // Validasi Password Lama hanya jika diisi
        if ($request->filled('passwordlama')) {
            if (!Hash::check($request->passwordlama, $user->password)) {
                return back()->withErrors([
                    'passwordlama' => 'Password Lama tidak cocok'
                ]);
            }
        }
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];
    
        // Cek apakah password diisi
        if ($request->filled('password')) {
            // Hash password jika diisi
            $data['password'] = Hash::make($request->password);
        }
    
        // Menghapus gambar lama jika gambar baru diunggah
        if ($request->hasFile('picture')) {
            // Menghapus gambar lama jika ada
            if ($user->picture) {
                $oldPicturePath = public_path('upload/user/' . $user->picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }
    
            // Menyimpan gambar baru dalam format WebP
            $image = $request->file('picture');
            $destinationPath = 'upload/user/';
            $imageName = date('YmdHis') . '_' . str_replace(' ', '_', $image->getClientOriginalName()) . '.webp';
            $img = Image::make($image)->encode('webp', 90);
            $img->save($destinationPath . $imageName);
    
            // Menyimpan nama gambar baru ke dalam data
            $data['picture'] = $imageName;
        }
    
        // Membuat user baru dan mendapatkan data pengguna yang baru dibuat
        $user = User::findOrFail($id);
    
        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();
    
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'users', $user->id, $loggedInUserId, json_encode($user), json_encode($data));
    
        $user->update($data);
    
        return redirect('/users')->with('message', 'Data berhasil diperbarui');
    }
    



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // Jika data ditemukan, simpan informasi sebelum dihapus ke dalam log
        if ($user) {
            // Mendapatkan ID pengguna yang sedang login
            $loggedInUserId = Auth::id();

            // Simpan informasi data yang akan dihapus di kolom Data_Lama
            $dataLama = json_encode($user);

            // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
            $this->simpanLogHistori('Delete', 'users', $id, $loggedInUserId, $dataLama, null);
        }

        // Hapus data
        User::destroy($id);

        return redirect('/users')->with('messagehapus', 'Berhasil menghapus data');
    }

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
}
