<?php if(isset($category)): ?>
<form action="<?php echo e(route('categories.update', $category)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo method_field('PUT'); ?>
<?php else: ?>
<form action="<?php echo e(route('categories.store')); ?>" method="POST" enctype="multipart/form-data">
<?php endif; ?>
    <?php echo csrf_field(); ?>
    <div class="card animate__animated animate__fadeIn">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="fas fa-tags me-2"></i><?php echo e(isset($category) ? 'Edit' : 'Tambah'); ?> Kategori
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
                                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="name" 
                                   name="name" 
                                   value="<?php echo e(old('name', $category->name ?? '')); ?>" 
                                   placeholder="Masukkan nama kategori"
                                   required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-align-left"></i>
                            </span>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="description" 
                                      name="description" 
                                      rows="3" 
                                      placeholder="Masukkan deskripsi kategori"><?php echo e(old('description', $category->description ?? '')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Kategori</label>
                        <div class="image-upload-container">
                            <div class="image-preview mb-2">
                                <?php if(isset($category) && $category->image): ?>
                                    <img src="<?php echo e(asset('images/categories/' . $category->image)); ?>" 
                                         alt="<?php echo e($category->name); ?>" 
                                         class="img-thumbnail" 
                                         id="imagePreview">
                                <?php else: ?>
                                    <div class="no-image-preview">
                                        <i class="fas fa-image fa-3x"></i>
                                        <p class="mt-2">Belum ada gambar</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="input-group">
                                <input type="file" 
                                       class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       id="image" 
                                       name="image" 
                                       accept="image/*"
                                       onchange="previewImage(this)">
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent">
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
            <button type="submit" class="btn btn-primary float-end">
                <i class="fas fa-save me-2"></i>Simpan
            </button>
        </div>
    </div>
</form>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?> <?php /**PATH C:\Users\alfira\velora-butik\resources\views/categories/form.blade.php ENDPATH**/ ?>