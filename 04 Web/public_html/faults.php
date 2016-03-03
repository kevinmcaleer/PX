<?php

// faults.php

// report faults

session_start();

include '../resources/includes/header.inc.php';

if(isset($_SESSION['id']))
{
	include '../resources/includes/navigation.inc.php';
	
	// Create a table for layout - 2 columns, 1 row
	
	echo '<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td  valign="top">';
	
	echo '<div id="fault">';
	echo '<div class="message">';
	echo '<table><tr><td>';	
	echo '<img src="images/laptop.png" width="64" class="icon"/></td><td>';
	echo '<h1>Report a Fault</h1><br />';
	echo '</td></tr></table>';
	echo '</div>';
	
	echo '<div class="message">';
	echo '<h2>What to do if something you have is broken</h2><br />';
	echo '<p>If its stopped working, the quickest method to get it working again is to phone the help desk. The table below shows the support numbers for IT & Telecoms for the appropriate Sellafield Site.</p><br /> ';
	echo '<p>Or if you prefer, for non-urgent faults you can log it online directly by <a href="">Clicking Here</a></p>';
	
	echo '</div>';
	
	echo '<div class="message">';
	echo '<p>Support Information</p><br />';
	echo '<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr >';
	
	echo '<td align="right" class="underlinedcell"><h2>From /<br /> About</h2></td>';
	echo '<td  align="center" valign="top" class="underlinedcell">';
	echo '<h2>Sellafield</h2>Including Vertex, Banna Court';
	echo '</td><td valign="top" align="center"  class="underlinedcell">';
	echo '<h2>Risley</h2>Hinton House';
	echo '</td><td valign="top" align="center" class="underlinedcell">';
	echo '<h2>Capenhurst</h2>';
	echo '</td><td valign="top" align="center" class="underlinedcell">';
	echo '<h2>External</h2>';	
	echo '</td></tr>';
	echo '<tr>';
	echo '<td align="right">IT</td>';
	echo '<td align="center" class="tablecell">(180)<br /> 71180</td><td align="center">';
	echo '(191)<br /> 6464</td><td align="center">';
	echo '(191)<br /> 6464</td><td align="center">';
	echo '0800 023 48 02</td>';
	echo '</tr>';
	echo '<tr><td align="right">';
	echo 'Telecoms</td><td align="center" class="tablecell">';
	echo '(180)<br />73222</td><td align="center">'; 	// sellafield
	echo '(191)<br />6464</td><td align="center">';	// risley
	echo '(191)<br />6464</td><td align="center">';	// capenhurst
	echo '019467 73222</td></tr>';		// external
	echo '</table><br />';
	echo '<p>Hours of Service: Monday to Friday, 07:30 - 17:15</p>';
	echo '</div>'; // end of information table div
	echo '</div>'; // end of fault div
	
	/*
	echo '<div class="message">';
	echo '<h1>For New Requests</h1>';
	echo '<p>To request something new</p>';
	*/
	
	// new column
	echo '</td><td valign="top" width="200">';
	
	
	echo '<div id="requests">';
	echo 'Password Reset';
	echo '</div>';
	
	
	// close layout table
	echo '</td></tr></table>';
}
else
{
	include '../resources/includes/login_required.php';
}

include '../resources/includes/footer.inc.php';

?>