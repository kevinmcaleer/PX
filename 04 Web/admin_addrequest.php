<?php 

// Add Request

session_start();

include 'resources/includes/header.inc.php';
include 'resources/includes/navigation.inc.php';

	// Breadcrumbs
	//echo '<div id="breadcrumbs">';
	//echo '<a href="index.php">Home<a/> > <a href="services.php">Services</a> > Add Service';
	//echo '</div>';
	
	
if (isset($_POST['request']))
{
	// echo 'service added, ' . $_POST['request'];
	
	require 'delete/sc_connection.php';
	$query = "INSERT INTO request (name, description, serviceid) VALUES ('" . $_POST['name'] . "',' " . $_POST['description'] . "'," . $_POST['serviceid']. ")";
	// echo $query;
	$result = pg_query($sc_connection, $query) or die("Update Failed, $query");
	
	echo '<div class="message">';
	echo '<p>Request Added. <a href="services.php">Return to Services<a/></p>';
	echo '</div>';
	
}
else
if (isset($_SESSION['id']))
{
	// get the current service from the service id
	require_once 'resources/class/class_Service.php';
	$myService = new Service();
	$myService->load($_POST['serviceid']);
	
	
	// Add the javascript to allow the page to be posted (to itself)
	echo '<script language="JavaScript" type="text/javascript">
		  <!--
		  function saverequest ( selectedtype )
		  {
		    document.requestform.request.value = selectedtype ;
			document.requestform.serviceid.value = ' . $myService->id;
			
	echo ';
  		    document.requestform.submit() ;
		  }
		  -->
		  </script>';
	
	
	
	
	echo "<h1>Add A Request</h1>\n";
	echo '<h2>For the '. $myService->name . ' service</h2>';
	
	echo '<form action="admin_addrequest.php" method="POST" name="requestform">';
	echo '<input type="hidden" name="request" />' . "\n";
	echo '<input type="hidden" name="serviceid" />' . "\n";
	echo 'Request Name: ';
	echo '<input type="text" name="name" /><br />' . "\n";
	echo 'Description: ';
	echo '<input type="text" name="description" /><br />' . "\n";
	echo '<br />';
	echo '<a href ="javascript:saverequest(' ."'" .'YES'. "'". ')">Save Request</a> | ' . "\n";
	echo '<a href ="services.php">Discard</a>';
	
	echo '</form>';
	echo '<a href="javascript:saveform()"';
}
else
{
	include 'resources/includes/login_required.php';
}
include 'resources/includes/footer.inc.php';

?>