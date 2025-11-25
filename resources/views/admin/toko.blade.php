@extends('admin.nav')
@section('sidebar')
{{-- Modal --}}
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}

<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0 text-dark pb-2">Data Toko</h2>

        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah +</button>
    </div>
    <hr>
    <table id="Table" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Toko</th>
                <th>Owner</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Kontak Toko</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="">
           @foreach ( $toko as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama_toko}}</td>
                    <td>{{$item->user->nama}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/image/'. $item->gambar) }}" alt="Gambar Toko" style="width: 100px; height: auto;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{$item->kontak_toko}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id}}"><i class="fa-solid fa-pen-to-square "></i></button>
                        <button type="button" class="btn btn-custom-dark me-2" data-bs-toggle="modal" data-bs-target="#hapusModal{{$item->id}}"><i class="fa-solid fa-trash-can "></i></button>
                        <form action="{{ route('approve-toko',$item->id) }}" method="post" class="d-inline" >
                            @csrf
                            <button type="submit" class="btn btn-custom-dark" onclick="return confirm('Apakah anda Yakin akan melakuka approve untuk toko ini?')">Approve</button>
                        </form>
                    </td>
                </tr>
                {{-- MODAL EDIT PER ITEM --}}
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5>Edit Toko</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form action="{{ route('update-toko', $item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">

                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_toko" value="{{ $item->nama_toko }}" class="form-control" required>
                                        <label>Nama</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="deskripsi" value="{{ $item->deskripsi }}" class="form-control" required>
                                        <label>Deskripsi</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select name="users_id" class="form-control">
                                            <option value=""></option>
                                                @foreach($user as $us)
                                                    <option value="{{ $us->id }}" {{ $us->id == $item->users_id ? 'selected' : '' }}>
                                                        {{ $us->nama }}
                                                    </option>
                                                @endforeach
                                        </select>
                                        <label>Pilih Owner</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="file" name="gambar" class="form-control" >
                                        <label>Gambar (Opsional)</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" name="kontak_toko" value="{{ $item->kontak_toko }}" class="form-control" required>
                                        <label>Kontak</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" name="alamat" value="{{ $item->alamat }}" class="form-control" required>
                                        <label>Alamat</label>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                {{-- Hapus Toko --}}
                <div class="modal fade" id="hapusModal{{$item->id}}">
                    <div class="modal-dialog">
                        <form action="{{ route('hapus-toko', $item->id) }}" method="post" id="hapustoko" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header"><h5>Hapus Toko {{ $item->nama_toko }}</h5></h5></div>
                            <div class="modal-body">
                                <p>Apakah Anda Yakin Ingin Menghapus {{ $item->nama_toko }} Ini?</p>
                                <input type="hidden" name="hapusid" value="{{$item->id}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="konfirmhapus" class="btn btn-dark">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                    @endforeach
        </tbody>
    </table>
</div>
{{-- Modal Tambah Toko --}}
<div class="modal fade" id="tambahModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store-toko') }}" method="post" id="tambahtoko" enctype="multipart/form-data">
                @csrf
                <div class="modal-header"><h5>Tambah Toko</h5></div>
                <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" id="nama_toko" name="nama_toko" class="form-control" placeholder="Nama" required>
                    <label for="nama_toko">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="users_id" id="users_id" class="form-control" required>
                        <option value=""></option>
                        @foreach ($user as $us)
                        <option value="{{ $us->id }}">{{ $us->nama }}</option>
                        @endforeach
                    </select>
                    <label for="users_id">Pilih Owner</label>
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
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary btn-lg fw-bold shadow-sm mb-2" style="transition: 0.3s; width: 100%;">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Simpan
                </button>
                <a href="{{route('toko')}}"  class="btn btn-secondary btn-lg fw-bold shadow-sm" style="transition: 0.3s; width: 100%;">
                    <i class="fa-solid fa-circle-xmark me-2"></i>Batal
                </a>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
