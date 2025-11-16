@extends('nav')
@section('sidebar')
<div class=" main-content container d-flex justify-content-center align-items-center">
    <div class="card shadow-slg border-0 rounded-7" style="width: 450px;">
        <div class="card-header text-white text-center rounded-top-4 bt">
            <h3 class="mb-0 fw-vol">
                <i class="fa-solid fa-plus"></i>
                Tambah Toko
            </h3>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('store-toko') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-floating mb-3">
                    <input type="text" id="nama_toko" name="nama_toko" class="form-control" placeholder="Nama" required>
                    <label for="nama_toko">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="Desk" required>
                    <label for="deskripsi">Desk</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" id="gambar" name="gambar" class="form-control" placeholder="Nama" required>
                    <label for="gambar">Gambar</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="kontak_toko" name="kontak_toko" class="form-control" placeholder="Nama" required>
                    <label for="kontak_toko">Kontak</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Nama" required>
                    <label for="alamat">Alamat</label>
                </div>
                <button type="submit" class="btn btn-secondary btn-lg fw-bold shadow-sm mb-2" style="transition: 0.3s; width: 100%;">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Simpan
                </button>
                <a href="{{route('toko')}}"  class="btn btn-secondary btn-lg fw-bold shadow-sm" style="transition: 0.3s; width: 100%;">
                    <i class="fa-solid fa-circle-xmark me-2"></i>Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection