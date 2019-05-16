@extends ('temps.header')
@section ('content')
<!-- /page content -->
                  <div class="right_col" role="main">
                    <div class="">
                      <div class="page-title"></div>
                        <div class="clearfix"></div><!--SALTO DE LÍNEA-->
                          <div class="row">
                          @if (session('license_update'))
                            <div class="alert alert-success">
                              {{ session('license_update') }}
                            </div>
                          @endif
                          @if (session('license_destroy'))
                            <div class="alert alert-success">
                              {{ session('license_destroy') }}
                            </div>
                          @endif
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="x_panel">
                                <div class="x_title">
                                  <h2>License Status</h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                              <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer">
                                      <thead>
                                        <tr>
                                          <th>Company</th>
                                          <th>Serial</th>
                                          <th>Model</th>
                                          <th>Type</th>
                                          <th>Time</th>
                                          <th>Status</th>
                                          <th>Start date</th>
                                          <th>End date</th>
                                          <th>Total space</th>
                                          <th>Total License</th>
                                          <th>Space Available</th>
                                          <th>Licenses Available</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($company_license as $view)
                                        <tr>
                                          <td>{{ $view->nombre }}</td>
                                          <td>{{ $view->serial }}</td>
                                          <td>{{ $view->modelo }}</td>
                                          <td>{{ $view->tipo }}</td>
                                          <td>{{ $view->tiempo }}</td>
                                          <td>{{ $view->status }}</td>
                                          <td>{{ $view->fecha_inicio }}</td>
                                          <td>{{ $view->fecha_fin }}</td>
                                          @if ($view->tamano_total==2000)
                                          <td><h4><span class="label label-success">2 TB</span></h4></td>
                                          @endif
                                          @if ($view->tamano_total==4000)
                                          <td><h4><span class="label label-success">4 TB</span></h4></td>
                                          @endif
                                          @if ($view->tamano_total==6000)
                                          <td><h4><span class="label label-success">6 TB</span></h4></td>
                                          @endif
                                          @if ($view->tamano_total==8000)
                                          <td><h4><span class="label label-success">8 TB</span></h4></td>
                                          @endif
                                          <td><h4><span class="label label-success">{{ $view->licencia_total }}</span></h4></td>
                                          <td><h4><span class="label label-danger">{{ $view->tamano_restante }}</h4></span></td>
                                          <td><h4><span class="label label-danger">{{ $view->licencia_restante }}</h4></span></td>
                                          <td>
                                            <a href="{{ route('edit-license',$view->license_id) }}" class="btn btn-dark btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="{{ route('license-destroy', $view->license_id) }}" onclick="return confirm('Are you sure you want to delete this item?\nAll users and data will be deleted!')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                          </td>
                                        </tr>
                                        @endforeach
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
                  <!-- /page content -->
@stop