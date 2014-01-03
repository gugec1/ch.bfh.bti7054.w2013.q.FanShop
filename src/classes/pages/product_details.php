<?php
$productID = $_GET['productID'];

$sql = "SELECT * FROM products where id = '" . $productID . "'";
$ergebnis = $datenbank->query($sql);
$bez = 'bezeichnung_' . $lang;
$beschreibung = 'beschreibung_' . $lang;

$resultat = $ergebnis->fetch_object();
?>

<div id="product-details">

    <?php
    if (isset($resultat)) {
        ?>
        <div class="bezeichnung">
            <p><?php echo $resultat->$bez; ?></p>
        </div>
        <div class="picture">

            <?php echo '<img src="images/' . $resultat->bild . '"width = 100%" />'; ?>
        </div>
        <div class="details">
            <div class="preis"><?php echo $resultat->preis; ?></div>
            <div class="beschreibung"><?php echo $resultat->$beschreibung; ?></div>
            <div class="auswahlfelder">

                <form action="index.php?seite=warenkorb" method="post">
                    <?php 
                    echo "<input type=\"hidden\" name=\"bezeichnung\" value=\"" . $resultat->$bez . "\" />";
                    echo "<input type=\"hidden\" name=\"preis\" value=\"" . $resultat->preis . "\" />";
                    echo "<input type=\"hidden\" name=\"beschreibung\" value=\"" . $resultat->$beschreibung . "\" />";
                    ?>

                    <?php
                    echo getTranslation('size', $lang, $datenbank) . ":";
                    ?>

                    <select name="size">
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                        <option value="xxl">XXL</option>
                    </select>
                    <?php
                    echo getTranslation('anzahl', $lang, $datenbank) . ":";
                    ?>
                    <input type="text" name="anzahl" value="1">
                    <?php
                    echo getTranslation('beschriftung', $lang, $datenbank) . ":";
                    ?>
                    <input type="text" name="beschriftung">

                    <?php echo "<input type=\"submit\" value=\"" . getTranslation('zuWarenkorb', $lang, $datenbank) . "\"  />";
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
