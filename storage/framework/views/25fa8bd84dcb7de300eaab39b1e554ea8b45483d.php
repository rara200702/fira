

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Detail Kategori</h5>
        <div>
            <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo e($category->name); ?></td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td><?php echo e($category->description); ?></td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td><?php echo e($category->created_at->format('d/m/Y H:i')); ?></td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td><?php echo e($category->updated_at->format('d/m/Y H:i')); ?></td>
            </tr>
        </table>
    </div>
</div>

<?php if($category->products->count() > 0): ?>
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Produk dalam Kategori Ini</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($product->name); ?></td>
                        <td>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                        <td><?php echo e($product->stock); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\alfira\velora-butik\resources\views/categories/show.blade.php ENDPATH**/ ?>