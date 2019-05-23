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
                <div class="section-admin container-fluid res-mg-t-15">
                    <div class="row admin text-center">     
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="admin-content analysis-progrebar-ctn">
                                        <h4 class="text-left text-uppercase"><b>My Company Info</b></h4><br>
                                        <div class="row vertical-center-box vertical-center-box-tablet">
                                            <div class="widget-program-bg">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="hpanel hbgrey responsive-mg-b-30">
                                                                <div class="panel-body">
                                                                    <div class="text-center content-bg-pro">
                                                                        <h3 class="text-uppercase"><?php echo e($company->nombre); ?></h3>
                                                                        <p class="text-big font-light">
                                                                            <img src="<?php echo e(Storage::url($company->logo)); ?>">
                                                                        </p>
                                                                        <h3 class="text-uppercase"><?php echo e($company->rfc); ?></h3>
                                                                        <h3 class="text-uppercase"><?php echo e($company->direccion); ?></h3>
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
                        </div>
                    </div>
                </div>
                <div class="widgets-programs-area mg-t-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                <a href="<?php echo e(route('users',$company->id)); ?>">
                                    <div class="hpanel responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="stats-title pull-left">
                                                <h4>Users</h4>
                                            </div>
                                            <div class="stats-icon pull-right">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </div>
                                            <div class="m-t-xl">
                                                <h1 class="text-success">See users active</h1>
                                            <small>
									    	    .
                                            </small>
                                    
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <div class="hpanel responsive-mg-b-30">
                                <a href="<?php echo e(route('users',$company->id)); ?>">
                                    <div class="panel-body">
                                        <div class="stats-title pull-left">
                                            <h4>Contacts</h4>
                                        </div>
                                        <div class="stats-icon pull-right">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </div>
                                        <div class="m-t-xl">
                                            <h1 class="text-warning">View all contacts</h1>
                                        <small>
							    			.
							    		</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                        <a href="<?php echo e(route('showLicenseCompany', $company->license_id)); ?>">
                            <div class="hpanel responsive-mg-b-30">
                                <div class="panel-body">
                                    <div class="stats-title pull-left">
                                        <h4>License</h4>
                                    </div>
                                    <div class="stats-icon pull-right">
                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="m-t-xl">
                                        <h1 class="text-success">Check license status</h1>
                                    <small>
						                .
                                    </small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">  
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">  
                </div>
            </div>
        </div>
        
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>