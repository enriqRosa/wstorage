@extends ('temps.header')
@section ('content')
                @if(\Auth::user()->tipo_usuario=='SUPER')
                <div class="section-admin container-fluid res-mg-t-15">
                    <div class="row admin text-center">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="admin-content analysis-progrebar-ctn">
                                        <h4 class="text-left text-uppercase"><b>Companies</b></h4><br>
                                        <div class="widget-program-bg">
                                            <div class="container-fluid">
                                                <div class="row">
                                                @foreach($company as $companies)
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="hpanel hbgrey responsive-mg-b-30">
                                                            <div class="panel-body">
                                                                <div class="text-center content-bg-pro">
                                                                    <h3>{{ $companies->nombre }}</h3>
                                                                    <img src="{{ Storage::url($companies->logo) }}" height="100px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="program-widget-bc mt-t-30 mg-b-15">
                                            <div class="container-fluid">
                                                <div class="row">
                                                @foreach($company as $companies)
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="hpanel responsive-mg-b-30">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr><th>{{ $companies->nombre }}</th></tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr><td><a href="{{ route('users',$companies->id) }}"><span class="text-danger font-bold">View Users</span></a></td>
                                                                                <td><i class="fa fa-eye"></i></td>
                                                                            </tr>
                                                                            <tr><td><a href="{{ route('showContacts',$companies->id) }}"><span class="text-danger font-bold">View Contacts</span></a></td>
                                                                                <td><i class="fa fa-book"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href=""><span class="text-danger font-bold">Edit</span></a></td>
                                                                                <td><i class="fa fa-pencil"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href=""><span class="text-danger font-bold">Delete</span></a></td>
                                                                                <td><i class="fa fa-close"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 @endforeach   
                                                </div>
                                            </div>
                                        </div>                               
                                    </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  	                            	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="product-sales-area mg-tb-15">
                        <div class="container-fluid">
                          <div class="row"></div>
                        </div>
                      </div>
                
                @endif
                @if(\Auth::user()->tipo_usuario=='ADMIN')
                <div class="section-admin container-fluid res-mg-t-15">
                    <div class="row admin text-center">     
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="admin-content analysis-progrebar-ctn">
                                        <h4 class="text-left text-uppercase"><b>My Company Info</b></h4><br>
                                        <div class="row vertical-center-box vertical-center-box-tablet">
                                            <div class="widget-program-bg">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                    @foreach($company as $company)
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="hpanel hbgrey responsive-mg-b-30">
                                                                <div class="panel-body">
                                                                    <div class="text_center content-bg-pro">
                                                                        <h3 class="text-uppercase">{{ $company->nombre }}</h3>
                                                                        <p class="text-big font-light">
                                                                            <img src="{{ Storage::url($company->logo) }}">
                                                                        </p>
                                                                        <h3 class="text-uppercase">{{ $company->rfc }}</h3>
                                                                        <h3 class="text-uppercase">{{ $company->direccion }}</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
                <div class="widgets-programs-area mg-t-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                <a href="{{ route('users',$company->id) }}">
                                    <div class="hpanel responsive-mg-b-30">
                                        <div class="panel-body">
                                            <div class="stats-title pull-left">
                                                <h4>Users</h4>
                                            </div>
                                            <div class="stats-icon pull-right">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </div>
                                            <div class="m-t-xl">
                                                <h1 class="text-success">See users active</h1>
                                            <small>
									    	    .
                                            </small>
                                    
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <div class="hpanel responsive-mg-b-30">
                                <a href="{{ route('users',$company->id) }}">
                                    <div class="panel-body">
                                        <div class="stats-title pull-left">
                                            <h4>Contacts</h4>
                                        </div>
                                        <div class="stats-icon pull-right">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </div>
                                        <div class="m-t-xl">
                                            <h1 class="text-warning">View all contacts</h1>
                                        <small>
							    			.
							    		</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                        <a href="{{ route('showLicenseCompany', $company->license_id)}}">
                            <div class="hpanel responsive-mg-b-30">
                                <div class="panel-body">
                                    <div class="stats-title pull-left">
                                        <h4>License</h4>
                                    </div>
                                    <div class="stats-icon pull-right">
                                        <i class="fa fa-check-square-o"></i>
                                    </div>
                                    <div class="m-t-xl">
                                        <h1 class="text-success">Check license status</h1>
                                    <small>
						                .
                                    </small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                </div>
            </div>
        </div>
@endif
@stop
