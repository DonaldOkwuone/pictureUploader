@extends('admin.admin')
@section('content')
	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			{{Session::get('flash_message')}}
			
		</div>
	@endif
	
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<strong> Whoops!</strong> Some fields were left blank.<br><br>
			<ul>
				@foreach($errors->all() as $error)
					<li> {{$error}} </li>
				@endforeach	
			</ul>
	@endif
	<?php 
		echo Form::open(array('url' => '/category/'.$category->id ,'files'=>'false'));
	?>
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<input type="hidden" name="_method" value="put">

	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" value="{{$category->title}}" name="title" id="title" placeholder="Title of Post">
	</div>
	<div class="form-group">
		<label for="author">Description</label>
		<input type="text" class="form-control" value="{{$category->description}}" name="description" id="author" placeholder="description">
	</div>
	 
 
	  
	  
	  <button type="submit" class="btn btn-default">Submit</button>
	<?php 
		echo Form::close();
	?>

@endsection('content')