<?php

//This is a pagination class to make
//paginating records easy

require_once('MYSQLDatabase.php');
require_once('DatabaseObject.php');
require_once('Comment.php');
class Pagination extends DatabaseObject {
	public $current_page;
	public $per_page;
	public $total_count;
	public $related_model;
	public $related_model_id;
	
	public $custom_sql;
	
	public function __construct($page, $per_page=20, $total_count=0){
		$this->current_page = (int)$page;
		$this->per_page = (int)$per_page;
		$this->total_count = (int)$total_count;
	}
	
	public function offset(){
		$offset = ($this->current_page - 1) * $this->per_page;
		return $offset;
	}
	
	public function total_pages(){
		return ceil($this->total_count/$this->per_page);
	}
	
	public function previous_page(){
		return $this->current_page - 1;
	}
	
	public function next_page(){
		return $this->current_page + 1;
	}
	
	public function has_previous_page(){
		return $this->previous_page() >= 1 ? true : false;
		
	}
	
	public function has_next_page(){
		return $this->next_page() <=  $this->total_pages() ?  true : false;
	}

	public function paginate($table_name){
		//$table_name = trim($table_name);
		$sql = "SELECT * FROM {$table_name} ";
		$sql .= "LIMIT {$this->per_page} ";
		$sql .= "OFFSET {$this->offset()} ";
		$photos = Photograph::findBySql($sql);
		return $photos;
	}
	public function getColumnNames($class_name =  'comment'){
		$class_name = strtoupper($class_name); 
		global  $connection;
		$record1 = $connection->select("SELECT * FROM ".$class_name::$table_name ." LIMIT 2");
		$row  = $connection->fetch_assoc($record1);
		return array_keys($row);
		
	}
	
	public function paginate_relational($class_name='Comment', $sql){
		//$table_name = strtolower($class_name.'s') ; 
		//$column_names = $this->getColumnNames($class_name::$table_name );
		//related column key
		//$column_key = array_search($this->related_model.'_id', $column_names );
		
		
		
		
		//$sql = "SELECT * FROM {$table_name} ";
		//$sql = "WHERE {$column_names[$column_key]} = {$related_model_id} ";
		//$sql .= "LIMIT {$this->per_page} ";
		//$sql .= "OFFSET {$this->offset()} ";
		$objects = $class_name::findBySql($sql);
		return $objects;
	}
	
	public function outputPagination($current_page_name = "", $query_string = '' ){
		//you can always customize how your pagination string
		//should look like default is in red fonts
		$pagination_string = "";
		if($this->total_pages() > 1 ){
			if($this->has_previous_page()){
				$pagination_string = "<a href=\"{$current_page_name}?{$query_string}&page=";
				$pagination_string .= $this->previous_page();
				$pagination_string .= "\">&laquo; Previous </a> ";
			}
			
			for($i=1; $i <= $this->total_pages(); $i++ ){
				if($this->current_page == $i){ 
					$pagination_string .= "<span class=\"selected\" >{$i}</span>";
				}else{
				$pagination_string .= " <a href=\"{$current_page_name}?{$query_string}&page={$i}\">{$i}</a>";
				} 
			} 
			if($this->has_next_page()){
				$pagination_string .= "<a href=\"{$current_page_name}?{$query_string}&page=";
				$pagination_string .= $this->next_page();
				$pagination_string .= "\">Next &raquo;</a> ";
			}
		}
		return $pagination_string;
	}
	
	
}
?>