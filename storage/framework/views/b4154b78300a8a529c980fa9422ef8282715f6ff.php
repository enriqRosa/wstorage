<?php $__env->startSection('content'); ?>
        <!-- page content -->
          <div class="section-admin container-fluid res-mg-t-15">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn">
                              <!-- MENSAJES FLASH -->
                              <?php if(session('dictionary')): ?>
                                <div class="alert alert-success alert-success-style1">
                                  <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										                <span class="icon-sc-cl" aria-hidden="true">&times;</span>
									                </button>
                                  <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                  <p><strong>Success!</strong> <?php echo e(session('dictionary')); ?></p>
                                </div>
                              <?php endif; ?>
                              <?php if(session('dictionary_destroy')): ?>
                                <div class="alert alert-success alert-success-style1">
                                  <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										                <span class="icon-sc-cl" aria-hidden="true">&times;</span>
									                </button>
                                  <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                  <p><strong>Success!</strong>  <?php echo e(session('dictionary_destroy')); ?></p>
                                </div>
                              <?php endif; ?>
                              <!-- FIN DE MENSAJES FLASH -->
                              <!-- MENSAJES DE VALIDACIÓN DE CAMPOS -->
                              <?php if(count($errors) > 0): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-mg-b alert-success-style4">
                                  <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
										                <span class="icon-sc-cl" aria-hidden="true">&times;</span>
									                </button>
                                  <i class="fa fa-times adminpro-danger-error admin-check-pro" aria-hidden="true"></i>
                                  <p><strong>Danger!</strong> <?php echo e($error); ?></p>
                                </div>  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                              <?php endif; ?>
                              <!-- /MENSAJES DE VALIDACIÓN DE CAMPOS -->
                                <h4 class="text-left text-uppercase"><b>Add new extension</b></h4><br>
                                <div class="sparkline12-graph">
                                  <div class="basic-login-form-ad">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <?php echo Form::open(['route' => 'storeDictionary', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']); ?>

                                          <div class="form-group-inner">
                                            <div class="row">
                                              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <?php echo Form::label('extension','Extension *', ['class' => 'login2 pull-right pull-right-pro']); ?>

                                              </div>
                                              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <?php echo Form::text('extension',null, ['class' => 'form-control', 'required']); ?>

                                                <input type="hidden" value="<?php echo e($id_company); ?>" name="company_id">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group-inner">
                                            <div class="login-btn-inner">
                                              <div class="row">
                                                <div class="col-lg-3"></div>
                                                  <div class="col-lg-9">
                                                    <div class="login-horizental cancel-wp pull-left">
                                                      <?php echo Form::submit('Save Change', ['class' => 'btn btn-sm btn-primary login-submit-cs']); ?>

                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          <?php echo Form::close(); ?>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="admin-content analysis-progrebar-ctn">
                                  <h4 class="text-left text-uppercase"><b>User Catalog</b></h4><br>
                                  <div class="data-table-area mg-tb-15">
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                                          <div class="datatable-dashv1-list custom-datatable-overright">          
                                            <table  class="table table-bordered" data-pagination="true"  >
                                              <thead>
                                                <tr>
                                                  <th data-field="id">Extensions</th>
                                                  <th data-field="name" data-editable="true">Action</th>                   
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php $__currentLoopData = $dictionaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dict): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <tr>
                                                    <td><?php echo e($dict->nombre); ?></td>
                                                    <td><a href="<?php echo e(route('dictionary-destroy', $dict->id)); ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-custon-rounded-four btn-danger"><i class="fa fa-trash-o"></i> Delete </a></td>
                                                  </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                              </tbody>
                                                </table>
                                                <?php echo $dictionaries->render(); ?>

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
                      </div>
                      <div class="product-sales-area mg-tb-30">
                        <div class="container-fluid">
                          <div class="row"></div>
                        </div>
                      </div>
                      <!-- /page content -->
                      <?php $__env->stopSection(); ?>
<?php echo $__env->make('temps.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>