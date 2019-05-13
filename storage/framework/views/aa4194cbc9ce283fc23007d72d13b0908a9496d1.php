<?php $__env->startSection('content'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit License for "Company name"</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php echo Form::open(['route' => 'updateLicense','method' => 'PUT', 'form-horizontal form-label-left']); ?>

                      <div class="item form-group">
                        <?php echo Form::label('name','Name*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); ?>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo Form::text('extension',null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'placeholder' => '.png']); ?>

                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Demo</option>
                            <option>Standard</option>
                            <option>Premium</option>
                          </select>
                        </div>  
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Time Adquired<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>1 month</option>
                            <option>3 months</option>
                            <option>12 months</option>
                          </select>
                        </div>  
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Package users<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>1</option>
                            <option>10</option>
                            <option>15</option>
                          </select>
                        </div>  
                      </div>                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Size <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>1 TB</option>
                            <option>2 TB</option>
                          </select>
                        </div>  
                      </div> 
                    <?php echo Form::close(); ?>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo e(url('/license-status')); ?>"><button type="submit" class="btn btn-danger">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
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