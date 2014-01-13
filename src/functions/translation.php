<?php

require_once("functions.php");
//include ("classes/DB.php");

function getTranslation($id, $lang) {
    global $db;
    require_db();
   
    $sql = "SELECT " . $lang . " FROM translations where id ='"  . $id ."'";
    //$sql = "Select * from translations";
    $ergebnis = $db->query($sql);
//    $db->close();
    $resultat = $ergebnis->fetch_object();

    if(isset($resultat)){
        return $resultat->$lang;
    } 
}

?>
