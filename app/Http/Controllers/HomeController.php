<?php

namespace App\Http\Controllers;

use App\Models\Banner; // Import model Banner
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(KategoriController $kategoriController)
    {
        $banners = Banner::all(); // Ambil semua banner dari database
        $kategoris = $kategoriController->getKategori(); // Ambil semua kategori

        // Kirim data banner dan kategori ke view
        return view('home', compact('banners', 'kategoris'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
