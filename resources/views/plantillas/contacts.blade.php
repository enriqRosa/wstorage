@extends ('temps.header')
@section ('content')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>"Contacts</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="title_left">
                    <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>  
                    <a href="{{url('/add-contact')}}"><button type="submit" class="btn btn-success">Add contact</button></a>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                      </div>
                      <div class="clearfix"></div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2>Nicole Pearson</h2>
                              <p><strong>About: </strong>  </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-phone"></i> Phone #: </li>
                                <li><i class="fa fa-google"></i> Email: </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <a href="{{url('/edit-contact')}}"><button type="button" class="btn btn-dark btn-xs">
                                <i class="fa fa-pencil"> </i> Edit Contact
                              </button></a>
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
        <!-- /page content -->
        @stop