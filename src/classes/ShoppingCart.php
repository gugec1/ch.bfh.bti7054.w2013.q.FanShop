<?php

class ShoppingCart {

    private $items = array();

    public function addArticle($art, $num) {

        if (!isset($this->items[$art]))
            $this->items[$art] = 0;
        $this->items[$art] += $num;
    }

    public function display() {
        echo "<table border=\"1\">";
        echo "<tr><th>Article</th><th>Items</th></tr>";
        foreach ($this->items as $art => $num)
            echo "<tr><td>$art</td><td>$num</td></tr>";
        echo "</table>";
    }

}

?>
