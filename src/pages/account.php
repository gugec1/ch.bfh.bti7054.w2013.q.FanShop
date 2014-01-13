<?php

//Useraccount
//Zeigt Adresse und bisherige Bestellungen an
echo "<h1>Account</h1>";

echo "<h2>Meine Daten</h2>";
$userid = $_SESSION["userid"];
$query = ("SELECT username, lastname, firstname, street, zip, city, email from user WHERE userid = '$userid'");
$res = $db->query($query);
$address = $res->fetch_object();

echo "Username: " . $address->username . "</br>";
echo "Name: " . $address->lastname . "</br>";
echo "Vorname: " . $address->firstname . "</br>";
echo "Strasse: " . $address->street . "</br>";
echo "Ort: " . $address->zip . " " . $address->city . "</br>";
echo "Email: " . $address->email . "</br>";


//Bisherige Bestellungen:
$userid = $_SESSION["userid"];
$query = ("SELECT * from fanshop.order WHERE userid = '$userid' order by order_date desc");
$res = $db->query($query);

if (count($res) > 0) {
    echo "<h2>Bisherige Bestellungen</h2>";
    echo"<table>";
    echo "<tr><th>Bestelldatum</th><th>Bestellung</th></tr>";

    while ($order = $res->fetch_object()) {

        echo "<tr><td>$order->order_date</td><td><a href=\"pages/orderPdf.php?orderid=$order->orderid\" target=\"_blank\">PDF</a></td></tr>";
    }
    echo"</table>";
}


?>
