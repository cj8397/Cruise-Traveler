<?php $__env->startSection('content'); ?>
    <img class="img-responsive" src="/images/cruiseship.jpg">
    <div class="container">
        <div class="panel panel-default row col-md-3 col-xs-12">
            <div class="panel-body col-md-12 col-xs-12">
                <img class="img-responsive img-circle" src="/images/profilepic.png" width="200" height="200">
            </div>
            <div class="col-md-12 col-xs-12">
                <ul class="list-group">
                    <li class="list-group-item"><h4>Email: </h4><?php echo e($user->email); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->email); ?></li>*/ ?>
                    <li class="list-group-item"><h4>First Name: </h4><?php echo e($user->first); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->first); ?></li>*/ ?>
                    <li class="list-group-item"><h4>Last Name: </h4><?php echo e($user->last); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->last); ?></li>*/ ?>
                    <li class="list-group-item"><h4>Date of Birth: </h4><?php echo e($user->dob); ?></li>
                    <?php /*<li class="list-group-item"><?php echo e(Auth::user()->dob); ?></li>*/ ?>
                    <li class="list-group-item"><h4>Gender: </h4>
                        <?php if($user->sex === 1): ?>
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
                    <input class="btn" type="submit" value="Join Sailing">
                </div>
            </div>
        </div>
        <div class="panel panel-default col-md-8 col-md-offset-1 col-xs-12">
            <?php /*<?php if(isset($usersailings)): ?>*/ ?>
            <?php /*<?php foreach($usersailings as $sailings): ?>*/ ?>
            <?php if(isset($sailingdetails)): ?>
                <?php foreach($sailingdetails as $details): ?>
                    <?php for($x = 0; $x < count($details); $x++): ?>
                        <div class="panel-body col-md-6 col-xs-12">

                            <div class="panel-heading">
                                <label class="label-info"><h4><?php echo $details[$x]->title; ?></h4></label>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Start Date: </strong><?php echo $details[$x]->start_date; ?></br>
                                    <strong>Departing Port: </strong><?php echo $details[$x]->port_org; ?></br>
                                    <strong>Destination: </strong><?php echo $details[$x]->destination; ?></br>
                                    <strong>Sailing ID: </strong><?php echo $details[$x]->id; ?>

                                </li>
                            </ul>

                        </div>

                        <div class="panel-body col-md-6 col-xs-12">
                            <a href="<?php echo e(url('events/form/'.($details[$x]->id))); ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Create an Event
                                </button>
                            </a>
                        </div>

                        <div class="panel-body col-md-6 col-xs-12">
                            <?php foreach($sailingevents[$details[$x]->id] as $events): ?>
                                <?php /*<?php for($y = 0; $y < count($events); $y++): ?>*/ ?>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5>Event: <?php echo $events->title; ?></h5>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Location:</strong><br>
                                        <?php echo $events->location; ?>

                                    </li>
                                    <li class="list-group-item">
                                        <strong>Start:</strong><br>
                                        <?php echo $events->start_date; ?>

                                    </li>
                                    <li class="list-group-item">
                                        <strong>End:</strong><br>
                                        <?php echo $events->end_date; ?>

                                    </li>
                                </ul>
                                <?php /*<?php endfor; ?>*/ ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endfor; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
    <?php /*<div class="panel-body">
        <div class="row col-md-6 col-xs-6">
            <ul class="list-group">
                <li class="list-group-item">Party</li>
            </ul>
        </div>
        <div class="row col-md-12 col-xs-12"></div>
        <div class="row col-md-6 col-xs-6"></div>
        <div class="row col-md-6 col-xs-6">
            <ul class="list-group">
                <li class="list-group-item">Party</li>
            </ul>
        </div>
        <div class="row col-md-6 col-xs-6">
            <ul class="list-group">
                <li class="list-group-item">Party</li>
            </ul>
        </div>
        <div class="row col-md-12 col-xs-12"></div>
        <div class="row col-md-6 col-xs-6"></div>
        <div class="row col-md-6 col-xs-6">
            <ul class="list-group">
                <li class="list-group-item">Party</li>
            </ul>
        </div>
    </div>*/ ?>



    <?php /* <div class="container col-xs-12">
         <img src="/images/userprofile.png" style="width:100%;">
     </div>
     <h1> DEV </h1>
     <div class="container">
         <img src="/images/profilepic.png">
     </div>
     <div class="container-fluid">
         <div class="row">
             <div class="panel-heading">
                 Details
             </div>
             <div class="panel-body">
                 <ul class="list-group-item">
                     <li class="list-group-item">
                         <strong>First Name</strong>
                         <span class="label label-success pull-right">
                             Cheng
                         </span>
                     </li>
                     <li class="list-group-item">
                         <strong>Last Name</strong>
                         <span class="label label-success pull-right">
                             Jiang
                         </span>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <div class="panel panel-default col-md-5 col-xs-5">
         <div class="panel-heading">
             Event Timeline
         </div>
     </div>*/ ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.scrolling', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>