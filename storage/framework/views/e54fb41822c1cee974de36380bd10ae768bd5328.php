<?php $__env->startSection('title', 'Add Team Member'); ?>
<?php $__env->startSection('main-container'); ?>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success alert-block p-4 border-left-success">
                    <strong>
                        <?php echo e($message); ?>

                    </strong>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?php echo e(url('/admin/team')); ?>"><button class="btn btn-info">Team Member List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/team-add" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-floating mb-3">
                                <label for="fullname">Full Name</label>
                                <input class="form-control" id="fullname" type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo e(old('fullname')); ?>">
                                <?php if($errors->has('fullname')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('fullname')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="text" placeholder="Enter Email Address" name="email" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('email')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="designation">Designation</label>
                                <input class="form-control" id="designation" type="text" placeholder="Enter Designation" name="designation" value="<?php echo e(old('designation')); ?>">
                                <?php if($errors->has('designation')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('designation')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="introduction">Short Introduction</label>
                                <input class="form-control" id="introduction" type="text" placeholder="Enter Short Introduction" name="shortintro" value="<?php echo e(old('shortintro')); ?>">
                                <?php if($errors->has('shortintro')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('shortintro')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="introduction_long">Long Introduction</label>
                                <textarea class="form-control" id="introduction_long" type="text" name="longintro" placeholder="Enter Long Introduction" value="<?php echo e(old('longintro')); ?>"></textarea>
                                <?php if($errors->has('longintro')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('longintro')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="twitter">Twitter</label>
                                <input class="form-control" id="twitter" type="text" placeholder="Enter Twitter Profile" name="twitter" value="<?php echo e(old('twitter')); ?>"/>
                                <?php if($errors->has('twitter')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('twitter')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="fb">Facebook</label>
                                <input class="form-control" id="fb" type="text" placeholder="Enter Facebook Profile" name="facebook" value="<?php echo e(old('facebook')); ?>">
                                <?php if($errors->has('facebook')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('facebook')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="insta">Instagram</label>
                                <input class="form-control" id="insta" type="text" placeholder="Enter Insta Profile" name="insta" value="<?php echo e(old('insta')); ?>">
                                <?php if($errors->has('insta')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('insta')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="linkedin">Linkedin</label>
                                <input class="form-control" id="linkedin" type="text" placeholder="Enter Linkedin Profile" name="linkedin" value="<?php echo e(old('linkedin')); ?>">
                                <?php if($errors->has('linkedin')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('linkedin')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="image">Image</label>
                                <input class="form-control" id="image" type="file" accept=".png, .jpg, .jpeg" name="image" value="<?php echo e(old('image')); ?>" style="padding-bottom:38px">
                                <?php if($errors->has('image')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('image')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-info btn-block" type="submit" value="Add Member" name="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views/backend/team-add.blade.php ENDPATH**/ ?>