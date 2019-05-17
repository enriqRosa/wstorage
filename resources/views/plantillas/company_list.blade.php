@extends ('temps.header')
@section ('content')
@if(\Auth::user()->tipo_usuario=='SUPER')
                <div class="right_col" role="main">
                    <div class="">
                        <div class="row">
                            <div class="x_content">
                                <div class="x_title">
                                    <h2>Companies</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="title_left">
                                    <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>  
                                </div>                      
                                <div class="row">
                                    @foreach($company as $companies)
                                    <div class="col-md-3 col-xs-12 widget widget_tally_box">
                                        <div class="x_panel fixed_height_390">
                                            <div class="x_title">
                                                <h2> {{ $companies->nombre  }}</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div style="text-align: center; margin-bottom: 17px">
                                                    <img src="{{ Storage::url($companies->logo) }}" height="100px">
                                                </div>
                                                <div class="divider"></div>
                                                    <ul class="legend list-unstyled">
                                                        <li>
                                                            <p>
                                                                <span class="icon"><i class="fa fa-eye dark"></i></span>
                                                                <a href="{{ route('users',$companies->id) }}"><span class="name">View users</span></a>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <span class="icon"><i class="fa fa-book purple"></i></span>
                                                                <a href="{{ route('showContacts',$companies->id) }}"><span class="name">View contacts</span></a>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <span class="icon"><i class="fa fa-pencil blue"></i></span>
                                                                <a href="{{url('/edit-license')}}"><span class="name">Edit</span></a>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>
                                                                <span class="icon"><i class="fa fa-close red"></i></span>
                                                                <a href=""><span class="name">Delete</span></a>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>                                                      
                                        @endforeach
                                    </div>
                            </div>    
                        </div>
                    </div>
                </div>
                @endif
                @if(\Auth::user()->tipo_usuario=='ADMIN')
                <div class="right_col" role="main">
                  <div class="">
                    <div class="x_title">
                        <h2>My Company</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row top_tiles">
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"></div>
                          @foreach($company as $companies)
                            <center><br><h3><img src="{{ Storage::url($companies->logo) }}" height="100px"></h3><br>
                            <div class="count"><h2> {{ $companies->nombre  }}</h2></div>
                            <div class="count"><h2> {{ $companies->direccion  }}</h2></div>
                            <div class="count"><h2> {{ $companies->rfc  }}</h2></div>
                            <p></p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <a href="{{ route('users',$companies->id) }}">
                              <div class="icon"><i class="fa fa-users dark"></i></div>
                              <div class="count">Users</div>
                              <h3>See users active</h3>
                              <p>.</p>
                              </div>
                            </a>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-book dark"></i></div>
                          <div class="count">Contacts</div>
                          <h3>See all contacts</h3>
                          <p>.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <a href="{{ route('showLicenseCompany', $companies->license_id)}}">
                                <div class="icon"><i class="fa fa-check-square-o dark"></i></div>
                                <div class="count">License</div>
                                <h3>Check license status</h3>
                                <p>.</p>
                            </a>
                        </div>
                      </div>
                      @endforeach
                </div>
            </div>
        </div>
@endif
@stop
