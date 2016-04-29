<?php $__env->startSection('content'); ?>
    <!-- Page Content -->
    <div class="container">
    <div class="container">
    <!-- Page Heading -->
    <div class="row">
        <img class="img-responsive" src="/images/searchBar.png" alt="">
        <div class="col-lg-12">
            <h1 class="page-header">All Sailings
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->

    <div class="row">
        <?php foreach ($sailings as $sailing): ?>
            <div class="col-md-3 portfolio-item">
                <h2><?php echo e($sailing->id); ?><?php echo e($sailing->cruise_line); ?><?php echo e($sailing->title); ?></h2>
                <a href="<?php echo e(action('SailingsController@GetSailing', [$sailing->id])); ?>">
                    <img class="img-responsive" src="/images/sailingInfo.png" alt="">
                </a>
                <p>200 going 80% male 20% male 12 events plan</p>
            </div>
        <?php endforeach; ?>
    </div>

    <hr>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="/events/1">&laquo;</a>
                </li>
                <li class="active">
                    <a href="/events/1">1</a>
                </li>
                <li>
                    <a href="/events/1">2</a>
                </li>
                <li>
                    <a href="/events/1">3</a>
                </li>
                <li>
                    <a href="/events/1">4</a>
                </li>
                <li>
                    <a href="/events/1">5</a>
                </li>
                <li>
                    <a href="/events/1">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.thumbnail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>