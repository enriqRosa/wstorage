<?php $__env->startSection('file_css'); ?>
    <link href="<?php echo e(asset('dropzone/dropzone.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dropzone/estilos.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="x_title">
                <h2>Space</h2>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <?php if(Session::has('success')): ?>
                                <div class="alert alert-info" aria-label="Close">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong><?php echo e(Session::get('success')); ?></strong>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <p class="lead">Space information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Free Space:</th>
                                                <td><h5><span class="label label-success"><?php echo e($new_total); ?> GB</span></h5></td>
                                            </tr>
                                            <tr>
                                                <th>Use Space:</th>
                                                <td><h5><span class="label label-danger"><?php echo e($type_gb); ?> GB</span></h5></td>
                                            </tr>
                                            <tr>
                                                <th>Total Space:</th>
                                                <td><h5><span class="label label-primary"><?php echo e($space_user); ?> GB</span></h5></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                        <h2>Folders and files</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">New Folder</button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add New Folder</h4>
                                    </div>
                                    <form method="post" action="<?php echo e(route('newFolder')); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <label>Name:</label>
                                            <input type="text" name="name" class="form-control">
                                            <input type="hidden" value="<?php echo e($ruta_local); ?>" name="ruta_local">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                            while (($archivo = readdir($gestor)) !== false) {
                                $ruta_completa = $path . "/" . $archivo;
                                if ($archivo != "." && $archivo != ".."){
                                    if (is_dir($ruta_completa)) {
                                        $carpeta = $archivo; ?>
                                        <div class="col-md-2 col-sm-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h4><?php echo substr($carpeta, 0, 19) ?>...</h4>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="media event col-md-12 col-sm-12 col-xs-12">
                                                            <a class="pull-left border-aero" href="<?php echo e(route('showFilesSubFolder', array($ruta_local, $carpeta))); ?>">
                                                                <div class="image view view-first">
                                                                    <img src="<?php echo e(asset('images/folder.png')); ?>" width="60px">
                                                                </div>
                                                            </a>
                                                            <p>
                                                                <form class="form-horizontal form-label-left" action="<?php echo e(route('downloadSubFolder')); ?>" method="post">
                                                                    <?php echo e(csrf_field()); ?>

                                                                    <input type="hidden" value="<?php echo e($ruta_local); ?>" name="ruta_local">
                                                                    <input type="hidden" value="<?php echo e($carpeta); ?>" name="carpeta">
                                                                    <button type="submit" class="btn btn-primary btn-xs">Download</button>
                                                                </form>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                        <h2>Files</h2>
                        <div class="clearfix"></div>
                    </div>
                    <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr>  
                                <th>Name</th>
                                <th>Download</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while (($archivo = readdir($gestor2)) !== false) {
                                    $ruta_completa = $path2 . "/" . $archivo;
                                    if ($archivo != "." && $archivo != ".."){
                                        if (is_dir($ruta_completa)) {?>
                                        <?php
                                        }else { ?>
                                            <tr>
                                                <td><?php echo $archivo ?></td>
                                                <td>
                                                    <form class="form-horizontal form-label-left" action="<?php echo e(route('downloadFile')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" value="<?php echo e($ruta_local); ?>" name="ruta_local">
                                                        <input type="hidden" value="<?php echo e($archivo); ?>" name="archivo">
                                                        <button type="submit" class="btn btn-primary btn-xs">Download</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form class="form-horizontal form-label-left" action="<?php echo e(route('deleteFile')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" value="<?php echo e($ruta_local); ?>" name="ruta_local">
                                                        <input type="hidden" value="<?php echo e($archivo); ?>" name="archivo">
                                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>                 
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_content">
                        <div class="form-container">
                            <?php echo Form::open(['route'=> 'archivos.store', 'method' => 'POST', 'files'=>'true', 'id' => 'FormUploadFile' , 'class' => 'dropzone']); ?>

                                <input type="hidden" value="<?php echo e($ruta_local); ?>" name="ruta_local">
                                <div class="dz-message">
                                    <div class="icon">
                                        <i class="fa fa-cloud-upload"></i>
                                    </div>
                                    <h2>Release your files here.</h2>
                                    <span class="note">There are no files</span>
                                </div>
                                <div class="fallback">
                                    <input type="file" name="file" id="file" multiple>
                                </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('file_js'); ?>
    <script src="<?php echo e(asset('dropzone/dropzone.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        Dropzone.options.FormUploadFile = {
            maxFilesize: 50,
            //paramName: "file",
            //addRemoveLinks: true,
            acceptedFiles: "<?php $__currentLoopData = $dictionary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($dic->nombre); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
            accept: function(file, done) {
                if (<?php echo e($space_user); ?> <= <?php echo e($type_gb); ?> || file.size >= <?php echo e($res); ?>) {
                    alert("Ya no tienes espacio.");
                }
                else{
                    done();
                }
            }
        } 

        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            });
            new $.fn.dataTable.FixedHeader( table );
        });
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>