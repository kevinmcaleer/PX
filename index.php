<?php

// index.php

$page_title = 'Home';
session_start();

$GLOBALS['home'] = getcwd();
// echo $home_dir;
include 'includes/header.inc.php';


include 'includes/navigation.inc.php';	// load the navigation bar
include 'motd.php'; 					// display the message of the day
include 'servicecat.php';				// load servicecat.php (which loads the frontpage.htm

include 'includes/footer.inc.php';

?>
