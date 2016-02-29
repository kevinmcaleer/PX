<?php

// Search.php

// Display search results

session_start();
include 'includes/header.inc.php';
include 'includes/navigation.inc.php';

echo '<div class="message">';
echo '<h1>Search';
if(isset($_GET['search']))
{
	echo ' results for: ' . $_GET['search'];
}

echo '</h1>';
echo '</div>';

// check that something has been posted (using the get string)

if(isset($_GET['search']))
{
	echo '<form action="searchsuggest.php" method="GET" name="search" target="searchframe">';
	// echo '<input type="hidden" name="submitted" />';
	echo 'Search: <input type="text" name="search" onfocus="this.form.submit()" onkeyup="this.form.submit()" autocomplete="off" value="' . $_GET['search'] . '"/>';
	echo '</form>';
	//echo '<iframe src="searchsuggest.php" name="searchframe" height="600" width="100%" frameborder="0"></iframe>';

	
	
	//require 'class_Search.php';
	//$mySearch = new Search();
	//$search = $_GET['search'];
	//$myResults = $mySearch->go($search);
	// echo 'You searched for: ' . $_GET['search'];
	//while ($row = pg_fetch_array($myResults))
	//{
	//	echo $row['name'];
	//}
}
else
{
	// create form with search box
	
	echo '<form action="searchsuggest.php" method="GET" name="search" target="searchframe">';
	// echo '<input type="hidden" name="submitted" />';
	echo 'Search: <input type="text" name="search" onkeyup="this.form.submit()" autocomplete="off" />';
	echo '</form>';
	
}
echo '<iframe src="searchsuggest.php" name="searchframe" height="600" width="100%" frameborder="0"></iframe>';
include 'includes/footer.inc.php';


?>

