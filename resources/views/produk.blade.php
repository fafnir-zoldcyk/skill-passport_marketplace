@extends('nav')
@section('sidebar')
<div class="main-content">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-4 text-dark pb-2"> 📦Data Produk</h2>
        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah <i class="fas fa-plus"></i></button>
    </div>
    <hr>
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
        @foreach ($produk as $item)
        <tr>
            <td>{{ $item->id_kategori }}</td>
            <td>{{ $item->nama }}</td>
           <td>{{ $item->harga }}</td>
           <td>{{ $item->stok }}</td>
           <td>{{ $item->gambar }}</td>
           <td>{{ $item->deskripsi }}</td>
           <td>{{ $item->tanggal_upload }}</td>
           <td>{{ $item->id_toko }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store-produk') }}" method="post">
                @csrf
                <div class="modal-header"><h5>Tambah Produk</h5></div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_kategori" placeholder="Masukkan ID kategori" required>
                        <label for="id_kategori"> ID Kategori</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" required>
                        <label for="nama">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga" required>
                        <label for="harga"> Harga</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Stok" placeholder="Masukkan Jumlah Stock" required>
                        <label for="Stok"> Stock</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" id="gambar" placeholder="Masukkan Gambar" required>
                        <label for="gambar"> Gambar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi" required>
                        <label for="deskripsi"> Deskripsi</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="tanggal_upload" placeholder="Masukkan Tanggal Upload" required>
                        <label for="tanggal_upload"> Tanggal Upload</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_toko" placeholder="Masukkan ID Toko" required>
                        <label for="id_toko"> Id Toko</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom-dark">Simpan</button>
                    <button type="button" class="btn btn-custom-dark" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
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
