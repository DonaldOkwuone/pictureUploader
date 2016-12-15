<?php 
require_once('MYSQLDatabase.php');
require_once('DatabaseObject.php');
class Category extends DatabaseObject{
	public static $table_name= 'categories' ;
	
	public $id;
	public $title;
	public $description;
	public $created_at;
	public $updated_at;
	
	
	
}

?>