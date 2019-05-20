<?php $__env->startSection('content'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <!-- MENSAJES FLASH -->
              <?php if(session('contact-updated')): ?>
                <div class="alert alert-success">
                  <?php echo e(session('contact-updated')); ?>

                </div>
              <?php endif; ?>
              <!-- MENSAJES DE VALIDACIÓN DE CAMPOS -->
              <?php if(count($errors) > 0): ?>
                  <div class="alert alert-danger" role="alert">
                    <ul>
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </div>
              <?php endif; ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Contact</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <?php echo Form::open(['route' => ['contactUpdate',$contact_info],'method' => 'PUT', 'class' => 'form-horizontal form-label-left']); ?>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" type="text" value="<?php echo e($contact_info->nombre); ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alias">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12" value="<?php echo e($contact_info->apellidos); ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo e($contact_info->email); ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="telephone" class="form-control col-md-7 col-xs-12" value="<?php echo e($contact_info->telefono); ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupation <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="ocupation">
                            <option value="ADMINISTRATOR" <?php if($contact_info->ocupacion == 'ADMINISTRATOR'): ?> selected <?php endif; ?>>ADMINISTRATOR</option>
                            <option value="COLLABORATOR" <?php if($contact_info->ocupacion == 'COLLABORATOR'): ?> selected <?php endif; ?>>COLLABORATOR</option>
                            <option value="DIRECTOR" <?php if($contact_info->ocupacion == 'DIRECTOR'): ?> selected <?php endif; ?>>DIRECTOR</option>
                            <option value="HUMAN RESOURCES" <?php if($contact_info->ocupacion == 'HUMAN RESOURCES'): ?> selected <?php endif; ?>>HUMAN RESOURCES</option>
                            <option value="PROJECT MANAGER" <?php if($contact_info->ocupacion == 'PROJECT MANAGER'): ?> selected <?php endif; ?>>PROJECT MANAGER</option>
                            <option value="SOFTWARE MANAGER" <?php if($contact_info->ocupacion == 'SOFTWARE MANAGER'): ?> selected <?php endif; ?>>SOFTWARE MANAGER</option>
                            <option value="SALES" <?php if($contact_info->ocupacion == 'SALES'): ?> selected <?php endif; ?>>SALES</option>
                          </select>
                        </div>  
                      </div>               
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo e(route('showContacts',$contact_info->company_id)); ?>"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                    <?php echo Form::close(); ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php $__env->stopSection(); ?>
        
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>