/**TODO TESTING */
class user_account extends Entity_OBject
{
	var $database = NULL;
	var $id; 
	var $email;
	var	$pwd;
	var	$status;
	var	$name;
	var	$surname;
	var	$idcard;
	var	$id_card_type;
	var $cc_profile;
		 
	const TABLE_NAME = 'tba_user_account';
	
	public function __costruct($db){
		$this->database = $db;
	}
	
	public function set($email, $pwd, $status, $name, $surname, $idcard, $id_card_type){
		if(!isset($id)){
			$this->email = $email;
			$this->pwd = $pwd;
			$this->status = $status;
			$this->name = $name;
			$this->surname = $surname;
			$this->idcard = $idcard;
			$this->id_card_type = $id_card_type;
			$this->cc_profile = $cc_profile;
			
			$query = "INSERT INTO $TABLE_NAME (
			email, pwd, status, name, surname, idcard, id_card_type, cc_profile)
			VALUES ($email, $pwd, $status, $name, $surname, $idcard, $id_card_type, $cc_profile	);";
			
			$stpdo = $this->database->mypdo->prepare($query);
			$stpdo->bindParam(':id', $id, PDO::PARAM_INT);
			$stpdo->bindParam(':email', $email, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':pwd', $pwd, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':status', $status, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':name', $name, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':surname', $surname, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':idcard', $idcard, PDO::PARAM_VARCHAR);
			$stpdo->bindParam(':id_card_type', $id_card_type, PDO::PARAM_VARCHAR);
			$stdpo->bindParam(':cc_profile', $cc_profile, PDO::PARAM_VARCHAR);
			
			$stpdo->execute();
			$arrcode = $stpdo->errorInfo();
			
			if($arrcode[0] != 0) $this->toLog("error in user_account::set:".$query, KLogger::ERROR);
			
		} else {
			$this->toLog("error in user_account::set:".$query." - id is not empty", KLogger::ERROR);
		}
	}
	
	public function get($id){
		if(isset($id)){
			$query = "SELECT * FROM $TABLE_NAME WHERE id=´$id`;";
			$stpdo = $this->database->mypdo->prepare($query);
			$stpdo->bindParam(':id', $id, PDO::PARAM_INT);
			$stpdo->execute();
			$arrcode = $stpdo->errorInfo();
			
			if($arrcode[0] == $this->transaction_ok){
				$row = $stpdo->fetch(PDO::FETCH_ASSOC);
				return $row;
			}else{
				$this->toLog("error in user_account::get - query: ".$query." - param: ".$id, KLogger::ERROR);
			}
		} else {
			$this->toLog("error in user_account::get - query: ".$query." - param: ".$id." $id is not set.", KLogger::ERROR);
		}
	}
}