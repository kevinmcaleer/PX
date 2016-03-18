<?php

// Information page

// links to information ordered by service

session_start();

include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
?>

<div class="title">
  <p>Dashboard</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
  <?php

if(isset($_SESSION['id']))
{
	include INCLUDES_PATH . 'navigation.html';	// load the navigation bar
	?>
	<div class="message">
	<table border="0" cellspacing="0" cellpadding="0">
	<tr><td>
	<img src="img/info.png" width="64" class="icon" />
	</td><td>
	<h1>Information</h1><br />
	</td></tr></table>
	</div>
	
	<!-- // create a table for layout - 2 x 2 grid -->
	<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" valign="top">
	<div class="message">
	<h2>FAQ's/How-To's</h2>
	<p>Frequently Asked Questions and How-To Worksheets</p>
	</div></td>
	
	<td width="50%" valign="top"><div class="message">
	<h2>Best Practice</h2>
	<p>Best Practice advice and guidance</p>
	</div></td></tr>
	
	<tr><td valign="top"><div class="message">
	<h2>Policies</h2>
	<p>IT Policies and Governance</p>
	</div></td>
	
	<td valign="top"><div class="message">
	<h2>Glossary of Terms</h2>
	<p>Common terms and jargon</p>
	</div></td></tr><tr>
	
	<td valign="top"><div class="message">
	<h2>Who's who</h2>
	<p>Department Information</p>
	</div></td></tr></table>
	<?php
	// echo 'FAQ/HowTos, Best Practice, Poicies, Glossary of Terms, Whos Who';
}
else
{
	include '../resources/includes/login_required.php';
}

include '../resources/includes/footer.html';

?>