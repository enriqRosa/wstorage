@extends ('temps.header')
@section ('content')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
            <!-- MENSAJES FLASH -->
            @if (session('user_catalog'))
              <div class="alert alert-success">
                {{ session('user_catalog') }}
              </div>
            @endif
            @if (session('user_catalog_destroy'))
              <div class="alert alert-success">
                {{ session('user_catalog_destroy') }}
              </div>
            @endif
            <!-- /MENSAJES FLASH -->
            <!-- MENSAJES DE VALIDACIÓN DE CAMPOS -->
            @if(count($errors) > 0)
              <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                  @endforeach
                </ul>
              </div>
            @endif
            <!-- /MENSAJES DE VALIDACIÓN DE CAMPOS -->
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add more users</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {!! Form::open(['route' => 'storeUserCatalog', 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) !!}
                      <div class="item form-group">
                        {!! Form::label('nombre','Quantity*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! Form::text('cantidad',null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                      </div> 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User catalog</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Users</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($user_catalog as $catalog)
                            <tr>
                              <td>{{ $catalog->cantidad }}</td>
                              <td><a href="{{ route('catalog-user-destroy', $catalog->id) }}" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <!-- Activar la páginación -->
                    {!! $user_catalog->render() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @stop