<?php

// Accounts Page

session_start();

include 'includes/header.inc.php';

if(isset($_SESSION['id']))
{

	// show the accounts page for the current user
	echo '<h1>My Account</h1>';
	
	include 'includes/account_page.inc.php';
	
} // otherswise show an error msg
else
{
	echo 'Sorry, you are not logged in. Click here to <a href="login.php">login</a>';

}

include 'includes/footer.inc.php';

?>