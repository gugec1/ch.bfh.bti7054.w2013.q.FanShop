<?php


    global $datenbank;
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbase = "fanShop";


    $datenbank = mysqli_connect($host, $user, $password, $dbase);

    if (!$datenbank){
        exit("Verbindungsfehler: " . mysqli_connect_error());
    }


?>
