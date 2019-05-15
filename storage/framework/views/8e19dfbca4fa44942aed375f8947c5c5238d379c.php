<?php $__env->startSection('content'); ?>
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add User</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" novalidate action="<?php echo e(route('createUserPost')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="col-md-12">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6">
                                        <?php if(count($errors) > 0): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo e($company_id); ?>" name="company_id">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                                        <span class="message"> -The name does not have numbers. Not use a space.</span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="text" id="lastname" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                                        <span class="message"> -The lastname does not have numbers.</span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                        <span class="message"> -The email must be unique.</span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Assign Space</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="number" id="space" name="space" value="<?php echo e(old('space')); ?>" required>
                                        <span class="message"> -The storage space is assigned in GB.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">User Role</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="rol_usuario">
                                                <option value="USER" selected>User</option>
                                                <option value="ADMIN">Administrator</option>
                                        </select>
                                    </div>  
                                </div> 
                                <div class="item form-group">
                                    <label class="control-label col-md-3">Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="password" id="password" name="password">
                                        <span class="message"> -The password must contain uppercase letters, lowercase, numbers and characters. Minimum 8 characters.</span>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" type="password" id="password_confirm" name="password_confirmation">
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo e(url('/users')); ?>"><input type="button" value="Cancelar" class="btn btn-danger"></a>
                                        <button id="send" type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>              
                            <div class="ln_solid"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>