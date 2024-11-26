@extends('pengelola.layouts.main')
@section('title', 'Data Produk')
@section('navAdm', 'active')

@section('content')
<div class="container">
   <!-- Adding custom table style -->
<div class="card col-span-2 xl:col-span-1">
    <div class="card-header">Pesanan Masuk</div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Alamat Pengiriman</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($checkouts->isEmpty())
                <p>Tidak ada pesanan.</p>
            @else
            @foreach ($checkouts as $checkout)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $checkout->alamat_pengiriman }}</td>
                <td>Rp {{ number_format($checkout->total_harga, 2) }}</td>
                <td>{{ $checkout->status }}</td>
                <td>
                    <form action="{{ route('checkouts.updateStatus', $checkout->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Button untuk status 'Pesanan Diterima' -->
                        <button type="submit" name="status" value="pesanan diterima"
                            class="btn {{ $checkout->status == 'pesanan diterima' ? 'btn-primary' : (in_array($checkout->status, ['diproses', 'dikirim', 'selesai']) ? 'btn-secondary' : 'btn-outline-primary') }}"
                            {{ in_array($checkout->status, ['diproses', 'dikirim', 'selesai']) ? 'disabled' : '' }}
                            title="Diterima">
                            <i class="fas fa-check-circle"></i>
                        </button>

                        <!-- Button untuk status 'Diproses' -->
                        <button type="submit" name="status" value="diproses"
                            class="btn {{ $checkout->status == 'diproses' ? 'btn-warning' : (in_array($checkout->status, ['dikirim', 'selesai']) ? 'btn-secondary' : 'btn-outline-warning') }}"
                            {{ in_array($checkout->status, ['dikirim', 'selesai']) ? 'disabled' : '' }}
                            title="Diproses">
                            <i class="fas fa-spinner"></i>
                        </button>

                        <!-- Button untuk status 'Dikirim' -->
                        <button type="submit" name="status" value="dikirim"
                            class="btn {{ $checkout->status == 'dikirim' ? 'btn-info' : ($checkout->status == 'selesai' ? 'btn-secondary' : 'btn-outline-info') }}"
                            {{ $checkout->status == 'selesai' ? 'disabled' : '' }}
                            title="Dikirim">
                            <i class="fas fa-shipping-fast"></i>
                        </button>

                        <!-- Button untuk status 'Selesai' -->
                        <button type="submit" name="status" value="selesai"
                            class="btn {{ $checkout->status == 'selesai' ? 'btn-success' : 'btn-outline-success' }}"
                            {{ $checkout->status == 'selesai' ? 'disabled' : '' }}
                            title="Selesai">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>


                </td>
            </tr>
            @endforeach


            @endif

        </tbody>
    </table>
</div>
</div>

<div class="d-flex justify-content-center">
    {{ $checkouts->links() }}
</div>
@endsection
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


