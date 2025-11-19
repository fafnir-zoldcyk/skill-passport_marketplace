@extends('land')
@section('navbar')
<div class="container my-5">
    <div class="card h-100 p-4 mx-auto"
    style="min-width: 350px; max-width: 800px; min-height:  280px; font-size: 1.5rem; backdrop-filter:  blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.4); border-radius: 20px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);">
        <h3 class="mb-3 fw-bold text-center">Kategori</h3>
        <div class="row text-center g-4">
            <div class="col-6 col-md-4 col-lg-4">
                <div class="p-3 category-item">
                    <button class="kategori-btn mt-2">
                        <i class="fas fa-utensils"></i>
                        <span>Elektronik</span>
                        </button>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="p-3 category-item">
                    <button class="kategori-btn mt-2">
                    <i class="fas fa-bolt-lightning"></i>
                        <span>Elektronik</span>
                    </button>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-4">
                <div class="p-3 category-item">
                    <button class="kategori-btn mt-2">
                    <i class="fas fa-bolt-lightning"></i>
                        <span>Elektronik</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
