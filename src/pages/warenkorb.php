<?php

include("classes/ShoppingCart.php");
session_start();


$action = "";
if(isset($_POST['action'])){
    $action = $_POST['action'];
}

switch ($action) {

    case 'removeItem':
       
        $_SESSION["shoppingCart"]->removeItem($_POST['articleToRemove']);
        break;
    
    default:
        if (!isset($_SESSION["shoppingCart"])) {
            $_SESSION["shoppingCart"] = new ShoppingCart();
        }

        if (isset($_POST["bezeichnung"]) && isset($_POST["anzahl"]) && isset($_POST["prize"])) {
            $_SESSION["shoppingCart"]->addArticle($_POST["bezeichnung"], $_POST["anzahl"], $_POST["size"], $_POST["prize"]);
        }

        
        break;
}

$_SESSION["shoppingCart"]->display();
?>







