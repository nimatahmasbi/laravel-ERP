<?php $__env->startSection('title', 'ویرایش فاکتور'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-3 px-md-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-2 fw-bold">ویرایش فاکتور</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">داشبورد</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('invoices.index')); ?>">فاکتورها</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('invoices.show', $invoice)); ?>"><?php echo e($invoice->invoice_number); ?></a></li>
                    <li class="breadcrumb-item active">ویرایش</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 fw-bold">ویرایش فاکتور شماره <?php echo e($invoice->invoice_number); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('invoices.update', $invoice)); ?>" method="POST" id="invoiceForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-4">
                                <label for="customer_id" class="form-label">مشتری <span class="text-danger">*</span></label>
                                <select class="form-select <?php $__errorArgs = ['customer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="customer_id" name="customer_id" required>
                                    <option value="">انتخاب مشتری</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>" <?php echo e(old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : ''); ?>>
                                            <?php echo e($customer->name); ?> <?php if($customer->company_name): ?> - <?php echo e($customer->company_name); ?> <?php endif; ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['customer_id'];
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

                            <div class="col-12 col-md-4">
                                <label for="invoice_date" class="form-label">تاریخ فاکتور <span class="text-danger">*</span></label>
                                <input type="date" class="form-control <?php $__errorArgs = ['invoice_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="invoice_date" name="invoice_date" value="<?php echo e(old('invoice_date', $invoice->invoice_date->format('Y-m-d'))); ?>" required>
                                <?php $__errorArgs = ['invoice_date'];
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

                            <div class="col-12 col-md-4">
                                <label for="due_date" class="form-label">تاریخ سررسید</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="due_date" name="due_date" value="<?php echo e(old('due_date', $invoice->due_date ? $invoice->due_date->format('Y-m-d') : '')); ?>">
                                <?php $__errorArgs = ['due_date'];
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

                            <div class="col-12 col-md-4">
                                <label for="status" class="form-label">وضعیت <span class="text-danger">*</span></label>
                                <select class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" required>
                                    <option value="draft" <?php echo e(old('status', $invoice->status) == 'draft' ? 'selected' : ''); ?>>پیش‌نویس</option>
                                    <option value="sent" <?php echo e(old('status', $invoice->status) == 'sent' ? 'selected' : ''); ?>>ارسال شده</option>
                                    <option value="paid" <?php echo e(old('status', $invoice->status) == 'paid' ? 'selected' : ''); ?>>پرداخت شده</option>
                                    <option value="cancelled" <?php echo e(old('status', $invoice->status) == 'cancelled' ? 'selected' : ''); ?>>لغو شده</option>
                                </select>
                                <?php $__errorArgs = ['status'];
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

                        <hr>

                        <div class="mb-3">
                            <h5 class="fw-bold mb-3">آیتم‌های فاکتور</h5>
                            <div id="itemsContainer">
                                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item-row card mb-3 p-3">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">محصول <span class="text-danger">*</span></label>
                                            <select class="form-select product-select" name="items[<?php echo e($index); ?>][product_id]" required>
                                                <option value="">انتخاب محصول</option>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($product->id); ?>" data-price="<?php echo e($product->price); ?>" data-unit="<?php echo e($product->unit); ?>" <?php echo e($item->product_id == $product->id ? 'selected' : ''); ?>>
                                                        <?php echo e($product->name); ?> - <?php echo e(number_format($product->price)); ?> تومان
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label class="form-label">تعداد <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control quantity-input" name="items[<?php echo e($index); ?>][quantity]" min="1" value="<?php echo e($item->quantity); ?>" required>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label class="form-label">قیمت واحد <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control unit-price-input" name="items[<?php echo e($index); ?>][unit_price]" min="0" value="<?php echo e($item->unit_price); ?>" required>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label class="form-label">تخفیف</label>
                                            <input type="number" step="0.01" class="form-control discount-input" name="items[<?php echo e($index); ?>][discount]" min="0" value="<?php echo e($item->discount); ?>">
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <label class="form-label">جمع</label>
                                            <input type="text" class="form-control item-total" readonly value="<?php echo e(number_format($item->total)); ?> تومان">
                                            <button type="button" class="btn btn-sm btn-danger mt-2 w-100 remove-item" <?php echo e($invoice->items->count() == 1 ? 'style="display: none;"' : ''); ?>>
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <button type="button" class="btn btn-outline-primary" id="addItem">
                                <i class="bi bi-plus-circle ms-1"></i>
                                افزودن آیتم
                            </button>
                        </div>

                        <hr>

                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label for="discount" class="form-label">تخفیف کل (تومان)</label>
                                <input type="number" step="0.01" class="form-control" id="totalDiscount" name="discount" min="0" value="<?php echo e(old('discount', $invoice->discount)); ?>">
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card bg-light p-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>جمع کل:</span>
                                        <span id="subtotal"><?php echo e(number_format($invoice->subtotal)); ?> تومان</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>تخفیف:</span>
                                        <span id="discountAmount"><?php echo e(number_format($invoice->discount)); ?> تومان</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>مالیات (9%):</span>
                                        <span id="taxAmount"><?php echo e(number_format($invoice->tax)); ?> تومان</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold fs-5">
                                        <span>قابل پرداخت:</span>
                                        <span id="totalAmount"><?php echo e(number_format($invoice->total)); ?> تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">یادداشت</label>
                            <textarea class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="notes" name="notes" rows="3"><?php echo e(old('notes', $invoice->notes)); ?></textarea>
                            <?php $__errorArgs = ['notes'];
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

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?php echo e(route('invoices.show', $invoice)); ?>" class="btn btn-secondary">
                                <i class="bi bi-x-circle ms-1"></i>
                                انصراف
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle ms-1"></i>
                                ذخیره تغییرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
