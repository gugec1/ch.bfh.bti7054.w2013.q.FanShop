<?php
//Funktionen 

//Datenbankverbindung 
function require_db() {
    global $db;
    require_once("classes/DB.php");
    
    if (!isset($db)) {
        $db = new DB();
    } 
}

//Sprache
function require_lang() {
    global $lang;
    require_once('functions/language.php');

    if (!isset($lang)) {
        $lang = getLanguage();
    }
}

?>
