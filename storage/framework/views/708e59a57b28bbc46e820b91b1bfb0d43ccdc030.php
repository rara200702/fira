

<?php $__env->startSection('content'); ?>
<div class="card animate__animated animate__fadeIn">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-box me-2"></i>Daftar Produk
        </h5>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col">
                <div class="card h-100 product-card animate__animated animate__fadeIn">
                    <div class="product-image-container">
                        <?php if($product->image): ?>
                            <img src="<?php echo e(asset('images/products/' . $product->image)); ?>" 
                                 alt="<?php echo e($product->name); ?>" 
                                 class="card-img-top product-image"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#imageModal<?php echo e($product->id); ?>">
                        <?php else: ?>
                            <div class="no-image">
                                <i class="fas fa-image fa-4x"></i>
                                <p>Tidak ada gambar</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="card-text text-muted small"><?php echo e(Str::limit($product->description, 100)); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-primary"><?php echo e($product->category->name); ?></span>
                            <span class="fw-bold">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
                        </div>
                        <div class="mt-2">
                            <?php if($product->stock > 10): ?>
                                <span class="badge bg-success">Stok: <?php echo e($product->stock); ?></span>
                            <?php elseif($product->stock > 0): ?>
                                <span class="badge bg-warning">Stok: <?php echo e($product->stock); ?></span>
                            <?php else: ?>
                                <span class="badge bg-danger">Habis</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="btn-group w-100" role="group">
                            <a href="<?php echo e(route('products.show', $product)); ?>" 
                               class="btn btn-info btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('products.edit', $product)); ?>" 
                               class="btn btn-warning btn-sm" 
                               data-bs-toggle="tooltip" 
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('products.destroy', $product)); ?>" 
                                  method="POST" 
                                  class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
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

            <?php if($product->image): ?>
            <!-- Modal untuk gambar -->
            <div class="modal fade" id="imageModal<?php echo e($product->id); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo e($product->name); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="<?php echo e(asset('images/products/' . $product->image)); ?>" 
                                 alt="<?php echo e($product->name); ?>" 
                                 class="img-fluid"
                                 style="max-height: 70vh;">
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <div class="text-muted animate__animated animate__fadeIn">
                        <i class="fas fa-box-open fa-4x mb-3"></i>
                        <h5 class="mt-3">Tidak ada data produk</h5>
                        <p class="mb-0">Silakan tambahkan produk baru</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->startPush('styles'); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alfira\velora-butik\resources\views/products/index.blade.php ENDPATH**/ ?>