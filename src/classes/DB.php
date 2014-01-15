<?php
//Datenbankverbindung (mysqli)
class DB extends mysqli {
    
    function __construct() {
        parent::__construct("localhost", "root", "");
        parent::select_db("fanshop");
    }

    public function getData($query){
        return $this->query($query);
        
    }
    
    //not used at the moment
    public function checkUsername($username){
        $res = $this->query("Select * from user where username = $username");
        if($res.num_rows() > 0){
            return false;
        }
        return true;
    }
   }

?>