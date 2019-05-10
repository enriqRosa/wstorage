@extends ('temps.header')
@section ('content')
<!-- page content -->
                <div class="right_col" role="main">
                  <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Add new extension</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            {!! Form::open(['route' => 'storeDictionary', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
                              <div class="item form-group">
                                {!! Form::label('nombre','Extension*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  {!! Form::text('nombre',null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'placeholder' => '.png']) !!}
                                </div>
                              </div> 
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                  {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                                </div>
                              </div>
                            {!! Form::close() !!}
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
                                @foreach($dictionary as $extension)
                                  <tr>
                                    <td>{{ $extension->nombre }}</td>
                                    <td>
                                      <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            {!! $dictionary->render() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <!-- /page content -->
@stop