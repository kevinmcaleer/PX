<base target="_top">
<link href="css/core.css" rel="stylesheet" type="text/css">

<script language="JavaScript" type="text/javascript">
<!--
function openlink ( selectedtype )
{
  document.suggestform.serviceid.value = selectedtype ;
  document.suggestform.submit() ;
  // parent.document.location = selectedtype;
}
-->
</script>

<div id="searchresults">
<?php

// SearchSuggest.php

if(isset($_GET['search']))
{
	echo '<form name="suggestform" action="servicepage.php" method="POST">';
	echo '<input type="hidden" name="serviceid">';
	
	include '../resources/class/class_search.php';
	$mySearchService = new SearchService();
	$mySearchRequest = new SearchRequest();
	$mySearchITContact = new SearchITContact();
	$search = $_GET['search'];
	
	if ($myResults = $mySearchService->go($search))
	{
		// echo 'You searched for: ' . $_GET['search'];
		// display a nice header

		echo '<div class="suggestions"><h2>Services</h2></div>';
		echo '<table width="100%" cellspacing="0" cellpadding="2" border="0">';
		while ($row = $myResults->fetch(PDO::FETCH_ASSOC))
		{	
			echo '<tr><td width="32">';
			echo '<a href="javascript:openlink(' . $row['id'] . ')" target="_top">';
			echo '<img src="images/' . $row['image'] . '" height="32" width="32" />';
			echo '</a>';
			echo '</td>';
			echo '<td class="searchresultline">';
			
			
			echo '<div class="searchresultline">';
			
			echo '<a href="javascript:openlink(' . $row['id'] . ')" target="_top">';
			// echo '<p class="searchresultline">';
			echo $row['name'];
			// echo '</p>';
			echo '</a><br />';
			
			echo '</div>';
			
			echo '</td></tr>';
		}
		
		echo '</table>';
		// echo '</div>';
	}
	if ($myResults = $mySearchRequest->go($search))
	{
		// Search for Request
		
		echo '<div class="suggestions"><h2>Requests</h2></div>';
		
		while ($row = $myResults->fetch(PDO::FETCH_ASSOC))
		{
			echo '<a href="javascript:openlink(' . $row['id'] . ')" target="_top">';
			echo $row['name'];
			echo '</a><br />';
		}
		
		//echo '</div>';
		
		// Search for Information
		
		echo '<div class="suggestions"><h2>Information</h2></div>';
		
		//echo '</div>';
	}
	$param1 = FALSE;
	if ($myResults = $mySearchITContact->go($search, $param1))
	{
		// Search for an IT contact
		echo '<div class="suggestions"><h2>IT Contacts</h2></div>';
		
		while($row = $myResults->fetch(PDO::FETCH_ASSOC))
		{
			echo $row['firstname'] . " ";
			echo $row['lastname'] . " ";
			echo $row['phone'] . " ";
			echo $row['site'] . " ";
			echo "<br />";
		}
	}
}


?>
</div>
