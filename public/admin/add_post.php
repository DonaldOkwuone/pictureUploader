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
	$image = $connection->real_escape_string($_POST['image']);
	$image = basename($image['name']) ;
	$caption = $connection->real_escape_string($_POST['title']);
	$published = $connection->real_escape_string($_POST['published']);
	
	$values = [
		'title' => $title,
		'author' => $author,
		'body' => $body,
		'category' => $category,
		'image' => $image,
		'caption' => $caption,
		'published' => $published
		];
	$photo = new Photograph();
	$photo->cation = caption;
	$photo->attach_file($image);
	if($photo->save() ){
		$post =  Post::instantiate($values);
		$post->save();
	}else{
		$session->message("Could Not SaveImage");
	} 
	echo $blade->view()->make('add_post', [
		'categories' => $categories,
		'message' => $message,
		'title' => $title,
		'body' => $body,
		'category' => $category,
		'image' => $image,
		'publish' => $publish,
	] )->render();


	
}
echo $blade->view()->make('add_post', [
	'categories' => $categories,
	'message' => $message, 
] )->render();



?>