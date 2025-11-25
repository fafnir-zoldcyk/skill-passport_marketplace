@extends('member.nav')
@section('sidebar')
<style>
    /* card sebelum ada toko */
    .navy-card{
        width: 70%;
        background: #34495E;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
    }
    .navy-card  .store-icon{
        font-size: 48px;
        color: #fff;
        opacity: 0.95;
    }
    .navy-card .lead{
        color: rgba(255, 255, 255, 0.9)
    }
    /* card sesudah ada toko */
    .store-profile{
        border-radius: 12px;
        overflow: hidden;
    }
    .store-profile .cover{
        height: 12px;
        background: linear-gradient(90deg, rgba(44,62,80,0.95), rgba(52,73,94,0.95));
    }
    .store-profile .avatar{
        margin-top: -50px;
        border:  6px solid #fff;
    }
    .store-stat .stat{
        min-width: 120px;
    }
    /* Responsive */
    @media (max-width:  768px){
        .navy-card {width: 95%;}
        .store-stat{flex-direction: column; gap: .5rem;}
    }
</style>
<div class="main-content">
    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tampilkan pesan error --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @php
        $toko = Auth::user()->toko; // perhatikan huruf kecil 'toko'
        $jumlahProduk = $toko ? $toko->produk->count() : 0;
        $jumlahGambar = $toko ? \App\Models\Gambar::whereIn('produk_id', $toko->produk->pluck('id'))->count() : 0;
    @endphp

    <h1 class="mb-4">Dashboard Toko Online</h1>
    <p>Selamat datang di area admin toko online Anda. Kelola produk, dan toko anda disini.</p>

    {{-- Jika belum punya toko --}}
    @if (!$toko)
        <div class="d-flex justify-content-center mt-5">
            <div class="navy-card p-4 text-center text-white">
                <div class="mb-3">
                    <i class="fas fa-shop store-icon"></i>
                </div>

                <h4 class="fw-bold">Belum Ada Toko</h4>
                <p class="lead opacity-85">Klik tombol di bawah ini untuk membuat toko Anda dan mulai menjual produk.</p>

                <button type="button" class="btn btn-light fw-bold px-4" data-bs-toggle="modal" data-bs-target="#tambahToko">
                    <i class="fas fa-plus me-2"></i> Buat Toko
                </button>
            </div>
        </div>

    @elseif ($toko && $toko->status == 'Pending')
        <div class="alert alert-info mt-3" role="alert">
            <strong>Info:</strong> Toko Anda sedang dalam proses verifikasi.
        </div>

    @else
        {{-- Profil Toko --}}
        <div class="container mt-4">
            <div class="card store-profile shadow-sm">
                <div class="cover d-flex align-items-end px-4">
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            @if ($toko->gambar)
                                <img src="{{ asset('storage/image/' . $toko->gambar) }}"
                                     alt="Logo {{ $toko->nama_toko ?? 'Toko' }}"
                                     width="100" height="100" class="rounded-circle avatar shadow-sm">
                            @else
                                <img src="https://via.placeholder.com/100"
                                     alt="Logo placeholder"
                                     class="rounded-circle avatar shadow-sm">
                            @endif
                        </div>

                        <div class="col-md-6">
                            <h4 class="mb-1 fw-bold">{{ $toko->nama_toko ?? 'Nama Toko' }}</h4>
                            <p class="mb-1 text-muted">{{ $toko->deskripsi ?? 'Deskripsi singkat toko...' }}</p>
                            <span class="badge bg-success">{{ ucfirst($toko->status) }}</span>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <button  data-bs-toggle="modal" data-bs-target="#editToko" class="btn btn-custom-dark me-2">
                                <i class="fas fa-edit me-1"></i> Edit Toko
                            </button>
                            <a href="{{ route('produk-view') }}" class="btn btn-primary">
                                <i class="fas fa-boxes me-1"></i> Kelola Produk
                            </a>
                        </div>
                    </div>
                    <hr class="my-3">

                    <div class="d-flex store-stats align-items-center justify-content-between flex-wrap">
                        <div class="stat text-center">
                            <div class="h5 mb-0 fw-bold">{{ $jumlahProduk }}</div>
                            <small class="text-muted">Produk</small>
                        </div>

                        <div class="stat text-center">
                            <div class="h5 mb-0 fw-bold">{{ $jumlahGambar }}</div>
                            <small class="text-muted">Gambar</small>
                        </div>

                        <div class="stat text-center">
                            <div class="h5 mb-0 fw-bold">{{ $toko->created_at ? $toko->created_at->format('d M Y') : '-' }}</div>
                            <small class="text-muted">Bergabung</small>
                        </div>

                        <div class="stat text-center">
                            <div class="h5 mb-0 fw-bold">{{ $toko->alamat ?? '-' }}</div>
                            <small class="text-muted">Lokasi</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal Tambah Toko --}}
    <div class="modal fade" id="tambahToko" tabindex="-1" aria-labelledby="tambahTokoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('add-toko') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahTokoLabel">Buat Toko</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_toko') is-invalid @enderror"
                                   name="nama_toko" placeholder="Nama Toko" value="{{ old('nama_toko') }}" required>
                            <label for="nama_toko">Nama Toko</label>
                            @error('nama_toko')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                   name="deskripsi" placeholder="Deskripsi" value="{{ old('deskripsi') }}" required>
                            <label for="deskripsi">Deskripsi</label>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                      name="alamat" placeholder="Alamat" style="height: 100px" required>{{ old('alamat') }}</textarea>
                            <label for="alamat">Alamat</label>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('kontak_toko') is-invalid @enderror"
                                      name="kontak_toko" placeholder="Kontak Toko"  required>{{ old('kontak_toko') }}</input>
                            <label for="kontak_toko">Kontak Toko</label>
                            @error('kontak_toko')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Toko</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                   name="gambar" accept="image/*" required>
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-custom-dark">Buat Toko</button>
                        <button type="button" class="btn btn-grey" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Edit Toko --}}
@if ($toko)
    
<div class="modal fade" id="editToko" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="{{ route('edit-toko') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h4>Edit Toko</h4>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko" value="{{ $toko->nama_toko }}" required>
                    <label for="Nama">Nama Toko</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ $toko->deskripsi }}" required>
                    <label for="Nama">Deskripsi</label>
                </div>
                <div class="form-floating mb-3">
                    <div class="form-floating mb-3">
                        <input type="number" name="kontak_toko" class="form-control" placeholder="Kontak" value="{{ $toko->kontak_toko }}" required>
                        <label for="Nama">Kontak Toko</label>
                    </div>
                </div>
                    <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ $toko->alamat }}" required></textarea>
                    <label for="Alamat">Alamat</label>
                <div class="form-floating mb-3">
                    <input type="file" name="gambar" class="form-control" placeholder="Nama Toko" value="{{ $toko->gambar }}" required>
                    <label for="Gambar">Gambar</label>
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
@endif
@endsection
