<?php

if (isset($_SESSION["userid"])) {
    //Falls eingeloggt

    if (isset($_GET["aktion"])) {

        if ($_GET["aktion"] == "logout") {
            unset($_SESSION["userid"]);
            echo "Sie haben sich erfolgreich ausgeloggt.";
            header("refresh:3; url=index.php?seite=startseite");
        }
    }
} else {


    if (isset($_POST["username"]) && isset($_POST["pw"])) {
        //Falls Username und Passwort eingegeben wurde prüfen, ob dieser User vorhanden ist.

        $username = $_POST["username"];
        $pw = $_POST["pw"];


        $checkUser = new DB();
        $res = $checkUser->query("SELECT username, userid FROM user WHERE username = '$username' AND password = '$pw'");
        $row = $res->fetch_assoc();


        if ($res != NULL && $row['username'] != NULL) {
            $_SESSION["userid"] = $row['userid'];
            echo "Sie haben sich erfolgreich eingeloggt.";
            header("refresh:3; url=index.php?seite=startseite");
        } else {
            echo "Login fehlgeschlagen: Username oder Passwort ist falsch.";
        }

        $checkUser->close();
    } else {

        echo "<div class=\"loginform\">";
        echo "<form name = 'login' action= 'index.php?seite=login' method='post'>";
        echo "Username: <br/> <input type='text' name = 'username' /> <br/>";
        echo "PW: <br/> <input type='password' name='pw' /> <br/>";
        echo "<input type='submit' value='Login'  />";
        echo "</form>";
        echo "</br><a href='index.php?seite=registration'>Registrieren</a>";
        echo "</div>";
    }
}
?>
