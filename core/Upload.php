
<?php


class upload extends Crud {

	protected static $db_table = "uploads";
    protected static $db_fields = array( 
        'id'            =>      'int', 
        'filename'      =>      'string', 
        'type'          =>      'string', 
        'size'          =>      'int' 
	);
	
	public $id;
	public $filename;
	public $type;
	public $title;
	public $tmp_path;
	public $size;

	public $errors = array();
	public $upload_directory = "uploads";
	public $upload_file_errors = array(
		"UPLOAD_ERR_OK"         =>          "There is no error",
		"UPLOAD_ERR_INI_SIZE"   =>          "The uploaded file exceeds upload max size",
		"UPLOAD_ERR_FORM_SIZE"  =>          "The uploaded file exceeds MAX_FILE_SIZE direct",
		"UPLOAD_ERR_PARTIAL"    =>          "Uploaded file is partially uploaded",
		"UPLOAD_ERR_NO_FILE"    =>          "No file was uploaded",
		"UPLOAD_ERR_NO_TMP_DIR" =>          "Missing a temporary folder",
		"UPLOAD_ERR_CANT_WRITE" =>          "Failed to write file to desk",
		"UPLOAD_ERR_EXTENSION"  =>          "A php extension stopped working"
	);


	public function set_file($file){

		if(empty($file) || !$file || !is_array($file)){
			$this->errors[] = "There is no uploaded file";
			return false;
		}else if($file["error"]){
			return false;
		}else{
			$this->filename = basename($file["name"]);
			$this->tmp_path = $file["tmp_name"];
			$this->type  = $file["type"];
			$this->size  = $file["size"];
		}

	}


	public function save(){

		if (isset($this->id)){
			$this->update();

		}else{
			if(!empty($this->errors)){
				return false;
			}

			if(empty($this->filename) || empty($this->tmp_path)){
				$this->errors[] = "The file is not available";
				return false;
			}


			$target_path =  SITE_ROOT . $this->upload_directory . "/" . $this->filename;

			if(file_exists($target_path)){
				$this->errors[] = "The file {$this->filename} already exists";
				$record = self::find_this_query("SELECT * FROM uploads WHERE filename = '$this->filename'");
				$record = array_shift($record);
				$this->id = $record->id;
				$this->update();
				return false;
			}

			if(move_uploaded_file($this->tmp_path, $target_path)){

				if($this->insert()){
					unset($this->tmp_path);
					return true;
				}

			}else{
				$this->errors[] = "The file does not have permission";

			}

		}
	}

}

$upload = new upload();
