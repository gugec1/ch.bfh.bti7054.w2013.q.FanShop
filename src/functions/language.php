<?php

function getLanguage() {

    //get language; if no cookie is set, set 'de' as default-value
    if (!isset($_COOKIE ["language"])) {
        // Default value is 'de'
        setLanguage("de");
        return "de";
    } else {
        return $_COOKIE ["language"];
    }
}

function setLanguage($value) {

    setcookie("language", $value);  //set cookie
    header("Location: index.php");  //reload page
}

?>

<!-- if (isset ($_GET["switch_lang"])){
                 setcookie("language", $_GET["switch_lang"]);
                 return $_GET["switch_lang"];
        }
        
        if (!isset ( $_COOKIE ["language"] )) {
                // Default value is 'en'
                setcookie("language", "en");
                return "en";
        } else {
                return $_COOKIE ["language"];
        }-->