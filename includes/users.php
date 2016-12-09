<?php
require_once('MYSQLDatabase.php');

 class User{
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
		
		$result_array = self::findBySql($sql);
		
		return !empty($result_array) ? array_shift($result_array) : false ;
	
	} 
	
	public static function findAll(){
		$result_set = self::findBySql("SELECT * FROM users");
		return $result_set;
	}
	
	public static function findById($id=0){ 
		global $connection;
		$result_array = self::findBySql("SELECT * FROM users WHERE id = {$id} LIMIT 1 ");
		
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function findBySql($sql = ""){
		global $connection;
		$result_set = $connection->select($sql);
		$object_array = array();
		
		while($row = $connection->fetch_array($result_set) ){
			$object_array[] = self::instantiate($row); 
		}
		
		return $object_array;
	}
	
	private static function instantiate($record){
		/*
		$object = new self;
		$object->id = $record['id'];
		$object->username = $record['username'];
		$object->password = $record['password'];
		$object->first_name = $record['first_name'];
		$object->last_name = $record['last_name'];
		*/
		
		
		//More Dynamic way
		$object = new self;
		foreach($record as $attribute => $value){
			if($object->has_attribute($attribute) ){
				$object->$attribute = $value;
			}
		}
		return $object; 
	}
	
	private function has_attribute($attribute) {
	  // get_object_vars returns an associative array with all attributes 
	  // (incl. private ones!) as the keys and their current values as the value
	  $object_vars = get_object_vars($this);
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $object_vars); 
	}
	
	
	
	
	
}

?>