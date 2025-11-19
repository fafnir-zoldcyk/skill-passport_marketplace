@extends('member.nav')
@section('sidebar')
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2 class="fw-bold mb-4 text-dark border-bottom pb-2">Dashboard</h2>
    <div class="row mb-3 g-3 justify-content-center align-items-center">
        <div class="col-md-3">
            <div class="card text-white btn-custom-dark p-3">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-graduation-cap fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title m-0">Toko</h5>
                        <p class="card-text fw-bold text-white">{{ $totaltoko ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white btn-custom-dark p-3">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-box fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title m-0">Produk</h5>
                        <p class="card-text fw-bold text-white">{{ $totalproduk ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white btn-custom-dark p-3">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-box fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title m-0">Stock</h5>
                        <p class="card-text fw-bold text-white">{{ $totalstock ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
