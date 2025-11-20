@extends('admin.nav')
@section('sidebar')
{{-- Modal --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
<style>
#myTable td:last-child {
    /* Mengatur Lebar kolom  */
    width: 300px;
    min-width: 300px;

    /* Agar tombol rapi */
    text-align: center;

    /* Agar tombol tidak pindah baris */
    white-space: nowrap;
}

#myTable th:first-child,
#myTable td:first-child {
    width: 45px; /* Lebar kolom # */
    text-align: center;
}

#myTable.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f7f7f7; /* Warna striping yang lebih lembut */
}
</style>
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0 text-dark pb-2">Data Kategori</h2>
        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah <i class="fas fa-plus"></i></button>
    </div>
    <hr>
    <table id="myTable" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($kategori as $item)
         <tr>
            <td>{{ $item->id }}</td>
            <td>{{$item->nama_kategori}}</td>
            <td>
                <button type="button" class="btn btn-custom-dark" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fas fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-custom-dark" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}"><i class="fas fa-trash-can"></i></button>
            </td>
         {{-- Edit Kategori(modal) --}}
         <div class="modal fade" id="editModal{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('update-kategori', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-header"><h5>Edit Kategori</h5></div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{ $item->nama_kategori }}">
                                <label for="nama_kategori">Nama Kategori</label>
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
         {{-- Hapus Kategori (modal) --}}
         <div class="modal fade" id="hapusModal{{ $item->id }}">
            <div class="modal-dialog">
                <form action="{{ route('hapus-kategori', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header"><h5>Hapus Kategori</h5></div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Akan Menghapus ini?</p>
                        <input type="hidden" name="hapusid" value="{{ $item->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-custom-dark me-2">Hapus</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
            </div>
         </div>
         @endforeach
        </tr>
    </tbody>
</table>
</div>
{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('store-kategori')}}" method="post">
            @csrf
            <div class="modal-header"><h5>Tambah Kategori</h5></div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" placeholder="Nama" required>
                        <label for="nama_kategori">Nama</label>
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

@endsection
