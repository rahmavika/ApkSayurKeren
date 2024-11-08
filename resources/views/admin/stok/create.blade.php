@extends('admin.layouts.main')

@section('content')
<h1>Input Data Stok</h1>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

</div>
<div class="row">
  <div class="col-6">
    <form action="{{ route('admin-stok.store') }}" method="post">
      @csrf
      <div class="mb-3">
          <label for="produk_id" class="form-label">Produk</label>
          <select class="form-select @error('produk_id') is-invalid @enderror" name="produk_id" id="produk_id">
              <option value="">--Pilih Produk--</option>
              @foreach($produks as $produk)
                  <option value="{{ $produk->id }}" {{ old('produk_id') == $produk->id ? 'selected' : '' }}>{{ $produk->nama }}</option>
              @endforeach
          </select>
          @error('produk_id')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <div class="mb-3">
          <label for="jumlah" class="form-label">Jumlah</label>
          <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
          name="jumlah" id="jumlah" value="{{ old('jumlah') }}" placeholder="Jumlah">
          @error('jumlah')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
