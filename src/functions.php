<?php

function require_db() {
    global $db;
    require_once('functions/db_connection.php');
    require_once("classes/DB.php");
    
    if (!isset($db)) {
        //$db = getDB();
        $db = new DB();
    } 
}

function require_lang() {
    global $lang;

    require_once('functions/language.php');


    if (!isset($lang)) {
        $lang = getLanguage();
    }
}

?>
