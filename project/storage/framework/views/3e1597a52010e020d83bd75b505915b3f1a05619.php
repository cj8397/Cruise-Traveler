<?php $__env->startSection('content'); ?>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"
                          action="<?php echo e(url('events/form/post')); ?>">
                        <?php echo csrf_field(); ?>


                        <input type="hidden" name="sailing_id" value=<?php echo $sailing_id; ?>/>
                        <?php if ($errors->has('sailing_id')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('sailing_id')); ?></strong>
                                    </span>
                        <?php endif; ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Event Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title"
                                       value="<?php echo e(old('email')); ?>">

                                <?php if ($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('start') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Start Date And Time</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control date" id="datetimepickerstart" name="start">

                                <?php if ($errors->has('start')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('start')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('end') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">End Date And Time</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" id="datetimepickersend" name="end">

                                <?php if ($errors->has('end')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('end')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('desc') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Event Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="desc">

                                <?php if ($errors->has('desc')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('desc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Event Location</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location">

                                <?php if ($errors->has('location')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('location')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.scrolling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>