<?php $__env->startSection('title'); ?>
	Welcome To RedCanon
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<div class="about-one">
						<p>Latest Article</p>
						<h3><?php echo e($post->title); ?></h3>
					</div>
					<div class="about-two">
						<?php
							$link_to_image = $post->image;
						?>
						<a href="post.php?id=<?php echo e($post->id); ?>"><img src=" <?php echo e(URL::asset('/images/'.$post->image)); ?> " title="<?php echo e($post->title); ?>" alt="<?php echo e($post->title); ?>" /></a>
						<p>Posted by <a href="#"><?php echo e($post->author); ?></a> on <?php echo e(datetime_to_text($post->created_at)); ?> <a href="#">comments(<?php echo e(count($post->comments())); ?>)</a></p>
						<p> <?php echo e($post->body); ?></p>
						<div class="about-btn">
							<a href="post.php?id=<?php echo $post->id; ?>">Read More</a>
						</div>
						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
					</div>	
					<div class="about-tre">
						
							<div class="a-1">
							
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
									<div class="col-md-6 abt-left">
										<a href="single.html"><img src="<?php echo e(URL::asset('/images/'.$post->image)); ?>" alt="" /></a>
										<h6> Red Canon</h6>
										
										<?php $new_title = substr($post->title , 0, 20) ?>
										<?php $new_title = $new_title." ..." ?>
										
										<h3><a href="post.php?id=<?php echo $post->id; ?>"><?php echo e($new_title); ?></a></h3>
											 <?php $new_str = substr($post->body , 0, 50) ?>
											<?php  $new_str = $new_str." ..." ?>
										<p><?php echo e($new_str); ?></p>
										<label><?php echo e(datetime_to_text($post->created_at)); ?></label>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
								
								<div class="clearfix"></div>
							</div>
						
						 <!-- Pagination links -->
						
					</div>	
				</div>
				<div class="col-md-4 about-right heading">
					<div class="abt-1">
						<h3>ABOUT US</h3>
						<div class="abt-one">
							<img class="img-responsive" src="<?php echo e(URL::asset('/images/gun.png')); ?>" alt="" />
							<p> Need to read up some random ramblings about Arsenal FC., look no further!</p>
							<div class="a-btn">
								<?php echo URL::link('Read More', 'about.php'); ?>

							</div>
						</div>
					</div>
					<div class="abt-2">
						<h3>Most Read</h3>
						<ul>
						<?php $__currentLoopData = $most_read; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<li><a href="post.php?id=<?php echo e($post->id); ?>"><?php echo e($post->title); ?> </a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</ul>	
							 							
					</div>
					<!--
					<div class="abt-2">
						<h3>ARCHIVES</h3>
						<ul>
							<li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
							<li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
							<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
							<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
							<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
							<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
							<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
						</ul>	
					</div>
					-->
					<div class="abt-2">
						<h3>NEWS LETTER</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>