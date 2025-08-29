<?php $__env->startSection('title', 'Post'); ?>



<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('app-title', 'Upload Image'); ?>
<?php $__env->startSection('app-description', ''); ?>



<?php $__env->startSection('content'); ?>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo e($message); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Upload Image</h3>
                <form method="post" action="<?php echo e(route('admin.post-image.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="titlePost">Judul</label>
                        <input class="form-control" id="titlePost" type="text" aria-describedby="titleHelp" name="title"
                               placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="titlePost">Tags</label>
                        <input class="form-control" id="titlePost" type="text" aria-describedby="titleHelp" name="tags"
                               placeholder="Tags dipisahkan dengan _">
                    </div>

                    <div class="form-group">
                        <input type="file" name="file" required>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\IDLE\idle-2024\resources\views/admin/pages/upload_image.blade.php ENDPATH**/ ?>