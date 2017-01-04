<?php
require_once('MYSQLDatabase.php');
class URL{
	
	
	
	public static function asset($file){
		$http = 'http://';
		$host = $_SERVER['HTTP_HOST'].'/redCannon/';
		$directory = 'public/'; 
		
		$local_link = $http.$host.$directory.$file; 
		$live_link = $http.$directory.$file; 
		 
		
		$comp_link = !empty($_SERVER['HTTP_HOST']) ? $local_link : $live_link;
		return $comp_link;
	}
	
	public static function link($tag , $url){ 
		return '<a href='.$url.'>'.$tag. '</a>';
	}
}
?>