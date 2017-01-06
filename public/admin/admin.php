<?php 
require_once('../../includes/initialize.php');  
!$session->is_logged_in() ? redirect_to("login.php") : false ;
use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);


$posts  = Post::findAll();


echo $blade->view('')->make('posts', [
	'posts' => $posts,
	'message' => $message,

] )->render();

?>