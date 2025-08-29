

<?php $__env->startSection('title', 'Submit'); ?>

<?php $__env->startSection('css'); ?>
<style media="screen">
  body{
    background-color: #F3F2F0;
  }
  .card{
    border-radius: 10px;
    padding: 25px 15%;
  }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container hero" style="margin-top: 1px;">
        <div class="row">
            <div class="col-md-12" style="height: auto;padding-top: 62px;">
                <div style="margin-bottom: 11px;">
                    <h1  style="color: rgb(0,0,0);margin-top: 71px;, sans-serif;"></h1>
                    <h1 class="text-center page_title">Submit Final</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /blue -->


    <!-- *****************************************************************************************************************
       BLOG CONTENT
       ***************************************************************************************************************** -->

       <div class="card" style="margin-top: 10px;">
           <div class="card-body">
               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="alert alert-danger" role="alert">
                  <li style="color: red"><?php echo e($error); ?></li>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php if($tim->kategori->id_ormawa==1): ?>
               <h2>Halo <?php echo e($tim->nama_tim); ?>, Selamat!</h2>
               <p>Tim anda telah melewati tahapan seleksi pada bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>. Pada tahap final anda diharuskan mengunggah <b>file .PDF</b> berisi <italic>file presentasi</italic></p>
               <?php elseif($tim->kategori->id_ormawa==2): ?>
               <h2>Halo <?php echo e($tim->nama_tim); ?>, Selamat!</h2>
               <p>Tim anda telah melewati tahapan seleksi pada bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>. Pada tahap final anda diharuskan mengunggah <b>file .PDF</b> berisi <italic>file Power Point (presentasi)</italic></p>
               <?php else: ?>
               <h2>Dear <?php echo e($tim->nama_tim); ?>, Selamat!</h2>
               <p>Tim anda telah melewati seluruh tahapan seleksi pada bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>. Pada tahap final anda diharuskan mengunggah <b>file .ZIP</b> berisi: <italic>proposal akhir</italic> dan <italic>file presentasi</italic></p>
               <?php endif; ?>
               <div class="row">
                   <div class="col-lg-12">

                       <form class="contact-form" role="form" action="<?php echo e(route('kompetisi.submit.store', ['token' => $tim->submissionid])); ?>" method="POST"  enctype="multipart/form-data">

                           <div class="form-group">
                               <label for="" style="float: left;">Judul</label>
                               <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                               <div class="validate"></div>
                           </div>

                           <?php echo csrf_field(); ?>
                           <?php if($tim->kategori->id_ormawa==1): ?>
                           <div class="form-group">
                               <label for="" style="float: left;">Silahkan masukan file (PDF)</label>
                               <input type="file" name="file" class="form-control" id="contact-name" placeholder="File" required>
                           </div>
                           <?php elseif($tim->kategori->id_ormawa==2): ?>
                           <div class="form-group">
                               <label for="" style="float: left;">Silahkan masukan file (PDF)</label>
                               <input type="file" name="file" class="form-control" id="contact-name" placeholder="File" required>
                           </div>
                           <?php else: ?>
                            <div class="form-group">
                               <label for="" style="float: left;">Silahkan masukan file (ZIP)</label>
                               <input type="file" name="file" class="form-control" id="contact-name" placeholder="File" required>
                           </div>
                           <?php endif; ?>
                           
                           <div class="form-send">
                               <button type="submit" class="btn btn-success shadow">Submit</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/pages/submission_3.blade.php ENDPATH**/ ?>