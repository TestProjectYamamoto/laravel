<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php echo e(Auth::user()->name); ?>さんのマイページ
                </div>

                <div class="card-body">
                    <button type="button" onclick="location.href='<?php echo e(route('newpost')); ?>'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">NEW POST</button>
                    <button type="button" onclick="location.href='<?php echo e(route('postlist')); ?>'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">POST LIST</button>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/home.blade.php ENDPATH**/ ?>