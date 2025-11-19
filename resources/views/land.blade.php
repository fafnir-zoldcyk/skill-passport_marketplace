<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fstore</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Button Login */
        .btn-login{
            background-color: #60A5FA;
            color: #ffffff !important;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            transition: 0.2s ease-in-out;

            /* agar sejajar dengan navbar-link */
            display: flex;
            align-items: center;
            height: 40px;
            margin-top: 2px;
        }
        .btn-login:hover{
            background-color: #f5f5f5;
            color: #60A5FA !important;
        }
        /* NAVBAR TOP */
        .navbar-top {
            background-color: #ffffff;
            border-bottom: 1px solid #E5E7EB;
            padding: 12px 0;
        }

        /* BRAND */
        .navbar-brand {
            font-size: 1.7rem;
            font-weight: bold;
            color: #1F2937 !important;
        }

        /* SEARCH BAR */
        .search-input {
            width: 100%;
            border-radius: 30px;
            padding-left: 20px;
            border-bottom: 1px solid #E5E7EB;
        }

        .btn-search {
            border-radius: 30px;
            background-color: #1F2937;
        }
        .btn-search:hover {
            background-color: #60A5FA;
        }

        /* ICON AREA */
        .nav-icon {
            font-size: 1.3rem;
            margin-left: 20px;
            color: #374151;
            cursor: pointer;
        }
        .nav-icon:hover {
            color: #60A5FA;
        }

        /* NAVBAR MENU */
        .navbar-menu {
            background-color: #1F2937;
        }
        .navbar-menu .nav-link {
            color: #ffffff !important;
            padding: 12px 18px;
            font-weight: bolder;
        }
        .navbar-menu .nav-link:hover {
            color: #60A5FA !important;
        }
        /* FOOTER FSTORE */
        .footer-fstore {
            background: #1F2937;
            color: #fff;
        }
        /* Kategori */
        .kategori-btn{
        background: #f5f5f5;
        border: 2px solid #ddd;
        padding: 8px 18px;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 8px;
    }
    .kategori-btn i{
        font-size: 2.2rem;
    }
    .kategori-btn:hover{
        background: #4a90e2;
        color: #fff;
        border-color: #4a90e2;
        transform: translateY(-3px);
    }
    /* Produk */
    .product-card{
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s ease;
        cursor: pointer;
    }
    .product-card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.15);
    }
    .product-card img{
        height: 200px;
        object-fit: cover;
        transition: 0.3s ease;
    }
    .product-card:hover img{
        filter: brightness(0.9);
    }
    .btn-buy{
        border-radius: 12px;
        background-color: #475d77;
        color: #ffffff !important;
        padding: 8px 16px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-buy:hover{
        background-color: #f5f5f5;
        color: #475d77 !important;
        transform: scale(1.05);
    }

        /* Link menu footer */
        .footer-link {
            display: block;
            color: #e6e6e6;
            margin-bottom: 8px;
            transition: 0.3s;
        }

        .footer-link:hover {
            color: #ffffff;
            transform: translateX(4px);
        }

        /* Sosial media icon */
        .footer-social {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: 0.3s;
            font-size: 1.1rem;
        }

        .footer-social:hover {
            background: #fff;
            color: #0d6efd;
            transform: scale(1.1);
        }
        .footer-fstore a{
            text-decoration: none !important;
        }

    </style>
</head>

<body>

<!-- NAVBAR ATAS -->
<nav class="navbar navbar-expand-lg navbar-top shadow-sm">
    <div class="container">

        <!-- BRAND -->
        <a class="navbar-brand" href="{{ route('beranda') }}">
            <i class="fas fa-store"></i> FStore
        </a>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- CONTENT -->
        <div class="collapse navbar-collapse" id="topNav">

            <!-- SEARCH -->
            <form class="d-flex mx-auto w-50">
                <input class="form-control search-input" type="search" placeholder="Cari produk..." aria-label="Search">
                <button class="btn btn-dark ms-2 btn-search"><i class="fas fa-search"></i></button>
            </form>

            <!-- Untuk Icon Sebelah Kanan -->
            <div class="d-flex align-items-center">

                <!-- Keranjang -->
                {{-- <a href="#" class="nav-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a> --}}

                <!-- User -->
                <a href="{{ route('user') }}" class="nav-icon">
                    <i class="fas fa-user"></i>
                </a>

                <!-- Logout -->
                <a href="{{ route('logout') }}" class="nav-icon">
                    <i class="fas fa-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- NAVBAR MENU -->
<nav class="navbar navbar-expand-lg navbar-menu">
    <div class="container">
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('toko') }}">Toko</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('produk-view') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kategori-view') }}">Kategori</a></li>
                @if (Auth::check())
                <li class="nav-item d-flex align-items-center"><a class="btn btn-login ms-2" href="{{ route('login') }}">Login</a></li>
                @else
                {{-- Jika sudah login, silahkan logout --}}
                <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="fas fa-solid-right-from-bracket"></i>
                    </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="post" class="d-none">
                        @csrf
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('navbar')
<footer class="mt-5 pt-5 pb-4 footer-fstore text-white">
    <div class="container">
        <div class="row gy-4">

            <!-- Brand -->
            <div class="col-md-4">
                <h3 class="fw-bold mb-3">Fstore</h3>
                <p style="max-width: 300px;">
                    Fstore adalah marketplace sederhana untuk memenuhi kebutuhan belanja Anda secara cepat dan mudah.
                </p>

                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="footer-social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="footer-social"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- Menu -->
            <div class="col-md-4">
                <h5 class="fw-bold mb-3">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">Beranda</a></li>
                    <li><a href="#" class="footer-link">Kategori</a></li>
                    <li><a href="#" class="footer-link">Produk</a></li>
                    <li><a href="#" class="footer-link">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-4">
                <h5 class="fw-bold mb-3">Kontak</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-phone me-2"></i> +62 82315818637</li>
                    <li><i class="fas fa-envelope me-2"></i> Fstore@gmail.com</li>
                    <li><i class="fas fa-location-dot me-2"></i> Tasikmalaya, Indonesia</li>
                </ul>
            </div>

        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-0">© 2025 Fstore. All rights reserved.</p>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
