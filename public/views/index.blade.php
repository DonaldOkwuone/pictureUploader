@extends('master')
@section('title')
	Welcome To RedCanon
@endsection
@section('content')

	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<div class="about-one">
						<p>Latest Article</p>
						<h3>{{$post->title}}</h3>
					</div>
					<div class="about-two">
						<?php
							$link_to_image = $post->image;
						?>
						<a href="post.php?id={{$post->id}}"><img src=" {{ URL::asset('/images/'.$post->image) }} " title="{{$post->title}}" alt="{{$post->title}}" /></a>
						<p>Posted by <a href="#">{{$post->author}}</a> on {{datetime_to_text($post->created_at)}} <a href="#">comments({{ count($post->comments()) }})</a></p>
						<p> {{$post->body}}</p>
						<div class="about-btn">
							<a href="post.php?id=<?php echo $post->id; ?>">Read More</a>
						</div>
						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
					</div>	
					<div class="about-tre">
						
							<div class="a-1">
							
								@foreach($posts as $post)
									<div class="col-md-6 abt-left">
										<a href="single.html"><img src="{{ URL::asset('/images/'.$post->image) }}" alt="" /></a>
										<h6> Red Canon</h6>
										
										<?php $new_title = substr($post->title , 0, 20) ?>
										<?php $new_title = $new_title." ..." ?>
										
										<h3><a href="post.php?id=<?php echo $post->id; ?>">{{$new_title}}</a></h3>
											 <?php $new_str = substr($post->body , 0, 50) ?>
											<?php  $new_str = $new_str." ..." ?>
										<p>{{$new_str}}</p>
										<label>{{datetime_to_text($post->created_at)}}</label>
									</div>
								@endforeach
								
								<div class="clearfix"></div>
							</div>
						
						 <!-- Pagination links -->
						
					</div>	
				</div>
				<div class="col-md-4 about-right heading">
					<div class="abt-1">
						<h3>ABOUT US</h3>
						<div class="abt-one">
							<img class="img-responsive" src="{{ URL::asset('/images/gun.png') }}" alt="" />
							<p> Need to read up some random ramblings about Arsenal FC., look no further!</p>
							<div class="a-btn"> 
									{!! Url::link('ABOUT US', 'about.php' ) !!}
							</div>
						</div>
					</div>
					<div class="abt-2">
						<h3>Most Read</h3>
						<ul>
						@foreach($most_read as $post)
							<li><a href="post.php?id={{$post->id}}">{{$post->title}} </a></li>
						@endforeach
						</ul>	
							 							
					</div>
					<!--
					<div class="abt-2">
						<h3>ARCHIVES</h3>
						<ul>
							<li><a href="single.html">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </a></li>
							<li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
							<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
							<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
							<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
							<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
							<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li>
						</ul>	
					</div>
					-->
					<div class="abt-2">
						<h3>NEWS LETTER</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
@endsection('content')