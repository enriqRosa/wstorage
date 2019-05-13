<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WarriorsStorage</title>
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/nprogress.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/custom.min.css')); ?>" rel="stylesheet">
        <?php echo $__env->yieldContent('file_css'); ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><img src="<?php echo e(asset('images/caja.storage.png')); ?>" width="50px"><span>WarriorsStorage</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="images/user.png" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2><?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellidos); ?></h2>
                            </div>
                        </div>
                        <br/>
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <br><h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a href="<?php echo e(url('/spusr')); ?>"><i class="fa fa-home"></i> Home </a></li>
                                    <li><a href="<?php echo e(url('/archivos')); ?>"><i class="fa fa-folder"></i>My files</a></li>    
                                    <li><a href="<?php echo e(url('/companies')); ?>"><i class="fa fa-building"></i> Companies</a></li>
                                    <li><a href="<?php echo e(url('/user-catalog')); ?>"><i class="fa fa-user"></i> User catalog</a></li>
                                    <li><a href="<?php echo e(url('/license-status')); ?>"><i class="fa fa-file"></i> License</a></li>      
                                    <li><a href="<?php echo e(url('/dictionary')); ?>"><i class="fa fa-book"></i> Dictionary</a></li>     
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/img.jpg" alt=""><?php echo e(Auth::user()->nombre); ?> <?php echo e(Auth::user()->apellidos); ?>

                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="#"> Profile</a></li>
                                        <li><a href="#"><span>Settings</span></a></li>
                                        <li><a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i>Log Out
                                        </a></li>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
                <?php echo $__env->yieldContent('content'); ?>
                <footer>
                
                    <div class="product_social pull-right">
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/WarriorsLabs"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="https://twitter.com/warriorsfim?lang=es"><i class="fa fa-twitter-square"></i></a></li>
                        </ul>
                        Warriors Lab's S.A de C.V
                    </div> 
                    <div class="clearfix"></div>
                </footer>
            </div>
        </div>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/custom.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('file_js'); ?>
    </body>
</html>