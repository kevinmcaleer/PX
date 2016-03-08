<?php

// index.php

$page_title = 'Home';
session_start();

$GLOBALS['home'] = getcwd();
// echo $home_dir;
include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
?>

<div class="title">
  <p>Dashboard</p>
</div>
<div class="container">
<div class="sidebar">
<div class="sidebarcontent">
  <?php
include INCLUDES_PATH . 'motd.php'; 					// display the message of the day
include INCLUDES_PATH . 'fortune.php';
?>
</div> <!-- sidebar content-->
</div> <!-- sidebar -->
<div class="two_column">
  <?php
include INCLUDES_PATH . 'navigation.html';	// load the navigation bar
?>

<?php
include 'servicecat.php';				// load servicecat.php (which loads the frontpage.htm
?>
</div>
</div>
<?php
//echo '</div>';
include INCLUDES_PATH . 'footer.html'; // load the footer

?>
