<?php $__env->startSection('title'); ?>
Add a new Post
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<?php if(!empty($message) ): ?>
		<div class="alert alert-success">
			<?php echo output_message($message); ?>

			
		</div>
	<?php endif; ?>
	

	 
	<form action="<?php echo e($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" > 
         
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
			<input type="file"  name="image" >
			<p class="help-block">Upload an image associated with post</p>
		</div>
		  
		  
		<div class="checkbox">
			<label>
			  <input type="checkbox" name="published" value="1"> Publish Now? 
			</label>
		 </div>
		 <input type="hidden" name="hits" value="1"> 
		  
		  <input type="submit" name="submit" value="Submit" class="btn btn-default" >
	</form>
	
	
	 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>