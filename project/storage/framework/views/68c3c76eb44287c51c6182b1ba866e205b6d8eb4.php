<?php $__env->startSection('content'); ?>
    <?php if(Session::has('error_message')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo Session::get('error_message'); ?>

        </div>
    <?php endif; ?>
    <?php if($threads->count() > 0): ?>
        <?php foreach($threads as $thread): ?>
        <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
        <div class="media alert <?php echo $class; ?>">
            <h4 class="media-heading"><?php echo link_to('messages/' . $thread->id, $thread->subject); ?></h4>
            <p><?php echo $thread->latestMessage->body; ?></p>
            <p><small><strong>Creator:</strong> <?php echo $thread->creator()->email; ?></small></p>
            <p><small><strong>Participants:</strong> <?php echo $thread->participantsString(Auth::id()); ?></small></p>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Sorry, no threads.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>