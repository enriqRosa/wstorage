<?php $__env->startSection('file_css'); ?>
    <link href="<?php echo e(asset('dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dropzone/estilos.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="x_title">
                <h2>Folders Users</h2>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <p class="lead">Space information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <?php $__currentLoopData = $license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $licenses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th style="width:50%">Free Space:</th>
                                                    <td><h5><span class="label label-success"><?php echo e($licenses->tamano_restante); ?> GB</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Use Space:</th>
                                                    <td><h5><span class="label label-danger"><?php echo e($licenses->tamano_total - $licenses->tamano_restante); ?> GB</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Space:</th>
                                                    <td><h5><span class="label label-primary"><?php echo e($licenses->tamano_total); ?> GB</span></h5></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <p class="lead">License information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <?php $__currentLoopData = $license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $licenses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th style="width:50%">Licenses Available</th>
                                                    <td><h5><span class="label label-success"><?php echo e($licenses->licencia_restante); ?></span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>License Use:</th>
                                                    <td><h5><span class="label label-danger"><?php echo e($licenses->licencia_total - $licenses->licencia_restante); ?></span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Licenses:</th>
                                                    <td><h5><span class="label label-primary"><?php echo e($licenses->licencia_total); ?></span></h5></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_title">
                        <h2>Folders Users</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php $__currentLoopData = $folder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2 col-sm-4 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h4><?php echo e($folders->ruta_local); ?></h4>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="media event col-md-12 col-sm-12 col-xs-12">
                                                <a class="pull-left border-aero" href="<?php echo e(route('showFilesFolder',$folders->ruta_local)); ?>">
                                                     <div class="image view view-first">
                                                        <img src="<?php echo e(asset('images/folder.png')); ?>" width="60px">
                                                    </div>
                                                </a>
                                                <p>
                                                    <form class="form-horizontal form-label-left" action="<?php echo e(route('downloadFolder')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" value="<?php echo e($folders->ruta_local); ?>" name="ruta_local">
                                                        <button type="submit" class="btn btn-primary btn-xs">Download</button>
                                                    </form>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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