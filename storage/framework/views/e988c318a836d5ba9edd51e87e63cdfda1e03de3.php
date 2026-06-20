<?php $__env->startSection('title', 'Team Member Details'); ?>
<?php $__env->startSection('main-container'); ?>
            <div class="container-fluid"><br>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info"><a class="text-info" href="<?php echo e(url('/admin')); ?>">Main Menu</a> | Team Member Details</h6>
                        <a href="<?php echo e(url('/admin/team')); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i
                        class="fas fa-arrow-left fa-sm text-white-50"></i>Team Members List</a>
                    </div>
                    <div class="card-body">
                        <p>
                            <b>Member ID: </b> <?php echo e($team->id); ?>

                        </p>
                        <p>
                            <b>Full Name: </b> <?php echo e($team->fullname); ?>

                        </p>
                        <p>
                            <b>Designation: </b> <?php echo e($team->designation); ?>

                        </p>
                        <p>
                            <b>Short Intro: </b> <?php echo e($team->shortintro); ?>

                        </p>
                        <p>
                            <b>Long Intro: </b> <?php echo e($team->longintro); ?>

                        </p>
                        <p>
                            <b>Linkedin: </b> <?php echo e($team->linkedin); ?>

                        </p>
                        <p>
                            <b>Insta: </b> <?php echo e($team->insta); ?>

                        </p>
                        <p>
                            <b>Twitter: </b> <?php echo e($team->twitter); ?>

                        </p>
                        <p>
                            <b>Facebook: </b> <?php echo e($team->facebook); ?>

                        </p>
                        <img src="/backend/images/team/<?php echo e($team->image); ?>" class="rounded-circle" width="100px" height="100px" alt="Image Not Found">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\team-member-details.blade.php ENDPATH**/ ?>