<?php $__env->startSection('content'); ?>

    <style type="text/css">
        ul {
            list-style-type: none;
        }

        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>
        <!-- Intro Section -->
<div class="container-fluid">
    <div class="row col-xs-5 col-md-5">
        <div class="col-md-5 col-xs-5">
            <iframe width="400" height="300"
                    src="https://www.youtube.com/embed/CnAUfvWlBGs"
                    frameborder="2" allowfullscreen></iframe>
        </div>
    </div>

    <?php if(Auth::guest()): ?>
        <div class="row col-xs-5 col-xs-offset-2 col-md-offset-2 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <table class="tg">
                    <tr>
                        <th class="tg-amwm">Username</th>
                        <th class="tg-amwm">Password</th>
                        <th class="tg-amwm">Role</th>
                    </tr>
                    <tr>
                        <td class="tg-baqh">vacation@gmail.com</td>
                        <td class="tg-baqh">password</td>
                        <td class="tg-baqh">Vacationer</td>
                    </tr>
                </table>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your
                                    Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <hr class="style-eight col-md-12 col-xs-12">

        <div class="row">
            <div class="panel panel-default col-md-3 col-xs-12 text-center">
                <div class="row col-md-12 col-xs-12 text-center">
                    <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <h2>Caribbean</h2>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4 text-center">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Gender</h5></li>
                            <li class="list-group-item">Male (67%)</li>
                            <li class="list-group-item">Female (33%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4 text-center">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">Canada</li>
                            <li class="list-group-item">USA</li>
                            <li class="list-group-item">Mexico</li>
                            <li class="list-group-item">England</li>
                            <li class="list-group-item">France</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4 text-center">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">French</li>
                            <li class="list-group-item">Spanish</li>
                            <li class="list-group-item">Chinese</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-xs-12"></div>

            <div class="panel panel-default col-md-3 col-xs-12">
                <div class="row row-centered col-md-12 col-xs-12">
                    <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <h2>Mediterranean</h2>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Gender</h5></li>
                            <li class="list-group-item">Male (50%)</li>
                            <li class="list-group-item">Female (50%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">Spain</li>
                            <li class="list-group-item">China</li>
                            <li class="list-group-item">USA</li>
                            <li class="list-group-item">England</li>
                            <li class="list-group-item">Australia</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">French</li>
                            <li class="list-group-item">Porturguese</li>
                            <li class="list-group-item">Spanish</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-1 col-xs-12"></div>

            <div class="panel panel-default col-md-3 col-xs-12">
                <div class="row row-centered col-md-12 col-xs-12">
                    <img class="img-responsive" src="/images/imgplaceholder.png" alt="">
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <a href="/sailings">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>More Sailings
                        </button>
                    </a>
                </div>
                <div class="row col-md-12 col-xs-12 text-center">
                    <h2>Alaska</h2>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Gender</h5></li>
                            <li class="list-group-item">Male (40%)</li>
                            <li class="list-group-item">Female (60%)</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Countries</h5></li>
                            <li class="list-group-item">China</li>
                            <li class="list-group-item">Russia</li>
                            <li class="list-group-item">Australia</li>
                            <li class="list-group-item">Canada</li>
                            <li class="list-group-item">Brazil</li>
                        </ul>
                    </div>
                    <div class="panel col-md-4 col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item"><h5>Languages</h5></li>
                            <li class="list-group-item">Chinese</li>
                            <li class="list-group-item">English</li>
                            <li class="list-group-item">Spanish</li>
                            <li class="list-group-item">French</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>


<?php /*<!-- Contact Section -->*/ ?>
<?php /*<section id="contact" class="contact-section">*/ ?>
<?php /*<div class="container">*/ ?>
<?php /*<div class="row">*/ ?>
<?php /*<div class="col-lg-12">*/ ?>
<?php /*<h1>Contact Section</h1>*/ ?>
<?php /*</div>*/ ?>
<?php /*</div>*/ ?>
<?php /*</div>*/ ?>
<?php /*</section>*/ ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.scrolling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>