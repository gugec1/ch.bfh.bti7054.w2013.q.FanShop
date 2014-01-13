
<ul id="language">
    <li><a href="index.php?language=de">de</a></li>
    <li><a href="index.php?language=en">en</a></li>
</ul>
<ul>

    <?php
    //Login/Logout 
    if (!isset($_SESSION["userid"])) {
        echo "<li><a href=\"index.php?seite=login\"><span>Login</span></a></li>";
    } else {
        echo "<li><a href=\"index.php?seite=login&aktion=logout\"><span>Logout</span></a></li>";
        echo "<li><a href=\"index.php?seite=account\"><span>Mein Account</span></a></li>";
    }
    ?>

    <li><a href="index.php?seite=warenkorb"><span>Warenkorb</span></a></li>


</ul>