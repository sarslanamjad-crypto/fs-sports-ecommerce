
<?php $__env->startSection('title', 'Add SiteSetting'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.site-setting.index')); ?>">SiteSetting List</a> | Add SiteSetting</h6>
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
            <form action="<?php echo e(route('admin.site-setting.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="shop_name">Shop Name</label>
                            <input type="text" name="shop_name" id="shop_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="logo">Logo</label>
                            <input type="text" name="logo" id="logo" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="about_us_title">About Us Title</label>
                            <input type="text" name="about_us_title" id="about_us_title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="about_us_content">About Us Content</label>
                            <input type="text" name="about_us_content" id="about_us_content" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="store_location_data">Store Location Data</label>
                            <input type="text" name="store_location_data" id="store_location_data" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="rent_info">Rent Info</label>
                            <input type="text" name="rent_info" id="rent_info" class="form-control">
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Save Record</button>
                    <a href="<?php echo e(route('admin.site-setting.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\site-setting\create.blade.php ENDPATH**/ ?>