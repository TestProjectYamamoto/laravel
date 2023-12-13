<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST LIST</div>
            </div>

            <div class="card"> <!-- 検索エリア -->
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('searchPost')); ?>">
                        <?php echo csrf_field(); ?>
                        Serch Post /
                        <br>
                        title:
                        <input type="text" class="form-control" name="searchTitle">
                        <br>
                        sentence:
                        <input type="text" class="form-control" name="searchSentence">
                        <input type="submit" class="btn btn-success" value="search">
                    </form>
                </div>
            </div>
            <br>

            <table class="table">
                <?php $__currentLoopData = $postsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <br>
                <tr>
                    <a class="card btn" onclick="location.href='<?php echo e(route('postditail', ['id' => $post->id])); ?>' ">
                        <div class="card-header">
                            <span>
                                title:<?php echo e($post->title); ?>

                            </span>
                            /
                            <span>
                                user:<?php echo e($name = $userData->useUidForData($post->user_uid)[0]["name"]); ?>

                            </span>
                        </div>

                        <div class="card-body">
                            <span><?php echo e($post->sentence); ?></span>
                        </div>
                    </a>
                </tr>
              
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <br>

            <p><?php echo $postsData->render(); ?></p>

            <div class="card">
                <div class="card-body">
                    <button type="button" onclick="location.href='<?php echo e(route('welcome')); ?>'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">TOP</button>
                    <button type="button" onclick="location.href='<?php echo e(route('home')); ?>'" class="inline-flex items-center dark:bg-gray-200 border border-transparent rounded-md font-semibold">HOME</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/postlist.blade.php ENDPATH**/ ?>