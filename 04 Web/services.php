<?php

// services.php - displays a list of the services

session_start();

include 'resources/includes/header.inc.php';


include 'resources/class/class_Service.php';
$serviceList = new Service();
$serviceList->loadall($myList);

require 'resources/includes/navigation.inc.php';

include 'resources/includes/service.inc.php';

/////////////////////////////////////////////////////////////////////
//
// Display a description of this page
//

echo '<div class="message">';
echo '<table cellspacing="0" cellpadding="0"><tr><td >';
echo '<img src="images/services.png" width="64" class="icon"/></td><td>';
echo '<h1>Service List</h1><br />';
echo '<p>Below is a list of services available to users of the Sellafield Ltd computer network. Click on a service to see more information or to make a request.</p>';
echo '</td></tr></table>';
echo '</div>';
echo '<div id="servicelist">' . "\n";
echo '<form action="servicepage.php" name="serviceform" method="POST">
<input type="hidden" name="serviceid" />'  . "\n";

echo '<table width="100%" border="0">';
while ($row = pg_fetch_array($myList))
{
	echo "<tr>\n";
	echo '<td class="ServiceStrip">';
	echo '<table>';
	echo '<tr><td>';
	echo '<a href="javascript:loadservice('. "'" . $row['id']. "'" .')" class="ServiceLine">';
	echo '<img src="images/' . $row['image']. '" width="32" height="32" />' ;
	echo '</td>';
	echo '<td>';
	echo '<a href="javascript:loadservice('. "'" . $row['id']. "'" .')" class="ServiceLine">';
	echo $row['name'];
	echo "</a> - \n";
	echo '<p class="ServiceLineDescription">';
	echo $row['description'];
	echo "</p> \n";
	
	
	//echo '<p>';
	
	// display names of children
	
	/*
	require_once 'resources/class/class_Service.php';
	require 'delete/sc_connection.php';
	
	$q = "SELECT * FROM service WHERE parent =". $row['id'];
	$r = pg_query($sc_connection, $q);
	*/
	
	require_once 'resources/class/class_Service.php';
	$myChild = new Service();
	$myChild->load($row['id']);
	// $myChild->show();
	
	$serviceChildren = 	$myChild->getChildren();
	
	$bit = FALSE;
	$first = TRUE;
	while ($children = pg_fetch_array($serviceChildren))
	{
		if($bit == FALSE)
		{
			$bit = TRUE;
			echo '<BR />';
		}
		if($first==TRUE)
		{
		 	$first = FALSE;
			
		}	
		else
		{
			echo " | ";
		}
		
		// create a hyperlink to open the selected service
		echo '<a class="ServiceLineDescription" href="javascript:loadservice('. "'". $children['id'] . "'". ')">';
		
		echo $children['name'];
		
		
		echo "</a>\n";
	}
	
	echo '</td></tr></table>';
	//echo '</p>';
	//echo '<p class="ServiceLineDescription">';
	//echo $row['description'];
	//echo "</p>\n";
	echo "</td>\n";
	echo "</tr>\n";
}
echo "</table>\n";
echo "</form>\n";
echo "</div>\n";

include 'resources/includes/footer.inc.php';

?>