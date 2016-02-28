<?php
# px project form - projectform.php 
# created 30 September 2015
# created by Kevin McAleer
# purpose -
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Project</title>
<link href="CSS/core.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include 'includes/header.php';

?>
<div class="page">
<?php 
include 'includes/sidebar.php';
?>
<div class="content">
<div class="	box">
<form action="projectform.php" method="POST">
<?php
require_once 'includes/project.php';

$myproject = new project();
$myproject->load(106);

# check if there is any data posted to the form, if not show the edit form.
#

?>

<dl>
<dt>Project Title:</dt>
<?php 
echo '<dd><input type="text" name="name" value="' . $myproject->name .'">';
echo '<dt>Start Date: </dt>';
echo '<dd><input type="text" name="startdate" value="' . $myproject->startdate . '">';
?>

<dt>Finish Date:</dt>
<dd>Programme ID:</dd>
<dt>RAG Status:</dt>
<dd>Status:</dd>
<dt>Budget:</dt>

  <dd>
  <dt>Comments:
  <dd><textarea rows="5" cols="20" name="comment">
</textarea>
</dl>
<p><input type="submit"> </p>
</dd>
</form>
</div> <!-- box -->
</div> <!-- content -->
</div> <!-- page -->
<?php 
include 'includes/footer.php';
?>
</body>
</html>
