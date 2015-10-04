<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Test PX</title>
<link href="CSS/core.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php 
include 'includes/header.php'; 
?>
<p>Creating a Project:</p> 
<?php
require_once 'includes/project.php';
require_once 'includes/projectview.php';
require_once 'includes/projectcontroller.php';
$myproject = new project();
$myproject->name = 'Rainbow';
$myprojectcontroller = new projectcontroller($myproject);
$myprojectview = new projectview($myprojectcontroller,$myproject);
//$myprojectview->init();
$myprojectview->show();
$myproject->add();
?>
</body>
<?php 
include 'includes/footer.php';
?>
</html>