@extends('master')
@section('title')
 RedCannon: {{$post->title}}
@endsection
@section('content')

<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
						<a href='{{ link('/') }}'><img class="img-responsive" src=" {{URL::asset(  'images/'.$post->image )}}" alt=" "></a>
					<div class=" single-grid">
						<h4>{{$post->title}}</h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>{{$post->author}}</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>{{ datetime_to_text($post->added_on) }}</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:{{$post->hits}}</span></li>
		  					</ul>		  						
						<p> {{$post->body}}</p>
					</div>
					 
					<div class="comments heading">
					{{output_message($message) }}
						<h3>Comments</h3>
						@foreach($comments as $comment)
						<div class="media">
							<div class="media-left">
								<a href="#">
									<img src="{{URL::asset('images/si.png')}}" alt="">
								</a>
							  </div>
					      	<div class="media-body">
						        <h4 class="media-heading">{{$comment->author}}</h4>
						        <p> {{$comment->body}} </p>
						        <p> {{datetime_to_text($comment->created)}} </p>
					      	</div>
						<!--	 
					      <div class="media-right">
					        <a href="#">
								<img src="{{URL::asset('images/si.png')}}" alt=""> </a>
					      </div>
						  -->
					 </div>
					 @endforeach 
					  
    				</div>
    				<div class="comment-bottom heading">
    					<h3>Leave a Comment</h3>
    					<form action="post.php?id={{$post->id}}" method="post" >	
						<input name="author" type="text" value="" placeholder="Name" required>
						<input name="email" type="text" value="" placeholder="Email" required> 
						<textarea name="body" cols="77" rows="6" value=""  placeholder="Message" required></textarea>
							<input type="submit" name="submit" value="Send">
					</form>
    				</div>
					
					<!--can enable comment system anytime-->
				</div>	
			</div>					
	</div>
	<!--end-single-->
@endsection('content')