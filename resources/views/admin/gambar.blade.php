@extends('admin.nav')
@section('sidebar')
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<h2 class="fw-bold mb-4 text-dark border-bottom pb-2"> 🖼️Data Gambar</h2>
    <table id="myTable" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
    <thead class="table-dark">
        <tr>
            <th>Id Produk</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Rizky Pratama</td>
            <td>rizky@example.com</td>
        </tr>
        <tr>
            <td>Siti Aminah</td>
            <td>siti@example.com</td>
        </tr>
        <tr>
            <td>Agus Santoso</td>
            <td>agus@example.com</td>
        </tr>
    </tbody>
</table>
</div>
@endsection
