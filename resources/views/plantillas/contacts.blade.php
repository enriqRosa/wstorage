@extends ('temps.header')
@section ('content')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <!-- MENSAJES FLASH -->
              @if (session('contact-destroy'))
                <div class="alert alert-success">
                  {{ session('contact-destroy') }}
                </div>
              @endif
              <div class="col-md-12">
                <div class="x_panel">
                <div class="x_title">
                    <h2>Contacts</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="title_left">
                    <a href="{{url('/companies')}}"><button type="submit" class="btn btn-danger">Back</button></a>  
                    <a href="{{ route('storeContact',$company_id[0]->company_id) }}"><button type="submit" class="btn btn-success">Add contact</button></a>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                      </div>
                      <div class="clearfix"></div>      
                      @foreach ($company_contacts as $contacts)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <div class="left col-xs-7">
                              <h2>{{ $contacts->nombre }} {{ $contacts->apellidos }}</h2>
                              <p><strong>About: {{ $contacts->ocupacion }} </strong>  </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-phone"></i> Phone #: {{ $contacts->telefono }}</li>
                                <li><i class="fa fa-google"></i> Email: {{ $contacts->email }}</li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="http://localhost:8000/images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <a href="{{url('/edit-contact')}}"><button type="button" class="btn btn-dark btn-xs">
                                <i class="fa fa-pencil"> </i> Edit 
                              </button></a>
                              
                              <a href="{{ route('contact-destroy', $contacts->id) }}"><button type="button" class="btn btn-dark btn-xs">
                                <i class="fa fa-user-times"> </i> Delete
                              </button></a>
                              
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
        <!-- /page content -->
        @stop