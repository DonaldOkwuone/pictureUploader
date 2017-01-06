 
 <?php $__env->startSection('title'); ?>
	Admin: All Post
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>

 	<?php if(!empty($message) ): ?>
		<div class="alert alert-success"> 
			<?php echo output_message($message); ?>

		</div> 
	<?php endif; ?>
          <h2 class="sub-header">Blog Posts </h2>
          <h2 class="sub-header"> <?php echo URL::link('+Add New Post','add_post.php'); ?> </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Posted By</th>
                  <th>Publish Date</th>
                  <th>Views</th>
                  <th>EDIT/DELETE</th>
                  <th>&nbsp</th>
                </tr>
              </thead>
              <tbody>
				<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td><?php echo e($post->id); ?></td>
                  <td><?php echo e($post->title); ?></td>
                  <td><?php echo e($post->author); ?></td>
                  <td><?php echo e($post->added_on); ?></td>
                  <td><?php echo e($post->hits); ?></td>
                  <td><?php echo URL::link('Edit', 'edit_post.php?id='.$post->id ); ?></td> 
                  <td>
				  	<form method="post" action="delete_post.php">
						<input type="hidden" name="id" value="<?php echo e($post->id); ?>"  >
						<input type="submit" name="submit" value="DELETE">
					</form>
				  </td>
               
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>  
              </tbody>
            </table>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>