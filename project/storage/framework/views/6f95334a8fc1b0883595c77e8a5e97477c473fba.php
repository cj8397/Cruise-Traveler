<?php $count = Auth::user()->newMessagesCount(); ?>
<?php if($count > 0): ?>
<span class="label label-danger"><?php echo $count; ?></span>
<?php endif; ?>
