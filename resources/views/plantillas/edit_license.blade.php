@extends ('temps.header')
@section ('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit License for "Company name"</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {!! Form::open(['route' => ['updateLicense',$license_edit],'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                      {!! csrf_field() !!}
                      <div class="item form-group">
                      </div> 
                      <div class="form-group">
                      {!! Form::label('Package Users*','Package Users*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="licencia_total">
                            <option>{{ $license_edit->licencia_total }}</option>
                            @foreach ($user_catalog as $catalog)
                              <option value="{{ $catalog->cantidad }}">{{ $catalog->cantidad }}</option>
                            @endforeach
                          </select>
                        </div>  
                      </div>                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Size <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="tamano_total">
                            @if($license_edit->tamano_total==2000)
                              <option value="{{ $license_edit->tamano_total }}">2 TB</option>                      
                              <option value="2000">4 TB</option>
                              <option value="6000">6 TB</option>
                              <option value="8000">8 TB</option>
                             @endif 
                             @if($license_edit->tamano_total==4000)
                              <option value="{{ $license_edit->tamano_total }}">4 TB</option>                      
                              <option value="2000">2 TB</option>
                              <option value="6000">6 TB</option>
                              <option value="8000">8 TB</option>
                             @endif 
                             @if($license_edit->tamano_total==6000)
                              <option value="{{ $license_edit->tamano_total }}">6 TB</option>                      
                              <option value="2000">2 TB</option>
                              <option value="6000">4 TB</option>
                              <option value="8000">8 TB</option>
                             @endif
                             @if($license_edit->tamano_total==8000)
                              <option value="{{ $license_edit->tamano_total }}">8 TB</option>                      
                              <option value="2000">2 TB</option>
                              <option value="6000">4 TB</option>
                              <option value="8000">6 TB</option>
                             @endif
                          </select>
                        </div>  
                      </div> 
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <a href="{{url('/license-status')}}"><input type="button" class="btn btn-danger" value="Cancel">
                        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
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