<?php

//Klasse ShoppingCart

class ShoppingCart {

    public $items = array();

     //Artikel hinzufügen
    //Bezeichnung, Anzahl, Grösse, Preis, ArtikelID
    public function addArticle($art, $num, $size, $price, $id) {
        $artOrig = $art;
        $s = "";
        if ($size != null) {
            $s = " - " . strtoupper($size);
        }
        $art = $art . $s; //Neue Artikel-ID (Bezeichnung & Grösse)
        //Zu Array hinzufügen
        if (!isset($this->items[$art])) {
            $this->items[$art] = 0;
        } else {
            //Neue Anzahl des Artikels ermitteln
            $num = $this->items[$art][2] + $num;
        }

        //In Warenkorb speichern
        $this->items[$art] = array($art, $artOrig, $num, $size, $price, $id);
    }

    //Artikel entfernen (via Bezeichnung)
    public function removeItem($art) {

        if (isset($this->items[$art])) {

            $num = $this->items[$art][2] - 1;
            $this->items[$art][2] = $num;

            if ($this->items[$art][2] == 0)
                unset($this->items[$art]);
        }
    }

    //Warenkorb leeren
    public function clear() {
        unset($this->items);
    }

    //Total Preis von Artikel berechnen
    public function sum() {
        $sum = 0;
        foreach ($this->items as $i) {
            $sum += $i[4] * $i[2];
        }
        return $sum;
    }

    //Warenkorb anzeigen
    public function display($withButtons) {
        $lang = $GLOBALS["lang"];
        //Warenkorb mit Remove- und Bezahlenbutton 
        if ($withButtons == "yes") {
            echo "<div class = \"warenkorb\" >";
            echo "<table border=\"0\">";
            echo "<tr><th>Article</th><th>Items</th><th>Prize</th><th>Total</th><th>Remove</th></tr>";

            foreach ($this->items as $i) {
                $total = $i[4] * $i[2];
                echo "<tr>";
                echo "<td>$i[0]</td><td>$i[2]</td><td>$i[4]</td><td>$total</td>";
                echo "<td>
            <form action=\"index.php?seite=warenkorb\" name=\"removeButton\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"articleToRemove\" value=\"$i[0]\">";
                echo "<input type=\"hidden\" name=\"action\" value=\"removeItem\">";
                echo "<input type=\"submit\" name=\"removeButton\" value=\"remove\">";
                echo "</form>  
            </td> 
            </tr>";
            }
            echo "<tr><td>Summe: </td><td></td><td></td><td>" . $this->sum() . "  </td></tr>";
            echo "</table>";
            echo "</div>";

            //Checkout-Button einblenden, wenn Artikel vorhanden
            if (count($this->items) > 0) {
                echo "<div class=\"checkoutButton\">
                    <a href = \"index.php?seite=checkout\">";
                echo "<a href=\"index.php?seite=checkout\">" . getTranslation('checkout', $lang) . "</a>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            //Warenkorb ohne Buttons
            echo "<div class = \"warenkorb\" >";
            echo "<table border=\"0\">";
            echo "<tr><th>Article</th><th>Items</th><th>Prize</th><th>Total</th></tr>";

            foreach ($this->items as $i) {
                $total = $i[4] * $i[2];
                echo "<tr>";
                echo "<td>$i[0]</td><td>$i[2]</td><td>$i[4]</td><td>$total</td>";
                echo "</form>  
            </td> 
            </tr>";
            }
            echo "<tr><td>Summe: </td><td></td><td></td><td>" . $this->sum() . "  </td></tr>";
            echo "</table>";
            echo "</div>";
        }
    }

}

?>
