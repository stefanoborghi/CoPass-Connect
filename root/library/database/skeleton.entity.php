<?php
/**
 * Database
 *
 * @package cowopass
 * @copyright 2012
 * @access public
 */
class skeleton extends Entity_Object
{
	var $database = NULL;
	/* VARIABILI DI CLASSE */
	var $prova = NULL;
	
	/* COSTANTI */
	const TABLE_NAME = 'table_name';
	
	/******
    * Costruttore di classe
	* @access public
	*/
	public function __construct($db){
		$this->database = $db;
	}
	
	/**********************************************************************/
	//								METODI
	/**********************************************************************/
	
	/******
    * Fake method
	* @access public
	*/
	public function fakeMethod($id_table){
		$query = "SELECT * FROM ".self::TABLE_NAME." WHERE id=:id";
		$stpdo = $this->database->mypdo->prepare($query);
		$stpdo->bindParam(':id', $id_table, PDO::PARAM_INT);
		$stpdo->execute();
		
		$arrcode = $stpdo->errorInfo();
		if($arrcode[0] == $this->transaction_ok){//query ok
				$row = $stpdo->fetch(PDO::FETCH_ASSOC);
				echo("aaaa");
				return $row;
		}else{
			$this->toLog("Errore in skeleton::fakeMethod - query: ".$query." - param: ".$id_table, KLogger::ERROR);
		}
	}
}