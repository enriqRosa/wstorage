@extends ('temps.header')
@section ('content')
<!-- page content -->
                <div class="right_col" role="main">
                  <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                    <!-- MENSAJES FLASH -->
                    @if (session('dictionary'))
                      <div class="alert alert-success">
                        {{ session('dictionary') }}
                      </div>
                    @endif
                    @if (session('dictionary_destroy'))
                      <div class="alert alert-success">
                        {{ session('dictionary_destroy') }}
                      </div>
                    @endif
                    <!-- /MENSAJES FLASH -->
                    <!-- MENSAJES DE VALIDACIÓN DE CAMPOS -->
                    @if(count($errors) > 0)
                      <div class="alert alert-danger" role="alert">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li> {{$error}} </li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <!-- /MENSAJES DE VALIDACIÓN DE CAMPOS -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Add new extension</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            {!! Form::open(['route' => 'storeDictionary', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
                              <div class="item form-group">
                                {!! Form::label('extension','Extension*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                               
                                <input type="hidden" value="{{ $id_company }}" name="company_id">
                              
                                  {!! Form::text('extension',null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'placeholder' => '.png']) !!}
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
                              @foreach($dictionaries as $dict)
                              <tbody>
                                  <tr>
                                    <td>{{ $dict->nombre }}</td>
                                    <td>
                                      <a href="{{ route('dictionary-destroy', $dict->id) }}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                  </tr>
                              </tbody>
                              @endforeach
                            </table>
                            {!! $dictionaries->render() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <!-- /page content -->
@stop