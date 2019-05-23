@extends ('temps.header')
@section ('content')
    <!-- /page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title"></div>
            <div class="clearfix"></div><!--SALTO DE LÍNEA-->
            <div class="row">
                @if (session('license_update'))
                    <div class="alert alert-success">
                        {{ session('license_update') }}
                    </div>
                @endif
                @if (session('license_destroy'))
                    <div class="alert alert-success">
                        {{ session('license_destroy') }}
                    </div>
                @endif
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>License Status</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="title_left">
                            <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>  
                        </div>
                        <div class="x_content">
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
                                                @if (\Auth::user()->tipo_usuario=='SUPER')
                                                    @foreach($company_license as $view)
                                                        <tr>
                                                            <td>{{ $view->nombre }}</td>
                                                            <td>{{ $view->serial }}</td>
                                                            <td>{{ $view->modelo }}</td>
                                                            <td>{{ $view->tipo }}</td>
                                                            <td>{{ $view->tiempo }}</td>
                                                            <td>{{ $view->status }}</td>
                                                            <td>{{ $view->fecha_inicio }}</td>
                                                            <td>{{ $view->fecha_fin }}</td>
                                                            @if ($view->tamano_total==2000)
                                                            <td><h4><span class="label label-success">2 TB</span></h4></td>
                                                            @endif
                                                            @if ($view->tamano_total==4000)
                                                                <td><h4><span class="label label-success">4 TB</span></h4></td>
                                                            @endif
                                                            @if ($view->tamano_total==6000)
                                                                <td><h4><span class="label label-success">6 TB</span></h4></td>
                                                            @endif
                                                            @if ($view->tamano_total==8000)
                                                                <td><h4><span class="label label-success">8 TB</span></h4></td>
                                                            @endif
                                                            @if ($view->tamano_total==10000)
                                                                <td><h4><span class="label label-success">10 TB</span></h4></td>
                                                            @endif
                                                            @if ($view->tamano_total==14000)
                                                                <td><h4><span class="label label-success">14 TB</span></h4></td>
                                                            @endif
                                                            @if ($view->tamano_total==16000)
                                                                <td><h4><span class="label label-success">16 TB</span></h4></td>
                                                            @endif
                                                            <td><h4><span class="label label-success">{{ $view->licencia_total }}</span></h4></td>
                                                            <td><h4><span class="label label-danger">{{ $view->tamano_restante }}</h4></span></td>
                                                            <td><h4><span class="label label-danger">{{ $view->licencia_restante }}</h4></span></td>
                                                            <td>
                                                                <a href="{{ route('edit-license',$view->license_id) }}" class="btn btn-dark btn-xs">
                                                                    <i class="fa fa-pencil"></i> Edit 
                                                                </a>
                                                                <a href="{{ route('license-destroy', $view->license_id) }}" onclick="return confirm('Are you sure you want to delete this item?\nAll users and data will be deleted!')" class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-trash-o"></i> Delete 
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                @if(\Auth::user()->tipo_usuario=='ADMIN')
                                                    @foreach($company_status as $status)
                                                        <td>{{ $status->nombre }}</td>
                                                        <td>{{ $status->serial }}</td>
                                                        <td>{{ $status->modelo }}</td>
                                                        <td>{{ $status->tipo }}</td>
                                                        <td>{{ $status->tiempo }}</td>
                                                        <td>{{ $status->status }}</td>
                                                        <td>{{ $status->fecha_inicio }}</td>
                                                        <td>{{ $status->fecha_fin }}</td>
                                                        @if ($status->tamano_total==2000)
                                                            <td><h4><span class="label label-success">2 TB</span></h4></td>
                                                        @endif
                                                        @if ($status->tamano_total==4000)
                                                            <td><h4><span class="label label-success">4 TB</span></h4></td>
                                                        @endif
                                                        @if ($status->tamano_total==6000)
                                                            <td><h4><span class="label label-success">6 TB</span></h4></td>
                                                        @endif
                                                        @if ($status->tamano_total==8000)
                                                            <td><h4><span class="label label-success">8 TB</span></h4></td>
                                                        @endif
                                                        @if ($status->tamano_total==10000)
                                                            <td><h4><span class="label label-success">10 TB</span></h4></td>
                                                        @endif
                                                        @if ($status->tamano_total==14000)
                                                            <td><h4><span class="label label-success">14 TB</span></h4></td>
                                                        @endif
                                                        @if ($status->tamano_total==16000)
                                                            <td><h4><span class="label label-success">16 TB</span></h4></td>
                                                        @endif
                                                        <td><h4><span class="label label-success">{{ $status->licencia_total }}</span></h4></td>
                                                        <td><h4><span class="label label-danger">{{ $status->tamano_restante }}</span></h4></td>
                                                        <td><h4><span class="label label-danger">{{ $status->licencia_restante }}</span></h4></td>
                                                    @endforeach
                                                @endif
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