<?php $__env->startSection('content'); ?>
        <div class="section-admin container-fluid res-mg-t-15">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn">
                                <h4 class="text-left text-uppercase"><b>Server Status</b></h4><br>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <iframe src="http://189.204.31.154:5602/app/kibana#/dashboard/Metricbeat-system-overview?embed=true&_g=(refreshInterval%3A(pause%3A!f%2Cvalue%3A30000)%2Ctime%3A(from%3Anow%2Fd%2Cmode%3Aquick%2Cto%3Anow))" height="600" width="1090"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

        
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>