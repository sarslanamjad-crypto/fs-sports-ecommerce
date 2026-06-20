<?php $__env->startSection('title', 'Edit Supplier'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.supplier.index')); ?>">Supplier List</a> | Edit Supplier #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.supplier.update', $item->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="triggerLoader()">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group mb-3">
                    <label for="supplier_name">Supplier Name</label>
                    <input type="text" name="supplier_name" id="supplier_name" class="form-control" value="<?php echo e($item->supplier_name); ?>" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contact_person">Contact Person</label>
                    <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?php echo e($item->contact_person); ?>">
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
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo e($item->address); ?>">
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
                    <a href="<?php echo e(route('admin.supplier.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\supplier\edit.blade.php ENDPATH**/ ?>