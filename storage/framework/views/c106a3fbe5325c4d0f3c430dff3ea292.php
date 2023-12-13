<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">COMMENT UPDATE</div>
            </div>

            <hr>
            <div class="card">
                <form method="POST" action="<?php echo e(route('commentUpdate')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-header">
                        <div>
                            post/ <!-- コメントIDからポストデータ取得 -->
                            <br>
                            title:<?php echo e($postTitle = $commentData->useIdForPostData(session()->get('commentId'))[0]['title']); ?>

                            <br>
                            sentence:<?php echo e($postSentence = $commentData->useIdForPostData(session()->get('commentId'))[0]['sentence']); ?>

                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            comment: <!-- コメントIDからコメント取得 -->
                            <input type="text" name="comment" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($comment = $commentData->useIdForData(session()->get('commentId'))[0]['sentence']); ?>">

                            <?php $__errorArgs = ['comment'];
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
                        <br>
                        <input type="hidden" name="commentId" value="<?php echo e(session()->get('commentId')); ?>">
                        <input type="submit" class="btn btn-success" value="update">
                    </div>
                </form>
                <br>
            </div>

            <hr>
            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="location.href='<?php echo e(route('welcome')); ?>'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">TOP</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/commentUpdate.blade.php ENDPATH**/ ?>