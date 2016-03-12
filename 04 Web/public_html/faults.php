<?php

// faults.php

// report faults

session_start();

include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
?>
<div class="title">
  <p>Report a Fault</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
  <?php

if(isset($_SESSION['id']))
{
	include  INCLUDES_PATH .'navigation.html';
	
	// Create a table for layout - 2 columns, 1 row
?>
<div class="message">
<h1>Report a Fault</h1>
</div> <!-- report a fault -->
</div> <!-- two columns -->
</div> <!-- Container -->
<?php	
	
}
else
{
	include '../resources/includes/login_required.php';
}

include '../resources/includes/footer.html';

?>
