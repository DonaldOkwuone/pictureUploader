<?php
include("../includes/initialize.php"); 

use Philo\Blade\Blade;

$blade = new Blade(VIEWS, CACHE);

if( isset($_POST['submit'] ) ){
	 
	$string = $connection->real_escape_string($_POST['search'] );
	$sql = "SELECT * FROM posts ";
	$sql .= "WHERE title like '%". $string ."%' " ;
	$sql .= " ORDER BY added_on DESC ";
	
	$posts = Post::search($sql);
	
	//var_dump($post);
}else{
	redirect_to('index.php');
}

echo $blade->view('')->make('search', [
	'posts' => $posts
] )->render();
?>