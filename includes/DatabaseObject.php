<?php
require_once('MYSQLDatabase.php');
class DatabaseObject{
	 
		
	//Common database Methods
	public function getFieldNames(){
		global  $connection;
		$record1 = $connection->select("SELECT * FROM ".static::$table_name ." LIMIT 2 ");
		$row  = $connection->fetch_assoc($record1);
		//return the column names
		return array_keys($row);
	}
	
	public static function findAll(){
		$result_set = static::findBySql("SELECT * FROM ".static::$table_name );
		return $result_set;
	}
	
	public static function findById($id=0){ 
		global $connection;
		$sql = "SELECT * FROM ".static::$table_name." WHERE id = ". $connection->real_escape_string($id); 
		$sql .= " LIMIT 1 ";
		$result_array = static::findBySql($sql);
		
		return !empty($result_array) ? array_shift($result_array) : false ;
	}
	
	public static function findBySql($sql = ""){
		global $connection;
		$result_set = $connection->select($sql);
		$object_array = array();
		
		while($row = $connection->fetch_assoc($result_set) ){
			$object_array[] = static::instantiate($row);  
		} 
		return $object_array;
	}
	
	public static function countAll(){
		global $connection;
		$sql = "SELECT COUNT(*) FROM ". static::$table_name;
		$result = $connection->select($sql);
		$row = $connection->fetch_assoc($result);
		return array_shift($row);
	}
	
	public static function instantiate($record){
		//Helps create an object using an array of the object fetched
		/*
		$object = new self;
		$object->id = $record['id'];
		$object->username = $record['username'];
		$object->password = $record['password'];
		$object->first_name = $record['first_name'];
		$object->last_name = $record['last_name'];
		*/
		
		
		//More Dynamic way
		$object = new static();
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
	
	protected function attributes() { 
	  // return an array of attribute names and their values
	  $attributes = array();
	  foreach($this->getFieldNames() as $field) {
	    if(property_exists($this, $field)) { 
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $connection;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $connection->real_escape_string($value);
	  }
	  return $clean_attributes;
	}
	
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $connection;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		unset($attributes['id'] );
		print_r($attributes);
		$sql = "INSERT INTO ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if($connection->insert($sql)) {
			$this->id = $connection->insert_id();
			return true;
		} else {
			var_dump($sql);
			return false;
		}
	}

	
	public function update() {
	  global $connection;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $connection->real_escape_string($this->id);
	  $connection->update($sql);
	  return ($connection->affected_rows() == 1) ? true : false;
	}

	public static function delete($id) {
		global $connection;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = " DELETE FROM ".static::$table_name;
	  $sql .= " WHERE id=". $connection->real_escape_string($id);
	  $sql .= " LIMIT 1";
	  $connection->update($sql);
	  return ($connection->affected_rows() == 1) ? true : false;
	
		// NB: After deleting, the instance of User still 
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update() 
		// after calling $user->delete().
	}

	
}
?>