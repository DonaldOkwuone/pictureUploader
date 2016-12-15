<?php $__env->startSection('title'); ?>
		Search Results for: <?php echo e($_POST['search']); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
				<?php if(count($posts) > 0 ): ?>
						
					<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					
					<div class=" single-grid">
					<?php echo URL::link("<h4> <?php echo e($post->title); ?></h4>", "post.php?id={$post->id}"); ?>

						 <h4><a href="post.php?id=<?php echo e($post->id); ?>"> <?php echo e($post->title); ?></a> </h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i><?php echo e($post->author); ?></span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i><?php echo e(datetime_to_text($post->added_on)); ?></span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:<?php echo e($post->hits); ?></span></li>
		  					</ul>		  						
						<p> <?php echo e($post->body); ?></p>
					<hr>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php else: ?>
					<div class=" single-grid">
						No results for Search: <?php echo e($_POST['search']); ?>...<?php echo URL::link('Go Back', 'index.php'); ?>

					</div>	
				<?php endif; ?>
					
					<!--can enable comment system anytime-->
				</div>	
			</div>					
	</div>
	<!--end-single-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>