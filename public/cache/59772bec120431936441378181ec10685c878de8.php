<?php $__env->startSection('title'); ?>
	Welcome to our photo Gallery
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
&nbsp;
<hr/>

<?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<div style="float: left; margin-left: 20px;">
	  <a href="photo.php?id=<?php echo e($photo->id); ?>"> 
	  <img class="img-responsive" src="<?php echo e($photo->imagePath()); ?>" width="200" />
		</a>
	<p><?php echo e($photo->caption); ?></p>	
	</div>    
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<br>
<div class="clear"></div>
<div id="pagination">
<?php echo $pagination->outputPagination($_SERVER['PHP_SELF']); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>