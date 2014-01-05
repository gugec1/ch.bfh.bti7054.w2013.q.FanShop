<div class="product_container">

    <?php
    $query = "Select * from products where front = 1";
    $products = mysqli_query($datenbank, $query);
    
    $bez = 'bezeichnung_'.$lang;
    
    while($product = mysqli_fetch_object($products)){
    echo "<div class=\"product\">
            <div class=\"product-picture\">
                <img src=\"images/" .$product->bild."\"/>
            </div>
            <div class=\"product-info\">
                <h2>".$product->$bez."</h2>
                <a class=\"detail_button\" href=\"index.php?seite=product_details&productID=".$product->id."\">View</a>
             </div> 
          </div>";
    } ;
    ?>
 </div>

<!--
////while($row = mysqli_fetch_object($ergebnis))
////{
////  echo $row->url;
////}
//
////    <div class = "product">
////    <div class = "product-picture">
////    <img src = "images/home_trikot.jpg">
////    </div>
////    <div class = "product-info">
////    <h2>Titel</h2>
////    <a class = "detail_button" href = "index.php?seite=product_details&productID=1">View</a>
////    </div>
////
////    </div>
////
////
////    </div>
//    ?>

 -->