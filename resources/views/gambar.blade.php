@extends('nav')
@section('sidebar')
<div class="main-content">
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
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        responsive: true,    // tabel responsive di HP
        pageLength: 5,       // jumlah baris per halaman
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ baris",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data"
        },
        // aktifkan tema boostrap
        dom: '<"top"f>rt<"bottom"lip><"clear">'
    });
});
</script>
@endsection