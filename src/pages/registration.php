<!--Registration form-->

<!--Validierung in 'js/registration.js'-->
<script type="text/javascript" src="js/registration.js"></script>

<?php

$aktion = "";
if (isset($_GET["aktion"])) {
    $aktion = $_GET["aktion"];
}

//Registrieren
if(($aktion=="doRegist")){

        $username = $_POST["username"];
        $pw = $_POST["password"];
        $lastName = $_POST["lastName"];
        $firstName = $_POST["firstName"];
        $street = $_POST["street"];
        $zip = $_POST["zip"];
        $city = $_POST["city"];
        $email = $_POST["email"];
        
        $query = "INSERT INTO `fanshop`.`user` (`userid`, `username`, `password`, `lastname`, `firstname`, `street`, `zip`, `city`, `email`) 
                VALUES (NULL, '$username', '$pw', '$lastName', '$firstName', '$street 13', '$zip', '$city', '$email')";
        $res = $db->query($query);;
        
        //Weiterleitung auf Startseite nach erfolgreicher Registrierung
        if($res){
            echo "Danke ". $firstName . " " . $lastName .", Sie haben sich erfolgreich registriert und werden zum Login-Bereich weitergeleitet....";
            header("refresh:3; url=index.php?seite=login"); 
        }
        
} else {

    ?>

<!--Registrierungsformular anzeigen-->
<h1>Registration</h1>
<form class="register" id="registrationForm" method="post" action="index.php?seite=registration&aktion=doRegist">

    <?php
    echo getTranslation("lastName", $lang, $db) . "<br/> <input type = \"text\" id='lastName' name='lastName'/> <br/>";
    echo getTranslation('firstName', $lang, $db) . ":<br/> <input type = 'text' id='firstName' name='firstName' /> <br/>";
    echo getTranslation('street', $lang, $db) . ":<br/> <input type = 'text' id='street' name='street'/> <br/>";
    echo getTranslation('plz', $lang, $db) . ":<br/> <input type = 'text' id='zip' name='zip'/> <br/>";
    echo getTranslation('city', $lang, $db) . ":<br/> <input type = 'text' id='city' name='city'/> <br/>";
//    echo getTranslation('tel', $lang, $db) . ":<br/> <input type = 'text' id='tel' name='tel'/> <br/>";
    echo getTranslation('email', $lang, $db) . ":<br/> <input type = 'text' id='email' name='email'/> <br/>";
    echo getTranslation('username', $lang, $db) . ":<br/> <input type = 'text' id='username' name='username'/> <br/>";
    echo getTranslation('password', $lang, $db) . ":<br/> <input type = 'password' id='password' name='password'/> <br/>";
    echo "<br/> <input type='button' name='submitted' value='" . getTranslation('registrate', $lang, $db) . "' onclick='validate()' />";
    ?>
</form>

<?php
} 
?>