<?php $__env->startSection('file_css'); ?>
    <link href="<?php echo e(asset('dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dropzone/estilos.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="x_content">
                    <div class="x_title">
                        <h2>Upload your files here</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="title_left">
                        <a href="<?php echo e(url('/companies')); ?>"><button type="submit" class="btn btn-danger">Back</button></a>  
                    </div>     
                    <br>                
                    <div class="row">
                        <div class="form-container">
                           <form method="post" action="<?php echo e(route('cargar')); ?>" enctype="multipart/form-data"><?php echo e(csrf_field()); ?>

                           <input type="file" name="file">
                           <button type="submit">enviar</button>
                           </form>

                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('file_js'); ?>
    <script src="<?php echo e(asset('dropzone/dropzone.js')); ?>"></script>
    <script>
        Dropzone.options.FormUploadFile = {
            maxFilesize: 50,
            addRemoveLinks: true,
            headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
            //acceptedFiles: ".pdf",
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>