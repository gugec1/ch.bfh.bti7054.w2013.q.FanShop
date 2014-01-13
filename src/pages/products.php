<div class="product_container">

    <?php
    if (isset($_GET["seite"])) {
        $page = $_GET["seite"];

        switch ($page) {

            case "startseite":
                echo "<h3>Home</h3>";
                $query = "Select * from products where front = 1;";
                break;
            case "men":
                echo "<h3>Männer</h3>";
                $query = "Select * from products where id in(select product_id from product_categorie where categorie_id = 10)";
                break;
            case "women":
                echo "<h3>Damen</h3>";
                $query = "Select * from products where id in(select product_id from product_categorie where categorie_id = 11)";
                break;
            case "kids":
                echo "<h3>Kinder</h3>";
                $query = "Select * from products where id in(select product_id from product_categorie where categorie_id = 12)";
                break;
            case "team":
                echo "<h3>Mannschaft</h3>";
                $query = "Select * from products where id in(select product_id from product_categorie where categorie_id = 9)";
                break;
            case "accessoires":
                echo "<h3>Fanartikel</h3>";
                $query = "Select * from products where id in(select product_id from product_categorie where categorie_id = 13)";
                break;
            default:
                $query = "nodata";
        }

        if ($query != "nodata") {
            $products = $db->query($query);
            $bez = 'bezeichnung_' . $lang;  //Bezeichnung in entsprechender Sprache
            while ($product = $products->fetch_object()) {
                echo "<div class=\"product\">
            <div class=\"product-picture\">
                <img src=\"images/" . $product->bild . " \"width = 100%\"/> 
            </div>
            <div class=\"product-info\">
                <h2>" . $product->$bez . "</h2>
                <a class=\"detail_button\" href=\"index.php?seite=product_details&productID=" . $product->id . "\">View</a>
             </div> 
          </div>";
            };
            $db->close();
        } else
            echo "Keine Daten vorhanden.";
    }
    ?>

</div>
