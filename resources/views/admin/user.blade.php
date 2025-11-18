@extends('admin.nav')
@section('sidebar')
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
            <th>Kontak</th>
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
            <td>{{ $item->kontak }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->role}}</td>
            <td>
                <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fas fa-pen-to-square"></i></button>
                <button type="button" class="btn btn-custom-dark" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}"><i class="fas fa-trash-can"></i></button>
            </td>
        </tr>
        {{-- Edit User --}}
        <div class="modal fade" id="editModal{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('user-update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-header"><h5><i class="fas fa-user"></i>Edit user</h5></div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                        <input type="text" name="nama" id="nama" value="{{ $item->nama }}" class="form-control" placeholder="Nama">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="kontak" id="kontak" value="{{ $item->kontak }}" class="form-control" placeholder="Kontak">
                        <label for="kontak">Kontak</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" id="username" value="{{ $item->username }}" class="form-control" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" id="password" value="{{ $item->password }}" class="form-control" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom-dark">Simpan</button>
                    <button type="button" class="btn btn-custom-dark" data-bs-dismiss="modal">Batal</button>
                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Hapus User --}}
        <div class="modal fade" id="hapusModal{{ $item->id }}">
            <div class="modal-dialog">
                <form action="{{ route('hapus-user',$item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header"><h5><i class="fas fa-user"></i>Hapus user {{ $item->nama }}</h5></div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus user {{ $item->nama }}?</p>
                            <input type="hidden" name="hapus" value="{{ $item->id }}">
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

{{-- Tambah User --}}
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user-store') }}" method="post">
                @csrf
                <div class="modal-header"><h5><i class="fas fa-user"></i>Tambah user</h5></div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="kontak" id="kontak" class="form-control" placeholder="Kontak">
                        <label for="kontak">Kontak</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <label for="password">Password</label>
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
{{--  --}}
@endsection
