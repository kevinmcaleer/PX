<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Test PX</title>
<link href="CSS/core.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php 
include 'includes/header.php';  // load the standard header
?>
<div class="page">
<?php
include 'includes/sidebar.php'; // show the sidebar menu
?>
<div class="content">
<p>Creating a Project:</p> 
<?php
require_once 'includes/project.php';
require_once 'includes/projectview.php';
require_once 'includes/projectcontroller.php';
require_once 'includes/table.php';

$myproject = new project();
$myproject->load("106");
//$myproject->name = 'Rainbow';
$mytable = new tableview();
$myprojectcontroller = new projectcontroller($myproject);
$myprojectview = new projectview($myprojectcontroller,$myproject);
//$myprojectview->init();
$myprojectview->show();
$mytable->show();
// $myproject->add();
?>
</div> <!-- content -->
</div> <!-- page -->
</body>
<?php 
include 'includes/footer.php';
?>
</html>