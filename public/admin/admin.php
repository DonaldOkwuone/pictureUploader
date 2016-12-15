<?php 
require_once('../../includes/initialize.php');  

use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);


$posts  = POST::findAll();


echo $blade->view('')->make('posts', [
	'posts' => $posts

] )->render();

?>