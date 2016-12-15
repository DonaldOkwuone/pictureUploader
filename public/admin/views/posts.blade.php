 @extends('admin')
 @section('title')
	Admin: All Post
 @endsection
 @section('content')

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
                  <td>{{ $post->hits }}</td>
                  <td>{{ $post->hits }}</td>
                </tr>
                @endforeach  
              </tbody>
            </table>
          </div>
@endsection('content')