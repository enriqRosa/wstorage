@extends ('temps.header')
@section ('file_css')
    <link href="{{ asset('dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dropzone/estilos.css') }}" rel="stylesheet">
@stop
@section ('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="x_title">
                <h2>Space</h2>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <p class="lead">Space information</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            {{--@foreach($license as $licenses)--}}
                                                <tr>
                                                    <th style="width:50%">Free Space:</th>
                                                    <td><h5><span class="label label-success">{{-- $licenses->tamano_restante --}} GB</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Use Space:</th>
                                                    <td><h5><span class="label label-danger">{{-- $licenses->tamano_total - $licenses->tamano_restante --}} GB</span></h5></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Space:</th>
                                                    <td><h5><span class="label label-primary">{{-- $licenses->tamano_total --}} GB</span></h5></td>
                                                </tr>
                                            {{--@endforeach--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                        <h2>Folders and files</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php 
                        while (($archivo = readdir($gestor)) !== false) {
                            $ruta_completa = $path . "/" . $archivo;
                            if ($archivo != "." && $archivo != ".."){
                                if (is_dir($ruta_completa)) {
                                    $carpeta = $archivo; ?>
                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h4><?php echo substr($carpeta, 0, 19) ?>...</h4>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="media event col-md-12">
                                                    <a class="pull-left border-aero profile_thumb" href="{{ route('showFilesSubFolder', array($ruta_local, $carpeta)) }}">
                                                        <i class="fa fa-folder aero"></i>
                                                    </a>
                                                    <p>
                                                        <form class="form-horizontal form-label-left" action="{{ route('downloadFolder') }}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" value="{{ $carpeta }}" name="folder">
                                                            <button type="submit" class="btn btn-primary btn-xs">Download</button>
                                                        </form>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        }
                    ?>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                        <h2>Files</h2>
                        <div class="clearfix"></div>
                    </div>
                    <table id="example" class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr>  
                                <th>Name</th>
                                <th>Download</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while (($archivo = readdir($gestor2)) !== false) {
                                    $ruta_completa = $path2 . "/" . $archivo;
                                    if ($archivo != "." && $archivo != ".."){
                                        if (is_dir($ruta_completa)) {?>
                                        <?php
                                        }else { ?>
                                            <tr>
                                                <td><?php echo $archivo ?></td>
                                                <td>
                                                    <form class="form-horizontal form-label-left" action="{{ route('downloadFile') }}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$ruta_local}}" name="ruta_local">
                                                        <input type="hidden" value="{{$archivo}}" name="archivo">
                                                        <button type="submit" class="btn btn-primary btn-xs">Download</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form class="form-horizontal form-label-left" action="{{ route('deleteFile') }}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$ruta_local}}" name="ruta_local">
                                                        <input type="hidden" value="{{$archivo}}" name="archivo">
                                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>                 
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_content">
                        <div class="form-container">
                            {!! Form::open(['route'=> 'archivos.store', 'method' => 'POST', 'files'=>'true', 'id' => 'FormUploadFile' , 'class' => 'dropzone']) !!}
                                <input type="hidden" value="{{$ruta_local}}" name="ruta_local">
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
@stop
@section ('file_js')
    <script src="{{ asset('dropzone/dropzone.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        Dropzone.options.FormUploadFile = {
            maxFilesize: 50,
            //addRemoveLinks: true,
            //acceptedFiles: "{{ $dictionary }}",
        }
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            });
            new $.fn.dataTable.FixedHeader( table );
        });
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
@stop