<?php

require_once("functions.php");

//Gibt �bersetzung zur�ck aus Tabelle translation
function getTranslation($id, $lang) {
    global $db;
    require_db();
   
    $sql = "SELECT " . $lang . " FROM translations where id ='"  . $id ."'";
    $ergebnis = $db->query($sql);
    $resultat = $ergebnis->fetch_object();

    if(isset($resultat)){
        return $resultat->$lang;
    } 
}

?>
