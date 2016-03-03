<?php

// help.php

// display help on how to use the IT service Catalogue

session_start();

include 'resources/includes/header.inc.php';
if(isset($_SESSION['id']))
{
	include 'resources/includes/navigation.inc.php';
	
	echo '<div class="message">';
	echo '<h1>Help</h1><br />';
	echo '<p>';
	
	// include the help hmtl page
	
	include 'resources/includes/help.inc.html';
	
	echo '</p>';
	echo '</div>';
	
}
else
{
	login_required.php;
}

include 'resources/includes/footer.inc.php';
?>
