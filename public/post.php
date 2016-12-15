<?php 
/*
*Photo page controller
*
*/

include("../includes/initialize.php"); 

use Philo\Blade\Blade;
 
	if(empty($_GET['id'])) {
		$session->message("No Post ID was provided.");
		redirect_to('index.php');
	}

	$post = Post::findById($_GET['id']);
	

	if(!$post) {
		$session->message("The post could not be located.");
		redirect_to('index.php');
	}
	
	$new_comment = '';
	$body = '';
	$author = '';
	if(isset($_POST['submit'] ) ){
		$author = trim($_POST['author'] );
		$body = trim($_POST['body'] ); 
		$new_comment = Comment::make($post->id, $author,$body);
		  
		if($new_comment && $new_comment->save()){
			//Comment saved
			redirect_to("post.php?id=".$post->id);
		}else{
			//Failed
			$message = "There was an error that prevented the comment from being saved";
		}
		
	}else{
		$author = "";
		$body = "";
	}
	$post_object = new Post();
	$post_object->make_post( $connection->real_escape_string($_GET['id']) );
	
	$comments = $post_object->comments();
	//$comments = '';
	
$blade = new Blade(VIEWS, CACHE);

echo $blade->view('')->make('post', [
		'post'=> $post, 
		'session' => $session,
		'author' => $author,
		'body' => $body,
		'new_comment' => $new_comment,
		'message' => $message,
		'comments' => $comments,
		'connection' => $connection
		] )->render();

?>
