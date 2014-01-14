<?php

//Useraccount
$userid = $_SESSION["userid"];
$query = ("SELECT username, lastname, firstname, street, zip, city, email from user WHERE userid = '$userid'");
$res = $db->query($query);
$address = $res->fetch_object();
//Zeigt Adresse und bisherige Bestellungen an
echo "<h3>Account</h3>";
echo "Hallo " . $address->firstname . " " . $address->lastname ;
echo "<h2>Meine Daten</h2>";


echo "<b>Username: </b>" . $address->username . "</br>";
echo "<b>Name: </b>" . $address->lastname . "</br>";
echo "<b>Vorname: </b>" . $address->firstname . "</br>";
echo "<b>Strasse: </b>" . $address->street . "</br>";
echo "<b>Ort: </b>" . $address->zip . " " . $address->city . "</br>";
echo "<b>Email: </b>" . $address->email . "</br>";


//Bisherige Bestellungen:
$userid = $_SESSION["userid"];
$query = ("SELECT orderid, order_date from fanshop.order WHERE userid = '$userid' order by order_date desc");
$res1 = $db->query($query);

//echo count($res1);

if(count($res1)>0){
    echo "<h2>Bisherige Bestellungen</h2>";
    echo"<table>";
    echo "<tr><th>Bestelldatum</th><th>Bestellung</th></tr>";
 
    while ($order = $res1->fetch_object()) {
        echo "<tr><td>$order->order_date</td><td><a href=\"pages/orderPdf.php?orderid=$order->orderid\" target=\"_blank\">PDF</a></td></tr>";
    }
    echo"</table>";
}


?>
