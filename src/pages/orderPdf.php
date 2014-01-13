<?php
require_once("../classes/PDF.php");
$orderid = $_GET["orderid"];
save($orderid);
function save($orderid){
$pdf = new PDF();
$pdf->createPDF($orderid);    
}

?>
