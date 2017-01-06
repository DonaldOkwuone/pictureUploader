<?php
require_once('MYSQLDatabase.php');
class URL{
	
	
	
	public static function asset($file){
		$http = 'http://';
		$host = $_SERVER['HTTP_HOST'].'/blog/';
		$directory = 'public/'; 
		
		$local_link = $http.$host.$directory.$file; 
		$live_link = $http.$directory.$file; 
		 
		
		$comp_link = !empty($_SERVER['HTTP_HOST']) ? $local_link : $live_link;
		return $comp_link;
	}
	
	public static function link($tag , $url){ 
		return '<a href='.$url.'>'.$tag. '</a>';
	}
	
	public  static function saveURLState()
	{
		try{
			unset($_SESSION['last_page']);
		}catch(Exception $e)
		{
			echo "failed to unset session var";
		}
		
		$_SESSION['last_page'] = $_SERVER['PHP_SELF'];
		return true;
	}
	
	public static function getLastState()
	{
		$last_state = $_SESSION['last_page'];
		try{
			unset($_SESSION['last_page']);
		}catch(Exception $e)
		{
			echo "failed to unset session var";
		}
		return $last_state;
	}
}
?>