<link href="public_html/css/core.css" rel="stylesheet" type="text/css" />

<?php

// ITContactSuggest.php

// allows searching of the IT contacts database


	$site = $_GET['site'];
	
	//$searchContact = new ITContact();
	//$searchContact->
	
	include 'resources/class/class_Search.php';
	$mySearchITContact = new SearchITContact();
	$search = $_GET['search'];
	$mySearchITContact->site = $_GET['site'];
//	$mySearchRequest = new SearchRequest();
	
	echo '<div class="normal">';
	// create a table for layout
	echo '<table  border="0" cellspacing="0" cellpadding="0">';
	
	$p = TRUE;
	if ($myResults = $mySearchITContact->go($search, $p))
	{
		echo '<tr>';
			
			echo '<td width="100"><b>Firstname</b></td>';
			echo '<td width="100"><b>Lastname</b></td>';
			echo '<td width="100"><b>Phone</b></td>';
			echo '<td width="100"><b>Building</b></td>';
			echo '<td width="100"><b>Site</b></td>';
			echo '<td width="100"><b>Area</b></td>';
			echo '<td width="100"><b>Business_group</b></td>';
			echo '</tr>';
		
		while ($row = pg_fetch_array($myResults))
		{	
			echo '<tr>';
			
			echo "<td>{$row['firstname']}</td>";
			echo "<td>{$row['lastname']}</td>";
			echo "<td>{$row['phone']}</td>";
			echo "<td>{$row['building']}</td>";
			echo "<td>{$row['site']}</td>";
			echo "<td>{$row['area']}</td>";
			echo "<td>{$row['business_group']}</td>";
			echo '</tr>';
			
		}
	}
	echo '</table>';
	echo '</div>';


?>