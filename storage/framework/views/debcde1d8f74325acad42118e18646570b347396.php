



<?php $__env->startSection('title', 'Mahasiswa'); ?>



<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>



<?php $__env->startSection('app-title', 'Identitas Mahasiswa'); ?>
<?php $__env->startSection('app-description', ''); ?>



<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title">
                    <?php echo e($mahasiswa->nama); ?> - <?php echo e($mahasiswa->nim); ?>

                    <p style="font-size: 15px; font-weight: normal">
                        <?php echo e($mahasiswa->email); ?> <br>
                        <?php echo e($mahasiswa->no_hp); ?>

                    </p>
                    <a class="btn btn-primary" href="<?php echo e(route('admin.mahasiswa.edit', ['mahasiswa' => $mahasiswa->nim])); ?>"><i class="fa fa-edit"></i>Edit</a>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="tim-table">
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama TIM</th>
                            <th>Kategori</th>
                            
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $mahasiswa->pesertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $peserta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no+1); ?></td>
                                <td><a href="<?php echo e(route('admin.tim.show', ['tim' => $peserta->tim->id])); ?>"><?php echo e($peserta->tim->nama_tim); ?></a></td>
                                <td><?php echo e($peserta->tim->kategori->nama_kategori); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
    
    <script>
        function deletePost(id) {
            var c = confirm("Are you sure delete this tim?");
            if (c == true) {
                url = $('#delete-form').attr('action');
                url = url.substring(0, url.length - 2) + id;
                url = $('#delete-form').attr('action', url);
                // return;
                $('#delete-form').submit();
            } else {

            }
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/admin/pages/show_mahasiswa.blade.php ENDPATH**/ ?>