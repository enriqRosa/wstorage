@extends ('temps.header')
@section ('file_css')
    <link href="{{ asset('dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dropzone/estilos.css') }}" rel="stylesheet">
@stop
@section ('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="x_content">
                    <div class="x_title">
                        <h2>My files</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="title_left">
                        <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>  
                    </div>     
                    <br>          
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="height:600px;">      
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="pricing text-info">
                                                    <div class="title">
                                                        <h1>Storage information</h1>
                                                    </div>
                                                <div class="x_content">
                                                  <div class="">
                                                    <div class="pricing_features">
                                                      <ul class="list-unstyled text-left">
                                                        <li><strong>Total space: 5 GB</strong></li>
                                                        <li><strong>Use space: 3 GB</strong></li>
                                                        <li><strong>Free space: 2GB</strong></li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                  <div class="pricing_footer">
                                                    <a href="#" class="btn btn-warning btn-block" role="button">New folder</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-9 col-sm-3 col-xs-12">
                                                <div class="row">
                        <div class="form-container">
                           {!! Form::open(['route'=> 'archivos.store', 'method' => 'POST', 'files'=>'true', 'id' => 'FormUploadFile' , 'class' => 'dropzone']) !!}
                                <div class="dz-message">
                                    <div class="icon">
                                        <i class="fa fa-cloud-upload"></i>
                                    </div>
                                    <h2>Release your files here.</h2>
                                    <span class="note">There are no files</span>
                                </div>
                                <div class="fallback">
                                    <input type="file" name="file" multiple>
                                </div>
                            {!! Form::close() !!}
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
        </div>
    </div>
@stop
@section ('file_js')
    <script src="{{ asset('dropzone/dropzone.js') }}"></script>
    <script>
        Dropzone.options.FormUploadFile = {
            maxFilesize: 50,
            addRemoveLinks: true,
            headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
            //acceptedFiles: ".pdf",
        }
    </script>
@stop