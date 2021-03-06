<?php 
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;
use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);
 
if( isset($_POST['submit'] ) ){
	
	$title = $_POST['title'];
	$description = $_POST['description'];
	$created_at = strftime("%y:%m:%d %H:%M", time() );
	$updated_at = '';
	
	global $connection;
	
	$values = [ 
		'title' => $title, 
		'description' => $description,
		'created_at' => $created_at,
		'updated_at' => $created_at
		];
	$category = Category::instantiate($values);
	if($category->save()){
		$session->message(Message::getSuccessC("Category")) ;
		redirect_to($_SERVER['PHP_SELF']);
		echo $blade->view()->make('add_category', [
			'message' => $message,
		] )->render();

	}
	exit;
	
	
}

 

echo $blade->view()->make('add_category', [ 
	'message' => $message,
] )->render();


?>