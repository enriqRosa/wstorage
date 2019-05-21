<?php $__env->startSection('file_css'); ?>
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div><!--SALTO DE LÍNEA-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
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
                        <?php $__currentLoopData = $company_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="x_title">
                                <h2>"<?php echo e($name->nombre); ?>" Users</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="title_left">
                                <a href="<?php echo e(url('/companies')); ?>"><button type="submit" class="btn btn-danger">Back</button></a>
                                <a href="<?php echo e(route('createUser',$name->company_id)); ?>"><button type="submit" class="btn btn-success">New User</button></a> 
                                <a href="<?php echo e(route('addUserPlus')); ?>"><button type="submit" class="btn btn-primary">Add 100 users</button></a> 
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="x_content">
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>  
                                                    <th>Name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Space</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($users->name); ?></td>
                                                        <td><?php echo e($users->apellidos); ?></td>
                                                        <td><?php echo e($users->email); ?></td>
                                                        <td><?php echo e($users->tamano); ?> GB</td>
                                                        <td><?php echo e($users->tipo_usuario); ?></td>
                                                        <td>
                                                            <center>
                                                                <a href="<?php echo e(route('updateUser', $users->id)); ?>" class="btn btn-warning btn-xs">
                                                                    <i class="fa fa-pencil"></i> Edit 
                                                                </a>                                                      
                                                                <a href="<?php echo e(route('deleteUser', $users->id)); ?>" onclick="return confirm('Are you sure you want to delete this user?\nAll data will be deleted!')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('file_js'); ?>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
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