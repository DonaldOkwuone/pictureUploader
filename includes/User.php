<?php
require_once('MYSQLDatabase.php');
require_once('DatabaseObject.php');
class User extends DatabaseObject{
	public static $table_name= 'users' ;
	
	//public static $db_fields = array('id', 'username', 'password', 'first_name', 'last_name');
	//public $db_fields = $this->getFieldNames() ;
	
	
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	
	
	
	
	
	public function fullName() {
		if(isset($this->first_name) && isset($this->last_name)) {
		  return $this->first_name . " " . $this->last_name;
		} else {
		  return "";
		}
    }

	public static function authenticate($username,$password){
		global $connection;
		$username = $connection->real_escape_string($username);
		$password = $connection->real_escape_string($password);
		$sql = "SELECT * FROM users ";
		$sql .= "WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		
		$result_array = static::findBySql($sql);
		
		return !empty($result_array) ? array_shift($result_array) : false ;
	
	} 
	
}

?>