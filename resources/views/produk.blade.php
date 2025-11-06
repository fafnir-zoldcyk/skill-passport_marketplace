@extends('nav')
@section('sidebar')
<div class="main-content">
    <h2 class="fw-bold mb-4 text-dark border-bottom pb-2"> 📦Data Produk</h2>
    <table id="myTable" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
    <thead class="table-dark">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Rizky Pratama</td>
            <td>rizky@example.com</td>
            <td>08123456789</td>
            <td>Jakarta</td>
        </tr>
        <tr>
            <td>Siti Aminah</td>
            <td>siti@example.com</td>
            <td>08198765432</td>
            <td>Bandung</td>
        </tr>
        <tr>
            <td>Agus Santoso</td>
            <td>agus@example.com</td>
            <td>08122334455</td>
            <td>Surabaya</td>
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