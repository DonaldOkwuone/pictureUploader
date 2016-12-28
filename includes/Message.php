<?php 

class Message{ 
	public $success_c = "has been successfully created!!!";
	public $failed_c = "could not be created!";
	
	public static function getFailedC($item){
		//Error message if creation failed
		return $item." could not be created!";
	}
	
	public static function getSuccessC($item){
		//Error message if creation succeeded
		return $item." was created successfully...";
	}
	
	
}
?>