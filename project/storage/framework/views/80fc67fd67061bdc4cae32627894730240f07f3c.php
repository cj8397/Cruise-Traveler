<?php $__env->startSection('content'); ?>

    <!-- Intro Section -->
    <div class="container-fluid">
        <div class="row col-xs-5 col-md-5">
            <div class="col-md-5 col-xs-5">
                <iframe width="400" height="300"
                        src="https://www.youtube.com/embed/CnAUfvWlBGs"
                        frameborder="2" allowfullscreen></iframe>
            </div>
        </div>

        <?php if (Auth::guest()): ?>
        <div class="row col-xs-5 col-xs-offset-2 col-md-offset-2 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <style type="text/css">
                    .tg {
                        border-collapse: collapse;
                        border-spacing: 0;
                    }

                    .tg td {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        padding: 10px 12px;
                        border-style: solid;
                        border-width: 1px;
                        overflow: hidden;
                        word-break: normal;
                    }

                    .tg th {
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        font-weight: normal;
                        padding: 10px 12px;
                        border-style: solid;
                        border-width: 1px;
                        overflow: hidden;
                        word-break: normal;
                    }

                    .tg .tg-baqh {
                        text-align: center;
                        vertical-align: top
                    }

                    .tg .tg-amwm {
                        font-weight: bold;
                        text-align: center;
                        vertical-align: top
                    }
                </style>
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
                                <input type="email" class="form-control" name="email"
                                       value="<?php echo e(old('email')); ?>">

                                <?php if ($errors->has('email')): ?>
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

                                <?php if ($errors->has('password')): ?>
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
            <div class="col-md-4 col-xs-4">
                <a href="/sailings">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="">
                </a>
                <p>200 going 80% male 20% male 12 events plan</p>
                <h2>
                    Caribbean
                </h2>
            </div>
            <div class="col-md-4 col-xs-4">
                <a href="/sailings">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="">
                </a>
                <p>200 going 80% male 20% male 12 events plan</p>
                <h2>
                    Mediterranean
                </h2>
            </div>
            <div class="col-md-4 col-xs-4">
                <a href="/sailings">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="">
                </a>
                <p>200 going 80% male 20% male 12 events plan</p>
                <h2>
                    Alaska
                </h2>
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