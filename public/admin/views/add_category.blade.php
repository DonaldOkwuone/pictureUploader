@extends('admin')
@section('content')

	@if(!empty($message) )
		<div class="alert alert-success">
			{!! output_message($message) !!}
			
		</div>
	@endif
	
	<form action="add_category.php " method="POST" >
	
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" id="title" placeholder="Title of Post">
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" name="description" id="description" placeholder="description">
	</div>
	  
	  <input value="Add Category" name="submit" type="submit" class="btn btn-default">
	
	</form>

@endsection('content')