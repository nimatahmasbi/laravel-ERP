<?php $__env->startSection('title', 'لیست فاکتورها'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6">
            <h1 class="h3 mb-2 fw-bold">فاکتورها</h1>
            <p class="text-muted mb-0">مدیریت فاکتورهای فروش</p>
        </div>
        <div class="col-12 col-md-6 text-end mt-3 mt-md-0">
            <a href="<?php echo e(route('invoices.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle ms-1"></i>
                ایجاد فاکتور جدید
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center g-3">
                <div class="col-12 col-md-4">
                    <h5 class="mb-0 fw-bold">لیست فاکتورها</h5>
                </div>
                <div class="col-12 col-md-4">
                    <form method="GET" action="<?php echo e(route('invoices.index')); ?>" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="جستجو..." value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-outline-primary ms-2">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
                <div class="col-12 col-md-4">
                    <form method="GET" action="<?php echo e(route('invoices.index')); ?>">
                        <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">همه وضعیت‌ها</option>
                            <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>پیش‌نویس</option>
                            <option value="sent" <?php echo e(request('status') == 'sent' ? 'selected' : ''); ?>>ارسال شده</option>
                            <option value="paid" <?php echo e(request('status') == 'paid' ? 'selected' : ''); ?>>پرداخت شده</option>
                            <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>لغو شده</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if($invoices->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>شماره فاکتور</th>
                                <th>مشتری</th>
                                <th>تاریخ</th>
                                <th>سررسید</th>
                                <th>مبلغ کل</th>
                                <th>وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('invoices.show', $invoice)); ?>" class="text-decoration-none fw-bold">
                                        <?php echo e($invoice->invoice_number); ?>

                                    </a>
                                </td>
                                <td><?php echo e($invoice->customer->name); ?></td>
                                <td><?php echo e(\App\Helpers\DateHelper::toJalali($invoice->invoice_date)); ?></td>
                                <td><?php echo e($invoice->due_date ? \App\Helpers\DateHelper::toJalali($invoice->due_date) : '-'); ?></td>
                                <td class="fw-bold"><?php echo e(number_format($invoice->total)); ?> تومان</td>
                                <td>
                                    <?php
                                        $statusClasses = [
                                            'draft' => 'bg-secondary',
                                            'sent' => 'bg-info',
                                            'paid' => 'bg-success',
                                            'cancelled' => 'bg-danger'
                                        ];
                                        $statusLabels = [
                                            'draft' => 'پیش‌نویس',
                                            'sent' => 'ارسال شده',
                                            'paid' => 'پرداخت شده',
                                            'cancelled' => 'لغو شده'
                                        ];
                                    ?>
                                    <span class="badge <?php echo e($statusClasses[$invoice->status] ?? 'bg-secondary'); ?>">
                                        <?php echo e($statusLabels[$invoice->status] ?? $invoice->status); ?>

                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="<?php echo e(route('invoices.show', $invoice)); ?>" class="btn btn-sm btn-info" title="مشاهده">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('invoices.edit', $invoice)); ?>" class="btn btn-sm btn-warning" title="ویرایش">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route('invoices.destroy', $invoice)); ?>" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این فاکتور اطمینان دارید؟')">
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
                    <?php echo e($invoices->links()); ?>

                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                    <p class="text-muted">هیچ فاکتوری یافت نشد</p>
                    <a href="<?php echo e(route('invoices.create')); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle ms-1"></i>
                        ایجاد فاکتور جدید
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/invoices/index.blade.php ENDPATH**/ ?>