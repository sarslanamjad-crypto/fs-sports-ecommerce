<?php $__env->startSection('title', 'Add an Admin'); ?>
<?php $__env->startSection('main-container'); ?>
            <div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3"><a href="<?php echo e(url('/admin/admins-list')); ?>" class="btn btn-info">Admins</a></div>
                    <div class="card-body">
                        <form method="post" action="<?php echo e($url); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label for="inputFirstName">First Name</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="first_name" value="<?php echo e(old('first_name', isset($admin) ? $admin->first_name : '')); ?>">
                                        <span class="text-danger">
                                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <label for="inputLastName">Last Name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="last_name" value="<?php echo e(old('last_name', isset($admin) ? $admin->last_name : '')); ?>">
                                        <span class="text-danger">
                                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label for="inputEmail">Email Address</label>
                                        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" value="<?php echo e(old('email', isset($admin) ? $admin->email : '')); ?>">
                                        <span class="text-danger">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label for="inputContact">Contact Number</label>
                                        <input class="form-control" id="inputContact" type="tel" placeholder="+923451234567" name="contact" value="<?php echo e(old('contact', isset($admin) ? $admin->contact : '')); ?>">
                                        <span class="text-danger">
                                            <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label for="inputPassword">Password</label>
                                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" value="<?php echo e(old('password')); ?>">
                                        <span class="text-danger">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="confirm_password" value="<?php echo e(old('confirm_password')); ?>">
                                        <span class="text-danger">
                                            <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                <input class="btn btn-info btn-block" type="submit" value="<?php echo e(isset($admin) ? 'Update Admin Record' : 'Register an Admin'); ?>" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views/backend/admin-add.blade.php ENDPATH**/ ?>