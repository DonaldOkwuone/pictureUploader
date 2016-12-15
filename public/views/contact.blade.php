@extends('master')
@section('title')
	Contact Us
@endsection
@section('content')
<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h3>CONTACT</h3>
			</div>
			<div class="contact-bottom">
				<div class="contact-text">
					<div class="col-md-4 contact-left">
						<h4>Got any feedback?!.</h4>
						<p>Leave a suggestion or request and be sure to hear from us.</p>
						<!--start-contact--]>
							<div class="address">
								<h4>Address</h4>
								<p>The company name, 
								<span>Lorem ipsum dolor,</span>
								Glasglow Dr 40 Fe 72.</p>
							</div>
						<!----start-contact---->
					</div>	
					<div class="col-md-8 contact-right">
					<form action="#" method="post" >
						<input placeholder="Name" type="text" required>
						<input placeholder="Email" type="text" required>
						<textarea placeholder="Message" required></textarea>
							<div class="submit-btn">
								
									<input type="submit" value="SUBMIT">
								
							</div>
							
					</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div> 
@endsection('content')