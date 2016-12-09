<?php
require_once('../../includes/initialize.php'); 
!$session->is_logged_in() ? redirect_to("login.php") : false ;

if(  $connection->real_escape_string($_GET['clear']) == 'true' ){
	//clear log
$message = "Log cleared ";
	$logger = new Logger("Clear", $message);
	if($logger->clearLog()){
		redirect_to("view_log.php?message=logClear");
		 
		 
	} 
} 


	


?>