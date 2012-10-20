<?php
// CLASS TRANSACTION

class cl_tba_transactions_log extends Entity_Object {
    /* CLASS VARIABLES */
    var $database = NULL;
    
    private $var=array();      # local variables
    private $id_oj;            # current transaction
    
    /* CONSTANT */
    const TABLE_NAME = 'tba_transactions_log';
    
    const t_qry_id="SELECT * FROM tba_transactions_log WHERE id=:id";   
    
    const t_upd_status="UPDATE cl_tba_transactions_log SET status=:status WHERE tba_cards_id=:id";    
        
    const t_qry_insert="INSERT INTO cl_tba_transactions_log (
                            tba_cards_id,
                            tba_cc_site_id_start,
                            tba_transactios_type_id,
                            tba_cc_site_id_end,
                            credits,
                            status) VALUES (
                            :tba_cards_id,
                            :tba_cc_site_id_start,
                            :tba_transactios_type_id,
                            :tba_cc_site_id_end,
                            :credits,
                            :status)";   

    const var_list=array(
                                   "tba_cards_id"=>array("lab"=>"card id","must"=>true,"t"=>PDO::PARAM_STR),
                                   "tba_cc_site_id_start"=>array("lab"=>"site di (start)","must"=>true,"t"=>PDO::PARAM_INT),
                                   "tba_transactios_type_id"=>array("lab"=>"tranaction type","must"=>true,"t"=>PDO::PARAM_STR),
                                   "tba_cc_site_id_end"=>array("lab"=>"site di (end)","must"=>true,"t"=>PDO::PARAM_STR),
                                   "credits"=>array("lab"=>"tranaction type","must"=>true,"t"=>PDO::PARAM_INT),
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
            $this->toLog("Errore in cl_tba_transactions_log - query: ".self::t_qry_id." - param: ".$id);
            return array('result'=>0);
        }
    }
    
    #   insert new transaction
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
        
        #   try to insert new cards
        $stpdo->execute();
        $arrcode = $stpdo->errorInfo();
        if($arrcode[0] == $this->transaction_ok){//query ok
            $row = $stpdo->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }else{
            $this->toLog("Errore in cl_tba_transactions_log - query: ".self::t_qry_insert." - param: ".$var_into);
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