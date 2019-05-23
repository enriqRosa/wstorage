<?php $__env->startSection('content'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
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
                        <div class="x_title">
                            <h2>Edit License for "Company name"</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php echo Form::open(['route' => ['updateLicense',$license_edit->id],'method' => 'PUT', 'class' => 'form-horizontal form-label-left']); ?>

                                <?php echo csrf_field(); ?>

                                <div class="item form-group"></div> 
                                <div class="form-group">
                                    <?php echo Form::label('Package Users*','Package Users*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); ?>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="tamano_total">
                                            <option value="30" <?php if($license_edit->licencia_total == 30): ?> selected <?php endif; ?> >30 users</option>
                                            <option value="50" <?php if($license_edit->licencia_total == 50): ?> selected <?php endif; ?> >50 users</option>
                                            <option value="100" <?php if($license_edit->licencia_total == 100): ?> selected <?php endif; ?> >100 users</option>
                                            <option value="200" <?php if($license_edit->licencia_total == 200): ?> selected <?php endif; ?> >200 users</option>
                                            <option value="500" <?php if($license_edit->licencia_total == 500): ?> selected <?php endif; ?> >500 users</option>
                                            <option value="1000" <?php if($license_edit->licencia_total == 1000): ?> selected <?php endif; ?> >1000 users</option>
                                            <?php $__currentLoopData = $user_catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($catalog->cantidad); ?>" <?php if($catalog->cantidad == $license_edit->licencia_total): ?> selected <?php endif; ?>><?php echo e($catalog->cantidad); ?> users</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>  
                                </div>                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Size <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="licencia_total">
                                            <option value="2000" <?php if($license_edit->tamano_total == 2000): ?> selected <?php endif; ?> >2 TB</option>                     
                                            <option value="4000" <?php if($license_edit->tamano_total == 4000): ?> selected <?php endif; ?> >4 TB</option>
                                            <option value="6000" <?php if($license_edit->tamano_total == 6000): ?> selected <?php endif; ?> >6 TB</option>
                                            <option value="8000" <?php if($license_edit->tamano_total == 8000): ?> selected <?php endif; ?> >8 TB</option>                     
                                        </select>
                                    </div>  
                                </div> 
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo e(url('/license-status')); ?>"><input type="button" class="btn btn-danger" value="Cancel"></a>
                                        <?php echo Form::submit('Add', ['class' => 'btn btn-success']); ?>

                                    </div>
                                </div> 
                            <?php echo Form::close(); ?>                   
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>