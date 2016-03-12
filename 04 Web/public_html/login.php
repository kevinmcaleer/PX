<?php

// Login.php

if (isset($_POST['submitted'])) 
{
	// Need the database connection:
	require ('../resources/config.php');
	// For processing the login:
	require_once('../resources/includes/login_functions.inc.php');
	// Check the login:

	$e =  $_POST['email'];
	$e = $e . ""; // TODO Add the tenant email domain here. (how do we know which one to add?)
	$p =  $_POST['pass'];
	// echo $e . " " . $p;
	
	list ($check, $data) = check_login($sc_connection, $e, $p);
	if($check) { // OK!
		// Set the session data:
		session_start();
		$_SESSION['id'] = $data['id'];
		$_SESSION['firstname'] = $data['firstname'];
		// Redirect:
		$url = absolute_url ('index.php');
		header("location: $url");
		exit(); // Quit the script
	} else 
	{ // Unsuccessful

 		// Assign $data to $errors for error reporting 
 		// in the login_page.inc.php file
		 $errors = $data;
	}
	//pg_close($connection); // close he db connection 
} // end of the main submit conditional
//
session_start();
// include '../resources/includes/header.inc.php';
include '../resources/includes/login_page.inc.php';
// include '../resources/includes/footer.inc.php';
?>