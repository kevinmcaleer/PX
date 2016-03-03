<?php

// itrequest.php

// request page

session_start();

include '../resources/includes/header.inc.php';

if(isset($_SESSION['id']))
{
	include '../resources/includes/navigation.inc.php';
	
	echo '<div class="message">';
	echo '<h1>IT Requests</h1><br />';
	echo '</div>';
	// if the user has requested 
	if(isset($_POST['requestid']))
	{
		require_once '../resources/class/class_Request.php';
		$myRequest = new Request();
		$myRequest->load($_POST['requestid']);
		
		echo '<div class="message">';
		echo '<p>You are about to make a request for:<p>';
		$myRequest->show();
		//require_once '../delete/sc_connection.php';
		require_once '../resources/config.php';
		require_once '../resources/class/class_Contact.php';
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
	require '../resources/includes/login_required.php';
}


include '../resources/includes/footer.inc.php';

?>