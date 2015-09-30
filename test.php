<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<p>Creating a Project:</p>
<?php
require_once 'includes/project.php';
require_once 'includes/projectview.php';
$myproject = new project();
$myproject->name = 'Rainbow';
$myprojectview = new projectview();
$myprojectview->init();
$myprojectview->show();
?>
</body>
</html>