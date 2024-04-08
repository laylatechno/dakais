<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Kelas;
use App\Models\LogHistori;
use App\Models\Mapel;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\WaktuMengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
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
        $pembelian = Pembelian::all();
        return view('back.pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::select('id', 'nama_produk', 'harga_beli')->get(); // Menambahkan 'harga' ke hasil query
        $supplier = Supplier::select('id', 'nama_supplier')->get();

        // Mendapatkan kode pembelian terbaru dari database
        $latestPurchase = Pembelian::latest()->first();
        $kode_pembelian = '';

        // Jika belum ada pembelian sebelumnya
        if (!$latestPurchase) {
            $kode_pembelian = 'LTPOS-' . date('Ymd') . '-000001';
        } else {
            // Memecah kode pembelian untuk mendapatkan nomor urut
            $parts = explode('-', $latestPurchase->kode_pembelian);
            $nomor_urut = intval($parts[2]) + 1;

            // Format ulang nomor urut agar memiliki panjang 6 digit
            $nomor_urut_format = str_pad($nomor_urut, 6, '0', STR_PAD_LEFT);

            // Menggabungkan kode pembelian baru
            $kode_pembelian = 'LTPOS-' . date('Ymd') . '-' . $nomor_urut_format;
        }

        return view('back.pembelian.create', compact('produk', 'supplier', 'kode_pembelian'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data pembelian
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'supplier_id' => 'required',
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
    
        // Simpan bukti pembelian ke sistem file
        $imageName = null; // Inisialisasi variabel $imageName
        if ($request->hasFile('bukti')) {
            $image = $request->file('bukti');
            $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
            $destinationPath = 'upload/bukti_pembelian/';
            $image->move($destinationPath, $imageName);
        }
    
        // Simpan data pembelian ke dalam database
        $pembelian = new Pembelian();
        $pembelian->tanggal_pembelian = $request->tanggal_pembelian;
        $pembelian->kode_pembelian = $request->kode_pembelian;
        $pembelian->supplier_id = $request->supplier_id;
        $pembelian->nama_supplier = $request->nama_supplier;
        $pembelian->total_bayar = str_replace(['.', ','], '', $request->input_bayar);
        $pembelian->jenis_pembayaran = $request->jenis_pembayaran;
        $pembelian->keterangan = $request->keterangan;
        $pembelian->bukti = $imageName; // Simpan nama file bukti
        $pembelian->pic = auth()->user()->name; // Ganti dengan field yang sesuai dengan pic
        $pembelian->save();
    
        // Mendapatkan ID dari pembelian yang baru saja disimpan
        $pembelianId = $pembelian->id;
    
        // Simpan detail pembelian ke dalam database
        $produkIds = $request->produk_id;
        $produkNames = $request->nama_produk;
        $qtys = $request->qty;
        $hargaBelis = $request->harga_beli;
    
        foreach ($produkIds as $key => $produkId) {
            $hargaBeliWithoutSeparator = str_replace(['.', ','], '', $hargaBelis[$key]);
            $detail = new PembelianDetail();
            $detail->pembelian_id = $pembelianId;
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
            $produk->stok += $request->qty[$key];
    
            // Simpan perubahan jumlah produk ke database
            $produk->save();
        }
    
        // Response untuk Ajax
        return response()->json(['success' => true, 'message' => 'Data pembelian berhasil disimpan']);
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
    //     $data = Pembelian::where('id', $id)->first();
    //     $dataPembelian = Pembelian::findOrFail($id);
    //     return view('back.pembelian.edit',compact('data','waktu_mengajar','mataPelajaran','kelas','dataPembelian'));
    // }
    public function edit($id)
    {
        // Mengambil data jadwal pelajaran yang akan diedit
        $jadwalPelajaran = Pembelian::findOrFail($id);
        $kelas = Kelas::select('id', 'nama_kelas')->get();
        // Mengambil data waktu mengajar dan mata pelajaran
        $waktuMengajar = PembelianDetail::where('pembelian_id', $id)->get();

        $mataPelajaran = Mapel::all();

        return view('back.pembelian.edit', compact('jadwalPelajaran', 'waktuMengajar', 'mataPelajaran', 'kelas'));
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

        // Update data di tabel pembelian
        $jadwalPelajaran = Pembelian::findOrFail($id);
        $jadwalPelajaran->hari = $request->hari;
        $jadwalPelajaran->kelas_id = $request->kelas_id;
        $jadwalPelajaran->save();

        // Looping untuk menyimpan atau memperbarui data di tabel pembelian_detail
        if ($request->has('waktu_mengajar_id')) {
            foreach ($request->waktu_mengajar_id as $key => $waktuMengajarId) {
                // Memeriksa apakah terjadi perubahan pada mapel_id
                if ($request->mapel_id[$key] != 0 && $request->mapel_id[$key] != null) {
                    $jadwalPelajaranDetail = PembelianDetail::updateOrCreate(
                        ['pembelian_id' => $jadwalPelajaran->id, 'waktu_mengajar_id' => $waktuMengajarId],
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
        return redirect('/pembelian')->with('message', 'Data berhasil diupdate');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan pembelian yang akan dihapus
        $pembelian = Pembelian::findOrFail($id);
    
        // Dapatkan detail pembelian terkait
        $details = PembelianDetail::where('pembelian_id', $id)->get();
    
        // Kurangi jumlah stok produk yang terkait dengan detail pembelian
        foreach ($details as $detail) {
            $produk = Produk::find($detail->produk_id);
            $produk->stok -= $detail->qty;
            $produk->save();
        }
    
        // Hapus detail pembelian
        PembelianDetail::where('pembelian_id', $id)->delete();
    
        // Hapus pembelian
        $pembelian->delete();
    
        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Pembelian', $id, $loggedInUserId, json_encode($pembelian), null);
    
        return redirect('/pembelian')->with('success', 'Data berhasil dihapus');
    }
    
}
