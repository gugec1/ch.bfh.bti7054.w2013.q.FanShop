<?php
require_once ('functions/db_connection.php');
?>

<?php

$menu = array(
					'startseite' => 'home.php',
                                        'neuigkeiten' => 'neu.php',
                                        'login' => 'login.php',
                                        'product_details' => 'product_details.php',
                                        'warenkorb' => 'warenkorb.php'
					);

if (isset($_GET['seite']) && !empty($menu[$_GET['seite']])) {
	$aktuelleseite = $menu[$_GET['seite']]; } 
else {
	$aktuelleseite = $menu['startseite'];
}

require_once("functions/language.php");
$lang = getLanguage();

//change language
if(isset($_GET['language']) && ($_GET['language'])!= $lang ){
    setLanguage($_GET['language']); 
}

include("functions/translation.php");

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type" />
        <link href="style.css" rel="stylesheet" title="Default Style" type="text/css" />
        <title>FanShop</title>
    </head>

    <body>

        <div id="container">
            <div id="header">
                <?php include ("pages/header.php"); ?>
            </div>
            <div id="logo">
            Logo
	</div>
           <div id="navigation">
		<?php include ("pages/navigation.php"); ?>	
	</div>
            <div id="main">
                
               <?php include "pages/".$aktuelleseite;  ?>    
               
                
            </div>

            <div id="footer">
                footer
            </div>
        </div>

    </body>

</html>
