<?php
//Details zu gewähltem Produkt anzeigen
//Produktdetails abholen
if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];

    $sql = "SELECT * FROM products where id = '" . $productID . "'";
    $ergebnis = $db->query($sql);
    $bez = 'bezeichnung_' . $lang;
    $beschreibung = 'beschreibung_' . $lang;
    $resultat = $ergebnis->fetch_object();
}
?>

<div id="product-details">

    <!--    Details darstellen-->
    <?php
    if (isset($resultat)) {
        ?>
        <!-- Bezeichnung   -->
        <div class="bezeichnung">
            <p><?php echo $resultat->$bez; ?></p>
        </div>
        <!-- Bild   -->
        <div class="picture">
            <?php echo '<img src="images/' . $resultat->bild . '"width = 100%" />'; ?>
        </div>
<!--        Details (Preis, Beschreibung, Grössenwahl, Anzahlwahl)-->
        <div class="details">
            <div class="preis">Preis: <?php echo $resultat->preis; ?> CHF</div>
            <div class="beschreibung"><?php echo $resultat->$beschreibung; ?></div>
            <div class="auswahlfelder">

                <form action="index.php?seite=warenkorb" method="post">
                    <?php
                    echo "<input type=\"hidden\" name=\"bezeichnung\" value=\"" . $resultat->$bez . "\" />";
                    echo "<input type=\"hidden\" name=\"prize\" value=\"" . $resultat->preis . "\" />";
                    echo "<input type=\"hidden\" name=\"beschreibung\" value=\"" . $resultat->$beschreibung . "\" />";
                    echo "<input type=\"hidden\" name=\"id\" value=\"$productID\" />";
                    ?>

                    <?php
                    
                    //Grössenwahl
                    if ($resultat->changeableSize == 1) {
                        echo getTranslation('size', $lang, $db) . ":";
                        echo "<select name=\"size\">";
                        echo "<option value=\"s\">S</option>";
                        echo "<option value=\"m\">M</option>";
                        echo "<option value=\"l\">L</option>";
                        echo "<option value=\"xl\">XL</option>";
                        echo "<option value=\"xxl\">XXL</option>";
                        echo "</select><br/>";
                    } else {
                        echo "<input type=\"hidden\" name=\"size\" value=\"\" />";
                    }
                    ?>
                    
                    <?php
                    //Anzahl:
                    echo getTranslation('anzahl', $lang, $db) . ":";
                    ?>
                    <input type="text" name="anzahl" value="1">
                    <?php
                    //Button 'Zu Warenkorb hinzufügen'
                    echo "<input type=\"submit\" value=\"" . getTranslation('zuWarenkorb', $lang, $db) . "\"  />";
                    ?>
                </form>

            </div>

        </div>


        <?php
    } else {
        echo '<p>Es konnte kein Artikel gefunden werden.</p>';
    }
    ?>
</div>
