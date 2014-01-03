<?php

include("classes/ShoppingCart.php");
session_start();


if (!isset($_SESSION["shoppingCart"])){
     $_SESSION["shoppingCart"] = new ShoppingCart();} 

if (isset($_POST["bezeichnung"]) && isset($_POST["anzahl"])){
     $_SESSION["shoppingCart"]->addArticle($_POST["bezeichnung"], $_POST["anzahl"]);
}

$_SESSION["shoppingCart"]->display();




?>







