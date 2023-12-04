<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST DITAIL</div>
            </div>

            <hr>
            <div class="card">
                <?php $__currentLoopData = $postData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-header">
                    <div>title:<?php echo e($post->title); ?></div>
                    <div>name:<?php echo e($name = $userData->useUidForData($post->user_uid)[0]["name"]); ?></div>
                </div>
                <div class="card-body">
                    <div><?php echo e($post->sentence); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($post->user_uid === Auth::user()->uid): ?>
                <div class="btn-toolbar">
                    <div class="btn-group mx-auto">
                        <form method="POST" action="<?php echo e(route('postUpdateView')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="postId" value="<?php echo e($post->id); ?>">
                            <input type="submit" class="btn btn-success" name="update" value="編集">
                        </form>
                        <form method="POST" action="<?php echo e(route('postDeleteView')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="postId" value="<?php echo e($post->id); ?>">
                            <input type="submit" class="btn btn-danger" name="delete" value="削除">
                        </form>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <br>
            <!-- コメント入力欄 -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('newcomment')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex">
                            <div class="row mb-3">
                                <label for="comment" class="col-md-4 col-form-label text-md-end"><?php echo e(__('comment')); ?></label>

                                <div class="col-md-6">
                                    <input id="comment" class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="comment">

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
                            </div>

                            <div class="row mb-0">
                                <input type="hidden" name="postId" value="<?php echo e($post->id); ?>">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('send')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>


            <table class="table" style="width: 1000px; max-width: 0 auto;"> <!-- コメント一覧 -->
                <?php $__currentLoopData = $commentsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <tr>
                        <div class="card-header">
                            user:<?php echo e($name = $userData->useUidForData($comment->user_uid)[0]["name"]); ?>

                        </div>
                        <div class="card-body">
                            <?php echo e($comment->sentence); ?>

                        </div>

                        <?php if(Auth::user()->uid === $comment->user_uid): ?> <!-- コメント編集ボタン表示・非表示 -->
                        <div class="btn-toolbar">
                            <div class="btn-group mx-auto">
                                <form method="POST" action="<?php echo e(route('commentUpdateView')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="commentId" value="<?php echo e($comment->id); ?>">
                                    <input type="submit" class="btn btn-success" name="updateComment" value="update">
                                </form>
                                <form method="POST" action="<?php echo e(route('commentDeleteView')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="commentId" value="<?php echo e($comment->id); ?>">
                                    <input type="submit" class="btn btn-danger" name="deleteComment" value="delete">
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                    </tr>
                </div>
                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>

            <p><?php echo $commentsData->render(); ?></p>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/postditail.blade.php ENDPATH**/ ?>