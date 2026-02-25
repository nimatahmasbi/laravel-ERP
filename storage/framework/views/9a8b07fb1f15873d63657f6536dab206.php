<?php $__env->startSection('title', 'مشاهده فاکتور'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-2 fw-bold">مشاهده فاکتور</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('invoices.index')); ?>">فاکتورها</a></li>
                    <li class="breadcrumb-item active"><?php echo e($invoice->invoice_number); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">فاکتور شماره <?php echo e($invoice->invoice_number); ?></h5>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('invoices.edit', $invoice)); ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil ms-1"></i>
                            ویرایش
                        </a>
                        <form action="<?php echo e(route('invoices.destroy', $invoice)); ?>" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این فاکتور اطمینان دارید؟')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash ms-1"></i>
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-md-6">
                            <h6 class="text-muted mb-2">اطلاعات مشتری</h6>
                            <p class="mb-1"><strong>نام:</strong> <?php echo e($invoice->customer->name); ?></p>
                            <?php if($invoice->customer->company_name): ?>
                                <p class="mb-1"><strong>شرکت:</strong> <?php echo e($invoice->customer->company_name); ?></p>
                            <?php endif; ?>
                            <?php if($invoice->customer->mobile): ?>
                                <p class="mb-1"><strong>موبایل:</strong> <?php echo e($invoice->customer->mobile); ?></p>
                            <?php endif; ?>
                            <?php if($invoice->customer->address): ?>
                                <p class="mb-0"><strong>آدرس:</strong> <?php echo e($invoice->customer->address); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6 class="text-muted mb-2">اطلاعات فاکتور</h6>
                            <p class="mb-1"><strong>تاریخ:</strong> <?php echo e(\App\Helpers\DateHelper::toJalali($invoice->invoice_date)); ?></p>
                            <?php if($invoice->due_date): ?>
                                <p class="mb-1"><strong>سررسید:</strong> <?php echo e(\App\Helpers\DateHelper::toJalali($invoice->due_date)); ?></p>
                            <?php endif; ?>
                            <p class="mb-1">
                                <strong>وضعیت:</strong>
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
                            </p>
                            <p class="mb-0"><strong>ایجاد کننده:</strong> <?php echo e($invoice->user->name); ?></p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت واحد</th>
                                    <th>تخفیف</th>
                                    <th>مالیات</th>
                                    <th>جمع</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($item->product_name); ?></td>
                                    <td><?php echo e(number_format($item->quantity)); ?> <?php echo e($item->product->unit ?? ''); ?></td>
                                    <td><?php echo e(number_format($item->unit_price)); ?> تومان</td>
                                    <td><?php echo e(number_format($item->discount)); ?> تومان</td>
                                    <td><?php echo e(number_format($item->tax)); ?> تومان</td>
                                    <td class="fw-bold"><?php echo e(number_format($item->total)); ?> تومان</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end fw-bold">جمع کل:</td>
                                    <td colspan="2" class="fw-bold"><?php echo e(number_format($invoice->subtotal)); ?> تومان</td>
                                </tr>
                                <?php if($invoice->discount > 0): ?>
                                <tr>
                                    <td colspan="5" class="text-end fw-bold">تخفیف:</td>
                                    <td colspan="2" class="fw-bold text-danger">- <?php echo e(number_format($invoice->discount)); ?> تومان</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="5" class="text-end fw-bold">مالیات (9%):</td>
                                    <td colspan="2" class="fw-bold"><?php echo e(number_format($invoice->tax)); ?> تومان</td>
                                </tr>
                                <tr class="table-primary">
                                    <td colspan="5" class="text-end fw-bold fs-5">مبلغ قابل پرداخت:</td>
                                    <td colspan="2" class="fw-bold fs-5"><?php echo e(number_format($invoice->total)); ?> تومان</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <?php if($invoice->notes): ?>
                    <div class="mt-3">
                        <h6 class="text-muted mb-2">یادداشت:</h6>
                        <p class="mb-0"><?php echo e($invoice->notes); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/invoices/show.blade.php ENDPATH**/ ?>