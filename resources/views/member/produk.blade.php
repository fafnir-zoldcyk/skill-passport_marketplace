@extends('member.nav')
@section('sidebar')
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-4 text-dark pb-2"> 📦Data Produk</h2>
        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah <i class="fas fa-plus"></i></button>
    </div>
    <hr>
    <table id="myTable" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Tanggal Upload</th>
            <th>Kategori</th>
            <th>Toko</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>Rp.{{ $item->harga }}</td>
            <td>{{ $item->stock }}</td>
            <td>
                @if($item->gambar)
                    <img src="{{ asset('storage/gambar/'. $item->gambar) }}" alt="Gambar Toko" style="width: 100px; height: auto;">
                    @else
                        Tidak ada gambar
                @endif
                    </td>
            <td>{{ $item->deskripsi }}</td>
            <td>{{ $item->tanggal_upload }}</td>
            <td>{{ $item->kategori->nama_kategori }}</td>
           <td>{{ $item->toko->nama_toko }}</td>
           <td>
                <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fas fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-custom-dark" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}"><i class="fas fa-trash-can"></i></button>
            </td>
        </tr>
        {{-- Modal Edit Produk --}}
        <div class="modal fade" id="editModal{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('update-produk', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header"><h5>Edit Produk</h5></div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}" placeholder="Masukkan Nama" required>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="harga" id="harga" value="{{ $item->harga }}" placeholder="Masukkan Harga" required>
                                <label for="harga"> Harga</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="stock" id="stock" value="{{ $item->stock }}" placeholder="Masukkan Jumlah Stock" required>
                                <label for="stock"> Stock</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukkan Gambar" required>
                                <label for="gambar"> Gambar</label>
                            </div>
                            <input type="hidden" name="id" value="{{ $item->id }}">
                                <textarea name="deskripsi" class="form-control mb-2" value="{{ $item->deskripsi }}" placeholder="Deskripsi" required></textarea>
                            {{-- <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_upload" placeholder="Masukkan Tanggal Upload" required>
                                <label for="tanggal_upload"> Tanggal Upload</label>
                            </div> --}}
                                <select name="id_kategori" class="form-control mb-2" placeholder="Pilih Kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                     @foreach($kategori as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <select name="id_toko" class="form-control mb-2" placeholder="Pilih Toko" required>
                                    <option value="{{ $item->nama_toko }}">-- Pilih Toko --</option>
                                    @foreach($toko as $type)
                                        <option value="{{ $type->id }}">{{ $type->nama_toko }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-custom-dark">Simpan</button>
                            <button type="button" class="btn btn-custom-dark" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Hapus Produk --}}
        <div class="modal fade" id="hapusModal{{ $item->id }}">
            <div class="modal-dialog">
                <form action="{{ route('hapus-prod', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header"><h5>Hapus Produk {{ $item->nama }}</h5></div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapus {{ $item->nama }} ini?</p>
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-custom-dark">Hapus</button>
                            <button type="button" class="btn btn-custom-dark" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
</div>

{{-- Modal Tambah Produk --}}
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store-produk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header"><h5>Tambah Produk</h5></div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                        <label for="nama">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan Harga" required>
                        <label for="harga"> Harga</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="stock" id="stock" placeholder="Masukkan Jumlah Stock" required>
                        <label for="stock"> Stock</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Masukkan Gambar" required>
                        <label for="gambar"> Gambar</label>
                    </div>
                        <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi" required></textarea>
                    {{-- <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="tanggal_upload" placeholder="Masukkan Tanggal Upload" required>
                        <label for="tanggal_upload"> Tanggal Upload</label>
                    </div> --}}
                        <select name="id_kategori" class="form-control mb-2" placeholder="Pilih Kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                             @foreach($kategori as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <select name="id_toko" class="form-control mb-2" placeholder="Pilih Toko" required>
                            <option value="">-- Pilih Toko --</option>
                            @foreach($toko as $type)
                                <option value="{{ $type->id }}">{{ $type->nama_toko }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom-dark">Simpan</button>
                    <button type="button" class="btn btn-custom-dark" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
