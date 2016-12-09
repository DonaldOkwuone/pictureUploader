@extends('master')
@section('title')
	Welcome to our photo Gallery
@endsection
@section('content')
&nbsp;
<hr/>

@foreach($photos as $photo)
	<div style="float: left; margin-left: 20px;">
	  <a href="photo.php?id={{$photo->id}}"> 
	  <img class="img-responsive" src="{{$photo->imagePath()}}" width="200" />
		</a>
	<p>{{$photo->caption}}</p>	
	</div>    
@endforeach
<br>
<div class="clear"></div>
<div id="pagination">
{!! $pagination->outputPagination($_SERVER['PHP_SELF']) !!}
</div>
@endsection('content')