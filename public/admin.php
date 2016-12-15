<?php 
include("../includes/initialize.php"); 

use Philo\Blade\Blade;

$blade = new Blade(VIEWS, CACHE);

echo $blade->view('')->make('admin_posts')->render();

?>