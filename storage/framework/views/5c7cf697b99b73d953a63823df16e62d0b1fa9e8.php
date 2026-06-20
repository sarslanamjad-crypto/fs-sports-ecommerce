<?php $__env->startSection('title', 'Edit StaffManagement'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.staff-management.index')); ?>">StaffManagement List</a> | Edit StaffManagement #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.staff-management.update', $item->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="triggerLoader()">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group mb-3">
                    <label for="staff_name">Staff Name</label>
                    <input type="text" name="staff_name" id="staff_name" class="form-control" value="<?php echo e($item->staff_name); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" id="designation" class="form-control" value="<?php echo e($item->designation); ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e($item->phone); ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo e($item->email); ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="joining_date">Joining Date</label>
                    <input type="date" name="joining_date" id="joining_date" class="form-control" value="<?php echo e($item->joining_date); ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="is_active">Is Active</label>
                    <select name="is_active" id="is_active" class="w-full rounded-lg bg-slate-900 border border-slate-800 text-white p-2.5 focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                        <option value="1" <?php echo e(old('is_active', $item->is_active ?? '1') == 1 ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('is_active', $item->is_active ?? '1') == 0 ? 'selected' : ''); ?>>Disabled</option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.staff-management.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\staff-management\edit.blade.php ENDPATH**/ ?>