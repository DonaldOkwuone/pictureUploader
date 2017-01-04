<?php $__env->startSection('title'); ?>
 RedCannon: <?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
				
					<img class="img-responsive" src="<?php echo e(URL::asset('images/'.$post->image )); ?>" alt=" ">
					<div class=" single-grid">
						<h4><?php echo e($post->title); ?></h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i><?php echo e($post->author); ?></span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i><?php echo e(datetime_to_text($post->added_on)); ?></span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:<?php echo e($post->hits); ?></span></li>
		  					</ul>		  						
						<p> <?php echo e($post->body); ?></p>
					</div>
					 
					<div class="comments heading">
					<?php echo e(output_message($message)); ?>

						<h3>Comments</h3>
						<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img src="<?php echo e(URL::asset('images/si.png')); ?>" alt="">
								</a>
							  </div>
					      	<div class="media-body">
						        <h4 class="media-heading"><?php echo e($comment->author); ?></h4>
						        <p> <?php echo e($comment->body); ?> </p>
						        <p> <?php echo e(datetime_to_text($comment->created)); ?> </p>
					      	</div>
						<!--	 
					      <div class="media-right">
					        <a href="#">
								<img src="<?php echo e(URL::asset('images/si.png')); ?>" alt=""> </a>
					      </div>
						  -->
					 </div>
					 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
					  
    				</div>
    				<div class="comment-bottom heading">
    					<h3>Leave a Comment</h3>
    					<form action="post.php?id=<?php echo e($post->id); ?>" method="post" >	
						<input name="author" type="text" value="" placeholder="Name" required>
						<input name="email" type="text" value="" placeholder="Email" required> 
						<textarea name="body" cols="77" rows="6" value=""  placeholder="Message" required></textarea>
							<input type="submit" name="submit" value="Send">
					</form>
    				</div>
					
					<!--can enable comment system anytime-->
				</div>	
			</div>					
	</div>
	<!--end-single-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>