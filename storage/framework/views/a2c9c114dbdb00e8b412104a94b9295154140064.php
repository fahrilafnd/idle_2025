

<?php $__env->startSection('content'); ?>
    
     
    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => 'Selamat',
        'level' => 'h1',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p>Selamat kepada Tim <b> <?php echo e($tim_->nama_tim); ?> </b>, Tim anda berhasil lolos ke <?php echo e($tahap); ?> dalam kategori <?php echo e($kategori->nama_kategori); ?>.</p>

    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($kategori->kategori == 'cpc'): ?>
        <p>Silahkan tunggu informasi selanjutnya dari email</p>
    <?php elseif($kategori->kategori == 'data-mining' or 'uiux'): ?>
        <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <p>Silahkan submit karya tulis anda dengan cara menekan tombol di bawah ini : </p>
        <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => 'Submit',
        	'link' => route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         
        <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <p>atau akses link berikut : <a href="<?php echo e(route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])); ?>"><?php echo e(route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])); ?></a></p>
        <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    <?php else: ?>

        <p>Silahkan submit ke babak selanjutnya dengan klik tombol dibawah : </p>
        <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => 'Submit',
        	'link' => route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <p>atau akses link berikut : <a
                    href="<?php echo e(route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])); ?>"><?php echo e(route('kompetisi.submit.index', ['kategori' => $kategori->kategori, 'token' => $kode])); ?></a></p>

    <?php endif; ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/mails/lolos.blade.php ENDPATH**/ ?>