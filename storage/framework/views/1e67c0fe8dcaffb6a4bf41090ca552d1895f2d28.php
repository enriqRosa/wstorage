<?php $__env->startSection('content'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
            <?php if(session('user_catalog')): ?>
  <div class="alert alert-success">
    <?php echo e(session('user_catalog')); ?>

  </div>
<?php endif; ?>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add more users</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo Form::open(['route' => 'storeUserCatalog', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']); ?>

                      <div class="item form-group">
                        <?php echo Form::label('nombre','Quantity*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); ?>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo Form::text('cantidad',null, ['class' => 'form-control col-md-7 col-xs-12', 'required']); ?>

                        </div>
                      </div> 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <?php echo Form::submit('Add', ['class' => 'btn btn-success']); ?>

                        </div>
                      </div>
                    <?php echo Form::close(); ?>

                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User catalog</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Users</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $__currentLoopData = $user_catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($catalog->cantidad); ?></td>
                              <td><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <!-- Activar la páginación -->
                    <?php echo $user_catalog->render(); ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>