



<?php $__env->startSection('title', 'Tim'); ?>



<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('app-title', 'Edit tim'); ?>
<?php $__env->startSection('app-description', ''); ?>



<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title" onclick="copyID()">Edit Tim</h3>
				<input id="sid" type="text" style="display:none" value="<?php echo e(URL::to('/')); ?>/submit/<?php echo e($tim->submissionid); ?>?kategori=<?php echo e($tim->kategori->kategori); ?>">
				<script>
				function copyID() {
				  var copyText = document.getElementById("sid");
				  copyText.select();
				  copyText.setSelectionRange(0, 99999)
				  document.execCommand("copy");
				  alert("Url Disalin: " + copyText.value);
				}
				</script>
                <form method="post" action="<?php echo e(route('admin.tim.update', ['tim' => $tim->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label for="titlePost">Nama Tim</label>
                        <input class="form-control" id="titlePost" type="text" aria-describedby="titleHelp" name="nama_tim"
                               placeholder="Enter Title" value="<?php echo e($tim->nama_tim); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Ketua Tim</label>
                        <select class="form-control" id="" name="ketua">
                            <option value="<?php echo e($tim->mahasiswa->nim); ?>"><?php echo e($tim->mahasiswa->nama); ?></option>
                            <?php $__currentLoopData = $pesertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peserta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($peserta->mahasiswa->nim); ?>"><?php echo e($peserta->mahasiswa->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/admin/pages/edit_tim.blade.php ENDPATH**/ ?>