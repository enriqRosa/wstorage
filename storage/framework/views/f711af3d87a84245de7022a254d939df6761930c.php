<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Warriors Lab's</title>
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/icons/favicon.ico')); ?>"/>
       
        <link href="<?php echo e(asset('css/principal/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/bootstrap.mi.css')); ?>" rel="stylesheet">
   
        <!-- PLANTILLA PRINCIPAL -->
        <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
        <!-- owl.carousel CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/owl.carousel.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/principal/owl.theme.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/principal/owl.transitions.css')); ?>" rel="stylesheet">
        <!-- animate CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/animate.css')); ?>" rel="stylesheet">
        <!-- normalize CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/normalize.css')); ?>" rel="stylesheet">
        <!-- meanmenu icon CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/meanmenu.min.css')); ?>" rel="stylesheet">
        <!-- main CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/main.css')); ?>" rel="stylesheet">
        <!-- morrisjs CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/morris.css')); ?>" rel="stylesheet">
        <!-- mCustomScrollbar CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/jquery.mCustomScrollbar.min.css')); ?>" rel="stylesheet">
        <!-- metisMenu CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/metisMenu.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/principal/metisMenu-vertical.css')); ?>" rel="stylesheet">
        <!-- calendar CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/fullcalendar.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/principal/fullcalendar.print.min.css')); ?>" rel="stylesheet">
        <!-- style CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/style.css')); ?>" rel="stylesheet">
        <!-- responsive CSS
	    	============================================ -->
        <link href="<?php echo e(asset('css/principal/responsive.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/principal/alerts.css')); ?>" rel="stylesheet">
        <!-- modernizr JS
	    ============================================ -->
        <script src="<?php echo e(asset('js/principal/modernizr-2.8.3.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('file_css'); ?>
    </head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="images/STORAGE.png" alt="" width="210px" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="sidebar-header">
                <a href="index.html"><img src="images/caja.storage.png" alt=""/></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="">
                               <span class="mini-click-non"></span>
                            </a>
                        </li>
                        <?php if(\Auth::user()->tipo_usuario=='SUPER'): ?>
                            <li><a href="<?php echo e(url('/spusr')); ?>"><i class="fa big-icon fa-home icon-wrap"></i><span class="mini-click-non">Home</span></a></li>
                            <li><a href="<?php echo e(url('/companies')); ?>" aria-expanded="false"><i class="fa big-icon fa-building icon-wrap"></i><span class="mini-click-non">Companies</span></a></li>
                            <li><a href="<?php echo e(url('/license-status')); ?>" aria-expanded="false"><i class="fa big-icon fa-building icon-wrap"></i><span class="mini-click-non">License</span></a></li>
                            <li><a href="<?php echo e(url('/user-catalog')); ?>" aria-expanded="false"><i class="fa big-icon fa-user icon-wrap"></i><span class="mini-click-non">User Catalog</span></a></li>
                            <li><a href="<?php echo e(url('/dictionary')); ?>" aria-expanded="false"><i class="fa big-icon fa-book icon-wrap"></i><span class="mini-click-non">Dictionary</span></a></li>
                        <?php endif; ?>
                        <?php if(\Auth::user()->tipo_usuario=='ADMIN'): ?>
                            <li><a href="<?php echo e(url('/ursad')); ?>"><i class="fa big-icon fa-home icon-wrap"></i><span class="mini-click-non">Home</span></a></li>
                            <li><a href="<?php echo e(url('/files')); ?>" aria-expanded="false"><i class="fa big-icon fa-folder-open icon-wrap"></i><span class="mini-click-non">My Files</span></a></li>
                            <li><a href="<?php echo e(url('/companies')); ?>" aria-expanded="false"><i class="fa big-icon fa-building icon-wrap"></i><span class="mini-click-non">My Company</span></a></li>
                            <li><a href="<?php echo e(url('/dictionary')); ?>" aria-expanded="false"><i class="fa big-icon fa-book icon-wrap"></i><span class="mini-click-non">Dictionary</span></a></li>
                        <?php endif; ?>
                        <?php if(\Auth::user()->tipo_usuario=='USER'): ?>
                            <li><a class="<?php echo e(url('/files')); ?>" href="#" aria-expanded="false"><i class="fa big-icon fa-folder-open icon-wrap"></i><span class="mini-click-non">My Files</span></a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="images/STORAGE.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="fa fa-bars"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Warrior's Labs</a>
                                                </li>   
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-envelope-o adminpro-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                          <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart adminpro-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
															<span class="admin-name"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->apellidos); ?></span>
															<i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"> 
                                                        <li><a href="#"><span class="fa fa-user author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="#"><span class="fa fa-cog author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="<?php echo e(route('logout')); ?>"
                                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"><span class="fa fa-lock author-log-ic"></span>Log Out</a>
                                                        </li>
                                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                            <?php echo e(csrf_field()); ?>

                                                        </form>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                    <?php if(\Auth::user()->tipo_usuario=='SUPER'): ?>
                                        <li><a data-toggle="collapse" data-target="#Charts" href="<?php echo e(url('/spusr')); ?>">Home<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/companies')); ?>">Companies<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/license-status')); ?>">License<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/user-catalog')); ?>">User Catalog<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/dictionary')); ?>">Dictionary<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                    <?php endif; ?>
                                    <?php if(\Auth::user()->tipo_usuario=='ADMIN'): ?>
                                        <li><a data-toggle="collapse" data-target="#Charts" href="<?php echo e(url('/ursad')); ?>">Home<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/files')); ?>">My Files<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/companies')); ?>">My Company<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="{url('/dictionary')}}">Dictionary<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                    <?php endif; ?>
                                    <?php if(\Auth::user()->tipo_usuario=='USER'): ?>
                                        <li><a data-toggle="collapse" data-target="#demo" href="<?php echo e(url('/files')); ?>">My Files<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a></li>
                                    <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                            </div>
                            <div class="breadcome-list">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2019 Warriors Lab's</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- PLANTILLA PRICIPAL -->
        <!-- jquery
		============================================ -->
        <script src="<?php echo e(asset('js/principal/jquery-1.11.3.min.js')); ?>"></script>
        <!-- bootstrap JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/bootstrap.min.js')); ?>"></script>
        <!-- wow JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/wow.min.js')); ?>"></script>
        <!-- meanmenu JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/jquery.meanmenu.js')); ?>"></script>
        <!-- owl.carousel JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/owl.carousel.min.js')); ?>"></script>
        <!-- sticky JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/jquery.sticky.js')); ?>"></script>
        <!-- scrollUp JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/jquery.scrollUp.min.js')); ?>"></script>
        <!-- mCustomScrollbar JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/mCustomScrollbar-active.js')); ?>"></script>
        <!-- metisMenu JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/metisMenu-active.js')); ?>"></script>
        <!-- morrisjs JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/raphael-min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/morris.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/morris-active.js')); ?>"></script>
        <!-- morrisjs JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/jquery.sparkline.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/jquery.charts-sparkline.js')); ?>"></script>
        <!-- calendar JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/fullcalendar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/principal/fullcalendar-active.js')); ?>"></script>
        <!-- plugins JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/plugins.js')); ?>"></script>
        <!-- main JS
	    	============================================ -->
        <script src="<?php echo e(asset('js/principal/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('file_js'); ?>
    </body>
</html>