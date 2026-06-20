
<?php $__env->startSection('title', 'Edit FinanceReport'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.finance-report.index')); ?>">FinanceReport List</a> | Edit FinanceReport #<?php echo e($item->id); ?></h6>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('admin.finance-report.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="branch_id">Branch Id</label>
                            <input type="text" name="branch_id" id="branch_id" class="form-control" value="<?php echo e($item->branch_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="total_revenue">Total Revenue</label>
                            <input type="text" name="total_revenue" id="total_revenue" class="form-control" value="<?php echo e($item->total_revenue); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cash_total">Cash Total</label>
                            <input type="text" name="cash_total" id="cash_total" class="form-control" value="<?php echo e($item->cash_total); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="debit_total">Debit Total</label>
                            <input type="text" name="debit_total" id="debit_total" class="form-control" value="<?php echo e($item->debit_total); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="report_date">Report Date</label>
                            <input type="date" name="report_date" id="report_date" class="form-control" value="<?php echo e($item->report_date); ?>">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.finance-report.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\finance-report\edit.blade.php ENDPATH**/ ?>