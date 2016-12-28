<?php
require_once('MYSQLDatabase.php');
require_once('DatabaseObject.php');
class Comment extends DatabaseObject{
	public static $table_name= 'comments' ;
	
	public $id;
	public $post_id;
	public $created;
	public $author;
	public $body;
	
	public static function make($post_id, $author="Anonymouse", $body=""){
		if(!empty($post_id) && !empty($author) && !empty($body)  ){
			$comment = new self();
			$comment->post_id = (int) $post_id; 
			$comment->created = strftime("%y-%m-%d %H:%M:%S", time()) ;
			$comment->author = $author;
			$comment->body = $body;
			return $comment;
		}else{
			return false;
		}
		
	}
	
	public static function findCommentsOn($id=0){
		//Using a Foreign-Key here
		//So custom find function() is needed
		global $connection;
		$sql = "SELECT * FROM ".static::$table_name." WHERE post_id = ";
		$sql .= $connection->real_escape_string($id) . " ORDER BY created ASC ";
		//echo $sql;
		return static::findBySql($sql);
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