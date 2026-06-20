
<?php $__env->startSection('title', 'Edit ProductReview'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.product-review.index')); ?>">ProductReview List</a> | Edit ProductReview #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.product-review.update', $item->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="product_id">Product Id</label>
                            <input type="text" name="product_id" id="product_id" class="form-control" value="<?php echo e($item->product_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo e($item->user_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo e($item->customer_name); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="rating">Rating</label>
                            <input type="text" name="rating" id="rating" class="form-control" value="<?php echo e($item->rating); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="comment">Comment</label>
                            <input type="text" name="comment" id="comment" class="form-control" value="<?php echo e($item->comment); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_visible">Is Visible</label>
                            <input type="text" name="is_visible" id="is_visible" class="form-control" value="<?php echo e($item->is_visible); ?>">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.product-review.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\product-review\edit.blade.php ENDPATH**/ ?>