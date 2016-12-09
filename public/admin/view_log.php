<?php
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;

use Philo\Blade\Blade;

$logger = new Logger();
$log_content = $logger->readLog();



$blade = new Blade(VIEWS, CACHE); //VIEW AND CACHE HAVE BEEN INITIALIZED

echo $blade->view()->make('view_log', [
	'logger' => $logger,
	'log_content' => $log_content
])->render();
?>


