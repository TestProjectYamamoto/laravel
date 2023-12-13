<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">COMMENT DELETE</div>
            </div>

            <hr>
            <div class="card">
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
                        <?php echo e($comment = $commentData->useIdForData(session()->get('commentId'))[0]['sentence']); ?>

                    </div>
                </div>
                <br>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('commentDelete')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="commentId" value="<?php echo e(session()->get('commentId')); ?>">
                        <p>Really?</p>
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>
                </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/commentDelete.blade.php ENDPATH**/ ?>