<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register A New Sailing</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="<?php echo e(action('SailingsController@CreateSailing')); ?>">
                            <?php echo csrf_field(); ?>


                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Sailing Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title">

                                    <?php if ($errors->has('title')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('cruise_line') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Cruise Line</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cruise_line">

                                    <?php if ($errors->has('cruise_line')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('cruise_line')); ?></strong>
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

                            <div class="form-group<?php echo e($errors->has('port_org') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Port of Origin</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="port_org">

                                    <?php if ($errors->has('port_org')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('port_org')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('port_dest') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Port of Destination</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="port_dest">

                                    <?php if ($errors->has('port_dest')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('port_dest')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('destination') ? ' has-error' : ''); ?>">
                                <label class="col-md-4 control-label">Sailing Destination</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="destination">

                                    <?php if ($errors->has('destination')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('destination')); ?></strong>
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