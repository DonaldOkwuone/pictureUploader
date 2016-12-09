<?php   
	require_once("../../includes/initialize.php");
	
	if (Photograph::delete($_GET['id'] )) {
		$session->message("Photo Successfully deleted");
		redirect_to("list_photos.php");
		
	}else{
		$session->message("Failed to delete photo");
	}
	
	
	output_message();


?>