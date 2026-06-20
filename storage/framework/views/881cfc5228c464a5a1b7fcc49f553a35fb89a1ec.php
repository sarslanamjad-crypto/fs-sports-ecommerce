<?php $__env->startSection('title', 'Add FAQ'); ?>
<?php $__env->startSection('main-container'); ?>
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success alert-block p-4 border-left-success">
                    <strong>
                        <?php echo e($message); ?>

                    </strong>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?php echo e(url('/admin/faqs')); ?>"><button class="btn btn-info">FAQs List</button></a></a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/faq-edit/<?php echo e($faqs->id); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('put'); ?>
                            <div class="form-floating mb-3">
                                <label for="question">Question</label>
                                <input class="form-control" id="question" type="text" placeholder="Enter Question" name="question" value="<?php echo e(old('question', $faqs->question)); ?>"/>
                                <?php if($errors->has('question')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('question')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="answer">Answer</label>
                                <input class="form-control" id="answer" type="text" placeholder="Enter Answer" name="answer" value="<?php echo e(old('answer', $faqs->answer)); ?>"/>
                                <?php if($errors->has('answer')): ?>
                                    <span class="text-danger">
                                        <?php echo e($errors->first('answer')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input class="btn btn-info btn-block" type="submit" value="Submit" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\faq-edit.blade.php ENDPATH**/ ?>