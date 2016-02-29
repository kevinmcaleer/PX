<?php

// Account Management Page

// show details

 // include '../class_Contact.php';
$myAcct = new Contact();
$myAcct->load($_SESSION['id']);
$myAcct->show();

?>
