<?php $__env->startSection('title', 'لیست مشتریان'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <h1 class="h3 mb-2 fw-bold">مشتریان</h1>
            <p class="text-muted mb-0">مدیریت اطلاعات مشتریان</p>
        </div>
        <div class="col-12 col-md-6 text-end mt-3 mt-md-0">
            <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle ms-1"></i>
                افزودن مشتری جدید
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h5 class="mb-0 fw-bold">لیست مشتریان</h5>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <form method="GET" action="<?php echo e(route('customers.index')); ?>" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="جستجو..." value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-outline-primary ms-2">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if($customers->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <th>نام شرکت</th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('customers.show', $customer)); ?>" class="text-decoration-none fw-bold">
                                        <?php echo e($customer->name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($customer->company_name ?? '-'); ?></td>
                                <td><?php echo e($customer->email ?? '-'); ?></td>
                                <td><?php echo e($customer->mobile ?? '-'); ?></td>
                                <td>
                                    <?php if($customer->is_active): ?>
                                        <span class="badge bg-success">فعال</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">غیرفعال</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="<?php echo e(route('customers.show', $customer)); ?>" class="btn btn-sm btn-info" title="مشاهده">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-sm btn-warning" title="ویرایش">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route('customers.destroy', $customer)); ?>" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این مشتری اطمینان دارید؟')">
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
                    <?php echo e($customers->links()); ?>

                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                    <p class="text-muted">هیچ مشتریی یافت نشد</p>
                    <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle ms-1"></i>
                        افزودن مشتری جدید
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/customers/index.blade.php ENDPATH**/ ?>