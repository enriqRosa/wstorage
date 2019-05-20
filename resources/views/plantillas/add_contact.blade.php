@extends ('temps.header')
@section ('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Contact</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {!! Form::open(['route' => 'create-contact', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
                      <div class="item form-group">
                        {!! Form::label('name','Name*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <input type="hidden" value="{{$company_id}}" name="company_id">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('name',null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'style' => 'text-transform: uppercase;']) !!}
                        </div>
                      </div>
                      <div class="item form-group">
                        {!! Form::label('last_name','Last name*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!} 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('last name',null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'style' => 'text-transform: uppercase;']) !!}
                        </div>
                      </div>
                      <div class="item form-group">
                        {!! Form::label('email','Email*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('email',null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                      </div>
                      <div class="item form-group">
                        {!! Form::label('telephone','Telephone*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('telephone',null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        {!! Form::label('ocupation','Ocupation*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="ocupation">
                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                            <option value="COLLABORATOR">COLLABORATOR</option>
                            <option value="DIRECTOR">DIRECTOR</option>
                            <option value="HUMAN RESOURCES">HUMAN RESOURCES</option>
                            <option value="PROJECT MANAGER">PROJECT MANAGER</option>
                            <option value="SOFTWARE MANAGER">SOFTWARE MANAGER</option>
                            <option value="SALES">SALES</option>
                          </select>
                        </div>  
                      </div>          
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="{{url('/contacts')}}"><button type="submit" class="btn btn-danger">Cancel</button></a>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                    {!! Form::close() !!}      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @stop
        