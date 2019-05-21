@extends ('temps.header')
@section ('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <!-- MENSAJES FLASH -->
              @if (session('contact-updated'))
                <div class="alert alert-success">
                  {{ session('contact-updated') }}
                </div>
              @endif
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
                    <h2>Edit Contact</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  {!! Form::open(['route' => ['contactUpdate',$contact_info],'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                    {!! csrf_field() !!}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" type="text" value="{{ $contact_info->nombre }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alias">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" class="form-control col-md-7 col-xs-12" value="{{ $contact_info->apellidos }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="{{ $contact_info->email }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="telephone" class="form-control col-md-7 col-xs-12" value="{{ $contact_info->telefono }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ocupation <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="ocupation">
                            <option value="ADMINISTRATOR" @if ($contact_info->ocupacion == 'ADMINISTRATOR') selected @endif>ADMINISTRATOR</option>
                            <option value="COLLABORATOR" @if ($contact_info->ocupacion == 'COLLABORATOR') selected @endif>COLLABORATOR</option>
                            <option value="DIRECTOR" @if ($contact_info->ocupacion == 'DIRECTOR') selected @endif>DIRECTOR</option>
                            <option value="HUMAN RESOURCES" @if ($contact_info->ocupacion == 'HUMAN RESOURCES') selected @endif>HUMAN RESOURCES</option>
                            <option value="PROJECT MANAGER" @if ($contact_info->ocupacion == 'PROJECT MANAGER') selected @endif>PROJECT MANAGER</option>
                            <option value="SOFTWARE MANAGER" @if ($contact_info->ocupacion == 'SOFTWARE MANAGER') selected @endif>SOFTWARE MANAGER</option>
                            <option value="SALES" @if ($contact_info->ocupacion == 'SALES') selected @endif>SALES</option>
                          </select>
                        </div>  
                      </div>               
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="{{ route('showContacts',$contact_info->company_id) }}"><input type="button" class="btn btn-danger" value="Cancel"></a>
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
        