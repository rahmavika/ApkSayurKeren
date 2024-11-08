@extends('admin.layouts.main')
@section('title', 'Stok')
@section('navAdm', 'active')

@section('content')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Produk Sayur Keren</h1>
</div> --}}

@if(session('pesan'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="/admin-stok/create" class="btn btn-primary mb-3" style="background-color: #0B773D; border-color: #0B773D;">Tambah Stok</a>

<!-- Adding custom table style -->
<div class="card col-span-2 xl:col-span-1">
    <div class="card-header">Stok Produk</div>

<table class="table table-bordered">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Produk</th>
            <th>Stok</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Aksi</th>
        </tr>
    </thead>

        @foreach($stoks as $stok)
        <tr>
            <td>{{ $stoks->firstItem() + $loop->index }}</td>
            <td>{{ $stok->produk->nama }}</td>
            <td>{{ $stok->jumlah }}</td>
            <td>{{ $stok->tgl_kadaluarsa }}</td>
            <td class="text-center">
                <a href="/admin-stok/{{ $stok->id }}/tambahStok" title="Tambah Stok" class="btn btn-success btn-sm me-2"><i class="bi bi-plus-square"></i> Tambah Stok</a>
                <a href="/admin-stok/{{ $stok->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/admin-stok/{{ $stok->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button title="Hapus Data" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</button>
                </form>
            </td   >
        </tr>
        @endforeach

</table>
</div>

<div class="d-flex justify-content-center">
    {{ $stoks->links() }}
</div>
@endsection
