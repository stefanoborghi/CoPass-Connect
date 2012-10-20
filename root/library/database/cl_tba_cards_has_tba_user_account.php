<?php
// CLASS tba_cards_has_tba_user_account

class cl_tba_cards_has_tba_user_account extends Entity_Object {
    /* CLASS VARIABLES */
    var $database = NULL;
    
    private $var=array();      # local variables
    private $id_oj;            # current card
    
    /* CONSTANT */
    const TABLE_NAME = "tba_cards_has_tba_user_account"; //  table name
    
    const t_qry_cards="SELECT * FROM tba_cards_has_tba_user_account WHERE tba_cards_id=:id";   
    const t_qry_user="SELECT * FROM tba_cards_has_tba_user_account WHERE tba_user_account_id=:id";   
    
    const t_qry_insert="INSERT INTO tba_cards_has_tba_user_account (
                            tba_cards_id,
                            tba_user_account_id,
                            status)
                            VALUES (
                            :tba_cards_id,
                            :tba_user_account_id,
                            :status)";   

    const var_list=array(
                                   "tba_cards_id"=>array("lab"=>"card id","must"=>true,"t"=>PDO::PARAM_STR),
                                   "tba_user_account_id"=>array("lab"=>"user id","must"=>true,"t"=>PDO::PARAM_INT),
                                   "status"=>array("lab"=>"tranaction type","must"=>false,"t"=>PDO::PARAM_STR),
                                   );

    /******
    * Constructor
    * @access public
    */
    public function __construct($db){
        $this->database = $db;
    }
    
    #   get card information
    public function get($id) {
        $this->id_oj=$id;
        
        # parameter:
        $stpdo = $this->mypdo->prepare(self::t_qry_id);
        $stpdo->bindParam(':id', $id, PDO::PARAM_INT);

        $stpdo->execute();
        $arrcode = $stpdo->errorInfo();
        if($arrcode[0] == $this->transaction_ok){//query ok
            $this->var[$this->id_oj] = $stpdo->fetchAll(PDO::FETCH_ASSOC);
            return array('result'=>10,'value'=>$this->var[$this->id_oj]);
        }else{
            $this->toLog("Errore in skeleton::fakeMethod - query: ".self::t_qry_id." - param: ".$id);
            return array('result'=>0);
        }
    }
    
    #   insert new 
    function set($var_into) {
        $errors=array();
        $stpdo = $this->mypdo->prepare(self::t_qry_insert);
        
        # verify parameter:
        foreach(self::var_list as $id=>$val) {
            if ($val['must'] && (!isset($var_into[$id]) or (strlen(trim($var_into[$id]))==0))) {
                $errors[$id]=$val["lab"]." required";
            }
            $stpdo->bindParam(":".$id, $var_into[$id], $val["t"]);
        }
        
        #   if errors exit proc
        if (count($errors)>0)   return array('result'=>0, 'errors'=>$errors);
        
        #   try to insert new cards
        $stpdo->execute();
        $arrcode = $stpdo->errorInfo();
        if($arrcode[0] == $this->transaction_ok){//query ok
            $row = $stpdo->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $this->toLog("Errore in skeleton::fakeMethod - query: ".self::t_qry_insert." - param: ".$var_into);
            return array('result'=>0);
        }
    }
    
    #   update status
    function set_status($id, $status) {
        $errors=array();
        $stpdo = $this->mypdo->prepare(self::t_upd_status);
        $stpdo->bindParam(":status", $status, PDO::PARAM_STR);
        $stpdo->bindParam(":id", $id, PDO::PARAM_STR);
        
        $stpdo->execute();
        $arrcode = $stpdo->errorInfo();
        if($arrcode[0] == $this->transaction_ok){//query ok
            $row = $stpdo->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $this->toLog("Errore in cl_tba_cards - query: ".self::t_upd_status." - param: ".$var_into);
            return array('result'=>0);
        }
    }

}

?>