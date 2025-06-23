@extends('layouts.app')

@section('content')
<div class="card animate__animated animate__fadeIn">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-box me-2"></i>Daftar Produk
        </h5>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($products as $product)
            <div class="col">
                <div class="card h-100 product-card animate__animated animate__fadeIn">
                    <div class="product-image-container">
                        @if($product->image)
                            <img src="{{ asset('images/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="card-img-top product-image"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#imageModal{{ $product->id }}">
                        @else
                            <div class="no-image">
                                <i class="fas fa-image fa-4x"></i>
                                <p>Tidak ada gambar</p>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small">{{ Str::limit($product->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary">{{ $product->category->name }}</span>
                            <span class="fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="mt-2">
                            @if($product->stock > 10)
                                <span class="badge bg-success">Stok: {{ $product->stock }}</span>
                            @elseif($product->stock > 0)
                                <span class="badge bg-warning">Stok: {{ $product->stock }}</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('products.show', $product) }}" 
                               class="btn btn-info btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('products.edit', $product) }}" 
                               class="btn btn-warning btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                        data-bs-toggle="tooltip" 
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if($product->image)
            <!-- Modal untuk gambar -->
            <div class="modal fade" id="imageModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $product->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('images/products/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-fluid"
                                 style="max-height: 70vh;">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="text-muted animate__animated animate__fadeIn">
                        <i class="fas fa-box-open fa-4x mb-3"></i>
                        <h5 class="mt-3">Tidak ada data produk</h5>
                        <p class="mb-0">Silakan tambahkan produk baru</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@push('styles')
<style>
    .product-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .product-image-container {
        position: relative;
        overflow: hidden;
        height: 200px;
        background-color: #f8f9fa;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.3s ease;
    }

    .product-image-container:hover .product-image {
        transform: scale(1.1);
    }

    .no-image {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #6c757d;
    }

    .card-footer {
        border-top: none;
    }

    .btn-group {
        gap: 0.25rem;
    }

    .btn-group .btn {
        flex: 1;
    }

    .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
    }

    .modal-body {
        padding: 2rem;
    }
</style>
@endpush

@push('scripts')
<script>
    // Inisialisasi tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endpush
@endsection 