<?php
/**
 * Classe astratta che tutte le entita' coinvolte devono estendere
 *
 * @package cowopass
 * @copyright 2012
 * @access public
 */
abstract class Entity_Object {
	
	/**
	 * Identifica l'ok di una transaction
	 */
	var $transaction_ok = '00000';
	
	/******
    * To Log mathod inherit from interface
	* @author fefoweb
	* @access public
	*/
	public function toLog($message, $type){
		
		if( 'test' == ENVIRONMENT ){
			$logger = new KLogger ( DIR_LOG."/log.txt" , KLogger::DEBUG );
		}else{
			$logger = new KLogger ( DIR_LOG."/log.txt" , KLogger::WARN );
		}
		
		switch ($type){
			case KLogger::ERROR:
				$logger->LogError($message);
				break;
			case KLogger::WARN:
				$logger->LogWarn($message);
				break;
			case KLogger::INFO:
				$logger->LogInfo($message);
				break;
		}
	}
}

?>