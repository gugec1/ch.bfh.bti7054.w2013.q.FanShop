<?php

class ShoppingCart {

    private $items = array();

    public function addArticle($art, $num, $size, $price) {
        $artOrig = $art;
        $s = "";
        if ($size != null) {
            $s = " - " . strtoupper($size);
        }

        $art = $art . $s; //Neue Artikel-ID (Bezeichnung & Grösse)

        if (!isset($this->items[$art])) {
            $this->items[$art] = 0;
        } else {
            $num = $this->items[$art][2] + $num;    //Neue Anzahl des Artikels ermitteln
        }

        $this->items[$art] = array($art, $artOrig, $num, $size, $price);    //In Warenkorb speichern
        //$this->items[$art] += array($artOrig, $num, $size, $price);
    }

    public function removeItem($art) {
        
        if (isset($this->items[$art])) {

            $num = $this->items[$art][2] - 1;
            $this->items[$art][2] = $num;

            if ($this->items[$art][2] == 0)
                unset($this->items[$art]);
        }
    }

    public function display() {
        echo "<table border=\"1\">";
        echo "<tr><th>Article</th><th>Items</th><th>Prize</th><th>Total</th><th>Remove</th></tr>";

        foreach ($this->items as $i) {
            $total = $i[4] * $i[2];
            echo "<tr>
            <td>$i[0]</td><td>$i[2]</td><td>$i[4]</td><td>$total</td>
            <td>
            
            <form action=\"index.php?seite=warenkorb\" name=\"removeButton\" method=\"POST\">";
            echo "<input type=\"hidden\" name=\"articleToRemove\" value=\"$i[0]\">";
            echo "<input type=\"hidden\" name=\"action\" value=\"removeItem\">";
            echo "<input type=\"submit\" name=\"removeButton\" value=\"remove\">";
            echo "</form>
                
            </td> 
            </tr>";
        }


        // print_r($i);


        echo "</table>";

        //session_destroy();
    }

}

?>
