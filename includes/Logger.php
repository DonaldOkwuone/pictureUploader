<?php
 
class Logger{
	private $log_location = '../../logs';
	private $filename = 'log.txt';
	public $message;
	private $action;
	public $log_time;
	
	public function __construct($action = "" , $message = ""){
		$this->action = $action;
		$this->message = $message;
		
	}
	
	public function logAction(){ 
		/*actions can be
		  1. Login  
		  2. Logout  
		  3. Clear   
			We need to open the log Dir
		    Open the file then write to it
		*/ 
		if($this->changeDir($this->log_location) ){
			if( $handle = fopen($this->filename ,  'a+t')) { 
				 $this->writeToFile($handle); 
			}else{ 
				//Manually create file
				touch($this->filename);
				if( $handle = fopen($this->filename ,  'a+t')) { 
					$this->writeToFile($handle); 
				} 
			} 
		} 
		return true;  
	}

	public function changeDir($path_to_dir){
		chdir($path_to_dir); 
		return true;
	}

	public function writeToFile($handle){ 
		$this->log_time = strftime('%m-%d-%y %H:%M', strtotime("now"));
		$message = $this->log_time. "|{$this->action}: " . $this->message."\n";
		fwrite($handle,$message);
		fclose($handle);
	}

	public function clearLog(){
		//open the directory
		//open the file 
		//overrite file
		$this->log_time = strftime('%m-%d-%y %H:%M', strtotime("now") );
		if($this->changeDir($this->log_location)){
			 
			$this->message = $this->log_time." | ".$this->message."\n";
			file_put_contents($this->filename, $this->message);
			return true;
		}else{
			return false;
		}
		
	}
	
	public function readLog(){
		$content = "";
		if($this->changeDir($this->log_location)){
			$content = file_get_contents($this->filename);
		}
		return $content;
	}

}

?>