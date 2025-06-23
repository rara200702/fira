

<?php $__env->startSection('content'); ?>
<div class="card animate__animated animate__fadeIn">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-tags me-2"></i>Daftar Kategori
        </h5>
        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Kategori
        </a>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card h-100 category-card animate__animated animate__fadeIn">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0"><?php echo e($category->name); ?></h5>
                            <span class="badge bg-primary"><?php echo e($category->products->count()); ?> Produk</span>
                        </div>
                        <p class="card-text text-muted"><?php echo e($category->description ?? 'Tidak ada deskripsi'); ?></p>
                        
                        <?php if($category->products->count() > 0): ?>
                        <div class="mt-3">
                            <h6 class="mb-2">Produk Terbaru:</h6>
                            <div class="row g-2">
                                <?php $__currentLoopData = $category->products->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-4">
                                    <div class="product-thumbnail">
                                        <?php if($product->image): ?>
                                            <img src="<?php echo e(asset('images/products/' . $product->image)); ?>" 
                                                 alt="<?php echo e($product->name); ?>" 
                                                 class="img-fluid rounded"
                                                 style="height: 80px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="no-image rounded">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100" role="group">
                            <a href="<?php echo e(route('categories.show', $category)); ?>" 
                               class="btn btn-info btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('categories.edit', $category)); ?>" 
                               class="btn btn-warning btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('categories.destroy', $category)); ?>" 
                                  method="POST" 
                                  class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="text-muted animate__animated animate__fadeIn">
                        <i class="fas fa-tags fa-4x mb-3"></i>
                        <h5 class="mt-3">Tidak ada data kategori</h5>
                        <p class="mb-0">Silakan tambahkan kategori baru</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Inisialisasi tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alfira\velora-butik\resources\views/categories/index.blade.php ENDPATH**/ ?>