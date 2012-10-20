<?php
/**
 * Database
 *
 * @package Database Abstraction Layer for cowopass
 * @copyright 2010
 * @access public
 */
class database
{
	var $mypdo = NULL;
	
	const TYPE_MYSQL = 'mysql';
	const TYPE_MYSQLI = 'mysqli';
	const TYPE_SQLITE = 'sqllite';
	
	/**
	* Class construct
	*
	* @param $u username
	* @param $p password
	* @param $h host
	* @param $db  mysql-> nome db sqlite->file sqlite
	* @return
	*/
	public function __construct($u, $p, $h, $db, $type){
		/* PDO object instantiation */
		switch($type){
			case self::TYPE_MYSQL:
				$dns = "mysql:host=".$h.";dbname=".$db;
			break;
			case self::TYPE_MYSQLI:
				$dns = "mysql:host=".$h.";dbname=".$db;
			break;
			case self::TYPE_MYSQLI:
				$dns = "sqlite:".$db.".sqlite";	
			break;
			default:
				$dns = "mysql:host=".$h.";dbname=".$db;
			break;
		}
		if(empty($type))
			$dns = "mysql:host=".$h.";dbname=".$db;
		try {
			$this->mypdo = new PDO($dns, $u, $p);
			$this->mypdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) {
			echo 'database.class.php -> Connect error: '.$e->getMessage();
			die();
		}
	}
   /**
   * database::close()
   *
   * @return
   */
	function close(){
		$this->mypdo = null;
	}

}