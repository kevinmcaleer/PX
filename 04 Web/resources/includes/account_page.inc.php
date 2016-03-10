<?php

// Account Management Page

// show details

 // include '../class/class_contact.php';
$myAcct = new Contact();
$myAcct->load($_SESSION['id']);
$myAcct->show();

?>
