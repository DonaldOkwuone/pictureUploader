@extends('admin')
@section('title')
Admin: Edit Category
@endsection
@section('content')

	@if(!empty($message) )
		<div class="alert alert-success">
			{!! output_message($message) !!}
			
		</div>
	@endif
	
	<form action="edit_category.php?id={{ $category->id }} " method="POST" >
	
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" value="{{ $category->title }}" name="title" id="title" placeholder="Title of Post">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" value="{{ $category->description }}" name="description" id="description" placeholder="description">
	</div>
	  
	  <input value="Edit Category" name="submit" type="submit" class="btn btn-default">
	
	</form>

@endsection('content')