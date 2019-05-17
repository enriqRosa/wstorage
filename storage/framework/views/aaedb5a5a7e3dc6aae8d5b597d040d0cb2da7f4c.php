<?php $__env->startSection('content'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>Contacts</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="title_left">
                    <a href="<?php echo e(url('/companies')); ?>"><button type="submit" class="btn btn-danger">Back</button></a>  
                    <a href="<?php echo e(route('storeContact',$company_id[0]->company_id)); ?>"><button type="submit" class="btn btn-success">Add contact</button></a>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                      </div>
                      <div class="clearfix"></div>      
                      <?php $__currentLoopData = $company_contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                      
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2><?php echo e($contacts->nombre); ?> <?php echo e($contacts->apellidos); ?></h2>
                              <p><strong>About: <?php echo e($contacts->ocupacion); ?> </strong>  </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-phone"></i> Phone #: <?php echo e($contacts->telefono); ?></li>
                                <li><i class="fa fa-google"></i> Email: <?php echo e($contacts->email); ?></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="http://localhost:8000/images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <a href="<?php echo e(url('/edit-contact')); ?>"><button type="button" class="btn btn-dark btn-xs">
                                <i class="fa fa-pencil"> </i> Edit 
                              </button></a>
                              <a href="<?php echo e(url('/edit-contact')); ?>"><button type="button" class="btn btn-dark btn-xs">
                                <i class="fa fa-user-times"> </i> Delete
                              </button></a>
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
          </div>
        </div>
        <!-- /page content -->
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>