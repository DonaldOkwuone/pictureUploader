<?php $__env->startSection('title'); ?>
Admin: View log file
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<a href="index.php"> &laquo Back</a>
<h2>Log</h2>

<div id="log"><?php echo nl2br($log_content);?>
</div>

<li><a href="clear_log.php?clear=true">Clear Log</a></li> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>