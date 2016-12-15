 
 <?php $__env->startSection('content'); ?>
 <h1 class="page-header">Dashboard</h1>
	    <?php if(!empty($message) ): ?>
		<div class="alert alert-success">
			<ul> 
					<li><?php echo e(output_message($message)); ?></li> 
			</ul>
		</div>
		<?php endif; ?>
	      <h2 class="sub-header">Blog Categories </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category Title</th>
                  <th>Description</th>
                   
                </tr>
              </thead>
              <tbody>
                 
               <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
                
                <tr>
				  <td><?php echo e($category->id); ?></td>
                  <td><?php echo e($category->title); ?></td>
                  <td><?php echo e($category->description); ?></td> 
                  <td><a href="/category/<?php echo $category->id; ?>">EDIT</a></td>
                  <td>
					<form action="/category/<?php echo e($category->id); ?>" method="post" >
						
						<input type="hidden" name="_method" value="delete" >
						<input type="hidden" name="_token" value="">
						<input type="submit" name="submit" value="Delete">
						
					</form>
				  </td> 
                   
                </tr>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>		
              </tbody>
            </table>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>