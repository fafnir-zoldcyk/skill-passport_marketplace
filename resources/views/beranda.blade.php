@extends('land')
@section('navbar')
<style>
    .carousel-caption-left{
        position: absolute;
        top: 50%;
        left: 8%;
        transform: translateY(-50%);
        text-align: left;
    }
    .carousel-caption-left h1{
        color: #ffffff;
        font-size: 3rem;
        font-weight: 700;
    }
    .carousel-caption-left p{
        color: #e5e5e5;
        font-size: 1.2rem;
        font-weight: 400;
    }
    /* --- Tombol prev & next lebih kecil + lebih pinggir --- */
    .carousel-control-prev,
    .carousel-control-next {
        width: 4%;             /* tombol lebih kecil */
        opacity: 0.2;          /* lebih transparan / tidak mencolok */
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 0.9;          /* terlihat jelas saat hover */
        transform: scale(1.15); /* membesar saat hover */
    }

    /* --- Icon menjadi kecil --- */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: brightness(0) invert(1); /* warna putih */
        width: 25px;
        height: 25px;
    }

    /* --- Menempel di pinggir kiri & kanan --- */
    .carousel-control-prev {
        left: 5px;  /* semakin kecil = semakin ke pinggir */
    }

    .carousel-control-next {
        right: 5px;
    }


</style>
<div class="container-fluid p-0">
    <div id="MyCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('asset/image/makanan.jpg') }}" class="d-block w-100"style="height: 650px; object-fit: cover" alt="...">
                <div class="carousel-caption-left">
                    <h1>Fstore</h1>
                    <p>Selamat datang di Fstore, tempat terbaik untuk menemukan berbagai produk berkualitas!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('asset/image/ice-falling-brown-drink.jpg') }}" class="d-block w-100"style="height: 650px; object-fit: cover" alt="...">
                <div class="carousel-caption-left">
                    <h1>Fstore</h1>
                    <p>Membantu Anda menemukan berbagai produk yang anda cari</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('asset/image/black-notebook-with-pen.jpg') }}" class="d-block w-100" style="height: 650px; object-fit: cover" alt="...">
                <div class="carousel-caption-left">
                    <h1>Fstore</h1>
                    <p>Jelajahi berbagai produk berkualitas di Fstore!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2Fyb3VzfGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" class="d-block w-100" style="height: 650px; object-fit: cover" alt="...">
                <div class="carousel-caption-left">
                    <h1>Fstore</h1>
                    <p>Jelajahi berbagai produk berkualitas di Fstore!</p>
                </div>
            </div>
        </div>
        <button type="button" class="carousel-control-prev" data-bs-target="#MyCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button type="button" class="carousel-control-next" data-bs-target="#MyCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
<div class="container my-5">
    <div class="card h-100 p-4 mx-auto"
    style="min-width: 350px; max-width: 800px; min-height:  280px; font-size: 1.5rem; backdrop-filter:  blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.4); border-radius: 20px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);">
        <h3 class="mb-3 fw-bold text-center">Kategori</h3>
        <div class="row text-center g-4">
            <div class="col-6 col-md-4 col-lg-4">
                <div class="p-3 category-item">
                    <button class="kategori-btn mt-2">
                        <i class="fas fa-utensils"></i>
                        <span>Elektronik</span>
                        </button>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="p-3 category-item">
                    <button class="kategori-btn mt-2">
                    <i class="fas fa-bolt-lightning"></i>
                        <span>Elektronik</span>
                    </button>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="p-3 category-item">
                    <button class="kategori-btn mt-2">
                    <i class="fas fa-bolt-lightning"></i>
                        <span>Elektronik</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <h3 class="fw-bold mb-4 text-center">Produk Terbaru</h3>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-card">
                <img src="{{ asset('asset/image/images (1).jpeg') }}" class="card-img-top" style="height:300px;" alt="">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Hotwheels</h4>
                    <p class="card-text text-muted">Mobil Hotwheels</p>
                    {{-- <label for="" class="bg bg-success p-1 text-white rounded">Rp{{ number_format($produk->harga,0,",",".") }}</label> --}}
                    <a href="" class="btn btn-primary w-100 rounded-3 btn-buy">Beli</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
