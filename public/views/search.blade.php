@extends('master')
@section('title')
		Search Results for: {{$_POST['search']}}
@endsection
@section('content')
<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
				@if(count($posts) > 0 )
						
					@foreach($posts as $post)
					
					<div class=" single-grid">
					{!!URL::link("<h4> {{$post->title}}</h4>", "post.php?id={$post->id}")!!}
						 <h4><a href="post.php?id={{$post->id}}"> {{$post->title}}</a> </h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>{{$post->author}}</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>{{ datetime_to_text($post->added_on) }}</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:{{$post->hits}}</span></li>
		  					</ul>		  						
						<p> {{$post->body}}</p>
					<hr>
					</div>
					@endforeach
				@else
					<div class=" single-grid">
						No results for Search: {{ $_POST['search']  }}...{!! URL::link('Go Back', 'index.php') !!}
					</div>	
				@endif
					
					<!--can enable comment system anytime-->
				</div>	
			</div>					
	</div>
	<!--end-single-->
@endsection