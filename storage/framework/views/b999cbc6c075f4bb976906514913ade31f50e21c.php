<?php $__env->startSection('content'); ?>
        <div class="right_col" role="main">
          <div class="">                                                                                                      
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_title">
                  <h2>License Status</h2>
                  <div class="clearfix"></div>
                </div>
                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                  <div class="row">
                    <div class="col-sm-12">
                      <center><iframe src="http://189.204.31.154:5602/app/kibana#/dashboard/Metricbeat-system-overview?embed=true&_g=(refreshInterval%3A(pause%3A!f%2Cvalue%3A10000)%2Ctime%3A(from%3Anow%2Fd%2Cmode%3Aquick%2Cto%3Anow))" height="600" width="1090"></iframe>
                    </div>
                  </div>
                </div>
              </div>       
            </div>
          </div>
        </div>
<?php $__env->stopSection(); ?>

        
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>