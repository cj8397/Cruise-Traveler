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
                        <?php if(isset($currentUser) && $currentUser->role == 'Host'): ?>
                        <a href="<?php echo e(url('events/update/'.$event->id)); ?>">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Update Event
                            </button>
                        </a>
                        <a href="<?php echo e(url('events/delete/'.$event->id)); ?>">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>Delete Event
                            </button>
                        </a>
                        <?php endif; ?>

                        <?php if(!isset($currentUser)): ?>
                        <?php echo $__env->make('partials.buttons.joinevent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                        <?php if(isset($currentUser) && $currentUser->role != 'Host'): ?>
                        <?php echo $__env->make('partials.buttons.leaveevent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                    </li>
                    <?php if(isset($host)): ?>
                    <li class="list-group-item">
                        <strong>Event Host</strong>
                        <p class="alert alert-info center-block">
                            <?php echo $host->userdetails->first." ".$host->userdetails->last; ?>

                        </p>
                    </li>
                    <?php endif; ?>
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
            <?php if(isset($thread)): ?>
            <div class="col-xs-12">
                <div class="row panel panel-default">
                  <div class="panel-heading">
                    <h2><?php echo $thread->subject; ?></h2>
                  </div>
                  <div class="panel panel-default">
                    <?php foreach($thread->messages as $message): ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img src="//www.gravatar.com/avatar/<?php echo md5($message->user->email); ?>?s=64" alt="<?php echo $message->user->email; ?>" class="img-circle">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><?php echo $message->user->email; ?></h5>
                                <p><?php echo $message->body; ?></p>
                                <div class="text-muted"><small>Posted <?php echo $message->created_at->diffForHumans(); ?></small></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <h3>Add a new message</h3>
                    <?php echo Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']); ?>

                    <!-- Message Form Input -->
                    <div class="form-group">
                        <?php echo Form::textarea('message', null, ['class' => 'form-control']); ?>

                    </div>

                    <!-- Submit Form Input -->
                    <div class="form-group">
                        <?php echo Form::submit('Submit', ['class' => 'btn btn-primary form-control']); ?>

                    </div>
                    <?php echo Form::close(); ?>


                </div>
                </div>
                <?php endif; ?>
            </div>
    </div>
    <?php if(isset($members) && isset($currentUser)): ?>
    <div class="row col-md-5 col-md-offset-1 col-xs-12">
        <div class="panel panel-default col-md-12 col-xs-12">
            <div class="panel panel-heading">Participants</div>
            <div class="panel panel-body">
                <div class="row">
                    <?php foreach($members as $mem): ?>
                        <a class="col-xs-4 col-md-4" href="/users/<?php echo $mem->user_id; ?>">
                            <img class="img-responsive" src="http://placehold.it/750x450" alt="">
                            <span class="label label-default label-pill"><?php echo $mem->userdetails->first." ".$mem->userdetails->last; ?></span>
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