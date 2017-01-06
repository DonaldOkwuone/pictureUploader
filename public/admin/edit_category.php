<?php 
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;
use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);
if(!intval( $_GET['id']) ){
	redirect_to('categories.php');
} 

if( isset($_POST['submit'] ) ){
	$id = $connection->real_escape_string($_GET['id']) ;
	$title = $_POST['title'];
	$description = $_POST['description'];
	$updated_at = strftime("%y:%m:%d %H:%M", time() );
	$created_at = strftime("%y:%m:%d %H:%M", time() );
 
	
	global $connection;
	
	$values = [ 
		'id' => $id, 
		'title' => $title, 
		'description' => $description, 
		'updated_at' => $updated_at,
		'created_at' => $created_at
		];
	$category = Category::instantiate($values);
	if($category->save()){
		$session->message("Category was successfully updated") ;
		redirect_to('edit_category.php?id='.$id);
		exit;
		echo $blade->view()->make('edit_category', [
			'message' => $message,
			'category' => $category,
		] )->render();

	}
	exit;
	
	
}

 
$category = Category::findById($connection->real_escape_string($_GET['id'] ) );

echo $blade->view()->make('edit_category', [ 
	'message' => $message,
	'category' => $category,
] )->render();


?>