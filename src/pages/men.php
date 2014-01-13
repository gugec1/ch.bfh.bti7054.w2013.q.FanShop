<?php
$to="ch.gugelmann@gmail.com";
$subj="Hello";
$mess="Hi Joe,\nI just want to say hello!\nBob";
$from="From:ch.gugelmann@gmail.com";
//$cc="Cc:alice@example.com";
mail($to,$subj,$mess,$from);

?>