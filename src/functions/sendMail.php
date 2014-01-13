<?php
//todo: Mail versenden mit PDF im Anhang
//
//header ("location:pages/orderPdf.php target=_blank");
//require_once("orderPdf.php");
//save($orderID);
//$pdf = new PDF();
//$pdf->createPDF($orderID);
//$pdf->Output($bla.'.pdf','F'); 
//echo "PDF-Datei mit dem Dateinamen $bla.pdf generiert"; 
//$file = "output.pdf"; 
//$file_name = "Ihre_Bestellung.pdf"; 
//$from = "ch.gugelmann@gmail.com"; 
//$to = "ch.gugelmann@gmail.com"; 
//$boundary = strtoupper(md5(uniqid(time()))); 
//$message = "Vielen Dank für Ihre Bestellung!"; 
//$mail_header  = "From:Test <$from>\n"; 
//$mail_header .= "MIME-Version: 1.0"; 
//$mail_header .= "\nContent-Type: multipart/mixed; boundary=$boundary"; 
//$mail_header .= "\n\nThis is a multi-part message in MIME format  --  Dies ist eine mehrteilige Nachricht im MIME-Format"; 
//$mail_header .= "\n--$boundary"; 
//$mail_header .= "\nContent-Type: text/plain"; 
//$mail_header .= "\nContent-Transfer-Encoding: 8bit"; 
//$mail_header .= "\n\n$message"; 
//$file_content = fread(fopen($file,"r"),filesize($file)); 
//$file_content = chunk_split(base64_encode($file_content)); 
//$mail_header .= "\n--$boundary"; 
//$mail_header .= "\nContent-Type: application/octetstream; name=\"$file_name\""; 
//$mail_header .= "\nContent-Transfer-Encoding: base64"; 
//$mail_header .= "\nContent-Disposition: attachment; filename=\"$file_name\""; 
//$mail_header .= "\n\n$file_content"; 
//$mail_header .= "\n--$boundary--"; 
//mail($to,"Betreff",$message,$mail_header);
?>
