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
	/* VARIABILI DI CLASSE */
	var $prova = NULL;
	var $database = NULL;
	
	/* COSTANTI */
	
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
		$query = "SELECT * FROM table WHERE id=:id";
		$stpdo = $this->mypdo->prepare($query);
		$stpdo = $this->mypdo->prepare($query);
		$stpdo->bindParam(':id', $id_table, PDO::PARAM_INT);
		
		$arrcode = $stpdo->errorInfo();
		if($arrcode[0] == $this->transaction_ok){//query ok
				$row = $stpdo->fetchAll(PDO::FETCH_ASSOC);
				return $row;
		}else{
			$this->toLog("Errore in skeleton::fakeMethod - query: ".$query." - param: ".$id_table);
		}
	}
}