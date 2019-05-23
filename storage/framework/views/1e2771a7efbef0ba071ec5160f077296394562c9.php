    <?php $__env->startSection('content'); ?>
        <?php if(\Auth::user()->tipo_usuario=='SUPER'): ?>
        <div class="section-admin container-fluid res-mg-t-15">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn">
                                <h4 class="text-left text-uppercase"><b>Companies</b></h4><br>
                                <div class="widget-program-bg">
                                    <div class="container-fluid">
                                        <div class="row">
                                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="hpanel hbgrey responsive-mg-b-30">
                                                    <div class="panel-body">
                                                        <div class="text-center content-bg-pro">
                                                            <h3><?php echo e($companies->nombre); ?></h3>
                                                            <img src="<?php echo e(Storage::url($companies->logo)); ?>" height="100px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                        </div>
                                    </div>
                                </div>
                                <div class="program-widget-bc mt-t-30 mg-b-15">
                                    <div class="container-fluid">
                                        <div class="row">
                                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="hpanel responsive-mg-b-30">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr><th><?php echo e($companies->nombre); ?></th></tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr><td><a href="<?php echo e(route('users',$companies->id)); ?>"><span class="text-danger font-bold">View Users</span></a></td>
                                                                        <td><i class="fa fa-eye"></i></td>
                                                                    </tr>
                                                                    <tr><td><a href="<?php echo e(route('showContacts',$companies->id)); ?>"><span class="text-danger font-bold">View Contacts</span></a></td>
                                                                        <td><i class="fa fa-book"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><a href=""><span class="text-danger font-bold">Edit</span></a></td>
                                                                        <td><i class="fa fa-pencil"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><a href=""><span class="text-danger font-bold">Delete</span></a></td>
                                                                        <td><i class="fa fa-close"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                        </div>
                                    </div>
                                </div>                               
                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	                            	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        
                <?php endif; ?>
                <?php if(\Auth::user()->tipo_usuario=='ADMIN'): ?>
                <div class="right_col" role="main">
                  <div class="">
                    <div class="x_title">
                        <h2>My Company</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row top_tiles">
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"></div>
                          <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <center><br><h3><img src="<?php echo e(Storage::url($company->logo)); ?>" height="100px"></h3><br>
                            <div class="count"><h2> <?php echo e($company->nombre); ?></h2></div>
                            <div class="count"><h2> <?php echo e($company->direccion); ?></h2></div>
                            <div class="count"><h2> <?php echo e($company->rfc); ?></h2></div>
                            <p></p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <a href="<?php echo e(route('users',$company->id)); ?>">
                              <div class="icon"><i class="fa fa-users dark"></i></div>
                              <div class="count">Users</div>
                              <h3>See users active</h3>
                              <p>.</p>
                              </div>
                            </a>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <a href="<?php echo e(route('showContacts',$company->id)); ?>">
                                <div class="icon"><i class="fa fa-book dark"></i></div>
                                <div class="count">Contacts</div>
                                <h3>See all contacts</h3>
                                <p>.</p>
                            </a>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <a href="<?php echo e(route('showLicenseCompany', $company->license_id)); ?>">
                                <div class="icon"><i class="fa fa-check-square-o dark"></i></div>
                                <div class="count">License</div>
                                <h3>Check license status</h3>
                                <p>.</p>
                            </a>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>