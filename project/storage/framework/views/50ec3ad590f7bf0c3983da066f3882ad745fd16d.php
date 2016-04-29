<?php $__env->startSection('content'); ?>
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2><?php echo e($sailing->id); ?><?php echo e($sailing->cruise_line); ?><?php echo e($sailing->title); ?></h2>
            <a href="<?php echo e(action('EventsController@GetAllEvents', [$sailing->id])); ?>">
                <img class="img-responsive" src="/images/sailingInfo.png" alt="">
            </a>
            <?php echo $__env->make('partials/buttons/joinsailing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('partials/buttons/leavesailing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.thumbnail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>