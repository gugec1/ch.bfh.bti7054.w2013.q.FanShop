<?php

function getTranslation($id, $language, $db) {



    $sql = "SELECT " . $language . " FROM translations where id ='"  . $id ."'";
    //$sql = "Select * from translations";
    $ergebnis = $db->query($sql);
    $resultat = $ergebnis->fetch_object();

    if(isset($resultat)){
        return $resultat->$language;
    } 
}

?>
