<?php $__env->startSection('file_css'); ?>
    <link href="<?php echo e(asset('dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dropzone/estilos.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3> My files</h3>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="col-xs-3">
                                <p class="lead">Storage information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Free space:</th>
                                                <td><h5><span class="label label-warning">3 GB</span></h5></td>
                                            </tr>
                                            <tr>
                                                <th>Use space:</th>
                                                <td><h5><span class="label label-danger">2 GB</span></h5></td>
                                            </tr>
                                            <tr>
                                                <th>Total space:</th>
                                                <td><h5><span class="label label-primary">5 GB</span></h5></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Folders</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img class="img-responsive" style="width: 100%;" src="images/folder.png">
                                            </div>
                                        </div>
                                        <center><h3>Name folder</h3></center>
                                    </div>
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img class="img-responsive" style="width: 100%;" src="images/add_folder.png">
                                            </div>
                                        </div>
                                        <center><h3>Add new folder</h3></center>
                                    </div>
                                </div>
                            </div>
                            <div class="x_title">
                                <h2>Files</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="form-container">
                                   <?php echo Form::open(['route'=> 'archivos.store', 'method' => 'POST', 'files'=>'true', 'id' => 'FormUploadFile' , 'class' => 'dropzone']); ?>

                                        <div class="dz-message">
                                            <div class="icon">
                                                <i class="fa fa-cloud-upload"></i>
                                            </div>
                                            <h2>Release your files here.</h2>
                                            <span class="note">There are no files</span>
                                        </div>
                                        <div class="fallback">
                                            <input type="file" name="file" multiple>
                                        </div>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
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