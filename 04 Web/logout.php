<?php 

// Logout Script

// This page lets the user logout.

session_start(); // Accessing the existing session;

// If no cookie is present, redirect the user:

if(!isset($_SESSION['id'])) {

// Need the function to create an absolute URL:

require_once ('includes/login_functions.inc.php');

$url = absolute_url();

header("Location: $url");

exit(); // quit the script

} else { // Cancel the session

$_SESSION = array(); // Clear the variables

session_destroy(); // destory the session itself

setcookie('PHPSESSID','',time()-3600,'/','',0,0); // destroy the cookie

}

// Set the page header

$page_title = "Logged Out";

include ('includes/header.inc.php');

// format the header area
echo '<table height="70" width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>&nbsp;</td></tr></table>';

// Print a customized message:

echo '<div class="message">';
echo "<h2>Logged Out</h2><br />";
echo "<p>You are now logged out.</p>";
echo '</div>';

include ('includes/footer.inc.php');

?>