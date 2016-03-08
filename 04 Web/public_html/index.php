<?php

// index.php

$page_title = 'Home';
session_start();

$GLOBALS['home'] = getcwd();
// echo $home_dir;
include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
echo '<div class="div container">';
include INCLUDES_PATH . 'sidebar.html';
echo '<div class="two_column">';
include INCLUDES_PATH . 'navigation.html';	// load the navigation bar
include 'motd.php'; 					// display the message of the day
echo '</div>';
include 'servicecat.php';				// load servicecat.php (which loads the frontpage.htm

echo '</div>';
include INCLUDES_PATH . 'footer.html'; // load the footer

?>
