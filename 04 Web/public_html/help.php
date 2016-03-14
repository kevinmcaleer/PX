<?php

// help.php

// display help on how to use the IT service Catalogue

session_start();
include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
?>
<div class="title">
  <p>Help Centre</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
<?php
if(isset($_SESSION['id']))
{
	include INCLUDES_PATH . 'navigation.html';	// load the navigation bar
	?>
	<div class="message">
	<h1>Help</h1><br />
	<p>
	<!-- // include the help hmtl page -->
   	Welcome to the Help Centre
	</p>
	</div>
    <?php
}
else
{
	include '../resources/includes/login_required.php';
}
include '../resources/includes/footer.html';
?>
