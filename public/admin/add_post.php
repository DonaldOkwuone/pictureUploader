<?php
require_once('../../includes/initialize.php'); 

use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);

$categories = Category::findAll();

if(isset($_POST['submit'] ) ){
	$title = $connection->real_escape_string( $_POST['title'] );
	$author = $connection->real_escape_string($_POST['author']);
	$body = $connection->real_escape_string($_POST['body']);
	$category = $connection->real_escape_string($_POST['category']);
	$hits = $connection->real_escape_string($_POST['hits']);
	$image = $_FILES['image'];
	$image_name = basename($image['name']) ;
	$caption = $connection->real_escape_string($_POST['title']);
	$published = $connection->real_escape_string($_POST['published']);

		
	$values = [
	    'id' => '',
		'title' => $title,
		'author' => $author,
		'body' => $body,
		'hits' => $hits,
		'category' => $category,
		'image' => $image_name,
		'caption' => $caption,
		'published' => $published
		];
	$photo = new Photograph();
	$photo->cation = $caption;
	$photo->attach_file($_FILES['image']);
	if($photo->save() ){
		if($post =  Post::instantiate($values)){
			if($post->save()){
				$session->message("Post Added Successfully");
			}
			
			
		}else{
			echo "failed to instantiate";
		}
		 $session->message("Post Added Successfully");
		 redirect_to("add_post.php");
		
	}else{
		foreach($photo->errors as $error){
			$session->message($error);
		}
		 
	} 
	echo $blade->view()->make('add_post', [
		'categories' => $categories,
		'message' => $message,
		'title' => $title,
		'body' => $body,
		'category' => $category,
		'image' => $image,
		'published' => $published,
	] )->render();
 
	exit;
}
echo $blade->view()->make('add_post', [
	'categories' => $categories,
	'message' => $message, 
] )->render();



?>