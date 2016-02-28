<?php

// Load App - Loads the application passed to it. 

if(isset($_POST['applicationlink']))
{
	//echo 'app id is:';
	require 'class_Application.php';
	$myApp = new Application();
	$myApp->load($_POST['applicationlink']);
	
	// set a cookie for the current app
	setcookie("appid", $myApp->id);
	
	//echo $_POST['applicationlink'];
	// echo $myApp->name;
	
	// $myApp->show();
	
	session_start();
	include 'includes/header.inc.php';
	include 'Apps/'. $myApp->baseurl . "/" . $myApp->url;
	include 'includes/footer.inc.php';
}

else
{
	echo 'Couldnt find that application, didnt load sorry';
}

?>