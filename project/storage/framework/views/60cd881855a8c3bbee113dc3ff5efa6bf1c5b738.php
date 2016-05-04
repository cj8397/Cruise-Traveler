<?php $__env->startSection('content'); ?>
    <img class="img-responsive" src="/426631.jpg" alt="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-default col-md-6 col-xs-12">
                    <div class="panel panel-heading"><?php echo $event->title; ?></div>
                    <div class="panel panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="<?php echo e(url('events/update/' . $event->id)); ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update Event
                                    </button>
                                </a>
                                <a href="<?php echo e(url('events/delete/' . $event->id)); ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Delete Event
                                    </button>
                                </a>
                                <?php echo $__env->make('partials.buttons.joinevent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php echo $__env->make('partials.buttons.leaveevent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Start Time!</strong>
                                <p class="alert alert-info center-block">
                                    <?php echo $event->start_date; ?>

                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong>End Time!</strong>
                                <p class="alert alert-info center-block">
                                    <?php echo $event->end_date; ?>

                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong>Location!</strong>
                                <p class="alert alert-info center-block">
                                    <?php echo $event->location; ?>

                                </p>
                            </li>
                            <li class="list-group-item">
                                <strong>Description!</strong>
                                <p class="alert alert-info center-block">
                                    <?php echo $event->desc; ?>

                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default col-md-6 col-xs-12">
                    <div class="panel panel-heading">Message Boards!</div>
                    <div class=" panel panel-body">
                        <div class="row">
                            <a class="col-xs-3 col-md-3">
                                <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                <span class="label label-default label-pill">Cheng!</span>
                            </a>
                            <p class="alert alert-info col-xs-9 col-md-9">Cheng just Joined the Event! say HI!</p>
                        </div>
                        <div class="row">
                            <p class="alert alert-success col-xs-9 col-md-9">Lets get the party started!</p>
                            <a class="col-xs-3 col-md-3">
                                <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                <span class="label label-default label-pill">Cheng!</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($members)): ?>
            <div class="row col-md-5 col-md-offset-1 col-xs-12">
                <div class="panel panel-default col-md-12 col-xs-12">
                    <div class="panel panel-heading">Participants</div>
                    <div class="panel panel-body">
                        <div class="row">
                            <?php foreach ($members as $mem): ?>
                                <a class="col-xs-6 col-md-6">
                                    <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                                    <span class="label label-default label-pill"><?php echo $mem->user_id; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.scrolling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>