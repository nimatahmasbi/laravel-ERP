<?php $__env->startSection('title', 'مشاهده مشتری'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-2 fw-bold">مشاهده مشتری</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('customers.index')); ?>">مشتریان</a></li>
                    <li class="breadcrumb-item active"><?php echo e($customer->name); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">اطلاعات مشتری</h5>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil ms-1"></i>
                            ویرایش
                        </a>
                        <form action="<?php echo e(route('customers.destroy', $customer)); ?>" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این مشتری اطمینان دارید؟')">
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
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">نام و نام خانوادگی</strong>
                            <p class="mb-0"><?php echo e($customer->name); ?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">نام شرکت</strong>
                            <p class="mb-0"><?php echo e($customer->company_name ?? '-'); ?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">ایمیل</strong>
                            <p class="mb-0"><?php echo e($customer->email ?? '-'); ?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">موبایل</strong>
                            <p class="mb-0"><?php echo e($customer->mobile ?? '-'); ?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">تلفن</strong>
                            <p class="mb-0"><?php echo e($customer->phone ?? '-'); ?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">وضعیت</strong>
                            <p class="mb-0">
                                <?php if($customer->is_active): ?>
                                    <span class="badge bg-success">فعال</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">غیرفعال</span>
                                <?php endif; ?>
                            </p>
                        </div>
                        <?php if($customer->national_id): ?>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">کد ملی</strong>
                            <p class="mb-0"><?php echo e($customer->national_id); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($customer->economic_code): ?>
                        <div class="col-12 col-md-6">
                            <strong class="text-muted d-block mb-1">کد اقتصادی</strong>
                            <p class="mb-0"><?php echo e($customer->economic_code); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($customer->address): ?>
                        <div class="col-12">
                            <strong class="text-muted d-block mb-1">آدرس</strong>
                            <p class="mb-0"><?php echo e($customer->address); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if($customer->notes): ?>
                        <div class="col-12">
                            <strong class="text-muted d-block mb-1">یادداشت</strong>
                            <p class="mb-0"><?php echo e($customer->notes); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">فاکتورهای مشتری</h5>
                </div>
                <div class="card-body">
                    <?php if($customer->invoices->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>شماره فاکتور</th>
                                        <th>تاریخ</th>
                                        <th>مبلغ</th>
                                        <th>وضعیت</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $customer->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($invoice->invoice_number); ?></td>
                                        <td><?php echo e(\App\Helpers\DateHelper::toJalali($invoice->invoice_date)); ?></td>
                                        <td><?php echo e(number_format($invoice->total)); ?> تومان</td>
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
                                        <td class="text-center">
                                            <a href="<?php echo e(route('invoices.show', $invoice)); ?>" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-muted text-center py-3 mb-0">هیچ فاکتوری ثبت نشده است</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/customers/show.blade.php ENDPATH**/ ?>