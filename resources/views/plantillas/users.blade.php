@extends ('temps.header')
@section ('file_css')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
@stop
@section ('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div><!--SALTO DE LÍNEA-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        @foreach($company_name as $name)
                            <div class="x_title">
                                <h2>"{{ $name->nombre }}" Users</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="title_left">
                                <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>
                                <a href="{{ route('createUser',$name->company_id) }}"><button type="submit" class="btn btn-success">New User</button></a> 
                            </div>
                        @endforeach
                        <div class="x_content">
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>  
                                                    <th>Name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Space</th>
                                                    <th>Role</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $users)
                                                    <tr>
                                                        <td>{{$users->nombre}}</td>
                                                        <td>{{$users->apellidos}}</td>
                                                        <td>{{$users->email}}</td>
                                                        <td>{{$users->tamano}} GB</td>
                                                        <td>{{$users->tipo_usuario}}</td>
                                                        <td>
                                                            <a href="{{ route('updateUser', $users->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-plus-square"></i> Assign space </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
@stop
@section ('file_js')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );
         
            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>
@stop