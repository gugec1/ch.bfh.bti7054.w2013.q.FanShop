<?php

//Bestellung als PDF speichern
require_once("fpdf/fpdf.php");
include("../functions.php");

class PDF extends FPDF {

    public $title = "Bestellinformationen";

    public function createPDF($order_id) {
        global $db;
        require_db();

        $this->AddPage();
        $this->SetFont('Arial', '', 10);

        // Adresse
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Lieferadresse:', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->address($order_id);      //Adresse anzeigen
        $this->Ln(10);
        $this->Line($this->GetX(), $this->GetY(), $this->GetX() + 190, $this->GetY());

        // Produkte
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Produkt:', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->order($order_id);     //Produkte anzeigen
        $this->Cell(0, 10, "Danke für Ihre Bestellung.", 0, 1, 'L');
        $this->Output("order_Fanshop.pdf", "D");    //Dateinamen
    }

    public function header() {
        //Dokumentenheader
        $this->SetXY($this->lMargin, 5, $this->tMargin, 5);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 11, $this->title, 0, 0, 'C');
        $this->SetXY($this->lMargin, $this->GetY() + 20);
    }

    public function footer() {
        //Footer
        $this->SetXY(10, - 15);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    private function address($order_id) {
        //Adresse
        $query = "SELECT order_date, shipping_address, payment_method, shipping_method FROM fanshop.order WHERE orderid = '$order_id' ";
        $db = new DB();
        $res = $db->getData($query);
        $db->close();
        $address = $res->fetch_object();
        $this->Cell(0, 4, "Address: $address->shipping_address", 0, 1, 'L');
        $this->Cell(0, 4, "Zahlungsmethode: $address->payment_method", 0, 1, 'L');
        $this->Cell(0, 4, "Versandsmethode: $address->shipping_method", 0, 1, 'L');
    }

    private function order($order_id) {

        //Bestelldatum
        $query = "SELECT order_date from fanshop.order WHERE orderid = '$order_id' ";

        $db = new DB();
        $res = $db->getData($query);
        $db->close();

        $order = $res->fetch_object();
        $this->Cell(0, 4, "Bestelldatum: $order->order_date", 0, 1, 'L');

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, 'Bestellte Artikel:', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);

        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 5, 'Anzahl', 1, 0, 'L', 0);
        $this->Cell(140, 5, 'Produkt', 1, 0, 'L', 0);
        $this->Cell(30, 5, 'Preis', 1, 0, 'L', 0);
        $this->Ln();
        $this->SetFont('Arial', '', 10);


        //Waren:
        $query = "SELECT product_id, quantity from fanshop.order_details WHERE order_id = '$order_id' ";
        $db = new DB();
        $res = $db->getData($query);
        $db->close();

        $totalPrice = 0;
        
        //Waren ausgeben
        while ($order = $res->fetch_object()) {
            $productID = $order->product_id;
            $anzahl = $order->quantity;

            $query1 = "SELECT bezeichnung_de, preis from fanshop.products WHERE id='$productID'";
            $db1 = new DB();
            $res1 = $db1->getData($query1);
            $db1->close();
            $product = $res1->fetch_object();
            $preis = $anzahl * $product->preis;
            $totalPrice += $preis;  //Totalpreis berechnen

            $this->Cell(20, 5, "$anzahl", 'LR', 0, 'L', 0);

            $this->SetFont('Arial', 'B', 10);
            $this->Cell(140, 5, "$product->bezeichnung_de", 'LR', 0, 'L', 0);
            $this->SetFont('Arial', '', 10);
            $this->Cell(30, 5, "$preis", 'LR', 0, 'L', 0);
            $this->Ln();
        }

        $this->Cell(20, 5, "", 'LRB', 0, 'L', 0);
        $this->Cell(140, 5, "", 'LRB', 0, 'L', 0);
        $this->Cell(30, 5, "", 'LRB', 0, 'R', 0);
        $this->Ln();


        $this->Cell(20, 5, "Total:", 0, 0, 'L', 0);
        $this->Cell(140, 5, "", 0, 0, 'L', 0);
        $this->Cell(30, 5, "$totalPrice", 'B', 0, 'R', 0);
        $this->Ln();
    }

}

?>
