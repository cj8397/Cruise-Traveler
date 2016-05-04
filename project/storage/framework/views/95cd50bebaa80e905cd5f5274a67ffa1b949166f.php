<?php $__env->startSection('content'); ?>
    <div class="col-md-6">
        <h1><?php echo $thread->subject; ?></h1>

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

        <h2>Add a new message</h2>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>