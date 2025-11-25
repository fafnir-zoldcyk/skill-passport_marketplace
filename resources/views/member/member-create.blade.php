@extends('member.nav')
@section('sidebar')
<div class="main-content">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0 rounded-7" style="width: 550px">
            <div class="d-flex flex-column justify-content-center" style="width: 100%; height: 100%;">
                <h4>Buat Toko</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Validate Invalid</strong>
                        @foreach ($errors->any() as $errors)
                            <ul>
                                <li>{{ $errors }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
                <hr>
                <div class="card-body p-4">
                    <form action="{{ route('store-toko') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" required>
                                    <label for="nama_toko">Nama Toko</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                                    <label for="Alamat">Alamat</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar" required>
                                    <label for="gambar">Gambar</label>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-custom-dark">Buat Toko</button>
                                <button type="button" class="btn btn-grey" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
