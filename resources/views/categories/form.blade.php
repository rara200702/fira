@if(isset($category))
<form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
@else
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
@endif
    @csrf
    <div class="card animate__animated animate__fadeIn">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-tags me-2"></i>{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </span>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $category->name ?? '') }}" 
                                   placeholder="Masukkan nama kategori"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-align-left"></i>
                            </span>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3" 
                                      placeholder="Masukkan deskripsi kategori">{{ old('description', $category->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Kategori</label>
                        <div class="image-upload-container">
                            <div class="image-preview mb-2">
                                @if(isset($category) && $category->image)
                                    <img src="{{ asset('images/categories/' . $category->image) }}" 
                                         alt="{{ $category->name }}" 
                                         class="img-thumbnail" 
                                         id="imagePreview">
                                @else
                                    <div class="no-image-preview">
                                        <i class="fas fa-image fa-3x"></i>
                                        <p class="mt-2">Belum ada gambar</p>
                                    </div>
                                @endif
                            </div>
                            <div class="input-group">
                                <input type="file" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       id="image" 
                                       name="image" 
                                       accept="image/*"
                                       onchange="previewImage(this)">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
            <button type="submit" class="btn btn-primary float-end">
                <i class="fas fa-save me-2"></i>Simpan
            </button>
        </div>
    </div>
</form>

@push('styles')
<style>
    .input-group-text {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        border-color: var(--secondary-color);
    }

    .card {
        border: none;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .card-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border-radius: 15px 15px 0 0 !important;
    }

    .btn {
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
    }

    .btn-primary {
        background: var(--secondary-color);
        border: none;
    }

    .btn-primary:hover {
        background: var(--primary-color);
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }

    .image-upload-container {
        border: 2px dashed #ddd;
        border-radius: 10px;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .image-upload-container:hover {
        border-color: var(--secondary-color);
    }

    .image-preview {
        width: 100%;
        height: 200px;
        overflow: hidden;
        border-radius: 10px;
        background-color: #f8f9fa;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .no-image-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #6c757d;
    }
</style>
@endpush

@push('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const noImage = document.querySelector('.no-image-preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                if (!preview) {
                    const img = document.createElement('img');
                    img.id = 'imagePreview';
                    img.className = 'img-thumbnail';
                    img.src = e.target.result;
                    document.querySelector('.image-preview').appendChild(img);
                    if (noImage) noImage.remove();
                } else {
                    preview.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush 