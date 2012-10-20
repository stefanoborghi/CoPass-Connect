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
	
	var $id=NULL;
	var $tba_user_account_id;
	var $name;
	var	$fiscal_id;
	var $fiscal_id_type;
	var $address;
	var $status;
	
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
	public function set($tba_user_account_id, $name, $fiscal_id, $fiscal_id_type, $address, $status){
		$this->tba_user_account_id=$tba_user_account_id;
		$this->name=$name;
		$this->fiscal_id=$fiscal_id;
		$this->fiscal_id_type=$fiscal_id_type;
		$this->address=$address;
		$this->status=$status;
		
		if(!isset($id)){
			$query = "INSERT INTO ".self::TABLE_NAME." (tba_user_account_id, name, fiscal_id, fiscal_id_type, address, status) 
						VALUES (:tba_user_account_id, :name, :fiscal_id, :fiscal_id_type, :address, :status);"
			$stpdo=$this->database->mypdo->prepare($query);
			$stpdo->bindParam(':tba_user_account_id', $tba_user_account_id, PDO::PARAM_INT);
			$stpdo->bindParam(':name', $name, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':fiscal_id', $fiscal_id, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':fiscal_id_type', $fiscal_id_type, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':address', $address, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':status', $status, PDO::PARAM_VARCHAR);
			$stpdo->execute();
			$arrcode = $stpdo->errorInfo();
			
			if($arrcode[0] != 0)
				$this->toLog("error in cc_site::set::".$query, KLogger::ERROR);			
		}
		else{
			$this->toLog("Errore in cc_site::set:".$query." - id is not empty", KLogger::ERROR);
		}
	}
	
	public function get($id){
		if(isset($id)){	
			$query = "SELECT * FROM ".self::TABLE_NAME." WHERE id=:id;";
			$stpdo = $this->database->mypdo->prepare($query);
			$stpdo->bindParam(':id', $id, PDO::PARAM_INT);
			$stpdo->execute();
		
			$arrcode = $stpdo->errorInfo();
			if($arrcode[0] == $this->transaction_ok){ //query ok
				$row = $stpdo->fetch(PDO::FETCH_ASSOC);
			return $row;			
		}
		else{
			$this->toLog("Errore in cc_site::get:".$query." - id is empty", KLogger::ERROR);
		}
	}
	
	public function getparam($param,$val){
		if(isset($id)){	
			$query = "SELECT * FROM ".self::TABLE_NAME." WHERE :param=:val;";
			$stpdo = $this->database->mypdo->prepare($query);
			$stpdo->bindParam(':param', $param, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':val', $val, PDO::PARAM_VARCHAR);
			$stpdo->execute();
		
			$arrcode = $stpdo->errorInfo();
			if($arrcode[0] == $this->transaction_ok){ //query ok
				$array = $stpdo->fetchall(PDO::FETCH_ASSOC);
			return $array;			
		}
		else{
			$this->toLog("Errore in cc_site::getparam:".$query, KLogger::ERROR);
		}
	}
}