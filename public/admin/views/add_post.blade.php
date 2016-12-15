@extends('admin')
@section('title')
Add a new Post
@endsection('title')
@section('content')

	@if(!empty($message) )
		<div class="alert alert-success">
			{{output_message($message)}}
			
		</div>
	@endif
	
	<!--
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<strong> Whoops!</strong> Some fields were left blank.<br><br>
			<ul>
				@foreach($errors->all() as $error)
					<li> {{$error}} </li>
				@endforeach	
			</ul>
	@endif
	-->
	 
	<form action="{{ $_SERVER['PHP_SELF'] }}" method="post" enctype="multipart/form-data" > 

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
			@foreach($categories as $category)
				<option value="<?php echo $category->id ?>" ><?php echo $category->title ?></option> 
			@endforeach
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
	
	
	 

@endsection('content')