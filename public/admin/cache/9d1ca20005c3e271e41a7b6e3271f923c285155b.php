<?php $__env->startSection('title'); ?>
Add a new Post
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<?php if(!empty($message) ): ?>
		<div class="alert alert-success">
			<?php echo e(output_message($message)); ?>

			
		</div>
	<?php endif; ?>
	
	<!--
	<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
			<strong> Whoops!</strong> Some fields were left blank.<br><br>
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<li> <?php echo e($error); ?> </li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>	
			</ul>
	<?php endif; ?>
	-->
	 
	<form action="<?php echo e($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" > 

		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Title of Post">
		</div>
		<div class="form-group">
			<label for="author">Author</label>
			<input type="text" class="form-control" name="author" id="author" placeholder="author">
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea id="body" name="body" placeholder="Body of Post" class="form-control" rows="3"></textarea> 
		</div>

		<div class="form-group">
			<label for="category">Category</label>
			<select  class="form-control" name="category" >
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<option value="<?php echo $category->id ?>" ><?php echo $category->title ?></option> 
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
		</div>
	 
		  <div class="form-group">
			<label for="image">Featured Image</label>
			<input type="file" id="image" name="image" >
			<p class="help-block">Upload an image associated with post</p>
		  </div>
		  
		  
		  <div class="checkbox">
			<label>
			  <input type="checkbox" name="published" value="1"> Publish Now? 
			</label>
		  </div>
		  
		  
		  <input type="submit" name="submit" value="Submit" class="btn btn-default" >
	</form>
	
	
	 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>