
<?php $__env->startSection('title', 'Supplier Management'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(url('/admin')); ?>">Main Menu</a> | Supplier List</h6>
            <a href="<?php echo e(route('admin.supplier.create')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm float-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add New</a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-bar','data' => ['placeholder' => 'Search by supplier email...']]); ?>
<?php $component->withName('search-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Search by supplier email...']); ?>
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
                                    <th>Supplier Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Is Active</th>
                                    <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                                    <td><?php echo e($item->supplier_name); ?></td>
                                    <td><?php echo e($item->contact_person); ?></td>
                                    <td><?php echo e($item->phone); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->address); ?></td>
                                    <td>
                                        <div x-data="{ 
                                            status: <?php echo e($item->is_active); ?>, 
                                            loading: false,
                                            async toggle() {
                                                if (this.loading) return;
                                                this.loading = true;
                                                try {
                                                    let res = await fetch('<?php echo e(route('admin.status.toggle', ['model' => 'supplier', 'id' => $item->id])); ?>', {
                                                        method: 'PATCH',
                                                        headers: {
                                                            'Content-Type': 'application/json',
                                                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                                                        }
                                                    });
                                                    let data = await res.json();
                                                    if (data.success) {
                                                        this.status = data.status;
                                                    } else {
                                                        alert(data.error || 'Failed to update status');
                                                    }
                                                } catch (e) {
                                                    console.error(e);
                                                    alert('An error occurred');
                                                } finally {
                                                    this.loading = false;
                                                }
                                            }
                                        }">
                                            <button type="button" @click="toggle" :disabled="loading" 
                                                class="btn btn-sm px-3 py-1 font-weight-bold rounded-pill text-white" 
                                                :class="status == 1 ? 'btn-success' : 'btn-secondary'" 
                                                :style="status == 1 ? 'box-shadow: 0 4px 10px rgba(40,167,69,0.3);' : 'box-shadow: none;'"
                                                style="transition: all 0.2s; min-width: 85px;">
                                                <span x-show="!loading" x-text="status == 1 ? 'Active' : 'Disabled'"></span>
                                                <span x-show="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </td>

                            <td>
                                <a href="<?php echo e(route('admin.supplier.edit', $item->id)); ?>" class="btn btn-success btn-circle btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="<?php echo e(route('admin.supplier.destroy', $item->id)); ?>">
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
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\supplier\index.blade.php ENDPATH**/ ?>