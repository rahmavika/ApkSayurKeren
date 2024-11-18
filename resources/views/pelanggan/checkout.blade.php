@extends('layouts.main')

@section('content')
<section class="vh-80 mt-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-10 col-lg-8 mb-4">
                <div class="card shadow-lg rounded" style="border: none;">
                    <div class="card-body">
                        <h4 class="mt-1 text-center" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #0B773D;">Checkout</h4>

                        <!-- Data Pelanggan -->
                        <div class="mb-3">
                            <h5 class="font-weight-bold">Data Pelanggan</h5>
                            <p style="padding-left: 20px;" class="mb-1"><strong>Username:</strong> {{ $user->username }}</p>
                            <p style="padding-left: 20px;" class="mb-1"><strong>Nomor HP:</strong> {{ $user->nohp ?? 'Nomor HP tidak tersedia' }}</p>
                        </div>


                        <!-- Data Produk yang Dibeli -->
                        <div class="mb-3">
                            <h5 class="font-weight-bold">Data Produk</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($keranjangs as $keranjang)
                                    <tr>
                                        <td>{{ $keranjang->produk->nama }}</td>
                                        <td>{{ $keranjang->jumlah }}</td>
                                        <td>Rp {{ number_format($keranjang->harga, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($keranjang->jumlah * $keranjang->harga, 2, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Pembayaran (Pindah ke atas, sebelum alamat pengiriman) -->
                        <div class="mb-4 text-center">
                            <h5 class="font-weight-bold">Total Pembayaran: <span style="color: #0B773D;">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span></h5>
                        </div>

                        <!-- Form Alamat Pengiriman -->
                        <div class="mb-4">
                            <h5 class="font-weight-bold">Alamat Pengiriman</h5>
                            <p  style=" font-size: 0.75rem; color: red">* Silakan masukkan alamat lengkap Anda untuk pengiriman produk yang telah dibeli.</p>

                            <form action="{{ route('checkout.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat pengiriman" style="border: 1px solid #0B773D;" required></textarea>
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn w-100 py-2" style="background-color: #0B773D; border-color: #0B773D; color: white;">Pesan Sekarang</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
