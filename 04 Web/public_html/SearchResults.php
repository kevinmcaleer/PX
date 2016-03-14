<?php

// Search.php

// Display search results

session_start();
include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
?>
<div class="title">
  <p>Search</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
  <?php
include INCLUDES_PATH . 'navigation.html';	// load the navigation bar
?>
<div class="message">
<h1>Search
<?php
if(isset($_GET['search']))
{
	echo ' results for: ' . $_GET['search'];
}
?>
</h1>
</div>
<div class="message">
<?php
// check that something has been posted (using the get string)
if(isset($_GET['search']))
{
	echo '<form action="searchsuggest.php" method="GET" name="search" target="searchframe">';
	// echo '<input type="hidden" name="submitted" />';
	echo 'Search: <input type="text" name="search" onfocus="this.form.submit()" onkeyup="this.form.submit()" autocomplete="off" value="' . $_GET['search'] . '"/>';
	echo '</form>';
	//echo '<iframe src="searchsuggest.php" name="searchframe" height="600" width="100%" frameborder="0"></iframe>';
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
?>
</div>
<?php
include '../resources/includes/footer.inc.php';
?>