<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST DELETE</div>
            </div>

            <hr>
            <div class="card">
                <div class="card-header">
                    <div>
                        title:<?php echo e($title = $postData->useIdForData(session()->get('postId'))[0]['title']); ?>

                    </div>
                </div>
                <div class="card-body">
                    <div>
                        sentence:<?php echo e($sentence = $postData->useIdForData(session()->get('postId'))[0]['sentence']); ?>

                    </div>
                </div>
                <br>
                <div class="btn-toolbar">
                    <div class="btn-group mx-auto">
                        <form method="POST" action="<?php echo e(route('postDelete')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="postId" value="<?php echo e(session()->get('postId')); ?>">
                            <input type="submit" class="btn btn-success" name="delete" value="delete">
                        </form>
                    </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/postDelete.blade.php ENDPATH**/ ?>