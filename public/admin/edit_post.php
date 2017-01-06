<?php 
require_once('../../includes/initialize.php');  
!$session->is_logged_in() ? redirect_to("login.php") : false ;
use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);

if(isset($_GET['id']) && !empty($_GET['id'] ) )
{
	$post = Post::findById($_GET['id']);
	$categories = Category::findAll();
	
	if(isset($_POST['submit'] ) )
	{
		//Form submitted for editing
		//Post values will be sanitized by database insert function
		$title = $connection->real_escape_string( $_POST['title'] );
		$author = $connection->real_escape_string($_POST['author']);
		$body = $connection->real_escape_string($_POST['body']);
		$category = $connection->real_escape_string($_POST['category']);
		$hits = $connection->real_escape_string($_POST['hits']);
		$image = $_FILES['image'];
		$image_name = basename($image['name']) ;
		$caption = $connection->real_escape_string($_POST['title']);
		$published = $connection->real_escape_string($_POST['published']);
    	$created_a = null;
    	$updated_a = strftime("%y:%m:%d %H:%M", time()); ;
		
		$post->title = $title ;
		$post->author = $author ;
		$post->body = $body ;
		$post->category = $category ;
		echo $category ."<br>";
		echo $_POST['category'] ."<br>";
		$post->hits = $hits ;
		//$post->image = $image_name ;
		$post->caption = $caption ;
		$post->published = $published ;
		$post->created_a = $created_a ;
		$post->updated_a = $updated_a ;
		//check if new picture was submitted
		$photo = new Photograph(); 
		
		if($photo->attach_file($image) )
		{
			$photo->caption = $caption;
			$post->image = $image_name ;
			if($photo->save()){
				
				//photo saved successfully, edit post
				
				if($post->save() )
				{
					//post has been edited
					$session->message('Post updated successfully');
					redirect_to($_SERVER['PHP_SELF']."?id=".$post->id);
				}else
				{
					$session->message('Post not updated ');
				}
				
			}else
			{
				
				die("Photo not updated");
			}
		}else
		{
			//Edit form without image
			if($post->save() )
				{
					//post has been edited
					$session->message('Post updated successfully');
					redirect_to($_SERVER['PHP_SELF']."?id=".$post->id);
				}else
				{ 
					$session->message('Post not updated ');
				}
		}
		//form submtted
	}
	
	echo $blade->view()->make('edit_post', [
		'post' => $post,
		'categories' => $categories,
		'message' => $message,
	])->render();
	
	
	
}else{
	redirect_to('admin.php' );
}


?>