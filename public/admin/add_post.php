<?php
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;
use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);

$categories = Category::findAll();

//Post Controller add function 
//This could be added to a web service with a bunch of functions 

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
    $created_a = strftime("%y:%m:%d %H:%M", time());
    $updated_a = '' ;
		
	$values = [
	     
		'title' => $title,
		'author' => $author,
		'body' => $body,
		'hits' => $hits,
		'category' => $category,
		'image' => $image_name,
		'caption' => $caption,
		'published' => $published,
		'added_on' => $created_a,
		'created_at' => $created_a,
		'updated_at' => $created_a
		];
	$photo = new Photograph();
	 
	$photo->caption = $caption;
	$photo->attach_file($_FILES['image']);
	if($photo->save() ){
		//echo "true";
		if($post =  Post::instantiate($values)){
			//var_dump($post);
			if($post->save()){
				$session->message("Post Added Successfully");
			}else
			{
				
				$session->message("Post Not Added! ");
				 die();
			}
			
			
		}else{
			echo "Failed to instantiate";
		}
		 //$session->message("Post Added Successfully");
		 redirect_to("add_post.php");
		 exit;
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
//Page just loaded and form has'nt been submiitted
echo $blade->view()->make('add_post', [
	'categories' => $categories,
	'message' => $message, 
] )->render();



?>