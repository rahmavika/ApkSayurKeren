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
    // Validasi input termasuk lat, long, dan ongkir
    $request->validate([
        'alamat' => 'required|string|max:255',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'ongkir' => 'required|numeric|min:0',
    ]);

    $user = Auth::user(); // Ambil data pengguna yang sedang login
    $keranjangs = Keranjang::where('pengguna_id', $user->id)->get();

    if ($keranjangs->isEmpty()) {
        return redirect()->route('keranjang.show')->with('error', 'Keranjang Anda kosong!');
    }

    // Hitung total harga produk + ongkir
    $totalHargaProduk = $keranjangs->sum(function ($keranjang) {
        return $keranjang->jumlah * $keranjang->harga;
    });

    $totalHarga = $totalHargaProduk + $request->ongkir;

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
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'ongkir' => $request->ongkir,
        'total_harga' => $totalHarga,
        'produk_details' => $produkDetails->toJson(),
        'status' => 'pesanan diterima',
    ]);

    // Proses pengurangan stok
    foreach ($keranjangs as $keranjang) {
        $jumlahDibutuhkan = $keranjang->jumlah;

        $batchStoks = BatchStok::where('produk_id', $keranjang->produk_id)
            ->orderBy('tgl_kadaluarsa', 'asc')
            ->get();

        foreach ($batchStoks as $batchStok) {
            if ($jumlahDibutuhkan <= 0) {
                break;
            }

            if ($batchStok->jumlah >= $jumlahDibutuhkan) {
                $batchStok->jumlah -= $jumlahDibutuhkan;
                $batchStok->save();
                $jumlahDibutuhkan = 0;
            } else {
                $jumlahDibutuhkan -= $batchStok->jumlah;
                $batchStok->jumlah = 0;
                $batchStok->save();
            }
        }

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
        // Mengambil data checkout beserta pengguna yang terkait
        $checkout = \App\Models\Checkout::with('pengguna')->findOrFail($id);

        // Mengambil data produk yang sudah di-JSON decode
        $produkDetails = json_decode($checkout->produk_details);

        // Mengambil ongkir yang sudah ada di database
        $ongkir = $checkout->ongkir;

        // Menghitung total harga produk sebelum ongkir
        $totalBelanja = collect($produkDetails)->sum(function($produk) {
            return $produk->harga * $produk->jumlah;
        });

        // Mengirimkan total belanja, ongkir, dan data lainnya ke view
        return view('pelanggan.detailPesanan', compact('checkout', 'produkDetails', 'ongkir', 'totalBelanja'));
    }

// Fungsi untuk menghitung jarak antara dua titik (latitude, longitude)
    private function calculateDistance($loc1, $loc2)
    {
        $earthRadius = 6371; // radius bumi dalam km

        $latFrom = deg2rad($loc1[0]);
        $lonFrom = deg2rad($loc1[1]);
        $latTo = deg2rad($loc2[0]);
        $lonTo = deg2rad($loc2[1]);

        $latDiff = $latTo - $latFrom;
        $lonDiff = $lonTo - $lonFrom;

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos($latFrom) * cos($latTo) *
            sin($lonDiff / 2) * sin($lonDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // dalam kilometer
        return $distance;
    }

    // Fungsi untuk menghitung ongkir berdasarkan jarak
    private function calculateOngkir($distance)
    {
        // Tentukan tarif ongkir per km
        $ratePerKm = 1000; // Rp 1000 per km

        // Membulatkan ongkir
        if ($distance < 0.5) {
            $ongkir = ceil($distance * $ratePerKm / 500) * 500;
        } else {
            $ongkir = ceil($distance * $ratePerKm / 1000) * 1000;
        }

        return $ongkir;
    }

}
