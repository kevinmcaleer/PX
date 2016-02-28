<?php

session_start();
include 'includes/header.inc.php';
include 'includes/navigation.inc.php';

echo '<script language="JavaScript" type="text/javascript">
		  <!--
		  function searchit ()
		  {
  			document.itcontactsuggestform.submit() ;
		  }
		  -->
		  </script>';
	
	
	// grab an IT contact object to play with
	
	include 'class_ITContact.php';
	$myITContact = new ITContact();
	
	// Find my IT Contact
	
	echo '<div class="message">';
	echo '<h2>Find my IT Contact</h2><br />';	
	echo '<form name="itcontactssuggestform" method="GET" action="itcontactsuggest.php" target="itcontactsearchwindow">';
	echo '<input type="hidden" name="itcontact" />';
	
	// search field
	echo 'Search: <input type="text" name="search" onKeyUp="this.form.submit()" autocomplete="off" class="tb" />';
	
	//
	// Filters
	//
	
	echo 'Filter by:';
	// site list
	echo 'Site: <select name="site" onChange="this.form.submit()">';
	$allSites = $myITContact->getSites();
	
	// allow a none value
	echo '<option value="NULL">None</option>' . "/n";
	while ($r = pg_fetch_array($allSites))
	{
		echo "<option value = {$r['site']}>{$r['site']}</option>" . "/n";
	}
	echo '</select>';
	
	// area list
	
	// building list
	echo 'Building: <select name="building" onChange="this.form.submit()">';
	$allBuildings = $myITContact->getBuildings();
	
	// allow a none value
	echo '<option value="NULL">None</option>' . "/n";
	while ($r = pg_fetch_array($allBuildings))
	{
		echo "<option value = {$r['building']}>{$r['building']}</option>" . "/n";
	}
	
	
	echo '</select>';
	
	
	// 
	echo '</form>';
	echo '<iframe width="100%" height="500" src="itcontactsuggest.php" name="itcontactsearchwindow" frameborder="0"> </iframe>';
	echo '</div>';


include 'includes/footer.inc.php';

?>