let itemIndex = <?php echo e($invoice->items->count()); ?>;

document.getElementById('addItem').addEventListener('click', function() {
    const container = document.getElementById('itemsContainer');
    const newItem = container.firstElementChild.cloneNode(true);
    
    newItem.querySelectorAll('input, select').forEach(input => {
        if (input.name) {
            input.name = input.name.replace(/\[\d+\]/, '[' + itemIndex + ']');
        }
        if (input.classList.contains('product-select')) {
            input.value = '';
        } else if (input.classList.contains('quantity-input')) {
            input.value = 1;
        } else if (input.classList.contains('unit-price-input')) {
            input.value = '';
        } else if (input.classList.contains('discount-input')) {
            input.value = 0;
        } else if (input.classList.contains('item-total')) {
            input.value = '0 تومان';
        }
    });
    
    newItem.querySelector('.remove-item').style.display = 'block';
    container.appendChild(newItem);
    itemIndex++;
    
    attachItemEvents(newItem);
});

document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-item')) {
        const itemRow = e.target.closest('.item-row');
        if (document.getElementById('itemsContainer').children.length > 1) {
            itemRow.remove();
            calculateTotals();
        }
    }
});

function attachItemEvents(itemRow) {
    const productSelect = itemRow.querySelector('.product-select');
    const quantityInput = itemRow.querySelector('.quantity-input');
    const unitPriceInput = itemRow.querySelector('.unit-price-input');
    const discountInput = itemRow.querySelector('.discount-input');
    
    productSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
            unitPriceInput.value = selectedOption.dataset.price;
            calculateItemTotal(itemRow);
        }
    });
    
    [quantityInput, unitPriceInput, discountInput].forEach(input => {
        input.addEventListener('input', function() {
            calculateItemTotal(itemRow);
        });
    });
}

function calculateItemTotal(itemRow) {
    const quantity = parseFloat(itemRow.querySelector('.quantity-input').value) || 0;
    const unitPrice = parseFloat(itemRow.querySelector('.unit-price-input').value) || 0;
    const discount = parseFloat(itemRow.querySelector('.discount-input').value) || 0;
    
    const subtotal = (unitPrice * quantity) - discount;
    const tax = subtotal * 0.09;
    const total = subtotal + tax;
    
    itemRow.querySelector('.item-total').value = new Intl.NumberFormat('fa-IR').format(total) + ' تومان';
    calculateTotals();
}

function calculateTotals() {
    let subtotal = 0;
    
    document.querySelectorAll('.item-row').forEach(itemRow => {
        const quantity = parseFloat(itemRow.querySelector('.quantity-input').value) || 0;
        const unitPrice = parseFloat(itemRow.querySelector('.unit-price-input').value) || 0;
        const discount = parseFloat(itemRow.querySelector('.discount-input').value) || 0;
        
        subtotal += (unitPrice * quantity) - discount;
    });
    
    const totalDiscount = parseFloat(document.getElementById('totalDiscount').value) || 0;
    const finalSubtotal = subtotal - totalDiscount;
    const tax = finalSubtotal * 0.09;
    const total = finalSubtotal + tax;
    
    document.getElementById('subtotal').textContent = new Intl.NumberFormat('fa-IR').format(subtotal) + ' تومان';
    document.getElementById('discountAmount').textContent = new Intl.NumberFormat('fa-IR').format(totalDiscount) + ' تومان';
    document.getElementById('taxAmount').textContent = new Intl.NumberFormat('fa-IR').format(tax) + ' تومان';
    document.getElementById('totalAmount').textContent = new Intl.NumberFormat('fa-IR').format(total) + ' تومان';
}

document.getElementById('totalDiscount').addEventListener('input', calculateTotals);

document.querySelectorAll('.item-row').forEach(itemRow => {
    attachItemEvents(itemRow);
    calculateItemTotal(itemRow);
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/hassankhosrojerdi/Desktop/ERP/resources/views/invoices/edit.blade.php ENDPATH**/ ?>