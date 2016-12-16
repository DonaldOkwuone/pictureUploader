<?php
class Post extends DatabaseObject{
	//Set the name of the table we are modelling
	public static $table_name= 'posts' ;
	public $id;
	public $title;
	public $body;
	public $author;
	public $image;
	public $hits;
	public $category;
	public $added_on;
	public $published;
	public $created_at;
	public $updated_at;
	
	public function init($values = array() ){
		 $object = Post::instantiate($values);
		 return $object;
	}
	
	public function comments (){
		return Comment::findCommentsOn($this->id);
	}
	
	public function make_post($id){
		$post = static::findById($id);
		$this->id = $id;
		return;
	}
	
	public static function getMostRead(){
		$sql = "SELECT * FROM ". static::$table_name. " ";
		$sql .= "ORDER BY hits DESC ";
		$sql .= "LIMIT 4 ";
		//$sql .= "ORDER BY hits DESC ";

		$most_read = Post::findBySql($sql);
		return $most_read;
	}
	
	public static function search($sql){
		$posts = Post::findBySql($sql);
		return $posts;
		
	}
	public function save() {
	  // A new record won't have an id yet.
	  return !empty($this->id) ? $this->update() : $this->create();
	}
	public function create() {
		global $connection;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".static::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if($connection->insert($sql)) {
			$this->id = $connection->insert_id();
			return true;
		} else {
			return false;
		}
	}

	
}

?>