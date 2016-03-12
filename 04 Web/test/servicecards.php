<link href="../public_html/css/cardui.css" rel="stylesheet" type="text/css">
<link href="../public_html/css/core.css" rel="stylesheet" type="text/css">
<link href="../public_html/css/layout.css" rel="stylesheet" type="text/css">

<?php
include '../resources/config.php';
include INCLUDES_PATH . 'user.php';
include '../resources/class/class_service.php';
$serviceList = new Service();
$serviceList->loadall($myList);
?>


<div id="servicelist">
<form action="servicepage.php" name="serviceform" method="POST">
<input type="hidden" name="serviceid" />
<?php
include '../resources/class/class_card.php';
//echo '<table width="100%" border="0">';
echo '<div class="cards">';
while ($row = $myList->fetch(PDO::FETCH_ASSOC))
{
	$mycard = new Card;
	$mycard->imageurl = $row['image'];
	$mycard->title = $row['name'];
	$mycard->description = $row['description'];
	$mycard->url = 'javascript:loadservice('. "'" . $row['id']. "'" .')';
	//echo $row['dateadded'];
	$mycard->date = strtotime($row['dateadded']);
	$mycard->show();
	require_once '../resources/class/class_service.php';
	$myChild = new Service();
	$myChild->load($row['id']);
	// $myChild->show();
	
	$serviceChildren = 	$myChild->getChildren();
	
	$bit = FALSE;
	$first = TRUE;
	while ($children = $serviceChildren->fetch(PDO::FETCH_ASSOC))
	{
		if($bit == FALSE)
		{
			$bit = TRUE;
			//echo '<BR />';
		}
		if($first==TRUE)
		{
		 	$first = FALSE;
		}	
		else
		{
		//	echo " | ";
		}
		
		// create a hyperlink to open the selected service
		echo '<a class="ServiceLineDescription" href="javascript:loadservice('. "'". $children['id'] . "'". ')">';
		echo $children['name'];
		echo "</a>\n";
	}
}
?>

</div> <! -- close the cards div -->
</form>
</div>
</div>
