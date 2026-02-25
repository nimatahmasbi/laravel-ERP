<?php $__env->startSection('title', 'داشبورد'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid px-3 px-md-4 py-4">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3 mb-2 fw-bold">داشبورد</h1>
                <p class="text-muted mb-0">خوش آمدید به سیستم مدیریت یکپارچه</p>
            </div>
        </div>

        <div class="row g-3 g-md-4 mb-4">
            <div class="col-6 col-md-3">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-people fs-4 text-primary"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">مشتریان فعال</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($customersCount)); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stats-card success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-box fs-4 text-success"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">محصولات فعال</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($productsCount)); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stats-card info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-file-earmark-text fs-4 text-info"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">کل فاکتورها</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($invoicesCount)); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stats-card warning h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-cash-coin fs-4 text-warning"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">درآمد کل</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($totalRevenue)); ?> <small
                                        class="fs-6">تومان</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 g-md-4 mb-4">
            <div class="col-6 col-md-3">
                <div class="card stats-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-hourglass-split fs-4 text-danger"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">فاکتورهای در انتظار</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($pendingInvoices)); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stats-card danger h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-exclamation-triangle fs-4 text-danger"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">محصولات کم‌موجود</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($lowStockProducts)); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stats-card success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-calendar-month fs-4 text-success"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">درآمد این ماه</h6>
                                <h3 class="mb-0 fw-bold"><?php echo e(number_format($monthlyRevenue)); ?> <small
                                        class="fs-6">تومان</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card stats-card info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-check-circle fs-4 text-info"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="text-muted mb-1 small">فاکتورهای پرداخت شده</h6>
                                <h3 class="mb-0 fw-bold">
                                    <?php echo e(number_format(\App\Models\Invoice::where('status', 'paid')->count())); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 g-md-4">
            <div class="col-12 col-lg-8">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-clock-history ms-2"></i>
                            فاکتورهای اخیر
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if($recentInvoices->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>شماره فاکتور</th>
                                            <th>مشتری</th>
                                            <th>تاریخ</th>
                                            <th>مبلغ</th>
                                            <th>وضعیت</th>
                                            <th class="text-center">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('invoices.show', $invoice)); ?>"
                                                        class="text-decoration-none fw-bold">
                                                        <?php echo e($invoice->invoice_number); ?>

                                                    </a>
                                                </td>
                                                <td><?php echo e($invoice->customer->name); ?></td>
                                                <td><?php echo e(\App\Helpers\DateHelper::toJalali($invoice->invoice_date)); ?></td>
                                                <td class="fw-bold"><?php echo e(number_format($invoice->total)); ?> تومان</td>
                                                <td>
                                                    <?php
                                                        $statusClasses = [
                                                            'draft' => 'bg-secondary',
                                                            'sent' => 'bg-info',
                                                            'paid' => 'bg-success',
                                                            'cancelled' => 'bg-danger',
                                                        ];
                                                        $statusLabels = [
                                                            'draft' => 'پیش‌نویس',
                                                            'sent' => 'ارسال شده',
                                                            'paid' => 'پرداخت شده',
                                                            'cancelled' => 'لغو شده',
                                                        ];
                                                    ?>
                                                    <span
                                                        class="badge <?php echo e($statusClasses[$invoice->status] ?? 'bg-secondary'); ?>">
                                                        <?php echo e($statusLabels[$invoice->status] ?? $invoice->status); ?>

                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo e(route('invoices.show', $invoice)); ?>"
                                                        class="btn btn-sm btn-info" title="مشاهده">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <a href="<?php echo e(route('invoices.index')); ?>" class="btn btn-outline-primary">
                                    مشاهده همه فاکتورها
                                </a>
                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center py-5 mb-0">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                هیچ فاکتوری ثبت نشده است
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-info-circle ms-2"></i>
                            اطلاعات سریع
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar3 me-2 text-primary fs-5"></i>
                                    <div class="flex-grow-1">
                                        <strong class="d-block">تاریخ امروز</strong>
                                        <span class="text-muted small"><?php echo e(\App\Helpers\DateHelper::today()); ?></span>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-clock me-2 text-info fs-5"></i>
                                    <div class="flex-grow-1">
                                        <strong class="d-block">ساعت</strong>
                                        <span class="text-muted small"><?php echo e(date('H:i')); ?></span>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 text-success fs-5"></i>
                                    <div class="flex-grow-1">
                                        <strong class="d-block">کاربر فعلی</strong>
                                        <span class="text-muted small"><?php echo e(auth()->user()->name); ?></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope me-2 text-warning fs-5"></i>
                                    <div class="flex-grow-1">
                                        <strong class="d-block">ایمیل</strong>
                                        <span class="text-muted small"><?php echo e(auth()->user()->email); ?></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php if($lowStockProducts > 0): ?>
                    <div class="card mt-3 border-warning">
                        <div class="card-header bg-warning bg-opacity-10">
                            <h5 class="mb-0 fw-bold text-warning">
                                <i class="bi bi-exclamation-triangle ms-2"></i>
                                هشدار موجودی
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-2">تعداد <strong><?php echo e($lowStockProducts); ?></strong> محصول موجودی کم دارد.</p>
                            <a href="<?php echo e(route('products.index')); ?>?low_stock=1" class="btn btn-sm btn-warning">
                                <i class="bi bi-box-arrow-left ms-1"></i>
                                مشاهده محصولات
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/dashboard.blade.php ENDPATH**/ ?>