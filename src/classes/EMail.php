<?php

require_once("phpmailer/class.phpmailer.php");

class EMail {

    public $mail;

    function EMail() {

        $mail = new PHPMailer();

        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = "fussballfanshop"; // SMTP username
        $mail->Password = "fussballfanshop1"; // SMTP password 
//        $mail->Mailer = "smtp";
        
        $mail->AddReplyTo("fussballfanshop@gmail.com");

        $this->mail = $mail;
    }

    public function sendMail($to, $subject, $body) {
        $this->mail->SetFrom("fussballfanshop@gmail.com", "Fussball Fanshop") ;

        $this->mail->AddAddress($to);

        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->WordWrap = 50;

        //$this->mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].$attachment);
        $this->mail->Send();

        //no echo for production
//        if(!$this->mail->Send()) {
//            
//        } else {
//            $dbMail = new MailDB();
//            $dbMail->insertMail("BES", $to, "", "", $subject, $body, 1, date("d.m.Y"));
//            $dbMailID = $dbMail->insert_id;
//            
//            $dbMailAttachment = new MailAttachmentDB();
//            $dbMailAttachment->insertMailAttachment($dbMailID, $attachment);
//        }
    }

}

?>
