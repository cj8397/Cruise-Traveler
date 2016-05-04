<?php $__env->startSection('content'); ?>
        <!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Events Page
                <small>Events on Cruise Ship <?php echo $sailing_id; ?></small>
                <a href="<?php echo e(url('events/form/'.$sailing_id)); ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Create an Event
                    </button>
                </a>
            </h1>
        </div>
    </div>
    <!-- /.row -->


    <!-- Projects Row -->
    <div class="row">
        <?php foreach($events as $event): ?>
            <div class="panel panel-default col-md-3 portfolio-item">

                <img class="img-responsive" src="/images/imgplaceholder.png" alt="">

                <h4> <?php echo ucfirst($event->title); ?></h4>
                <div class="col-md-6 col-xs-6">
                    <a href="/events/detail/<?php echo $event->id; ?>">
                        <button type="button" class="btn btn-primary btn-md">
                            <i class="fa fa-users" aria-hidden="true"></i>Event Detail
                        </button>
                    </a>
                </div>
                <div class="row panel panel-default col-md-12 col-xs-12 text-center">
                    <div class="panel-body col-md-6 col-xs-12">
                        <p>5 People currently attending</p>
                    </div>
                    <div class="panel-body col-md-6 col-xs-12">
                        <p>4 Singles</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
                    <!-- /.row -->


            <hr>
            <!-- Pagination -->
            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <ul class="pagination">
                        <li>
                            <a href="/eventdetail/1">&laquo;</a>
                        </li>
                        <li class="active">
                            <a href="/eventdetail/1">1</a>
                        </li>
                        <li>
                            <a href="/eventdetail/1">2</a>
                        </li>
                        <li>
                            <a href="/eventdetail/1">3</a>
                        </li>
                        <li>
                            <a href="/eventdetail/1">4</a>
                        </li>
                        <li>
                            <a href="/eventdetail/1">5</a>
                        </li>
                        <li>
                            <a href="/eventdetail/1">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.thumbnail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>