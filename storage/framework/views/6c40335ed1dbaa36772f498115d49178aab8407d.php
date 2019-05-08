<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div><!--SALTO DE LÍNEA-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>"Company" Users</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="title_left">
                            <a href="<?php echo e(url('/companies')); ?>"><button type="submit" class="btn btn-danger">Back</button></a>  
                            <a href="<?php echo e(url('/add-user')); ?>"><button type="submit" class="btn btn-success">Add user</button></a>
                        </div> 
                        <div class="x_content">
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer">
                                            <thead>
                                                <tr>  
                                                    <th>Name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Space</th>
                                                    <th>User role</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Cara Stevens</td>
                                                    <td>Sales Assistant</td>
                                                    <td>New York</td>
                                                    <td>46</td>
                                                    <td>2011/12/06</td>
                                                    <td>$145,600</td>
                                                    <td>
                                                        <a href="<?php echo e(url('/edit-user')); ?>" class="btn btn-dark btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                        <a href="#" class="btn btn-info btn-xs"><i class="fa fa-plus-square"></i> Assign space </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Hermione Butler</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>2011/03/21</td>
                                                    <td>$356,250</td>
                                                    <td>
                                                      <a href="<?php echo e(url('/companies')); ?>" class="btn btn-dark btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                      <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                      <a href="#" class="btn btn-info btn-xs"><i class="fa fa-plus-square"></i> Assign space </a>
                                                    </td>
                                                </tr>
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
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>