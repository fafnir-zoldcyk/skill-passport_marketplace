<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navbar</title>
    <!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('bootstrap-5.3.8-dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

<!-- jQuery dan DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>




    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Popins',sans-serif;
          }
          body {
            display: flex;
            background-color: #ECF0F1; /*latar belakang lembut*/
          }
          .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 240px;
            background-color: #34495E; /*biru ke abu-abuan */
            padding: 20px 0;
            transition: width 0.3s;
          }
          .sidebar a:hover {
            background-color: #2C3E50;
            transition: 0.1s;
          }
          .sidebar h2{
            color: #ECF0F1; /* putih lembut */
            text-align: center;
            margin-top: 40px;
            margin-bottom: 30px;
            letter-spacing: 1px;
          }
          .sidebar ul{
            list-style: none;
          }
          .sidebar ul li{
            padding: 15px 20px;
          }
          .sidebar ul li a{
            color: #BDC3C7; /* Abu muda untuk teks default */
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: 0.1s;
            font-weight: 500;
          }
          .sidebar ul li a:hover{
            background-color: #34495E; /*warna untuk hover */
            color: #ffffff;
            border-left: 2px solid #3498DB; /*Aksen biru terang */
            border-radius: 4px;
          }
          .sidebar footer{
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 0.85em;
            color: #BDC3C7;
          }
          /* Konten Utama */
          .main-content{
            margin-left: 240px;
            margin-top: 20px;
            min-height: 100vh;
            padding: 40px;
            flex: 1;
            width: calc(100% - 240px);
          }
          .main-content h1{
            color: #2C3E50;
            margin-bottom: 20px;
          }
          .main-content p{
            color: #555;
            line-height: 1.6;
          }
          .table{
            border-collapse: separate;
            border-spacing: 0;
          }
          th{
            background-color: #2C3E50 !important;
            color: #ffffff !important;
          }
          .dataTables_wrapper .dataTables_length,
          .dataTables_wrapper .dataTables_filter {
            margin-bottom: 15px;
          }
          .dataTables_wrapper .dataTables_paginate {
            margin-top: 15px;
          }

    </style>
</head>
<body>
    {{-- sidebar --}}
    <div class="sidebar">
        <h2><i class="fa-solid fa-store"></i>MyShop</h2>
        {{-- list --}}
        <ul>
            <li><a href=""><i class="fa-solid fa-house"></i>Beranda</a></li>
            <li><a href="/pro"><i class="fa-solid fa-box"></i>Produk</a></li>
            <li><a href=""><i class="fa-solid fa-list"></i>Kategori</a></li>
            <li><a href=""><i class="fa-solid fa-shop"></i>Toko</a></li>
            <li><a href=""><i class="fa-solid fa-image"></i>Gambar</a></li>
            <li><a href=""><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </div>
    <div class="sidebar-footer">
         © 2025 MyShop
    </div>

    {{-- <div class="main-content">
        <h1>
            Dashboard Toko Online
            <p>Selamat datang di area admin toko online Anda. Kelola produk, pesanan, pelanggan, dan promo dengan mudah di sini.</p>
        </h1>
    </div> --}}
    @yield('sidebar')
</body>
</html>
