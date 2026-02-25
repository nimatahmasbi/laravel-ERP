<?php $__env->startSection('title', 'لیست محصولات'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <h1 class="h3 mb-2 fw-bold">محصولات</h1>
            <p class="text-muted mb-0">مدیریت محصولات</p>
        </div>
        <div class="col-12 col-md-6 text-end mt-3 mt-md-0">
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle ms-1"></i>
                افزودن محصول جدید
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h5 class="mb-0 fw-bold">لیست محصولات</h5>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <form method="GET" action="<?php echo e(route('products.index')); ?>" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="جستجو..." value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-outline-primary ms-2">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if($products->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>نام محصول</th>
                                <th>کد محصول</th>
                                <th>دسته‌بندی</th>
                                <th>قیمت</th>
                                <th>موجودی</th>
                                <th>واحد</th>
                                <th>وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('products.show', $product)); ?>" class="text-decoration-none fw-bold">
                                        <?php echo e($product->name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($product->sku ?? '-'); ?></td>
                                <td><?php echo e($product->category ?? '-'); ?></td>
                                <td><?php echo e(number_format($product->price)); ?> تومان</td>
                                <td>
                                    <?php if($product->stock > 0): ?>
                                        <span class="badge bg-success"><?php echo e($product->stock); ?></span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">ناموجود</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($product->unit); ?></td>
                                <td>
                                    <?php if($product->is_active): ?>
                                        <span class="badge bg-success">فعال</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">غیرفعال</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-sm btn-info" title="مشاهده">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-sm btn-warning" title="ویرایش">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این محصول اطمینان دارید؟')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" title="حذف">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?php echo e($products->links()); ?>

                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                    <p class="text-muted">هیچ محصولی یافت نشد</p>
                    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle ms-1"></i>
                        افزودن محصول جدید
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/products/index.blade.php ENDPATH**/ ?>