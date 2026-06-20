<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 mb-4" style="border-radius: 16px; overflow: hidden;">
                <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background: #ffffff; border-bottom: 1px solid #e2e8f0;">
                    <h6 class="m-0 font-weight-bold" style="color: #f97316; font-size: 1rem;">
                        <i class="fas fa-key mr-2"></i>Change Password
                    </h6>
                    <a href="<?php echo e(url('/admin')); ?>" class="btn btn-sm btn-outline-secondary" style="border-radius: 8px; font-size: 0.8rem; padding: 4px 12px;">
                        Dashboard
                    </a>
                </div>
                <div class="card-body p-4" style="background-color: #ffffff;">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; background-color: #ecfdf5; border-color: #a7f3d0; color: #065f46;">
                            <i class="fas fa-check-circle mr-2"></i><?php echo e(session()->get('success')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?php echo e(route('admin.update-password')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group mb-3">
                            <label for="currentPassword" class="font-weight-bold text-dark" style="font-size: 0.85rem;">Current Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0" style="border-radius: 8px 0 0 8px;"><i class="fas fa-lock text-muted"></i></span>
                                </div>
                                <input class="form-control border-left-0" id="currentPassword" type="password" placeholder="Enter current password" name="current_password" style="border-radius: 0 8px 8px 0;" required>
                            </div>
                            <span class="text-danger small mt-1 d-block">
                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="newPassword" class="font-weight-bold text-dark" style="font-size: 0.85rem;">New Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0" style="border-radius: 8px 0 0 8px;"><i class="fas fa-key text-muted"></i></span>
                                </div>
                                <input class="form-control border-left-0" id="newPassword" type="password" placeholder="Enter new password" name="new_password" style="border-radius: 0 8px 8px 0;" required>
                            </div>
                            <span class="text-danger small mt-1 d-block">
                                <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>
                        </div>

                        <div class="form-group mb-4">
                            <label for="confirmPassword" class="font-weight-bold text-dark" style="font-size: 0.85rem;">Confirm New Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-right-0" style="border-radius: 8px 0 0 8px;"><i class="fas fa-check text-muted"></i></span>
                                </div>
                                <input class="form-control border-left-0" id="confirmPassword" type="password" placeholder="Confirm new password" name="confirm_password" style="border-radius: 0 8px 8px 0;" required>
                            </div>
                            <span class="text-danger small mt-1 d-block">
                                <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-info btn-block py-2 font-weight-bold text-uppercase" style="border-radius: 8px; letter-spacing: 0.05em;">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\change-password.blade.php ENDPATH**/ ?>