<?php $__env->startSection('title', 'Edit ProductsInventory'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(route('admin.products-inventory.index')); ?>">ProductsInventory List</a> | Edit ProductsInventory #<?php echo e($item->id); ?></h6>
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
            <form action="<?php echo e(route('admin.products-inventory.update', $item->id)); ?>" method="POST" enctype="multipart/form-data" onsubmit="triggerLoader()">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                        <div class="form-group mb-3">
                            <label for="category_id">Category Id</label>
                            <input type="text" name="category_id" id="category_id" class="form-control" value="<?php echo e($item->category_id); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php echo e($item->title); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"><?php echo e($item->description); ?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Product Image</label>
                            <?php if($item->image): ?>
                                <div class="mb-2">
                                    <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" style="max-height: 150px; border-radius: 8px;">
                                    <p class="text-muted mt-1"><small>Current image: <?php echo e($item->image); ?></small></p>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <small class="form-text text-muted">Upload a new image to replace. Leave empty to keep current. Max 2MB.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" value="<?php echo e($item->price); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="discount_percentage">Discount Percentage (%)</label>
                            <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="<?php echo e($item->discount_percentage); ?>" min="0" max="100" placeholder="e.g. 10">
                        </div>
                        <div class="form-group mb-3">
                            <label for="current_stock">Current Stock</label>
                            <input type="text" name="current_stock" id="current_stock" class="form-control" value="<?php echo e($item->current_stock); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_activated">Is Activated</label>
                            <select name="is_activated" id="is_activated" class="form-control">
                                <option value="1" <?php echo e($item->is_activated == 1 ? 'selected' : ''); ?>>Active</option>
                                <option value="0" <?php echo e($item->is_activated == 0 ? 'selected' : ''); ?>>Disabled</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="is_in_house_brand">Is In House Brand</label>
                            <select name="is_in_house_brand" id="is_in_house_brand" class="form-control">
                                <option value="1" <?php echo e($item->is_in_house_brand == 1 ? 'selected' : ''); ?>>Yes</option>
                                <option value="0" <?php echo e($item->is_in_house_brand == 0 ? 'selected' : ''); ?>>No</option>
                            </select>
                        </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Update Record</button>
                    <a href="<?php echo e(route('admin.products-inventory.index')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\products-inventory\edit.blade.php ENDPATH**/ ?>