<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST UPDATE</div>
            </div>

            <hr>
            <div class="card">
                <form method="POST" action="<?php echo e(route('postUpdate')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div>
                            title:
                            <input type="text" class="form-control <?php $__errorArgs = ['postTitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" value="<?php echo e($title = $postData->useIdForData(session()->get('postId'))[0]['title']); ?>">

                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            sentence:
                            <input type="text" class="form-control <?php $__errorArgs = ['postSentence'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sentence" value="<?php echo e($sentence = $postData->useIdForData(session()->get('postId'))[0]['sentence']); ?>">

                            <?php $__errorArgs = ['sentence'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <br>
                    <div class="btn-toolbar">
                        <div class="btn-group mx-auto">
                            <form method="POST">
                                <input type="hidden" name="postId" value="<?php echo e(session()->get('postId')); ?>">
                                <input type="submit" class="btn btn-success" name="update" value="update">
                            </form>
                        </div>
                    </div>
                </form>
                <br>
            </div>



            <hr>
            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="location.href='<?php echo e(route('welcome')); ?>' ">TOP</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/postUpdate.blade.php ENDPATH**/ ?>