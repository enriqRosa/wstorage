@extends ('temps.header')
@section ('content')
        <!-- /page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">                                                                                                                                                                                                                                                                                                                                                                     </div>
              <div class="clearfix"></div><!--SALTO DE LÍNEA-->
                <div class="row">
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
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <a href="{{url('/edit-license')}}" class="btn btn-dark btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
        <!-- /page content -->
        @stop