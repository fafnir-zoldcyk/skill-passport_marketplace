<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('bootstrap-5.3.8-dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <style>
        body {
                background: linear-gradient(180deg, #2C3E50 0%, #343a40 100%) !important;
                background-attachment: fixed;

        }
        .login-container {
            max-width: 400px;
            margin-top: 8%;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .brand-title {
            font-weight: bold;
            font-size: 2rem;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 25px;
        }
        /* 2. Mengubah Warna Tombol Login */
        .btn-custom-primary {
            /* Ganti warna primary default Bootstrap */
            background-color: #2C3E50 !important;
            border-color: #2C3E50 !important;
        }

        /* Efek Hover untuk Tombol */
        .btn-custom-primary:hover {
            background-color: #34495e !important; /* Sedikit lebih gelap saat di-hover */
            border-color: #34495e !important;
        }

        /* Warna Judul/Logo */
        .login-card-header, h4.fstore-title {
            color: #2C3E50; /* Warna Navy untuk Judul/Logo */
            font-weight: bold;
        }

        /* Bayangan tipis untuk box */
        .card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-container">
            <div class="brand-title">FStore</div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login.auth') }}" method="post">
                @csrf
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="username" id="username_icon" placeholder="Masukkan username" required>
                        <label for="username_icon">Username</label>
                    </div>
                </div>

                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password_icon" placeholder="Masukkan password" required>
                        <label for="password_icon">Password</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center text-center">
                    <label for="">No Have Account? <a style="text-decoration:none" href="/member/register">Register</a></label>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-custom-primary text-white">Login</button>
                </div>
            </form>

            <p class="text-center mt-3 text-muted">
                &copy; {{ date('Y') }} FStore. All rights reserved.
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
