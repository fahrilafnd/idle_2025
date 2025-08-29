

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
                    <h1 class="text-center page_title">Submit Tahap 2</h1>
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
               <h2>Halo, <?php echo e($tim->nama_tim); ?></h2>
               
               <?php if($kategori->kategori == 'pap'): ?>
                   <p>Pada tahap 2 bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>, tim anda diminta untuk menyantumkan <b>link video</b> yang diunggah pada Youtube dan <b>link gdrive</b> berisi: <italic><b>File .zip</b> dari permainan yang telah dibuat.</p>
               <?php elseif($kategori->kategori == 'ctf'): ?>
                   <p>Pada tahap 2 bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>, tim anda diminta untuk mengumpulkan <b>write up</b> dari tim anda.</p>
               <?php elseif($kategori->kategori == 'data-mining'): ?>
                   <p>Pada tahap 2 bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>, silahkan klik submit untuk mengumpulkan karya tulis dari tim anda.</p>
               <?php elseif($kategori->kategori == 'uiux'): ?>
                   <p>Pada tahap 2 bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>, silahkan klik submit untuk mengumpulkan karya tulis dari tim anda.</p>
               <?php else: ?>
                  <p>Pada tahap 2 bidang lomba <?php echo e($tim->kategori->nama_kategori); ?>, tim anda diminta untuk mengirimkan <b>Proposal</b> dari tim anda.</p>
               <?php endif; ?>
               
               
               <div class="row">
                   <div class="col-lg-12">

                       <form class="contact-form" role="form" action="<?php echo e(route('kompetisi.submit.store', ['token' => $tim->submissionid])); ?>" method="POST"  enctype="multipart/form-data">
                           <?php echo csrf_field(); ?>

                           <div class="form-group">
                               <label for="" style="float: left;">Judul</label>
                               <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                               <div class="validate"></div>
                           </div>
                           
                           <?php if($kategori->kategori != 'uiux'): ?>
                           <div class="form-group">
                               <label for="" style="float: left;">Link Video Youtube</label>
                               <input type="text" name="link" class="form-control" placeholder="Link Video" required>
                               <div class="validate"></div>
                           </div>
                           
                           <?php endif; ?>

                           
                           
                           <?php if($kategori->kategori == "pap"): ?>
                          <div class="form-group">
                               <label for="" style="float: left;">Link Game Google Drive</label>
                               <input type="text" name="link2" class="form-control" placeholder="Link Google Drive" required>
                               <div class="validate"></div>
                           </div>
                           <?php elseif($kategori->kategori == 'uiux'): ?>
                          
                           
                           <div class="form-group">
                               <label for="" style="float: left;">Silahkan masukan file (PDF)</label>
                               <input type="file" name="file" class="form-control" id="contact-name" placeholder="File" required>
                           </div>
                            <small style="color:red">Pastikan ukuran file tidak lebih dari 5 Mb.</small>

                           <?php else: ?>
                           <div class="form-group">
                               <label for="" style="float: left;">Silahkan masukan file (ZIP)</label>
                               <input type="file" name="file" class="form-control" id="contact-name" placeholder="File" required>
                           </div>
                          <small style="color:red">Pastikan ukuran file tidak lebih dari 5 Mb.</small>
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

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/idlefasi1/laravel/resources/views/pages/submission_2.blade.php ENDPATH**/ ?>