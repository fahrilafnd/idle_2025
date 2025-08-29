



<?php $__env->startSection('title', 'Penyisihan 2'); ?>



<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('app-title', 'Tambah Peserta Tahap 2'); ?>
<?php $__env->startSection('app-description', ''); ?>



<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Tambah Peserta <?php echo e($kategori->nama_kategori); ?> Tahap 2</h3>
                </div>

                <div class="tile-body">
                    <form action="<?php echo e(route('admin.penyisihan-2.store', ['kategori' => $kategori->kategori ])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <p>Silahkan masukan nama tim yang masuk ke babak 2</p>
                        <h4>Nama Tim</h4>

                        <select class="form-control" id="demoSelect" multiple="" name="tims[]">
                            <optgroup label="Nama Tim">
                                <?php $__currentLoopData = $tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tim->id); ?>"><?php echo e($tim->nama_tim); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        </select>

                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/admin/js/plugins/select2.min.js')); ?>"></script>
    <script>
        $('#demoSelect').select2();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/admin/pages/add_penyisihan_2.blade.php ENDPATH**/ ?>