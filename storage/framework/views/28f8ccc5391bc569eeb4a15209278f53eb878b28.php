<?php $__env->startSection('title', 'Product Reviews'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(url('/admin')); ?>">Main Menu</a> | Product Reviews List</h6>
            <a href="<?php echo e(route('admin.product-review.create')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-bar','data' => ['placeholder' => 'Search by Product ID...']]); ?>
<?php $component->withName('search-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Search by Product ID...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                                    <th>Product Id</th>
                                    <th>User Id</th>
                                    <th>Customer Name</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Is Visible</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->product_id); ?></td>
                                    <td><?php echo e($item->user_id); ?></td>
                                    <td><?php echo e($item->customer_name); ?></td>
                                    <td><?php echo e($item->rating); ?></td>
                                    <td><?php echo e($item->comment); ?></td>
                                    <td>
                                        <?php if($item->is_visible): ?>
                                            <span class="badge badge-success">Visible</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary">Hidden</span>
                                        <?php endif; ?>
                                    </td>

                            <td>
                                <form method="post" class="d-inline" action="<?php echo e(route('admin.product-review.toggle', $item->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-<?php echo e($item->is_visible ? 'warning' : 'primary'); ?> btn-circle btn-sm" title="<?php echo e($item->is_visible ? 'Hide Review' : 'Show Review'); ?>"><i class="fas fa-eye<?php echo e($item->is_visible ? '-slash' : ''); ?>"></i></button>
                                </form>
                                <a href="<?php echo e(route('admin.product-review.edit', $item->id)); ?>" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="<?php echo e(route('admin.product-review.destroy', $item->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record?');" title="Delete Record"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\product-review\index.blade.php ENDPATH**/ ?>