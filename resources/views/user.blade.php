@extends('nav')
@section('sidebar')
<div class="main-content">
<div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0 text-dark pb-2">Data User</h2>
        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah <i class="fas fa-plus"></i></button>
    </div>
    <hr>
    <table id="myTable" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Toko</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->toko }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->role}}</td>
            <td></td>
        </tr>
        @endforeach
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
