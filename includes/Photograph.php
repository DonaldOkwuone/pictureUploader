<?php
require_once('MYSQLDatabase.php');
require_once('DatabaseObject.php');
class Photograph extends DatabaseObject{
	public static $table_name= 'photographs' ;
	public $id;
	public $filename;
	public $type;
	public $size;
	public $caption;
	
	private $temp_path;
	protected $upload_dir = "images";
	public $errors = array();
	protected $upload_errors = array(// http://www.php.net/manual/en/features.file-upload.errors.php
		UPLOAD_ERR_OK 				=> "No errors.",
		UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 		=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
	);
	
	public function attach_file($file){
		
		// Perform error checking on the form parameters
		if(!$file || empty($file) || !is_array($file)) {
			  // error: nothing uploaded or wrong argument usage
			  $this->errors[] = "No file was uploaded.";
			  return false;
		} elseif($file['error'] != 0) {
			  // error: report what PHP says went wrong
			  $this->errors[] = $this->upload_errors[$file['error']];
			  return false;
		} else {
			//set object attributes
			    $this->temp_path = $file['tmp_name'];
				$this->filename = basename($file['name']);
				$this->type = $file['type'];
				$this->size = $file['size'];
				return true;
		}
		
	}

	//Overwrite databaseObject Method
	public function save(){
		// A new record won't have an id yet.
		if(isset($this->id)) {
			// Really just to update the caption
			$this->update();
		} else {
			// Make sure there are no errors
			
			// Can't save if there are pre-existing errors
			if(!empty($this->errors)) { return false; }
		  
			// Make sure the caption is not too long for the DB
			if(strlen($this->caption) > 255) {
				$this->errors[] = "The caption can only be 255 characters long.";
				return false;
			}
		
			// Can't save without filename and temp location
			if(empty($this->filename) || empty($this->temp_path)) {
				$this->errors[] = "The file location was not available.";
				return false;
			}
			
			// Determine the target_path
			$target_path = '../'.DS.$this->upload_dir .DS. $this->filename;
		  
			// Make sure a file doesn't already exist in the target location
			//if(file_exists($target_path)) {
			//	$this->errors[] = "The file {$this->filename} already exists.";
			//	return false;
			//}
		
			// Attempt to move the file 
			if(move_uploaded_file($this->temp_path, $target_path)) {
		  	// Success
				// Save a corresponding entry to the database
				//var_dump($this);
				if($this->create()) {
					// We are done with temp_path, the file isn't there anymore
					unset($this->temp_path);
					return true;
				}
			} else {
				// File was not moved.
				$this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
				echo "failed to add photograph to mysql";
				return false;
			}
		}
	}
	
	public function imagePath(){
		return $this->upload_dir.'/'.$this->filename;
	}
	
	public function size_as_text() {
		if($this->size < 1024) {
			return "{$this->size} bytes";
		} elseif($this->size < 1048576) {
			$size_kb = round($this->size/1024);
			return "{$size_kb} KB";
		} else {
			$size_mb = round($this->size/1048576, 1);
			return "{$size_mb} MB";
		}
	}

	public function comments (){
		return Comment::findCommentsOn($this->id);
	}

	public static function delete($id){
		//remove database entry
		//delete the file
		if($file = parent::findById($id)){
			//print_r($file);
			chdir('..');
			if(unlink($file->imagePath() )){
				if( parent::delete($id) ){
				//entry was removed
				return true;
				 
				}else{
					$this->errors[] = "File could not be deleted";
				}
				return true;
			}else{
				echo "Could not delete file";
			}
				
		}else{
			echo "could not find file";
		}
		 
		
	}

	
}
