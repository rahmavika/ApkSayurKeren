@extends('admin.layouts.main')
@section('title', 'Data Produk')
@section('navAdm', 'active')

@section('content')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Produk Sayur Keren</h1>
</div> --}}

<div class="d-flex justify-content-between mb-3">
    <!-- Tombol tambah produk -->
    <a href="/admin-kategori/create" class="btn btn-primary mb-3" style="background-color: #0B773D; border-color: #0B773D;">Tambah Kategori</a>

    <!-- Form Pencarian -->
    <form action="{{ url('/admin-kategori') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Kategori" value="{{ request()->input('search') }}" style="width: 250px;">
        <button type="submit" class="btn btn-primary" style="background-color: #0B773D; border-color: #0B773D;">Cari</button>
    </form>
</div>

@if(session('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<!-- Adding custom table style -->
<div class="card col-span-2 xl:col-span-1">
    <div class="card-header">Kategori Produk</div>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Gambar Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>

        @foreach($kategoris as $kategori)
        <tr>
            <td>{{ $kategoris->firstItem() + $loop->index }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>
                <img src="{{ asset('images/kategori/' . $kategori->gambar_kategori) }}" class="tab-image" alt="{{ $kategori->nama_kategori }}">
            </td>
            <td class="text-center">
                <a href="/admin-kategori/{{ $kategori->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/admin-kategori/{{ $kategori->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button title="Hapus Data" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</button>
                </form>
            </td    >
        </tr>
        @endforeach

</table>
</div>

<div class="d-flex justify-content-center">
    {{ $kategoris->links() }}
</div>
@endsection

<style>
    .tab-image {
        width: 100px;
        height: auto; /* mempertahankan rasio aspek gambar */
        object-fit: cover; /* jika ingin gambar sesuai dalam ukuran */
    }
</style>
