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
