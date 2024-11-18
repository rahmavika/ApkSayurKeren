@extends('admin.layouts.main')
@section('title', 'Stok')
@section('navAdm', 'active')

@section('content')
    <div class="container">
        <h2>Detail Batch Stok</h2>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Nama Produk: {{ $batchStoks->first()->produk->nama ?? 'Tidak Diketahui' }}</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Stok</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($batchStoks as $index => $batchStok)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $batchStok->produk->nama }}</td>
                                <td>{{ $batchStok->jumlah }}</td>
                                <td>{{ $batchStok->tgl_kadaluarsa }}</td>
                                <td class="text-center">

                                    <a href="/admin-batchStok/{{ $batchStok->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm me-2"><i class="bi bi-pencil-square"></i> Edit</a>
                                </td   >
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/admin-stok" class="btn btn-primary mb-3" style="background-color: #0B773D; border-color: #0B773D;">Kembali</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $batchStoks->links() }}
    </div>


@endsection


