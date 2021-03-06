<?php
require('config.php');

 class MYSQLDatabase{
	private $conn; 
	
	public function __construct(){
	    $this->conn = new mysqli( DB_SERVER, DB_USER, DB_PASS , DB_NAME);
		if(!$this->conn ){
			 echo "Connection error";
			 return false;
		}else{ 
			//connected
			//echo "connected";
          }
	}
 
    public function select($query){ 
		$select_row = $this->conn->query($query);
		
		//validate query
		if($select_row){
			 return $select_row;
		}else{
			echo "Syntax error failed";
		}
	}
    
	public function insert($query){   
        //validate query
        if($this->conn->query($query)){ 
             return true;
        }else{
            echo "Syntax error failed...Failed to insert New Record ".mysqli_error($this->conn);
        }
    }
	
    public function update($query){ 
        if( $this->conn->query($query)){
           //echo "update successful"; 
           return true;  
        }else{
			echo "Syntax error failed...Failed to Update Record ".mysqli_error($this->conn);
            return false;
        } 
    }

    public function close(){
        $this->conn->close();
    }
    
    public function real_escape_string($text){
        $escaped_string =  $this->conn->real_escape_string($text);
        return $escaped_string;
    }

	//Fetch Methods
	public function fetch_array($result_set){
		return mysqli_fetch_array($result_set); 
	}
	public function fetch_assoc($result_set){
		return mysqli_fetch_assoc($result_set); 
	}
	 

	// database neutral methods
	public function num_rows($result_set){
		return mysqli_num_rows($result_set);
	}
	
	public function insert_id(){
		//return the last id iinserted over the current db connection
		return mysqli_insert_id($this->conn); 
	}
	
	public function affected_rows(){
		return mysqli_affected_rows($this->conn);
	}
}
 
 
$connection = new MYSQLDatabase; 
?>