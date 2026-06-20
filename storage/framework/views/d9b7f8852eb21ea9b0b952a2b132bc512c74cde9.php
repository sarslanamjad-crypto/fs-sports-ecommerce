<?php $__env->startSection('title', 'Edit Project'); ?>
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
                        <a href="<?php echo e(url('/admin/projects')); ?>"><button class="btn btn-info">Projects List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/project-edit/<?php echo e($project->id); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input class="form-control" id="title" type="text" placeholder="Enter Project Title" name="title" value="<?php echo e(old('title', $project->title)); ?>">
                                <?php if($errors->has('title')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('title')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="details">Details</label>
                                <input class="form-control" id="details" type="text" placeholder="Enter Project Details" name="details" value="<?php echo e(old('details', $project->details)); ?>">
                                <?php if($errors->has('details')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('details')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="category">Category</label>
                                <input class="form-control" id="category" type="text" placeholder="Enter Project Category" name="category" value="<?php echo e(old('category', $project->category)); ?>">
                                <?php if($errors->has('category')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('category')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="client">Client</label>
                                <input class="form-control" id="client" type="text" placeholder="Enter Project Client" name="client" value="<?php echo e(old('client', $project->client)); ?>">
                                <?php if($errors->has('client')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('client')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="link">Link</label>
                                <input class="form-control" id="link" type="text" placeholder="Enter Project Client" name="link" value="<?php echo e(old('link', $project->link)); ?>"/>
                                <?php if($errors->has('link')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('link')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="technology">Technology</label>
                                <input class="form-control" id="fb" type="text" placeholder="Enter Project Technology" name="technology" value="<?php echo e(old('technology', $project->technology)); ?>">
                                <?php if($errors->has('technology')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('technology')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="image">Image</label>
                                <input class="form-control" id="image" type="file" name="image" value="<?php echo e(old('image', $project->image)); ?>" style="padding-bottom:38px">
                                <?php if($errors->has('image')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('image')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-info btn-block" type="submit" value="Update Project" name="submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\project-edit.blade.php ENDPATH**/ ?>