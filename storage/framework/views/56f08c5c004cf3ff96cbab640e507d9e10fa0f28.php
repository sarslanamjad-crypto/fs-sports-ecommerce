
<?php $__env->startSection('title', 'Edit ManufacturingPartner'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.manufacturing-partner.index')); ?>">ManufacturingPartner List</a> | Edit ManufacturingPartner #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.manufacturing-partner.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="organization_name">Organization Name</label>
                            <input type="text" name="organization_name" id="organization_name" class="form-control" value="<?php echo e($item->organization_name); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="contract_start_date">Contract Start Date</label>
                            <input type="date" name="contract_start_date" id="contract_start_date" class="form-control" value="<?php echo e($item->contract_start_date); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="quality_score">Quality Score</label>
                            <input type="text" name="quality_score" id="quality_score" class="form-control" value="<?php echo e($item->quality_score); ?>">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.manufacturing-partner.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\manufacturing-partner\edit.blade.php ENDPATH**/ ?>