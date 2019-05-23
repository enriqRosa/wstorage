@extends ('temps.header')
@section ('file_css')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css" rel="stylesheet">
@stop
@section ('content')
            <div class="section-admin container-fluid res-mg-t-15">
                <div class="row admin text-center">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="admin-content analysis-progrebar-ctn">
                                @foreach($company_name as $name)
                                    <h4 class="text-left text-uppercase"><b>{{ $name->nombre }} Users</b></h4><br>
                                    <div class="row vertical-center-box vertical-center-box-tablet">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>
                                            <a href="{{ route('createUser',$name->company_id) }}"><button type="submit" class="btn btn-success">New User</button></a> 
                                        </div>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widgets-programs-area mg-t-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">                   
                            <div class="hpanel responsive-mg-b-30">
                                <div class="panel-body">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>  
                                                    <th>Name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Space</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $users)
                                                    <tr>
                                                        <td>{{$users->name}}</td>
                                                        <td>{{$users->apellidos}}</td>
                                                        <td>{{$users->email}}</td>
                                                        <td>{{$users->tamano}} GB</td>
                                                        <td>{{$users->tipo_usuario}}</td>
                                                        <td>
                                                                <a href="{{ route('updateUser', $users->id) }}" class="btn btn-custon-rounded-four btn-warning">
                                                                    <i class="fa fa-pencil"></i> Edit 
                                                                </a>                                                      
                                                                <a href="{{ route('deleteUser', $users->id) }}" onclick="return confirm('Are you sure you want to delete this user?\nAll data will be deleted!')" class="btn btn-custon-rounded-four btn-danger"><i class="fa fa-trash-o"></i> Delete </a>
                                                            
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
    <div class="product-sales-area mg-b-10">
      <div class="container-fluid">
        <div class="row"></div>
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