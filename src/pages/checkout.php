<?php
//include("classes/DB.php");
//Checkout-Formular
//User nicht eingeloggt
if (!isset($_SESSION["userid"])) {
    echo "Zum Bezahlen müssen Sie angemeldet sein.";
    echo "<br/>";
    echo "<a href='index.php?seite=login'>Zum Login</a>";
} else {
//User eingeloggt->Adresse, Warenkorb, Versandoptionen anzeigen   
    ?>
    <script type="text/javascript">
        function editAddress(){
            //            alert("hj");
            if(document.getElementById("changeAddress").checked == true) {
                document.getElementById("editAddress").style = "display: inline;";
            } else {
                document.getElementById("editAddress").style = "display: none;";
            }
        }
                                                    
        function validate(){
                                           
            if(document.getElementById("changeAddress").checked==true){
                if(document.getElementById("name").value == "" || document.getElementById("street").value == "" 
                    || document.getElementById("zip").value == "" || document.getElementById("city").value == ""){
                    alert("Adresse ist nicht komplett ausgefüllt.");
                    return false;    
                }
                                                    
                else {        
                    document.getElementById("newAddress").value = "yes";     
                }
            }
                        
            //Check Zahlungsart
            if(document.getElementById("payment-type1").checked != true && document.getElementById("payment-type2").checked != true){
                alert("Zahlungsmethode ist nicht gewählt.");
                return false;
            }
            
            //Check Versandart
            if(document.getElementById("shipping-type1").checked != true && document.getElementById("shipping-type2").checked != true){
                alert("Versandsmethode ist nicht gewählt.");
                return false;
            }
                        
            if(window.confirm("Klicken Sie auf OK um die Bestellung abzuschliessen.")){
                document.getElementById("confirmForm").submit();
            }
                                                             
                                                        
                            
        }
                                                        
                                            
    </script>

    <div id="checkout">
        <div class="cart">
            <h2>Warenkorb</h2>
            <?php
            $cart = $_SESSION["shoppingCart"];
            $cart->display("no");
            ?>
        </div>
        <div class="cart-container">



            <form class="confirm" id="confirmForm" action="index.php?seite=purchase" method="post">

                <div class="address">
                    <h2>Adresse</h2>
                    <?php
                    $userid = $_SESSION["userid"];
                    $query = ("SELECT lastname, firstname, street, zip, city from user WHERE userid = '$userid'");

                    $db = new DB();
                    $res = $db->query($query);
                    $db->close();

                    $address = $res->fetch_object();
                    echo "<ul>";
                    echo "<li><strong>Nachname, Vorname:</strong> $address->lastname,  $address->firstname </li>";
                    echo "<li><strong>Strasse:</strong> $address->street</li>";
                    echo "<li><strong>PLZ:</strong> $address->zip</li>";
                    echo "<li><strong>Ort:</strong> $address->city</li>";
                    echo "</ul>";
                    ?>

                    <input type="checkbox"  id="changeAddress" onClick="editAddress();"/>   Andere Adresse  </br>


                    <div class="edit-address" id="editAddress" style="display: none;">
                        Name, Vorname: </br>
                        <input type="text" id="name" name="name"/></br>
                        Strasse: </br>
                        <input type="text" id="street" name="street"/></br>
                        PLZ: </br>
                        <input type="text" id="zip" name="zip"/></br>
                        Ort: </br>
                        <input type="text" id="city" name="city"/></br>
                        <input type="hidden" id="newAddress" name="newAddress" value="no"/>
        <!--                    <input type="hidden" name ="userAddress" value=" <?php // $res    ?> "/>-->
                    </div>
                </div>

                <div class="shipping">    
                    <h2>Zahlungsart</h2>
                    Rechnung <br/>
                    <input type="radio" name="paymentRadios" value="rechnung" id="payment-type1"><br/>
                    Vorauszahlung </br>
                    <input type="radio" name="paymentRadios" value="vorauszahlung" id="payment-type2"><br/>
                    <h2>Versandsart</h2>
                    Standardpaket <br/>
                    <input type="radio" name="shippingRadios" value="normal" id="shipping-type1"><br/>
                    Express-Paket </br>
                    <input type="radio" name="shippingRadios" value="express" id="shipping-type2"><br/>
                </div>

            </form>


        </div>
        <div class="confirm-button">
            <input type="button" name="confirmButton" onClick="validate();" value="Bestätigen" />
        </div>
    </div>


    <?php
}
?>

