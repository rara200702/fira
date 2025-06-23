@extends('layouts.app')

@section('content')
<div class="card animate__animated animate__fadeIn">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-tags me-2"></i>Daftar Kategori
        </h5>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Kategori
        </a>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($categories as $category)
            <div class="col">
                <div class="card h-100 category-card animate__animated animate__fadeIn">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0">{{ $category->name }}</h5>
                            <span class="badge bg-primary">{{ $category->products->count() }} Produk</span>
                        </div>
                        <p class="card-text text-muted">{{ $category->description ?? 'Tidak ada deskripsi' }}</p>
                        
                        @if($category->products->count() > 0)
                        <div class="mt-3">
                            <h6 class="mb-2">Produk Terbaru:</h6>
                            <div class="row g-2">
                                @foreach($category->products->take(3) as $product)
                                <div class="col-4">
                                    <div class="product-thumbnail">
                                        @if($product->image)
                                            <img src="{{ asset('images/products/' . $product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="img-fluid rounded"
                                                 style="height: 80px; object-fit: cover;">
                                        @else
                                            <div class="no-image rounded">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('categories.show', $category) }}" 
                               class="btn btn-info btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('categories.edit', $category) }}" 
                               class="btn btn-warning btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" 
                                  method="POST" 
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"
                                        data-bs-toggle="tooltip" 
                                        title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="text-muted animate__animated animate__fadeIn">
                        <i class="fas fa-tags fa-4x mb-3"></i>
                        <h5 class="mt-3">Tidak ada data kategori</h5>
                        <p class="mb-0">Silakan tambahkan kategori baru</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@push('styles')
<style>
    .category-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .product-thumbnail {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        background-color: #f8f9fa;
        height: 80px;
    }

    .no-image {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #6c757d;
        background-color: #f8f9fa;
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