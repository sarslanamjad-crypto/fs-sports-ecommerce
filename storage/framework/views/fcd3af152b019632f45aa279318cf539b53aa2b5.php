<?php $__env->startSection('title', 'Admins List'); ?>
<?php $__env->startSection('main-container'); ?>
            <div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?php echo e(url('admin/register')); ?>"><button class="btn btn-info">Add New Admin</button></a></a>
                    </div>
                    <div class="card-body">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.search-bar','data' => ['placeholder' => 'Search by admin email...']]); ?>
<?php $component->withName('search-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Search by admin email...']); ?>
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->id); ?></td>
                                    <td><?php echo e($value->first_name); ?></td>
                                    <td><?php echo e($value->last_name); ?></td>
                                    <td><?php echo e($value->email); ?></td>
                                    <td><?php echo e($value->contact); ?></td>
                                     <td>
                                         <div x-data="{ 
                                             status: <?php echo e($value->status); ?>, 
                                             loading: false,
                                             async toggle() {
                                                 if (this.loading) return;
                                                 this.loading = true;
                                                 try {
                                                     let res = await fetch('<?php echo e(route('admin.status.toggle', ['model' => 'admin', 'id' => $value->id])); ?>', {
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
                                                 :class="status == 1 ? 'btn-success' : 'btn-danger'" 
                                                 :style="status == 1 ? 'box-shadow: 0 4px 10px rgba(40,167,69,0.3);' : 'box-shadow: 0 4px 10px rgba(220,53,69,0.3);'"
                                                 style="transition: all 0.2s; min-width: 85px;">
                                                 <span x-show="!loading" x-text="status == 1 ? 'Active' : 'Disabled'"></span>
                                                 <span x-show="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                             </button>
                                         </div>
                                     </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.edit', ['id'=> $value->id])); ?>" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.delete', ['id'=> $value->id])); ?>" class="btn btn-danger btn-circle btn-sm" onClick="return confirm('Are you sure you want to Delete Record')"; title="Delete Record">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\admins-list.blade.php ENDPATH**/ ?>