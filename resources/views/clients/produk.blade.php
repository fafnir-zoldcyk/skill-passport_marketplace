@extends('clients.land')
@section('navbar')
<div class="container my-5">
    <h3 class="fw-bold mb-4 text-center">Produk Terbaru</h3>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card product-card">
                <img src="{{ asset('asset/image/images (1).jpeg') }}" class="card-img-top" style="height:300px;" alt="">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Hotwheels</h4>
                    <p class="card-text text-muted">Mobil Hotwheels</p>
                    {{-- <label for="" class="bg bg-success p-1 text-white rounded">Rp{{ number_format($produk->harga,0,",",".") }}</label> --}}
                    <a href="" class="btn  w-100 rounded-3 btn-buy">Beli</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
