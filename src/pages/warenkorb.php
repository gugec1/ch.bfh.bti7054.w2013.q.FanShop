<?php
//Warenkorb
if (isset($_POST["action"])) {
    $action = $_POST["action"];
}

//Aktion
if (isset($action)) {
    
    //Artikel entfernen
    if ($action == "removeItem") {
        $_SESSION["shoppingCart"]->removeItem($_POST["articleToRemove"]);
    }
    
} else {
    
    //ShoppingCart initialisieren
    if (!isset($_SESSION["shoppingCart"])) {
        $_SESSION["shoppingCart"] = new ShoppingCart();
    }
    
    //Artikel in Warenkorb legen
    if (isset($_POST["bezeichnung"]) && isset($_POST["anzahl"]) && isset($_POST["prize"]) && isset($_POST["id"])) {
        $_SESSION["shoppingCart"]->addArticle($_POST["bezeichnung"], $_POST["anzahl"], $_POST["size"], $_POST["prize"], $_POST["id"]);
    }
}

//Warenkorb anzeigen, falls nicht leer
if(count($_SESSION["shoppingCart"]->items) > 0){
    $_SESSION["shoppingCart"]->display("yes");

}else {
    echo "Warenkorb ist leer.";
}


?>








