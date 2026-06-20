
<?php $__env->startSection('title', 'AdminAuditLog Management'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(url('/admin')); ?>">Main Menu</a> | AdminAuditLog List</h6>
            <a href="<?php echo e(route('admin.admin-audit-log.create')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
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
                                    <th>Admin Id</th>
                                    <th>Action Type</th>
                                    <th>Target Table</th>
                                    <th>Target Id</th>
                                    <th>Old Values</th>
                                    <th>New Values</th>
                                    <th>Ip Address</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->admin_id); ?></td>
                                    <td><?php echo e($item->action_type); ?></td>
                                    <td><?php echo e($item->target_table); ?></td>
                                    <td><?php echo e($item->target_id); ?></td>
                                    <td><?php echo e($item->old_values); ?></td>
                                    <td><?php echo e($item->new_values); ?></td>
                                    <td><?php echo e($item->ip_address); ?></td>

                            <td>
                                <a href="<?php echo e(route('admin.admin-audit-log.edit', $item->id)); ?>" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="<?php echo e(route('admin.admin-audit-log.destroy', $item->id)); ?>">
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
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\admin-audit-log\index.blade.php ENDPATH**/ ?>