<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\Mapel;
use App\Models\Produk;
use App\Models\Member;
use App\Models\WaktuMengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
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
        $penjualan = Penjualan::all();
        return view('back.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::select('id', 'nama_produk', 'harga_beli')->get(); // Menambahkan 'harga' ke hasil query
        $member = Member::all();

        // Mendapatkan kode penjualan terbaru dari database
        $latestPurchase = Penjualan::latest()->first();
        $kode_penjualan = '';

        // Jika belum ada penjualan sebelumnya
        if (!$latestPurchase) {
            $kode_penjualan = 'LTPOSSELL-' . date('Ymd') . '-000001';
        } else {
            // Memecah kode penjualan untuk mendapatkan nomor urut
            $parts = explode('-', $latestPurchase->kode_penjualan);
            $nomor_urut = intval($parts[2]) + 1;

            // Format ulang nomor urut agar memiliki panjang 6 digit
            $nomor_urut_format = str_pad($nomor_urut, 6, '0', STR_PAD_LEFT);

            // Menggabungkan kode penjualan baru
            $kode_penjualan = 'LTPOS-' . date('Ymd') . '-' . $nomor_urut_format;
        }

        return view('back.penjualan.create', compact('produk', 'member', 'kode_penjualan'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data penjualan
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'member_id' => 'required',
            'jenis_pembayaran' => 'required',
            'input_bayar' => 'required|numeric',
            'produk_id' => 'required|array',
            'qty' => 'required|array',
            'nama_produk' => 'required|array', // Tambahkan validasi untuk nama_produk
            'bukti' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'bukti.mimes' => 'Bukti yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'bukti.max' => 'Ukuran bukti tidak boleh lebih dari 2 MB',
        ]);

        // Hitung total bayar setelah mengubah format input_bayar
        $totalBayar = str_replace(['.', ','], '', $request->total_bayar);
        $inputBayar = str_replace(['.', ','], '', $request->input_bayar);
        $kembalian = str_replace(['.', ','], '', $request->kembalian);

        // Setelah menyimpan data penjualan, kurangi saldo member jika pembayarannya adalah SALDO
        if ($request->jenis_pembayaran === 'SALDO') {
            // Ambil data member dari database
            $member = Member::find($request->member_id);

            // Kurangi total_bayar dari saldo member
            if ($member->saldo < $totalBayar) {
                return response()->json(['warning' => true, 'message' => 'Saldo member tidak mencukupi.']);
            }


            $member->saldo -= $totalBayar;

            // Simpan perubahan saldo ke dalam database
            $member->save();
        }

        // Simpan bukti penjualan ke sistem file
        $imageName = null; // Inisialisasi variabel $imageName
        if ($request->hasFile('bukti')) {
            $image = $request->file('bukti');
            $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
            $destinationPath = 'upload/bukti_penjualan/';
            $image->move($destinationPath, $imageName);
        }

        // Simpan data penjualan ke dalam database
        $penjualan = new Penjualan();
        $penjualan->tanggal_penjualan = $request->tanggal_penjualan;
        $penjualan->kode_penjualan = $request->kode_penjualan;
        $penjualan->member_id = $request->member_id;
        $penjualan->nama_member = $request->nama_member;
        $penjualan->total_bayar = $totalBayar; // 
        $penjualan->input_bayar = $inputBayar; // 
        $penjualan->kembalian = $kembalian; // 
        $penjualan->jenis_pembayaran = $request->jenis_pembayaran;
        $penjualan->keterangan = $request->keterangan;
        $penjualan->bukti = $imageName; // Simpan nama file bukti
        $penjualan->pic = auth()->user()->name; // Ganti dengan field yang sesuai dengan pic
        $penjualan->save();

        // Ambil ID dari penjualan yang baru saja disimpan
        $penjualanId = $penjualan->id;

        // Simpan detail penjualan ke dalam database
        $produkIds = $request->produk_id;
        $produkNames = $request->nama_produk;
        $qtys = $request->qty;
        $hargaBelis = $request->harga_beli;

        foreach ($produkIds as $key => $produkId) {
            $hargaBeliWithoutSeparator = str_replace(['.', ','], '', $hargaBelis[$key]);
            $detail = new PenjualanDetail();
            $detail->penjualan_id = $penjualanId;
            $detail->produk_id = $produkId;
            $detail->harga_beli = $hargaBeliWithoutSeparator;
            $detail->qty = $qtys[$key];
            $detail->total = $qtys[$key] * $hargaBeliWithoutSeparator;
            $detail->nama_produk = $produkNames[$key];
            $detail->save();
        }

        foreach ($request->produk_id as $key => $produkId) {
            // Ambil data produk dari database
            $produk = Produk::find($produkId);
        
            // Tambahkan jumlah produk dengan jumlah yang dibeli
            $produk->stok -= $request->qty[$key]; // Kurangi stok dengan kuantitas yang dibeli
        
            // Simpan perubahan jumlah produk ke database
            $produk->save();
        }
        

        // Response untuk Ajax
        return response()->json(['success' => true, 'message' => 'Data penjualan berhasil disimpan']);
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
    // public function edit($id)
    // {
    //     $mataPelajaran = Mapel::select('id', 'nama_mapel')->get();
    //     $kelas = Kelas::select('id', 'nama_kelas')->get();
    //     $waktu_mengajar = WaktuMengajar::all();
    //     $data = Penjualan::where('id', $id)->first();
    //     $dataPenjualan = Penjualan::findOrFail($id);
    //     return view('back.penjualan.edit',compact('data','waktu_mengajar','mataPelajaran','kelas','dataPenjualan'));
    // }
    public function edit($id)
    {
        // Mengambil data jadwal pelajaran yang akan diedit
        $jadwalPelajaran = Penjualan::findOrFail($id);
        $kelas = Kelas::select('id', 'nama_kelas')->get();
        // Mengambil data waktu mengajar dan mata pelajaran
        $waktuMengajar = PenjualanDetail::where('penjualan_id', $id)->get();

        $mataPelajaran = Mapel::all();

        return view('back.penjualan.edit', compact('jadwalPelajaran', 'waktuMengajar', 'mataPelajaran', 'kelas'));
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
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            // Atur validasi sesuai kebutuhan
        ]);

        // Update data di tabel penjualan
        $jadwalPelajaran = Penjualan::findOrFail($id);
        $jadwalPelajaran->hari = $request->hari;
        $jadwalPelajaran->kelas_id = $request->kelas_id;
        $jadwalPelajaran->save();

        // Looping untuk menyimpan atau memperbarui data di tabel penjualan_detail
        if ($request->has('waktu_mengajar_id')) {
            foreach ($request->waktu_mengajar_id as $key => $waktuMengajarId) {
                // Memeriksa apakah terjadi perubahan pada mapel_id
                if ($request->mapel_id[$key] != 0 && $request->mapel_id[$key] != null) {
                    $jadwalPelajaranDetail = PenjualanDetail::updateOrCreate(
                        ['penjualan_id' => $jadwalPelajaran->id, 'waktu_mengajar_id' => $waktuMengajarId],
                        ['mapel_id' => $request->mapel_id[$key]]
                    );
                }
            }
        }

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan ruangan_id yang sedang login
        $this->simpanLogHistori('Update', 'jadwalPelajaran', $jadwalPelajaran->id, $loggedInUserId, json_encode($jadwalPelajaran), json_encode($jadwalPelajaran));

        // Jika berhasil diupdate
        return redirect('/penjualan')->with('message', 'Data berhasil diupdate');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan penjualan yang akan dihapus
        $penjualan = Penjualan::findOrFail($id);
    
        // Pastikan penjualan menggunakan jenis pembayaran SALDO
        if ($penjualan->jenis_pembayaran === 'SALDO') {
            // Temukan member yang terkait dengan penjualan
            $member = Member::find($penjualan->member_id);
    
            // Kembalikan saldo member sesuai total bayar penjualan
            $member->saldo += $penjualan->total_bayar;
            $member->save();
        }
    
        // Dapatkan detail penjualan terkait
        $details = PenjualanDetail::where('penjualan_id', $id)->get();
    
        // Kembalikan jumlah stok produk yang terkait dengan detail penjualan
        foreach ($details as $detail) {
            $produk = Produk::find($detail->produk_id);
            $produk->stok += $detail->qty; // Kembalikan stok dengan kuantitas yang sebelumnya dibeli
            $produk->save();
        }
    
        // Hapus detail penjualan
        PenjualanDetail::where('penjualan_id', $id)->delete();
    
        // Hapus penjualan
        $penjualan->delete();
    
        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Penjualan', $id, $loggedInUserId, json_encode($penjualan), null);
    
        return redirect('/penjualan')->with('success', 'Data berhasil dihapus');
    }
    
    
}
