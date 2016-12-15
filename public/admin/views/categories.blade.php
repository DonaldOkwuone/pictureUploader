 @extends('admin') 
 @section('title')
	Admin: All Categories
 @endsection
 @section('content')
 <h1 class="page-header">Dashboard</h1>
	    @if(!empty($message) )
		<div class="alert alert-success">
			<ul> 
					<li>{{output_message($message) }}</li> 
			</ul>
		</div>
		@endif
	      <h2 class="sub-header">Blog Categories </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category Title</th>
                  <th>Description</th>
                   
                </tr>
              </thead>
              <tbody>
                 
               @foreach($categories as $category ) 
                
                <tr>
				  <td>{{$category->id}}</td>
                  <td>{{$category->title}}</td>
                  <td>{{$category->description}}</td> 
                  <td><a href="/category/<?php echo $category->id; ?>">EDIT</a></td>
                  <td>
					<form action="/category/{{$category->id}}" method="post" >
						
						<input type="hidden" name="_method" value="delete" >
						<input type="hidden" name="_token" value="">
						<input type="submit" name="submit" value="Delete">
						
					</form>
				  </td> 
                   
                </tr>
			  @endforeach		
              </tbody>
            </table>
          </div>
@endsection('content')