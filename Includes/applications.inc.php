<?php

if (isset($_SESSION['id']))
{
	require_once 'Application.php';
	$myApps = new Application();
	$myApps->loadMyApps($_SESSION['id'], $Applist);

	$currentUser = new Contact();
	$currentUser->load($_SESSION['id']);

	// $currentUser->show();

	// show the applications available to the current user

	$query = "SELECT application_contact_link.id, application_id, application.name, contact_id, application.url, application.baseurl
	FROM application_contact_link, application 
	WHERE application_id = application.id AND
	application_contact_link.contact_id = $currentUser->id";


	 // echo $query . "\n";
	// echo $currentUser->id;
	include ('connection.php');
	$r = pg_query($connection, $query) or die('there was a problem executing the query');

	//echo $r;

	
	echo '<form action="loadapp.php" method="post" name="applicationform">';
	echo '<input type="hidden" name="applicationlink" />';
	// echo'<p>Email Address: <input type="text" name="id" size="20" maxlength="80" /></p>';

	echo "<ul>\n";
	while ($row = pg_fetch_array($r))
	{
		echo "<li>";
		//echo '<a href="Apps/' . $row['baseurl'] . '/'. $row['url'] . '">';
			
		echo '<a href="javascript:applicationlink('.$row['id']. ')">'; //. $row['baseurl'] . '/'. $row['url'] . '">';
		echo $row['name'];
		echo '</a>';
		echo "</li>\n";
		// echo $row['firstname']."\n";	
	}

	echo "</ul>\n";
	// close the form tag
	echo '</form>';
}

?>