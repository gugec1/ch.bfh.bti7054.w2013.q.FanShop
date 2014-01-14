
<?php

require_once("classes/EMail.php");
//Individuelle Adresse eingegeben?
if ($_POST["newAddress"] == "yes") {
    //Neue Adresse zwischenspeichern
    $name = $_POST["name"];
    $street = $_POST["street"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $shippingAddress = $name . ", " . $street . ", " . $zip . ", " . $city;
} else {
    //Useradresse abholen
    $userid = $_SESSION["userid"];
    $query = ("SELECT lastname, firstname, street, zip, city from user WHERE userid = '$userid'");

    $res = $db->query($query);
    $address = $res->fetch_object();
    $shippingAddress = $address->lastname . ", " . $address->firstname . ", " . $address->street . ", " . $address->zip . ", " . $address->city;
}


//Versand- & Zahlungsart
$shippingMethod = $_POST["shippingRadios"];
$paymentMethod = $_POST["paymentRadios"];

//Bestellung speichern
$userid = $_SESSION["userid"];
$query1 = "INSERT INTO fanshop.order ( userid, shipping_address, payment_method, shipping_method) VALUES ('$userid','$shippingAddress', '$paymentMethod','$shippingMethod');";
$db->query($query1);


$orderID = $db->insert_id;  ////Order-ID ermitteln
//Artikel speichern
$cart = $_SESSION["shoppingCart"];
foreach ($cart->items as $product) {
    $productID = $product[5];
    $anzahl = $product[2];
    $query1 = "INSERT INTO fanshop.order_details (order_id, product_id, quantity) VALUES ('$orderID','$productID', '$anzahl')";

    $db->query($query1);
}

//Mail versenden
$query = "Select email from fanshop.user WHERE userid = '$userid'";
$res = $db->query($query);
$emailaddress = $res->fetch_object();

$message = "Danke für Ihre Bestellung. Sie können Ihre Bestellung jederzeit online im Fussball Fanshop als PDF abrufen.";
$mail = new EMail();
$mail->Email();
$mail->sendMail($emailaddress->email, "Fussball Fanshop", $message);


//Warenkorb leeren
$cart->clear();

echo "<p>Die Bestellung wurde erfolgreich erfasst. Als Bestätigung erhalten Sie in Kürze eine E-Mail mit Ihren Bestelldaten.</p>";
echo "<a href=\"pages/orderPdf.php?orderid=$orderID\" target=\"_blank\">Bestellbestätigung</a>";
?>
