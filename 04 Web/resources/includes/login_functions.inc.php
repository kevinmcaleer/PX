<?php # Script 11.2 - login_functions.inc.php

// This page defines two functions used by the login/logout process.

/* This function determines and returns an absolute URL.
* it takes one argument: the page that concludes the URL.
* The arguement defaults to index.php.
*/
function absolute_url($page = 'index.php') {

// Start defining the URL...
// URL is http:// plus the host name plus the current directory:
$url = 'http://'. $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']);

// Remove any trailing slashes:

$url = rtrim($url,'/\\');

// Add the page:

$url .= '/'. $page;

// Return the URL:

return $url;
} // ebd if absolute_URL() function

/* This function validates the form data (the email address and the password).
* if both are present, the database is queried
* The function requires a database connection
* The function returns an array of information including:
* - a TRUE/FALSE variable indicating success
* - an array of either errors or the database result
*/

function check_login($connection, $email, $upass)
{
	include '../resources/config.php';
	$errors = array(); // intialise the error array

	// Validate the email address:
	if(empty($email)) 
	{
		$errors[] = 'You forgot to enter your email address.';
	} else 
	{
		// $e = mysql_real_escape_string($connection, trim($email));
	}

	// Validate the password

	if(empty($upass)) 
	{
		$errors[] = 'You forgot to enter your password';
	} else 
	{
		 // $p = mysql_real_escape_string($connection, trim($pass));	
	}

	if(empty($errors))
	{ // if everything's OK

		// Retrieve the user_id and firstname for that email/password combination:
		
		//include ('../../Includes/connection.php');
		
		$q = "SELECT id, firstname, email, pass FROM contact WHERE email = '" .$email. "' AND pass = '". $upass ."'";
		//echo $q;
		$r = $sc_connection->query($q); // Run the query.

		// Check the result:
		
		//echo "number of rows:" .pg_num_rows($r);
		//echo "email:". $email. "\n";
		//echo "pass:" .$pass . "\n";
		
		
		//$mycount = $sc_connection->query($query)->fetchcolumn();
		//$rowcount = $mycount;
		
		if ($r->rowCount() > 0)
		{
			$row = $r->fetch(PDO::FETCH_ASSOC);
			// Fetch the Record:

			// $row = pg_fetch_array($r, PGSQL_ASSOC);
			
			// Return true and the record:
			return array(true,$row);
		} else 
		{ // Not a match !
			$errors[] = 'The email address and password entered do no match those on file.';
		}
	} // end of empty($errors)

	// Return false and the errors:
	return array(false, $errors);

} // End of check_login() function.

?>