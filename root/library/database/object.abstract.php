<?php
/**
 * Classe astratta che tutte le entita' coinvolte devono estendere
 *
 * @package cowopass
 * @copyright 2012
 * @access public
 */
abstract class Entity_Object {
	
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
			case 'error':
				$logger->LogError($message);
				break;
			case 'warning':
				$logger->LogWarn($message);
				break;
			case 'info':
				$logger->LogInfo($message);
				break;
		}
	}
}

?>