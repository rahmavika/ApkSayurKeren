<?php

namespace App\Http\Controllers;

use App\Models\BatchStok;
use App\Models\Keranjang;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input alamat
    $request->validate([
        'alamat' => 'required|string|max:255',
    ]);

    $user = Auth::user(); // Ambil data pengguna yang sedang login
    $keranjangs = Keranjang::where('pengguna_id', $user->id)->get();

    if ($keranjangs->isEmpty()) {
        return redirect()->route('keranjang.show')->with('error', 'Keranjang Anda kosong!');
    }

    // Hitung total harga
    $totalHarga = $keranjangs->sum(function ($keranjang) {
        return $keranjang->jumlah * $keranjang->harga;
    });

    // Persiapkan detail produk dalam format JSON
    $produkDetails = $keranjangs->map(function ($item) {
        return [
            'nama' => $item->produk->nama,
            'jumlah' => $item->jumlah,
            'harga' => $item->harga,
            'total' => $item->jumlah * $item->harga,
        ];
    });

    // Simpan ke tabel checkouts
    $checkout = \App\Models\Checkout::create([
        'user_id' => $user->id,
        'alamat_pengiriman' => $request->alamat,
        'total_harga' => $totalHarga,
        'produk_details' => $produkDetails->toJson(),
        'status' => 'pesanan diterima',
    ]);

    // Proses pengurangan stok
    foreach ($keranjangs as $keranjang) {
        $jumlahDibutuhkan = $keranjang->jumlah;

        // Ambil batch stok berdasarkan produk dan urutan tanggal kadaluwarsa
        $batchStoks = BatchStok::where('produk_id', $keranjang->produk_id)
            ->orderBy('tgl_kadaluarsa', 'asc')
            ->get();

        foreach ($batchStoks as $batchStok) {
            if ($jumlahDibutuhkan <= 0) {
                break;
            }

            if ($batchStok->jumlah >= $jumlahDibutuhkan) {
                // Kurangi langsung dari batch stok saat ini
                $batchStok->jumlah -= $jumlahDibutuhkan;
                $batchStok->save();
                $jumlahDibutuhkan = 0;
            } else {
                // Habiskan jumlah batch stok dan lanjutkan ke batch berikutnya
                $jumlahDibutuhkan -= $batchStok->jumlah;
                $batchStok->jumlah = 0;
                $batchStok->save();
            }
        }

        // Update stok utama
        $stok = Stok::where('produk_id', $keranjang->produk_id)->first();
        if ($stok) {
            $stok->jumlah -= $keranjang->jumlah;
            $stok->save();
        }
    }

    // Hapus data dari tabel keranjangs
    Keranjang::where('pengguna_id', $user->id)->delete();

    // Redirect ke halaman detail pesanan
    return redirect()->route('checkout.detail', $checkout->id);
}


    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user(); // Menggunakan Auth untuk mengambil data pengguna yang sedang login

        // Mengambil produk yang ada di keranjang milik pengguna
        $keranjangs = Keranjang::where('pengguna_id', $user->id)->get();

        // Menghitung total harga dari semua produk yang ada di keranjang
        $totalHarga = $keranjangs->sum(function($keranjang) {
            return $keranjang->jumlah * $keranjang->harga;
        });

        // Mengirimkan data ke view
        return view('pelanggan.checkout', compact('user', 'keranjangs', 'totalHarga'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function detail($id)
{
    $checkout = \App\Models\Checkout::with('pengguna')->findOrFail($id);

    // Mengambil data produk yang sudah di-JSON decode
    $produkDetails = json_decode($checkout->produk_details);

    return view('pelanggan.detailPesanan', compact('checkout', 'produkDetails'));
}


}
