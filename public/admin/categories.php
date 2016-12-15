<?php
require_once('../../includes/initialize.php'); 

use Philo\Blade\Blade;

$blade = new Blade(A_VIEWS, A_CACHE);

$categories = Category::findAll();

echo $blade->view()->make('categories', [
	'categories' => $categories,
	'message' => $message,
] )->render();

?>