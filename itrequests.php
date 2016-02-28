<?php

// itrequest.php

// request page

session_start();

include 'includes/header.inc.php';

if(isset($_SESSION['id']))
{
	include 'includes/navigation.inc.php';
	
	echo '<div class="message">';
	echo '<h1>IT Requests</h1><br />';
	echo '</div>';
	// if the user has requested 
	if(isset($_POST['requestid']))
	{
		require_once 'class_Request.php';
		$myRequest = new Request();
		$myRequest->load($_POST['requestid']);
		
		echo '<div class="message">';
		echo '<p>You are about to make a request for:<p>';
		$myRequest->show();
		require_once 'sc_connection.php';
		require_once 'class_Contact.php';
		$me = new Contact();
		$me->load($_SESSION['id']);
		echo '</div>';
		
		$from = 'no-reply@sellafieldsites.com';
		$from = 'FROM: IT Service Catalogue <' . $from . '> ';
		$to = 'kevinmcaleer@me.com';
		$subject = "notification";
		$msg = "The user '$me->email' requested $myRequest->name";
		mail($to, $subject, $msg, $from);
	}
}
else
{
	require 'login_required.php';
}


include 'includes/footer.inc.php';

?>