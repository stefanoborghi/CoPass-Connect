<?php
/**
 * Database
 *
 * @package cowopass
 * @copyright 2012
 * @access public
 */
class cc_site extends Entity_Object
{
	var $database = NULL;
	
	var data = new array("id"=>NULL,"tba_user_account_id"=>NULL,"name"=>NULL,"fiscal_id"=>NULL,"fiscal_id_type"=>NULL,"address"=>NULL, "status"=>NULL);
	
	/* COSTANTI */
	const TABLE_NAME = 'tba_cc_site';
	
	/******
    * Costruttore di classe
	* @access public
	*/
	public function __construct($db){
		$this->database=$db;
	}
	
	/**********************************************************************/
	//								METODI
	/**********************************************************************/
	
	/******
    * Set method
	* @access public
	*/
	public function set($data){
		if(!isset($id)){
			$query = "INSERT INTO tba_cc_site (tba_user_account_id, name, fiscal_id, fiscal_id_type, address, status) VALUES ($data[1], $data[2], $data[3], $data[4], $data[5], $data[6])"
			$stpdo=$this->database->mypdo->prepare($query);
			$stpdo->execute();
			$arrcode = $stpdo->errorInfo();
			
			//if($arrcode[0] == $this->transaction_ok){  //query ok
			if($arrcode[0] != 0)
				$this->toLog("error in cc_site::set::".$query, KLogger::ERROR);
			
		}
		else{
			$this->toLog("Errore in cc_site::set:".$query." - id is not empty", KLogger::ERROR);
		}
	}
	
	public function get(){
		if(isset($id)){
		
		
		}
		else{
			$this->toLog("Errore in cc_site::get:".$query." - id is empty", KLogger::ERROR);
		}
	}
}