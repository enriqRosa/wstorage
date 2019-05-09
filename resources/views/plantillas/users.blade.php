@extends ('temps.header')
@section ('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div><!--SALTO DE LÍNEA-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>"Company" Users</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="title_left">
                            <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a> 
                            
                          
                        </div> 
                        <div class="x_content">
                            <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer">
                                            <thead>
                                                <tr>  
                                                    <th>Name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Space</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user as $users)
                                                <tr>
                                                    <td>{{$users->nombre_company}}</td>
                                                    <td>{{$users->nombre}}</td>
                                                    <td>{{$users->apellidos}}</td>
                                                    <td>{{$users->email}}</td>
                                                    <td>{{$users->tamano}}</td>
                                                    
                                                    <td>
                                                        <a href="{{url('/edit-user')}}" class="btn btn-dark btn-xs"><i class="fa fa-pencil"></i> Edit </a>
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