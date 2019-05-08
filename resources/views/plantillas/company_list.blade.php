@extends ('temps.header')
@section ('content')
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
                                                    <a href="{{url('/contacts')}}"><span class="name">View contacts</span></a>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <span class="icon"><i class="fa fa-check green"></i></span>
                                                    <a href="{{url('/license-status')}}"><span class="name">License status</span></a>
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
@stop