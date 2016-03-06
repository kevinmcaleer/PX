<?php 

include '../resources/class/class_card.php';
echo '<link href="../public_html/css/cardui.css" rel="stylesheet" type="text/css">';
$mycard = new card;

$mycard->title = "Microsoft Office 2016";
$mycard->description = "Office Productivity suite for Windows 10 and Mac OS X.";
$mycard->date = time();
$mycard->items = 10;
$mycard->imageurl = "../public_html/img/CardUI.png";
$mycard->url = "http://www.apple.com";
$mycard->show();

$mycard2 = new card;
$mycard2->title = "Windows 10 Pro";
$mycard2->description = "Microsoft Windows 10 Pro Operating System.";
$mycard2->date = time();
$mycard2->items = 23;
$mycard2->imageurl = "../public_html/img/ServicePoint.png";
$mycard2->url = "http://www.ibm.com";
$mycard2->show();
$mycard2 = new card;
$mycard2->title = "Windows 10 Pro";
$mycard2->description = "Microsoft Windows 10 Pro Operating System.";
$mycard2->date = time();
$mycard2->items = 23;
$mycard2->imageurl = "../public_html/img/ServicePoint.png";
$mycard2->url = "http://www.ibm.com";
$mycard2->show();
?>