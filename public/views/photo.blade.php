@extends('master')
@section('title')
	View Photo: {{$photo->caption}}
@endsection
@section('content')

<a href="index.php">&laquo; Back</a> <br/>
<br/>

<div style="margin-left: 20px;">
  <img class="img_responsive" src="<?php echo $photo->imagePath(); ?>" />
  <p><?php echo $photo->caption; ?></p>
</div>

<!--List comments-->
<div id="comments">
  @foreach($comments as $comment)
    <div class="comment" style="margin-bottom: 2em;">
	    <div class="author">
	      <?php echo htmlentities($comment->author); ?> wrote:
	    </div>
      <div class="body">
				<?php echo strip_tags($comment->body, '<strong><em><p>'); ?>
			</div>
	    <div class="meta-info" style="font-size: 0.8em;">
	      <?php echo datetime_to_text($comment->created); ?>
	    </div>
    </div>
  @endforeach
  {{ empty($comments) ? "No Comments." : '' }}
</div>

<!--Comment form-->
 <div id="comment-form">
  <h3>New Comment</h3>
  {{ output_message($message) }}
  <form action="photo.php?id={{$photo->id}}" method="post">
    <table>
      <tr>
        <td>Your name:</td>
        <td><input type="text" name="author" value="{{ $author }}" /></td>
      </tr>
      <tr>
        <td>Your comment:</td>
        <td><textarea name="body" cols="40" rows="8">{{ $body }}</textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" value="Submit Comment" /></td>
      </tr>
    </table>
  </form>
</div>

@endsection