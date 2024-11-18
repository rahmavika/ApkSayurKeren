<header class="header-custom">
    <div class="top-header">
        <div class="container">
            <div class="d-none d-md-block ms-3">
                <a href="https://wa.me/6281244323035" class="text-success d-flex align-items-center" target="_blank">
                    <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                    <span class="ms-2" style="font-size: 16px;">WhatsApp</span>
                </a>
            </div>
            <div class="header-right">
                @if (session('username'))  <!-- Periksa apakah username ada di session -->
                    <a href="/detailpelanggan" style="color: #07582d; font-size: 16px; text-decoration: none;"> <!-- Tambahkan link -->
                        <span class="me-2"> <!-- Ubah warna dan ukuran font -->
                            <i class="bi bi-person-fill" style="color: #07582d;" title="Akun"></i> {{ session('username') }}
                        </span> <!-- Tampilkan username dengan ikon -->
                    </a>
                    <form action="/logout" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="bi bi-door-open"></i> LOGOUT</button>
                    </form>
                @else
                    <button class="btn-login" style="border-color: #07582d; transition: background-color 0.3s, color 0.3s;" onclick="window.location.href='/login';">
                        <i class="bi bi-person-fill" ></i> Login
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="main-header">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/sayurkeren.png') }}" alt="Sayur Keren" class="img-fluid" title="Home">
                </a>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="/semuaproduk" class="{{ Request::is('semuaproduk') ? 'active' : '' }}">SEMUA PRODUK</a></li>
                    <li><a href="/promo" class="{{ Request::is('promo') ? 'active' : '' }}">PROMO</a></li>
                    <li><a href="/terlaris" class="{{ Request::is('terlaris') ? 'active' : '' }}">TERLARIS</a></li>
                    <li><a href="/kategori" class="{{ Request::is('kategori') ? 'active' : '' }}">KATEGORI</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <form class="d-flex">
                    <input type="text" class="form-control rounded-start" placeholder="Cari produk.." style="max-width: 100%;">
                    <button class="btn btn-success rounded-end" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"/>
                        </svg>
                    </button>
                </form>

                @if(session('username'))
                    <!-- Jika user sudah login, arahkan ke halaman keranjang dan riwayat belanja -->
                    <a href="{{ url('/keranjang') }}" title="Keranjang">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <a href="{{ url('/riwayat-belanja') }}" title="Riwayat Belanja" class="ms-3 {{ Request::is('riwayat-belanja') ? 'active' : '' }}">
                        <i class="fas fa-history"></i>
                    </a>
                @else
                    <!-- Jika belum login, munculkan modal login -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                @endif
            </div>

        </div>
    </div>
</header>

<!-- Modal untuk Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Silakan Masuk Terlebih Dahulu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda harus masuk untuk melihat keranjang belanja.
            </div>
            <div class="modal-footer">
                <a href="/login" class="btn btn-success">Masuk</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
