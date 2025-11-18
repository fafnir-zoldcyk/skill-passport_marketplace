<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
    background-color: #2c3e50; /* Sesuai dengan tema btn-custom-dark */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ecf0f1; /* Teks putih */
            font-size: 1rem;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #3498db; /* Hover biru */
            text-decoration: underline;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ecf0f1;
        }

        .navbar-toggler-icon {
            background-color: #ecf0f1; /* Warna ikon toggle */
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark btn-custom-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin') }}">
            <i class="fas fa-store-alt"></i> FStore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('toko') }}">Toko</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('navbar')
</body>
</html>
