@extends('admin.layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center" style="color: #0B773D;">Input Data Produk</h2>
</div>

<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <!-- Card untuk form -->
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="/admin-produk" method="post" enctype="multipart/form-data">
          @csrf
          <!-- Nama Produk -->
          <div class="mb-3">
              <label for="nama" class="form-label">Nama Produk</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror"
              name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama Produk">
              @error('nama')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <!-- Harga Produk -->
          <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror"
              name="harga" id="harga" value="{{ old('harga') }}" placeholder="Harga">
              @error('harga')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <!-- Masa Tahan -->
          <div class="mb-3">
              <label for="masa_tahan" class="form-label">Masa Tahan (hari)</label>
              <input type="number" class="form-control @error('masa_tahan') is-invalid @enderror"
              name="masa_tahan" id="masa_tahan" value="{{ old('masa_tahan') }}" placeholder="Masa Tahan">
              @error('masa_tahan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <!-- Gambar Produk -->
          <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <input type="file" class="form-control @error('gambar') is-invalid @enderror"
              name="gambar" id="gambar">
              @error('gambar')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <!-- Kategori Produk -->
          <div class="mb-3">
              <label for="kategori_id" class="form-label">Kategori</label>
              <select class="form-select" name="kategori_id" id="kategori_id">
                  <option value="">--Pilih Kategori--</option>
                  @foreach($kategoris as $kategori)
                      <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
              </select>
              @error('kategori_id')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <!-- Keterangan Produk -->
          <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea class="form-control @error('keterangan') is-invalid @enderror"
                        name="keterangan" id="keterangan" placeholder="Keterangan Produk">{{ old('keterangan') }}</textarea>
              @error('keterangan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-success w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
