<?php
//Index-File
include("classes/DB.php");
include("functions.php");
include("classes/ShoppingCart.php");
include("functions/translation.php");

//Datenbankverbindung herstellen
require_db();
//Session setzen
if (!isset($_SESSION)) {
    session_start();
}

require_lang();
//change language
if (isset($_GET['language']) && ($_GET['language']) != $lang) {
    setLanguage($_GET['language']);
}

//Seiten 
$menu = array(
    'startseite' => 'home.php',
    'login' => 'login.php',
    'product_details' => 'product_details.php',
    'warenkorb' => 'warenkorb.php',
    'checkout' => 'checkout.php',
    'registration' => 'registration.php',
    'purchase' => 'purchase.php',
    'men' => 'products.php',
    'women' => 'products.php',
    'team' => 'products.php',
    'kids' => 'products.php',
    'accessoires' => 'products.php',
    'kontakt' => 'kontakt.php',
    'account' => 'account.php'
);

if (isset($_GET['seite']) && !empty($menu[$_GET['seite']])) {
    $aktuelleseite = $menu[$_GET['seite']];
} else {
    $aktuelleseite = $menu['startseite'];
}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type" />
        <link href="style.css" rel="stylesheet" title="Default Style" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css' /> 
        <title>FanShop</title>
    </head>
    <body>

        <div id="container">
            <div id="header">
                <?php include ("pages/header.php"); ?>      
            </div>
            <div id="logo">
                <h1>Fussball Fanshop</h2>
            </div>
            <div id="navigation">
                <?php include ("pages/navigation.php"); ?>	
            </div>
            <div id="main">
                <?php include "pages/" . $aktuelleseite; ?>    
            </div>

            <div id="footer">
                <?php include ("pages/footer.php"); ?>
            </div>
        </div>

    </body>

</html>
