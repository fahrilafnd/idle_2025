

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello ' . $nama,
        'level' => 'h1',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p><?php echo e($text); ?></p>

    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/mails/send.blade.php ENDPATH**/ ?>