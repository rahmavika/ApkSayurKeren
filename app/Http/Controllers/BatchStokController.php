<?php

namespace App\Http\Controllers;

use App\Models\BatchStok;
use App\Models\Produk;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Queue\Console\BatchesTableCommand;

class BatchStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produkId = $request->query('produk_id');

        $batchStoks = BatchStok::when($produkId, function ($query, $produkId) {
            return $query->where('produk_id', $produkId);
        })->paginate(10); // Gunakan paginate di sini

        return view('admin.batchStok.index', compact('batchStoks'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.batchStok.create', ['batchStoks' => BatchStok::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // Menghitung tanggal kadaluarsa berdasarkan masa tahan produk
        $tgl_kadaluarsa = Carbon::now()->addDays($produk->masa_tahan);

        BatchStok::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'tgl_kadaluarsa' => $tgl_kadaluarsa,
        ]);

        return redirect('/admin-batchStok')->with('pesan', 'Data Stok Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $batchStoks = BatchStok::where('produk_id', $id)->paginate(10); // Tambahkan paginate
        return view('admin.batchStok.index', compact('batchStoks'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch_stok = BatchStok::find($id);
        if (!$batch_stok) {
            abort(404, 'Batch stock not found');
        }
        return view('admin.batchStok.edit', compact('batch_stok'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'jumlah' => 'required|integer',
    ]);

    $batchStok = BatchStok::findOrFail($id);

    // Ambil produk yang terkait dengan batch stok
    $produk = Produk::findOrFail($batchStok->produk_id);

    // Hitung selisih antara jumlah baru dan jumlah lama batch stok
    $selisih = $validated['jumlah'] - $batchStok->jumlah;

    // Update batch stok
    $batchStok->update($validated);

    // Cari stok produk terkait
    $stok = Stok::where('produk_id', $produk->id)->first();

    if ($stok) {
        $stok->jumlah += $selisih;
        $stok->save();
    } else {
        Stok::create([
            'produk_id' => $produk->id,
            'jumlah' => $validated['jumlah'],
        ]);
    }

    // Redirect ke halaman batch stok berdasarkan produk ID
    return redirect('/admin-batchStok?produk_id=' . $produk->id)
        ->with('success', 'Stok berhasil diperbarui');
}





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BatchStok $batchStok)
    {
        //
    }
}
