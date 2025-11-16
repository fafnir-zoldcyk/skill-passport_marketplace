@extends('nav')
@section('sidebar')
<div class="main-content">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold mb-0 text-dark pb-2">Data Toko</h2>
        <a href="{{ route('create-toko') }}" class="btn btn-custom-dark me-2">Tambah +</a>
    </div>
    <hr>
    <table id="Table" class="table table-striped table-bordered align-middle shadow-sm rounded-3 bg-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Toko</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Kontak Toko</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="">
           @foreach ( $tokos as $toko )
                <tr>
                    <td>{{$toko->id}}</td>
                    <td>{{$toko->nama_toko}}</td>
                    <td>{{$toko->deskripsi}}</td>
                    <td>
                        @if($toko->gambar)
                            <img src="{{ asset('storage/gambar/'. $toko->gambar) }}" alt="Gambar Toko" style="width: 100px; height: auto;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>{{$toko->kontak_toko}}</td>
                    <td>{{$toko->alamat}}</td>
                    <td>
                        <a href="" class="btn btn-custom-dark me-2">Edit</a>
                    </td>
                </tr>
                    @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        $('#Table').DataTable({
            responsive: true,
            pageLenght: 4,
        })
    })
</script>
@endsection