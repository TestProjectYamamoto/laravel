<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">仮登録が完了しました!</div>

                <div class="card-body">
                    <p>添付URLから本登録を完了させてください。</p>

                    <?php if(isset($content)): ?>
                    <a href='<?php echo e($content); ?>'><?php echo e($content); ?></a>
                    <br><hr>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/sendmailUnregistered.blade.php ENDPATH**/ ?>