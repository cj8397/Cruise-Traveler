<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style>
        .panel-heading {
            margin-top:0;
        }

        .col-xs-4 {
            padding-left: 0;
            margin-right: 10px;
        }

        .col-xs-6, .panel .col-xs-12 {
            padding: 0px;
        }

        .col-xs-8 {
            padding-left: 10px;
            padding-right: 0;
            width: 65%;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <img class="img-responsive" src="/426631.jpg" alt="">
        <div class="col-xs-12 text-center">
            <div class="col-xs-4">
                <div class="row panel panel-default">
                    <h2 class="panel-heading"><?php echo e($sailing->title); ?> <?php echo e($sailing->cruise_line); ?> </h2>
                    <?php echo $__env->make('partials/buttons/joinsailing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('partials/buttons/leavesailing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <a href="<?php echo e(action('EventsController@GetAllEvents', [$sailing->id])); ?>">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>View Events
                        </button>
                    </a>
                    <h4 class="panel-heading">Number of travellers</h4>
                    <div class="panel-body">
                        <h4>3,409</h4>
                    </div>
                    <h4 class="panel-heading">Number of Male</h4>
                    <div class="panel-body">
                        <h4>2,000</h4>
                    </div>
                    <div class="panel-heading">
                        <h4>Number of Female</h4>
                    </div>
                    <div class="panel-body">
                        <h4>1,409</h4>
                    </div>
                    <h4 class="panel-heading">Number of travellers with children between 1-10</h4>
                    <div class="panel-body">
                        <h4>279</h4>
                    </div>
                </div>
            </div>
            <div class="col-xs-8">
                <?php /*<div class="row panel panel-default">*/ ?>
                    <?php /*<h2 class="panel-heading" >Message Board</h2>*/ ?>
                    <?php /*<div class="panel-body"><p>  Show when joined </p></div>*/ ?>
                <?php /*</div>*/ ?>
                <div class="panel panel-default">
                    <h2 class="panel-heading">Demographics</h2>
                    <?php if(!empty($stats)): ?>
                    <div class="panel-body">
                        <div class="panel panel-default col-xs-12">
                            <div class="panel-heading ">
                                <h4> Languages </h4>
                            </div>
                            <div class="panel-body">
                                <div id="language"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-6">
                            <div class="panel-heading ">
                                <h4> Families </h4>
                            </div>
                            <div class="panel-body">
                                <div id="families"></div>
                            </div>
                        </div>
                        <div class="panel panel-default col-xs-6">
                            <div class="panel-heading ">
                                <h4> Gender </h4>
                            </div>
                            <div class="panel-body">
                                <div id="sex"></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if(!empty($thread)): ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        Morris.Bar({
            element: 'language',
            data: [
               <?php foreach( $stats->languages as $language => $percentage): ?>
                    { y:'<?php echo e($language); ?>',  a:'<?php echo e($percentage); ?>'},
                <?php endforeach; ?>
            ],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Percent']
        });

        Morris.Donut({
            element: 'families',
            data: [
                {label: "Family", value: "<?php echo e($stats->family); ?>" },
                {label: "Non-family", value: "<?php echo e($stats->nonfamily); ?>" }
            ],
            colors: ['#FF0000', '#0000FF']
        });
        Morris.Donut({
            element: 'sex',
            data: [
                {label: "Male", value: "<?php echo e($stats->male); ?>" },
                {label: "Female", value: "<?php echo e($stats->female); ?>" }
            ],
            colors: ['#FF0000', '#0000FF']
        });


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.scrolling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>