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

<?php

// TagSuggest.php

if(isset($_GET['search']))
{
	echo '<form name="suggestform" action="addtag.php" method="POST">';
	echo '<input type="hidden" name="tag">';
	
	include '../resources/class/class_search.php';
	$mySearchTag = new SearchTag();
	$search = $_GET['search'];
	$mySearchTag = new SearchTag();
	
	if ($myResults = $mySearchTag->go($search))
	{
		// echo 'You searched for: ' . $_GET['search'];
		// display a nice header

		echo '<div class="suggestions">';
		
		while ($row = pg_fetch_array($myResults))
		{
			echo '<a href="javascript:openlink(' . $row['id'] . ')" target="_top" class="tag">';
			echo $row['name'];
			echo '</a><br />';
		}
		echo '</div>';
	}
	
}

?>
