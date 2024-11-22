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
                            <p style="font-size: 0.75rem; color: red;">* Pilih alamat Anda untuk menghitung ongkos kirim.</p>
                            <form action="{{ route('checkout.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat pengiriman" style="border: 1px solid #0B773D;" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                </div>
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" id="calculateDistance">Hitung Ongkir</button>
                                </div>
                                <div class="mb-3">
                                    <h6>Ongkir: <span id="ongkir" style="color: #0B773D;">Rp 0</span></h6>
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn w-100 py-2" style="background-color: #0B773D; border-color: #0B773D; color: white;">Pesan Sekarang</button>
                                </div>
                            </form>
                        </div>

                        <!-- Tambahkan Google Maps API -->
                        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
                        <script>
                            let autocomplete;
                            const origin = { lat: -0.947083, lng: 100.417181 }; // Koordinat Sayur Keren
                            const distancePerKm = 1000; // Rp per km

                            function initAutocomplete() {
                                autocomplete = new google.maps.places.Autocomplete(document.getElementById("alamat"));
                                autocomplete.addListener("place_changed", () => {
                                    const place = autocomplete.getPlace();
                                    if (place.geometry) {
                                        document.getElementById("latitude").value = place.geometry.location.lat();
                                        document.getElementById("longitude").value = place.geometry.location.lng();
                                    }
                                });
                            }

                            document.getElementById("calculateDistance").addEventListener("click", () => {
                                const lat = parseFloat(document.getElementById("latitude").value);
                                const lng = parseFloat(document.getElementById("longitude").value);

                                if (!isNaN(lat) && !isNaN(lng)) {
                                    const destination = new google.maps.LatLng(lat, lng);
                                    const service = new google.maps.DistanceMatrixService();
                                    service.getDistanceMatrix(
                                        {
                                            origins: [origin],
                                            destinations: [destination],
                                            travelMode: "DRIVING",
                                        },
                                        (response, status) => {
                                            if (status === "OK" && response.rows[0].elements[0].status === "OK") {
                                                const distanceInKm = response.rows[0].elements[0].distance.value / 1000;
                                                const shippingCost = Math.ceil(distanceInKm) * distancePerKm;
                                                document.getElementById("ongkir").innerText = `Rp ${shippingCost.toLocaleString("id-ID")}`;
                                            }
                                        }
                                    );
                                } else {
                                    alert("Silakan pilih alamat valid.");
                                }
                            });

                            google.maps.event.addDomListener(window, "load", initAutocomplete);
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
