<?php

// index.php

$page_title = 'Home';
session_start();

$GLOBALS['home'] = getcwd();
// echo $home_dir;
include '../resources/config.php';
include INCLUDES_PATH . 'header.inc.php';
include INCLUDES_PATH . 'navigation.inc.php';	// load the navigation bar
include 'motd.php'; 					// display the message of the day
include 'servicecat.php';				// load servicecat.php (which loads the frontpage.htm
include INCLUDES_PATH . 'footer.html'; // load the footer

?>
