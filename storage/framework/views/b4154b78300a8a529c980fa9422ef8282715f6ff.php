<?php $__env->startSection('content'); ?>
<!-- page content -->
                <div class="right_col" role="main">
                  <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                    <!-- MENSAJES FLASH -->
                    <?php if(session('dictionary')): ?>
                      <div class="alert alert-success">
                        <?php echo e(session('dictionary')); ?>

                      </div>
                    <?php endif; ?>
                    <?php if(session('dictionary_destroy')): ?>
                      <div class="alert alert-success">
                        <?php echo e(session('dictionary_destroy')); ?>

                      </div>
                    <?php endif; ?>
                    <!-- /MENSAJES FLASH -->
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
                    <!-- /MENSAJES DE VALIDACIÓN DE CAMPOS -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Add new extension</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <?php echo Form::open(['route' => 'storeDictionary', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']); ?>

                              <div class="item form-group">
                                <?php echo Form::label('extension','Extension*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']); ?>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                               
                                <input type="hidden" value="<?php echo e($id_company); ?>" name="company_id">
                              
                                  <?php echo Form::text('extension',null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'placeholder' => '.png']); ?>

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
                          <div class="x_content">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Extension</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $__currentLoopData = $dictionary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <td><?php echo e($extension->nombre); ?></td>
                                    <td>
                                      <a href="<?php echo e(route('dictionary-destroy', $extension->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                            <?php echo $dictionary->render(); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>