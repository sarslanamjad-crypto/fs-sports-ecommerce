
<?php $__env->startSection('title', 'PaymentTransaction Management'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(url('/admin')); ?>">Main Menu</a> | PaymentTransaction List</h6>
            <a href="<?php echo e(route('admin.payment-transaction.create')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                                    <th>Order Id</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Transaction Reference</th>
                                    <th>Transaction Date</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->order_id); ?></td>
                                    <td><?php echo e($item->payment_method); ?></td>
                                    <td>
                                        <?php if($item->status == 1): ?>
                                            <span class="badge badge-success p-2">Active</span>
                                        <?php else: ?>
                                            <span class="badge badge-danger p-2">Disabled</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->transaction_reference); ?></td>
                                    <td><?php echo e($item->transaction_date); ?></td>

                            <td>
                                <a href="<?php echo e(route('admin.payment-transaction.edit', $item->id)); ?>" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="<?php echo e(route('admin.payment-transaction.destroy', $item->id)); ?>">
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
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\payment-transaction\index.blade.php ENDPATH**/ ?>