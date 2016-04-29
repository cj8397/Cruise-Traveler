<?php $__env->startSection('content'); ?>
    <img class="img-responsive" src="/images/cruiseship.jpg">
    <div class="container">
        <div class="panel panel-default row col-md-3 col-xs-12">
            <div class="panel-body col-md-12 col-xs-12">
                <img class="img-responsive img-circle" src="/images/profilepic.png" width="200" height="200">
            </div>
            <div class="col-md-12 col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item"><h4>Email: </h4><?php echo e(Auth::user()->email); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->email); ?></li>*/ ?>
                    <li class="list-group-item"><h4>First Name: </h4><?php echo e(Auth::user()->first); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->first); ?></li>*/ ?>
                    <li class="list-group-item"><h4>Last Name: </h4><?php echo e(Auth::user()->last); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->last); ?></li>*/ ?>
                    <?php /*<li class="list-group-item"><h4>Date of Birth: </h4><?php echo e(Auth::user()->dob); ?></li>*/ ?>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->dob); ?></li>*/ ?>
                    <li class="list-group-item"><h4>Gender: </h4>
                        <?php if (Auth::user()->sex === 1): ?>
                            Male
                        <?php else: ?>
                            Female
                        <?php endif; ?>
                    </li>
                </ul>
                <input class="btn" type="submit" value="More Detail">
            </div>
            <div></div>
        </div>

        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12">
            <div class="panel-heading">
                <h2>Sailings & Events</h2>
                <div class="panel-body col-md-12 col-xs-12">
                    <a href="/sailings/list">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Join Sailing
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12">
            <?php /*<?php if(isset($usersailings)): ?>*/ ?>
            <?php /*<?php foreach($usersailings as $sailings): ?>*/ ?>
            <?php if (isset($usersailings)): ?>
                <?php foreach ($usersailings as $sailing): ?>
                    <?php /*<?php for($x = 0; $x < count($details); $x++): ?>*/ ?>
                    <div class="row col-md-12 col-xs-12">
                        <hr>
                        <div class="panel-body col-md-6 col-xs-12">
                            <div class="panel-heading">
                                <label class="label-info"><h4><?php echo $sailing->sailing->title; ?></h4></label>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Start Date: </strong><?php echo $sailing->sailing->start_date; ?></br>
                                    <strong>Departing Port: </strong><?php echo $sailing->sailing->port_org; ?></br>
                                    <strong>Destination: </strong><?php echo $sailing->sailing->destination; ?></br>
                                    <strong>Sailing ID: </strong><?php echo $sailing->sailing->id; ?>

                                </li>
                            </ul>
                        </div>

                        <div class="panel-body col-md-6 col-xs-12">
                            <a href="<?php echo e(url('events/form/' . ($sailing->sailing->id))); ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Create an Event
                                </button>
                            </a>
                        </div>

                        <div class="panel-body col-md-6 col-xs-12">

                            <?php foreach ($userevents->where('sailing_id', $sailing->sailing->id) as $events): ?>
                                <?php if ($events != null): ?>
                                    <?php /*<?php foreach($eventdetails[$events->event_id] as $edetail): ?>*/ ?>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <h5>Event: <?php echo $events->event->title; ?></h5>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Role:</strong><br>
                                            <?php if ($events->role == "host"): ?>
                                                <span
                                                    class="label label-pill label-warning"><?php echo $events->role; ?></span>
                                            <?php else: ?>
                                                <span
                                                    class="label label-pill label-danger"><?php echo $events->role; ?></span>
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Start:</strong><br>
                                            <?php echo $events->event->start_date; ?>

                                        </li>
                                        <li class="list-group-item">
                                            <strong>End:</strong><br>
                                            <?php echo $events->event->end_date; ?>

                                        </li>
                                    </ul>
                                <?php else: ?>
                                    <span class="label label-pill label-default">You are not participating in any events for this sailing... =(</span>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                        <?php /*<?php endfor; ?>*/ ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.scrolling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>