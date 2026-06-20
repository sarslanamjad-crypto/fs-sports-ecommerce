
<?php $__env->startSection('title', 'Edit AuditTrail'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.audit-trail.index')); ?>">AuditTrail List</a> | Edit AuditTrail #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.audit-trail.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo e($item->user_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="event">Event</label>
                            <input type="text" name="event" id="event" class="form-control" value="<?php echo e($item->event); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="old_values">Old Values</label>
                            <input type="text" name="old_values" id="old_values" class="form-control" value="<?php echo e($item->old_values); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="new_values">New Values</label>
                            <input type="text" name="new_values" id="new_values" class="form-control" value="<?php echo e($item->new_values); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="ip_address">Ip Address</label>
                            <input type="text" name="ip_address" id="ip_address" class="form-control" value="<?php echo e($item->ip_address); ?>">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.audit-trail.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\audit-trail\edit.blade.php ENDPATH**/ ?>