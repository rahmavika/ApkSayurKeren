@extends('layouts.main')

@section('content')
<br>

<section class="py-3">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 d-flex flex-column">
                <!-- Carousel Banner -->
                <div id="bannerCarousel" class="carousel slide flex-fill" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner h-100">
                        @foreach($banners as $key => $banner)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} h-100">
                            <img src="{{ asset('images/' . $banner->gambar_banner) }}" class="d-block w-100 h-100" alt="Banner {{ $key + 1 }}" style="object-fit: cover;">
                            <!-- Tombol BELANJA SEKARANG -->
                            <div class="carousel-caption d-flex justify-content-center align-items-center" style="pointer-events: none;">
                                <a href="/semuaproduk" class="btn belanja-sekarang">BELANJA SEKARANG</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- / Carousel Banner -->
            </div>

            <div class="col-md-6">
                <div class="banner-ad bg-success-subtle block-2 mt-2" style="background:url('images/banner_2/banner1_1.png') no-repeat;background-size: cover; height: 200px;">
                    {{-- <div class="banner-content align-items-center p-5 h-100">
                        <div class="content-wrapper text-light">
                            <h3 class="banner-title text-light">Combo offers</h3>
                            <p>Discounts up to 50%</p>
                            <a href="#" class="btn-link text-white">Shop Now</a>
                        </div>
                    </div> --}}
                </div>

                <div class="banner-ad bg-danger block-3 mt-3" style="background:url('images/banner_2/banner2_2.png') no-repeat;background-size: cover; height: 200px;">
                    {{-- <div class="banner-content align-items-center p-5 h-100">
                        <div class="content-wrapper text-light">
                            <h3 class="banner-title text-light">Discount Coupons</h3>
                            <p>Discounts up to 40%</p>
                            <a href="#" class="btn-link text-white">Shop Now</a>
                        </div>
                    </div> --}}
                </div>
                <!-- / Banner Blocks -->
            </div>
        </div>
    </div>
    <section class="py-5 overflow-hidden">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">Kategori</h2>
                        <div class="d-flex align-items-center">
                            {{-- <a href="/kategori" class="btn btn-primary me-2">View All</a> <!-- Ubah link ke /kategori --> --}}
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn" style="background-color: #0B773D; color: white; border: none;">❮</button>
                                <button class="swiper-next category-carousel-next btn" style="background-color: #0B773D; color: white; border: none;">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach($kategoris as $kategori) <!-- Looping melalui data kategori -->
                                <a href="category.html" class="nav-link swiper-slide text-center">
                                    <img src="{{ asset('images/kategori/' . $kategori->gambar_kategori) }}" class="rounded-circle img-category" alt="{{ $kategori->nama_kategori }}">
                                    <h4 class="fs-6 mt-3 fw-normal category-title">{{ $kategori->nama_kategori }}</h4>
                                    {{-- <p class="product-count">{{ $kategori->jumlah_produk ?? 0 }} produk</p> <!-- Menampilkan jumlah produk --> --}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>

<style>
/* CSS untuk Carousel Banner */
.carousel-item img {
    width: 100%; /* Membuat gambar memenuhi lebar container */
    height: 100%; /* Atur tinggi gambar untuk memenuhi area carousel */
    object-fit: cover; /* Menjaga proporsi gambar */
}

/* CSS untuk banner ad */
.banner-ad {
    color: white; /* Warna teks */
}

.banner-content {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center; /* Center text */
}

.carousel-item {
        position: relative;
    }

    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
        pointer-events: none; /* Memastikan tombol tidak mengganggu mouse events */
    }

    .belanja-sekarang {
        background-color: #0B773D;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
        pointer-events: auto; /* Mengizinkan mouse events pada tombol */
    }

    /* Menghilangkan perubahan warna saat hover */
    .belanja-sekarang:hover {
        color: white; /* Warna teks tetap putih saat hover */
        background-color: #0B773D; /* Memastikan warna latar belakang tetap sama */
    }

    .carousel-item:hover img {
        filter: brightness(50%); /* Menggelapkan gambar saat hover */
    }

</style>

@endsection
