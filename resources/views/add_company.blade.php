<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Warriors</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href="vendor/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="vendor/assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
    <link href="vendor/assets/css/demo.css" rel="stylesheet" />
</head>
<body>
<div class="image-container set-full-height" style="background-image: url('images/platilla3-01.jpg');background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form action="{{ route('addCompanyPost') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="wizard-header">
                               <h3>
                                   <b>WARRIORS LAB'S</b> REGISTER YOUR COMPANY <br>
                                   <small>This information will let us know more about you.</small>
                               </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#company" data-toggle="tab">Company</a></li>
                                    <li><a href="#contact" data-toggle="tab">Contact</a></li>
                                    <li><a href="#admin" data-toggle="tab">Administrador</a></li>
                                    <li><a href="#product" data-toggle="tab">License WDStorages</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="company">
                                    <div class="row">
                                        <h4 class="info-text"> Let's start with the basic information about the comapny. <br> All fields are required</h4>
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="" class="picture-src" id="wizardPicturePreview">
                                                    <input type="file" name="logotipo" id="wizard-picture" required>
                                                </div>
                                                <h6>Choose Picture</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Campany name <small>(required)</small></label>
                                                <input name="nombre_compania" type="text" class="form-control" placeholder="Example: Warriors Labs S.A de C.V">
                                            </div>
                                            <div class="form-group">
                                                <label>Alias <small>(required)</small></label>
                                                <input name="alias" type="text" class="form-control" placeholder="Example: warriors, dscorp,...">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>RFC <small>(required)</small></label>
                                                <input name="rfc" type="text" class="form-control" placeholder="Example: WLWDD5498FSX">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Address <small>(required)</small></label>
                                                <input name="direccion" type="text" class="form-control" placeholder="Example: Pedro Santacilia num 24">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contact">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Add the information about the contact </h4>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="nombre_contacto" class="form-control" placeholder="Example: Sergio">
                                              </div>
                                        </div>
                                        <div class="col-sm-5">
                                             <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" name="apellidos_contacto" class="form-control" placeholder="Example: Aguirre">
                                              </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="telefono_contacto" class="form-control" placeholder="Example: +52 5678985423">
                                              </div>
                                        </div>
                                        <div class="col-sm-5">
                                             <div class="form-group">
                                                <label>About</label><br>
                                                 <select name="puesto" class="form-control">
                                                    <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                    <option value="COLLABORATOR">COLLABORATOR</option>
                                                    <option value="PROJECT MANAGER">PROJECT MANAGER</option>
                                                    <option value="SOFTWARE MANAGER">SOFTWARE MANAGER</option>
                                                    <option value="DIRECTOR">DIRECTOR</option>
                                                    <option value="HUMAN RESOURCES">HUMAN RESOURCES</option>
                                                    <option value="SALES">SALES</option>
                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email_contacto" class="form-control" placeholder="Example: soporte@warriorslabs.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="admin">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Create the first administrator for the company </h4>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="nombre_administrador" class="form-control" placeholder="Example: Sergio">
                                              </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Lastname</label>
                                                <input type="text" name="apellidos_administrador" class="form-control" placeholder="Example: Aguirre">
                                              </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Email</label><br>
                                                <input type="email" name="email_administrador" class="form-control" placeholder="Example: soporte@warriorslabs.com">
                                              </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="***********">
                                              </div>
                                        </div>
                                        <div class="col-sm-5">
                                             <div class="form-group">
                                                <label>Confirm password</label>
                                                <input type="password" name="confirmar_contrasenia" id="confirmar_contrasenia" class="form-control" placeholder="***********">
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> License </h4>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Model</label>
                                                <select name="modelo" id="modelo" class="form-control">
                                                    <option value="CLOUD">CLOUD</option>
                                                    <option value="SITE" selected>SITE</option>
                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                             <div class="form-group">
                                                <label>Type</label>
                                                <select name="tipo" id="tipo_venta" class="form-control">
                                                    <option value="DEMO">DEMO</option>
                                                    <option value="SALES" selected>SALES</option>
                                                </select>
                                              </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <select name="tiempo" id="tiempo" class="form-control">
                                                    <option value="15 days">15 days</option>
                                                    <option value="1 month">1 month</option>
                                                    <option value="2 month">2 month</option>
                                                    <option value="3 month">3 month</option>
                                                    <option value="6 month">6 month</option>
                                                    <option value="12 month" selected>12 month</option>
                                                    <option value="24 month">24 month</option>
                                                    <option value="36 month">36 month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Space</label>
                                                <select name="tamanio" class="form-control">
                                                    <option value="2000">2 TB</option>
                                                    <option value="4000">4 TB</option>
                                                    <option value="6000">6 TB</option>
                                                    <option value="8000">8 TB</option>
                                                    <option value="10000">10 TB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <label>Users</label>
                                                <select name="usuarios" class="form-control">
                                                    <option value="30">30 users</option>
                                                    <option value="50">50 users</option>
                                                    <option value="100" selected>100 users</option>
                                                    <option value="200">200 users</option>
                                                    <option value="500">500 users</option>
                                                    <option value="1000">1000 users</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            WarriorsLab's. All Rights Reserved.
        </div>
    </div>
</div>
</body>
    <script src="vendor/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="vendor/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="vendor/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="vendor/assets/js/gsdk-bootstrap-wizard.js"></script>
    <script src="vendor/assets/js/jquery.validate.min.js"></script>
</html>