<?php

// services.php - displays a list of the services

session_start();
include '../resources/config.php';
include '../resources/includes/header.html';
include INCLUDES_PATH . 'user.php';
include '../resources/class/class_service.php';
$serviceList = new Service();
$serviceList->loadall($myList);
?>

<div class="title">
  <p>Service Catalogue</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
    
<?php
if(isset($_SESSION['id']))
{
require '../resources/includes/navigation.html';

?>

<script language="JavaScript" type="text/javascript">
<!--
function loadservice ( selectedservice )
{
  document.serviceform.serviceid.value = selectedservice ;
  document.serviceform.submit() ;
}
-->
</script>
<?php
/////////////////////////////////////////////////////////////////////
//
// Display a description of this page
//
?>
<div class="message">
<table cellspacing="0" cellpadding="0"><tr><td >
<img src="img/services.png" width="64" class="icon"/></td><td>
<h1>Service List</h1><br />
<!-- // TODO rename to tenant name -->
<p>Below is a list of services available to users of the <TENTANT NAME> computer network. Click on a service to see more information or to make a request.</p>
</td></tr></table>
</div> <!-- close the service list -->
<div id="servicelist">
<form action="servicedetails.php" name="serviceform" method="POST">
<input type="hidden" name="serviceid" />
<?php
include '../resources/class/class_card.php';
?>
<div class="cards">
<?php
while ($row = $myList->fetch(PDO::FETCH_ASSOC))
{
	$mycard = new Card;
	$mycard->imageurl = $row['image'];
	$mycard->title = $row['name'];
	$mycard->description = $row['description'];
	$mycard->url = 'javascript:loadservice('. "'" . $row['id']. "'" .')';
	$mycard->date = $row['dateadded'];
	$mycard->show();
//	require_once '../resources/class/class_service.php';
//	$myChild = new Service();
//	$myChild->load($row['id']);
//	// $myChild->show();
//	
//	$serviceChildren = 	$myChild->getChildren();
//	
//	$bit = FALSE;
//	$first = TRUE;
//	while ($children = $serviceChildren->fetch(PDO::FETCH_ASSOC))
//	{
//		if($bit == FALSE)
//		{
//			$bit = TRUE;
//			//echo '<BR />';
//		}
//		if($first==TRUE)
//		{
//		 	$first = FALSE;
//		}	
//		else
//		{
//		//	echo " | ";
//		}
//		
//		// create a hyperlink to open the selected service
//		echo '<a class="ServiceLineDescription" href="javascript:loadservice('. "'". $children['id'] . "'". ')">';
//		echo $children['name'];
//		echo "</a>\n";
//	}
}
?>

</div> <! -- close the cards div -->
</form>
</div>
<?php 

}
else
{
	include '../resources/includes/login_required.php';
}
?>
</div>
</div>
<?php
include '../resources/includes/footer.html';

?>