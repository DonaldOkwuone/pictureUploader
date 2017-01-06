@extends('admin')
@section('title')
Edit a Post
@endsection('title')
@section('content')

	@if(!empty($message) )
		<div class="alert alert-success">
	
			{!!output_message($message)!!}
			
		</div>
	@endif
	
	
<form action="<?php echo $_SERVER['PHP_SELF'].'?id='.urlencode($post->id); ?>" method="POST" enctype="multipart/form-data" > 
        <?php //var_dump($message) ;?> 
		<div class="form-group">
			<label for="title">Title</label>
			<input value="{{ $post->title }}" type="text" class="form-control" name="title" id="title" placeholder="Title of Post">
		</div>
		<div class="form-group">
			<label for="author">Author</label>
			<input value="{{ $post->author }}" type="text" class="form-control" name="author" id="author" placeholder="author">
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<textarea id="body" name="body" placeholder="Body of Post" class="form-control" rows="3">{!! $post->body !!} </textarea> 
		</div>

		<div class="form-group">
			<label for="category">Category</label>
			<select  class="form-control" name="category" >
			<?php foreach($categories as $category) {?>
			<?php $selected = ($category->id == $post->category) ? 'selected' : '' ?> 
			
				<option <?php echo $selected; ?> value="<?php echo $category->id ?>" ><?php echo $category->title ?></option> 
			<?php } ?>
		</select>
		</div> 
		<div> 
			<img style="width:200px; height: 100px;" src="{{ URL::asset('images/'.$post->image) }}" alt="">
		</div> 
		<div class="form-group">
			<label for="image">Featured Image</label>
			<input type="file"  name="image" >
			<p class="help-block">Upload an image associated with post</p>
		</div>
		  
		  
		<div class="checkbox">
			<label>
			  <?php $checked = ($post->published == 1) ? 'checked' : ''  ;  ?>
			  <input <?php echo $checked  ;  ?> type="checkbox" name="published" value="1"> Publish Now? 
			</label>
		 </div>
		 <input type="hidden" name="hits" value="1"> 
		  
		  <input type="submit" name="submit" value="Submit" class="btn btn-default" >
	</form>
	
	
	 

@endsection('content')