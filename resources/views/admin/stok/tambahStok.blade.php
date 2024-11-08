@extends('admin.layouts.main')

@section('content')
<h1>Tambah Stok untuk Produk: {{ $stok->produk->nama }}</h1>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <a href="{{ route('admin-stok.index') }}" class="btn btn-secondary">Kembali</a>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{ route('admin-stok.store') }}" method="post">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $stok->produk_id }}">
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                name="jumlah" id="jumlah" value="{{ old('jumlah') }}" placeholder="Jumlah" required>
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Stok</button>
        </form>
    </div>
</div>
@endsection
