@extends('admin.layouts.main')
@section('title', 'Stok')
@section('navAdm', 'active')

@section('content')
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
            <th>Aksi</th>
        </tr>
    </thead>

        @foreach($stoks as $stok)
        <tr>
            <td>{{ $stoks->firstItem() + $loop->index }}</td>
            <td>{{ $stok->produk->nama }}</td>
            <td>{{ $stok->jumlah }}</td>
            <td class="text-center">
                <!-- Button untuk tambah stok -->
                <a href="/admin-stok/{{ $stok->id }}/tambahStok" title="Tambah Stok" class="btn btn-success btn-sm me-2"><i class="bi bi-plus-square"></i> Tambah Stok</a>
                <a href="/admin-batchStok/{{ $stok->produk_id }}" title="Lihat Batch Stok" class="btn btn-success btn-sm">
                    <i class="bi bi-eye"></i>
                </a>
               {{-- <a href="{{ route('batchstok.show', $stok->id) }}" title="Lihat Detail" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a> --}}


            </td>
        </tr>
        @endforeach

</table>
</div>

<div class="d-flex justify-content-center">
    {{ $stoks->links() }}
</div>
@endsection
