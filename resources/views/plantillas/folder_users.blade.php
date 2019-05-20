@extends ('temps.header')
@section ('file_css')
    <link href="{{ asset('dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dropzone/estilos.css') }}" rel="stylesheet">
@stop
@section ('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="x_title">
                <h2>Folders Users</h2>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="col-md-12">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <p class="lead">Space information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @foreach($license as $licenses)
                                                <tr>
                                                    <th style="width:50%">Free Space:</th>
                                                    <td><h5><span class="label label-success">{{ $licenses->tamano_restante }} GB</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Use Space:</th>
                                                    <td><h5><span class="label label-danger">{{ $licenses->tamano_total - $licenses->tamano_restante }} GB</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Space:</th>
                                                    <td><h5><span class="label label-primary">{{ $licenses->tamano_total }} GB</span></h5></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <p class="lead">License information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @foreach($license as $licenses)
                                                <tr>
                                                    <th style="width:50%">Licenses Available</th>
                                                    <td><h5><span class="label label-success">{{ $licenses->licencia_restante }}</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>License Use:</th>
                                                    <td><h5><span class="label label-danger">{{ $licenses->licencia_total - $licenses->licencia_restante }}</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Licenses:</th>
                                                    <td><h5><span class="label label-primary">{{ $licenses->licencia_total }}</span></h5></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_title">
                        <h2>Folders Users</h2>
                        <div class="clearfix"></div>
                    </div>
                    @foreach($folder as $folders)
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h4>{{ $folders->ruta_local }}</h4>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="media event col-md-12">
                                        <a class="pull-left border-aero profile_thumb" href="{{ route('showFilesFolder',$folders->ruta_local) }}">
                                            <i class="fa fa-folder aero"></i>
                                        </a>
                                        <p>
                                            <form class="form-horizontal form-label-left" action="{{ route('downloadFolder') }}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" value="{{ $folders->ruta_local }}" name="ruta_local">
                                                <button type="submit" class="btn btn-primary btn-xs">Download</button>
                                            </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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