 @extends('admin')
 @section('title')
	Admin: All Post
 @endsection
 @section('content')

 	@if(!empty($message) )
		<div class="alert alert-success"> 
			{!! output_message($message) !!}
		</div> 
	@endif
          <h2 class="sub-header">Blog Posts </h2>
          <h2 class="sub-header"> {!!URL::link('+Add New Post','add_post.php') !!} </h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Posted By</th>
                  <th>Publish Date</th>
                  <th>Views</th>
                  <th>EDIT/DELETE</th>
                  <th>&nbsp</th>
                </tr>
              </thead>
              <tbody>
				@foreach($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->author }}</td>
                  <td>{{ $post->added_on }}</td>
                  <td>{{ $post->hits }}</td>
                  <td>{!! URL::link('Edit', 'edit_post.php?id='.$post->id ) !!}</td> 
                  <td>
				  	<form method="post" action="delete_post.php">
						<input type="hidden" name="id" value="{{ $post->id }}"  >
						<input type="submit" name="submit" value="DELETE">
					</form>
				  </td>
               
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
@endsection('content')