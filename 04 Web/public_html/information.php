<?php

// Information page

// links to information ordered by service

session_start();

include '../resources/includes/header.inc.php';

if(isset($_SESSION['id']))
{
	include '../resources/includes/navigation.inc.php';
	
	
	
	echo '<div class="message">';
	echo '<table border="0" cellspacing="0" cellpadding="0">';
	echo '<tr><td>';
	echo '<img src="images/info.png" width="64" class="icon" />';
	echo '</td><td>';
	echo '<h1>Information</h1><br />';
	echo '</td></tr></table>';
	
	echo '</div>';
	
	// create a table for layout - 2 x 2 grid
	echo '<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" valign="top">';
	
	
	echo '<div class="message">';
	echo "<h2>FAQ's/How-To's</h2>";
	echo '<p>Frequently Asked Questions and How-To Worksheets</p>';
	echo '</div></td>';
	
	echo '<td width="50%" valign="top"><div class="message">';
	echo "<h2>Best Practice</h2>";
	echo '<p>Best Practice advice and guidance</p>';
	echo '</div></td></tr>';
	
	echo '<tr><td valign="top"><div class="message">';
	echo "<h2>Policies</h2>";
	echo '<p>IT Policies and Governance</p>';
	echo '</div></td>';
	
	echo '<td valign="top"><div class="message">';
	echo "<h2>Glossary of Terms</h2>";
	echo '<p>Common terms and jargon</p>';
	echo '</div></td></tr><tr>';
	
	echo '<td valign="top"><div class="message">';
	echo "<h2>Who's who</h2>";
	echo '<p>Department Information</p>';
	echo '</div></td></tr></table>';
	
	// echo 'FAQ/HowTos, Best Practice, Poicies, Glossary of Terms, Whos Who';
}
else
{
	include '../resources/includes/login_required.php';
}

include '../resources/includes/footer.inc.php';

?>