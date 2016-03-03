<?php

// loads a page


session_start();
// load the desired page.

if(isset($_POST['page']))
{
	// include 'resources/includes/header.inc.php';
	$page_str = $_POST['page'];
	//echo $page_str;
	
	header("location: $page_str");
	 //include $page_str;
	
	// echo '<iframe src="' . $page_str. '" width="100%" hieght="100%"></iframe>';
	
	//include 'resources/includes/footer.inc.php';
}
else
{
	// echo $_POST['page'];
}
?>