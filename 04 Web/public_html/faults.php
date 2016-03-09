<?php

// faults.php

// report faults

session_start();

include '../resources/includes/header.inc.php';

if(isset($_SESSION['id']))
{
	include '../resources/includes/navigation.inc.php';
	
	// Create a table for layout - 2 columns, 1 row
?>

<h1>Report a Fault</h1>

<?php	
	
}
else
{
	include '../resources/includes/login_required.php';
}

include '../resources/includes/footer.inc.php';

?>