<?php
use Philo\Blade\Blade;

include("../includes/initialize.php");
$blade = new Blade(VIEWS, CACHE);
echo $blade->view()->make('about', [
	'title' => 'About RedCannon'
]);
?>