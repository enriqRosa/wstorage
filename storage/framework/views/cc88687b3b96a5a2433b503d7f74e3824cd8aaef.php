<?php $__env->startSection('content'); ?>
    <!-- /page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title"></div>
            <div class="clearfix"></div><!--SALTO DE LÍNEA-->
            <div class="row">
                <?php if(session('license_update')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('license_update')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('license_destroy')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('license_destroy')); ?>

                    </div>
                <?php endif; ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>License Status</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="title_left">
                            <a href="<?php echo e(url('/companies')); ?>"><button type="submit" class="btn btn-danger">Back</button></a>  
                        </div>
                        <div class="x_content">
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
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>Serial</th>
                                                    <th>Model</th>
                                                    <th>Type</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th>Start date</th>
                                                    <th>End date</th>
                                                    <th>Total space</th>
                                                    <th>Total License</th>
                                                    <th>Space Available</th>
                                                    <th>Licenses Available</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(\Auth::user()->tipo_usuario=='SUPER'): ?>
                                                    <?php $__currentLoopData = $company_license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($view->nombre); ?></td>
                                                            <td><?php echo e($view->serial); ?></td>
                                                            <td><?php echo e($view->modelo); ?></td>
                                                            <td><?php echo e($view->tipo); ?></td>
                                                            <td><?php echo e($view->tiempo); ?></td>
                                                            <td><?php echo e($view->status); ?></td>
                                                            <td><?php echo e($view->fecha_inicio); ?></td>
                                                            <td><?php echo e($view->fecha_fin); ?></td>
                                                            <?php if($view->tamano_total==2000): ?>
                                                            <td><h4><span class="label label-success">2 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <?php if($view->tamano_total==4000): ?>
                                                                <td><h4><span class="label label-success">4 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <?php if($view->tamano_total==6000): ?>
                                                                <td><h4><span class="label label-success">6 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <?php if($view->tamano_total==8000): ?>
                                                                <td><h4><span class="label label-success">8 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <?php if($view->tamano_total==10000): ?>
                                                                <td><h4><span class="label label-success">10 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <?php if($view->tamano_total==14000): ?>
                                                                <td><h4><span class="label label-success">14 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <?php if($view->tamano_total==16000): ?>
                                                                <td><h4><span class="label label-success">16 TB</span></h4></td>
                                                            <?php endif; ?>
                                                            <td><h4><span class="label label-success"><?php echo e($view->licencia_total); ?></span></h4></td>
                                                            <td><h4><span class="label label-danger"><?php echo e($view->tamano_restante); ?></h4></span></td>
                                                            <td><h4><span class="label label-danger"><?php echo e($view->licencia_restante); ?></h4></span></td>
                                                            <td>
                                                                <a href="<?php echo e(route('edit-license',$view->license_id)); ?>" class="btn btn-dark btn-xs">
                                                                    <i class="fa fa-pencil"></i> Edit 
                                                                </a>
                                                                <a href="<?php echo e(route('license-destroy', $view->license_id)); ?>" onclick="return confirm('Are you sure you want to delete this item?\nAll users and data will be deleted!')" class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-trash-o"></i> Delete 
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <?php if(\Auth::user()->tipo_usuario=='ADMIN'): ?>
                                                    <?php $__currentLoopData = $company_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <td><?php echo e($status->nombre); ?></td>
                                                        <td><?php echo e($status->serial); ?></td>
                                                        <td><?php echo e($status->modelo); ?></td>
                                                        <td><?php echo e($status->tipo); ?></td>
                                                        <td><?php echo e($status->tiempo); ?></td>
                                                        <td><?php echo e($status->status); ?></td>
                                                        <td><?php echo e($status->fecha_inicio); ?></td>
                                                        <td><?php echo e($status->fecha_fin); ?></td>
                                                        <?php if($status->tamano_total==2000): ?>
                                                            <td><h4><span class="label label-success">2 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <?php if($status->tamano_total==4000): ?>
                                                            <td><h4><span class="label label-success">4 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <?php if($status->tamano_total==6000): ?>
                                                            <td><h4><span class="label label-success">6 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <?php if($status->tamano_total==8000): ?>
                                                            <td><h4><span class="label label-success">8 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <?php if($status->tamano_total==10000): ?>
                                                            <td><h4><span class="label label-success">10 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <?php if($status->tamano_total==14000): ?>
                                                            <td><h4><span class="label label-success">14 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <?php if($status->tamano_total==16000): ?>
                                                            <td><h4><span class="label label-success">16 TB</span></h4></td>
                                                        <?php endif; ?>
                                                        <td><h4><span class="label label-success"><?php echo e($status->licencia_total); ?></span></h4></td>
                                                        <td><h4><span class="label label-danger"><?php echo e($status->tamano_restante); ?></span></h4></td>
                                                        <td><h4><span class="label label-danger"><?php echo e($status->licencia_restante); ?></span></h4></td>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>