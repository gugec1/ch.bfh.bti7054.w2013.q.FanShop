<?php

function getDB(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbase = "fanshop";

    return $datenbank = mysqli_connect($host, $user, $password, $dbase);

    if (!$datenbank) {
        exit("Verbindungsfehler: " . mysqli_connect_error());
    }
}

?>
