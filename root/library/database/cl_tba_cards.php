<?php
// CLASS CARDS

class cl_tba_cards extends Entity_Object {
    /* CLASS VARIABLES */
    var $database = NULL;
    
    private $var=array();      # local variables
    private $id_oj;            # current card
    
    /* CONSTANT */
    const TABLE_NAME="tba_cards"; //  table name
    
    const t_qry_id="SELECT * FROM tba_cards WHERE id=:id";   
    const t_qry_owner="SELECT * FROM tba_cards WHERE tba_cc_site_id_generator=:id";   
    const t_qry_gnerator="SELECT * FROM tba_cards WHERE tba_cc_site_id_owner=:id";   
    
    const t_upd_status="UPDATE tba_cards SET status=:status WHERE id=:id";    
    const t_upd_amount="UPDATE tba_cards SET credits_amount=:credits_amount WHERE id=:id";    
    
    
    const t_qry_insert="INSERT INTO tba_cards (id, 
                            tba_cc_site_id_generator,
                            tba_cc_site_id_owner,
                            credits_amount,
                            card_type,
                            status) VALUES (:id,
                            :tba_cc_site_id_generator,
                            :tba_cc_site_id_owner,
                            :credits_amount,
                            :card_type,
                            :status)";   

    const var_list=array(
                                   "tba_cc_site_id_generator"=>array("lab"=>"generator","must"=>true,"t"=>PDO::PARAM_INT),
                                   "tba_cc_site_id_owner"=>array("lab"=>"owner","must"=>true,"t"=>PDO::PARAM_INT),
                                   "credits_amount"=>array("lab"=>"amounts","must"=>true,"t"=>PDO::PARAM_INT),
                                   "card_type"=>array("lab"=>"type","must"=>true,"t"=>PDO::PARAM_STR),
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
            $this->toLog("Errore in scl_tba_cards - query: ".self::t_qry_id." - param: ".$id);
            return array('result'=>0);
        }
    }
    
    #   insert new card
    function set($var_into) {
        $errors=array();
        $stpdo = $this->mypdo->prepare(self::t_qry_insert);
        
        # verify parameter:
        foreach(self::$var_list as $id=>$val) {
            if ($val['must'] && (!isset($var_into[$id]) or (strlen(trim($var_into[$id]))==0))) {
                $errors[$id]=$val["lab"]." required";
            }
            $stpdo->bindParam(":".$id, $var_into[$id], $val["t"]);
        }
        
        #   if errors exit proc
        if (count($errors)>0)   return array('result'=>0, 'errors'=>$errors);
        
        #   generate new id!!!
        $this->id_oj="NEW ID";
        $stpdo->bindParam(":id", $this->id_oj, PDO::PARAM_STR);
        
        #   try to insert new cards
        $stpdo->execute();
        $arrcode = $stpdo->errorInfo();
        if($arrcode[0] == $this->transaction_ok){//query ok
            $row = $stpdo->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $this->toLog("Errore in cl_tba_cards - query: ".self::t_qry_insert." - param: ".$var_into);
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
    
    #   update amount
    function set_credits_amountt($id, $credits_amount) {
        $errors=array();
        $stpdo = $this->mypdo->prepare(self::t_upd_amount);
        $stpdo->bindParam(":credits_amount", $credits_amount, PDO::PARAM_STR);
        $stpdo->bindParam(":id", $id, PDO::PARAM_STR);
        
        $stpdo->execute();
        $arrcode = $stpdo->errorInfo();
        if($arrcode[0] == $this->transaction_ok){//query ok
            $row = $stpdo->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $this->toLog("Errore in cl_tba_cards - query: ".self::t_upd_amount." - param: ".$var_into);
            return array('result'=>0);
        }
    }

}

?>