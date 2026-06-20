
<?php $__env->startSection('title', 'Edit OnlinePaymentLog'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.online-payment-log.index')); ?>">OnlinePaymentLog List</a> | Edit OnlinePaymentLog #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.online-payment-log.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="order_id">Order Id</label>
                            <input type="text" name="order_id" id="order_id" class="form-control" value="<?php echo e($item->order_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gateway_name">Gateway Name</label>
                            <input type="text" name="gateway_name" id="gateway_name" class="form-control" value="<?php echo e($item->gateway_name); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="response_code">Response Code</label>
                            <input type="text" name="response_code" id="response_code" class="form-control" value="<?php echo e($item->response_code); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="payment_status">Payment Status</label>
                            <input type="text" name="payment_status" id="payment_status" class="form-control" value="<?php echo e($item->payment_status); ?>">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.online-payment-log.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\online-payment-log\edit.blade.php ENDPATH**/ ?>