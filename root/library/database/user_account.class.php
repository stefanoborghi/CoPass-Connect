<?php
class user_account extends Entity_OBject
{
	var $database = NULL;
	
	var data = array(
		"id" => NULL, 
		"email" => NULL,
		"pwd" => NULL,
		"status" => NULL,
		"name" => NULL,
		"surname" => NULL,
		"idcard" => NULL,
		"id_card_type" => NULL,
		"status" => NULL);
		 
	const TABLE_NAME = 'tba_user_account';
	
	public function __costruct($db){
		$this->database = $db;
	}
	
	public function set($data){
		/*TODO testing. */
		if(!isset($id)){
			$query = "INSERT INTO tba_user_account (
			email, pwd, status, name, surname, idcard, id_card_type)
			VALUES ($data[1], $data[2], $data[3], $data[4], $data[5], $data[6], 
					$data[7], $data[8])";
			
			$stpdo = $this->database->mypdo->prepare($query);
			$stpdo->execute();
			$arrcode = $stpdo->errorInfo();
			
			if($arrcode[0] != 0) $this->toLog("error in user_account::set:".$query, KLogger::ERROR);
			
		} else {
			$this->toLog("error in user_account::set:".$query." - id is not empty", KLogger::ERROR);
		}
	}
	
	public function get($id){
		
	}
}
?>