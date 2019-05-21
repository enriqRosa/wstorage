@extends ('temps.header')
@section ('content')
        <div class="right_col" role="main">
          <div class="">                                                                                                      
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_title">
                  <h2>Server Status</h2>
                  <div class="clearfix"></div>
                </div>
                <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                  <div class="row">
                    <div class="col-sm-12">
                      <center><iframe src="http://189.204.31.154:5602/app/kibana#/dashboard/79ffd6e0-faa0-11e6-947f-177f697178b8?embed=true&_g=(refreshInterval%3A(pause%3A!f%2Cvalue%3A10000)%2Ctime%3A(from%3Anow%2Fd%2Cmode%3Aquick%2Cto%3Anow))" height="600" width="1090"></iframe>
                    </div>
                  </div>
                </div>
              </div>       
            </div>
          </div>
        </div>
@stop

        