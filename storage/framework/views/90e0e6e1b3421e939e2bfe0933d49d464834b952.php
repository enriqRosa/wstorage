<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WarriorsStorage</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(images/icons/Slanted-Gradient.svg);">
                        <span class="login100-form-title-1">
                            <img src="images/logowarrylabs-03.png" height="120px">
                        </span>
                    </div>
                    <form class="login100-form validate-form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-12">
                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter email">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Enter password">
                            <span class="focus-input100"></span>
                    </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <label>
                                    <a href="<?php echo e(route('addCompany')); ?>">Register company</a>
                                </label>
                            </div>

                            <div>
                                <a href="#" class="txt1">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>
    </body>
</html>
