<?php $__env->startSection('title', 'Edit OrdersTransaction'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.orders-transaction.index')); ?>">OrdersTransaction List</a> | Edit OrdersTransaction #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.orders-transaction.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo e($item->user_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_reference_id">Order Reference Id</label>
                            <input type="text" name="order_reference_id" id="order_reference_id" class="form-control" value="<?php echo e($item->order_reference_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="total_amount">Total Amount</label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control" value="<?php echo e($item->total_amount); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="order_status">Order Status</label>
                            <select name="order_status" id="order_status" class="form-control">
                                <option value="pending" <?php echo e($item->order_status == 'pending' ? 'selected' : ''); ?>>pending</option>
                                <option value="confirmed" <?php echo e($item->order_status == 'confirmed' ? 'selected' : ''); ?>>confirmed</option>
                                <option value="delivered" <?php echo e($item->order_status == 'delivered' ? 'selected' : ''); ?>>delivered</option>
                            </select>
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.orders-transaction.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\orders-transaction\edit.blade.php ENDPATH**/ ?>