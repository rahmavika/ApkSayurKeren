@extends('layouts.main')

@section('content')
<section class="mt-5">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-10 col-lg-8 mb-4">
                <div class="card shadow-lg rounded" style="border: none;">
                    <div class="card-body">
                        <h4 class="mt-1 text-center" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #0B773D;">Detail Pesanan</h4>
                        <div class="mb-4">
                            <p><strong>Tanggal Pemesanan:</strong> {{ \Carbon\Carbon::parse($checkout->tanggal_pemesanan)->format('d F Y') }}</p>
                        </div>

                        <!-- Data Pelanggan -->
                        <div class="mb-4">
                            <h5 class="font-weight-bold">Data Pelanggan</h5>
                            @if($checkout->pengguna)
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Username:</strong></td>
                                            <td>{{ $checkout->pengguna->username }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>No. HP:</strong></td>
                                            <td>{{ $checkout->pengguna->nohp }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Alamat Pengiriman:</strong></td>
                                            <td>{{ $checkout->alamat_pengiriman }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <p>User tidak ditemukan!</p>
                            @endif
                        </div>

                        <!-- Data Produk yang Dibeli -->
                        <div class="mb-4">
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
                                    @foreach($produkDetails as $produk)
                                    <tr>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->jumlah }}</td>
                                        <td>Rp {{ number_format($produk->harga, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($produk->total, 2, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Total Pembayaran -->
                        <div class="mb-4 text-center">
                            <h5 class="font-weight-bold">Total Pembayaran: <span style="color: #0B773D;">Rp {{ number_format($checkout->total_harga, 0, ',', '.') }}</span></h5>
                        </div>

                        <!-- Informasi Pembayaran -->
                        <div class="mb-4">
                            <p>Bayar: <span style="font-weight: bold; color: #0B773D;">Mandiri</span> a/n <span style="font-weight: bold; color: #0B773D;">Kelompok B</span>, No Rekening: <span style="font-weight: bold; color: #0B773D;">1120290091890</span></p>
                            <p style=" font-size: 0.75rem; color: red">*Lihat riwayat belanja untuk mengirim bukti pembayaran</small></p>
                        </div>

                        <!-- Footer Struk -->
                        <div class="text-center mt-4">
                            <p><small>Terima kasih telah berbelanja di Sayur Keren!</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    body {
        display: flex;
        flex-direction: column;
        height: 100vh; /* Membuat body mengisi seluruh tinggi layar */
        margin: 0;
    }

    main {
        flex-grow: 1; /* Membuat main mengambil ruang sisa */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-fluid {
        margin-bottom: 0;
    }

    .card {
        margin-top: 10px; /* Mengurangi jarak atas dari card */
        margin-bottom: 20px; /* Mengurangi jarak bawah dari card */
    }

    .card-body {
        padding: 1rem;
    }

    .mb-4 {
        margin-bottom: 15px;
    }

    .text-center {
        margin-top: 20px;
    }

    /* Styling untuk Data Pelanggan */
    .table td, .table th {
        vertical-align: middle;
        text-align: left;
    }

    .table th {
        background-color: #f8f9fa;
        color: #0B773D;
    }

    /* Border pada tabel dan kolom */
    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }

    /* Styling untuk memastikan garis tabel terlihat baik */
    .table-bordered th, .table-bordered td {
        border-top: 1px solid #dee2e6; /* Garis horizontal di atas setiap sel */
        border-bottom: 1px solid #dee2e6; /* Garis horizontal di bawah setiap sel */
    }

    .table-bordered td {
        border-left: 1px solid #dee2e6; /* Garis vertikal di kiri setiap sel */
        border-right: 1px solid #dee2e6; /* Garis vertikal di kanan setiap sel */
    }
</style>