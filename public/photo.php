<?php 
/*
*Photo page controller
*
*/

include("../includes/initialize.php"); 

use Philo\Blade\Blade;
 
	if(empty($_GET['id'])) {
		$session->message("No photograph ID was provided.");
		redirect_to('index.php');
	}

	$photo = Photograph::findById($_GET['id']);

	if(!$photo) {
		$session->message("The photo could not be located.");
		redirect_to('index.php');
	}
	$new_comment = '';
	$body = '';
	$author = '';
	if(isset($_POST['submit'] ) ){
		$author = trim($_POST['author'] );
		$body = trim($_POST['body'] );
		
		$new_comment = Comment::make($photo->id, $author,$body);
		if($new_comment && $new_comment->save()){
			//Comment saved
			redirect_to("photo.php?id=".$photo->id);
		}else{
			//Failed
			$message = "There was an error that prevented the comment from being saved";
		}
		
	}else{
		$author = "";
		$body = "";
	}
	$comments = $photo->comments();
	
$blade = new Blade(VIEWS, CACHE);
echo $blade->view('')->make('photo', [
		'photo'=> $photo, 
		'session' => $session,
		'author' => $author,
		'body' => $body,
		'new_comment' => $new_comment,
		'message' => $message,
		'comments' => $comments,
		'connection' => $connection
		] )->render();

?>
