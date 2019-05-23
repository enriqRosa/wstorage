@extends ('temps.header')
@section ('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    @if(Session::has('success'))
                                        <div class="alert alert-info" aria-label="Close">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>{{Session::get('success')}}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="x_title">
                            <h2>Edit License for "Company name"</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {!! Form::open(['route' => ['updateLicense',$license_edit->id],'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) !!}
                                {!! csrf_field() !!}
                                <div class="item form-group"></div> 
                                <div class="form-group">
                                    {!! Form::label('Package Users*','Package Users*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="tamano_total">
                                            <option value="30" @if($license_edit->licencia_total == 30) selected @endif >30 users</option>
                                            <option value="50" @if($license_edit->licencia_total == 50) selected @endif >50 users</option>
                                            <option value="100" @if($license_edit->licencia_total == 100) selected @endif >100 users</option>
                                            <option value="200" @if($license_edit->licencia_total == 200) selected @endif >200 users</option>
                                            <option value="500" @if($license_edit->licencia_total == 500) selected @endif >500 users</option>
                                            <option value="1000" @if($license_edit->licencia_total == 1000) selected @endif >1000 users</option>
                                            @foreach ($user_catalog as $catalog)
                                                <option value="{{ $catalog->cantidad }}" @if($catalog->cantidad == $license_edit->licencia_total) selected @endif>{{ $catalog->cantidad }} users</option>
                                            @endforeach
                                        </select>
                                    </div>  
                                </div>                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Size <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="licencia_total">
                                            <option value="2000" @if($license_edit->tamano_total == 2000) selected @endif >2 TB</option>                     
                                            <option value="4000" @if($license_edit->tamano_total == 4000) selected @endif >4 TB</option>
                                            <option value="6000" @if($license_edit->tamano_total == 6000) selected @endif >6 TB</option>
                                            <option value="8000" @if($license_edit->tamano_total == 8000) selected @endif >8 TB</option>                     
                                        </select>
                                    </div>  
                                </div> 
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="{{url('/license-status')}}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                                        {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
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