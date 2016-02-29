<?php

// editmotd.php

// Edit the Fortune
session_start();
include 'includes/header.inc.php';

// check if someone is logged on

if(isset($_SESSION['id']))
{
	echo '
			<script language="javascript">
			<!--
				
				function deletefortune ( fortune_id )
				{
						document.deletefortuneform.fortuneid.value = fortune_id;
						document.deletefortuneform.submit();
				}
			
			-->
			</script>
	
	';

	// first check if the logged on user is an administrator
	if($usr->level == 'A')
	{
		include 'includes/adminnav.inc.php';
		require_once 'class_fortune.php';
		$myFortune = new Fortune();
		
		// process any delete requests
		if(isset($_POST['submitted']))
		{
			// delete the fortune
			$remove_fortune = $_POST['fortuneid'];
			$myFortune->delete($remove_fortune); // delete it!
		
		}
		else
		if(isset($_POST['addfortune']))
		{
			$fort = $_POST['fortune'];
			
			$myFortune->add($fort);
		}
		
		
		$fortunes = $myFortune->getAll();
		
		echo '<div class="message">'. "\n";
		echo '<h1>Fortunes</h1>';
		
		// display all the Fortunes with an edit and delete link on the right
		
		echo '<table width="100%" cellspacing="4" cellpadding="4" border="0">';
		while($row = pg_fetch_array($fortunes))
		{
			echo '<tr>' . "\n";
			
			echo '<td>';
			echo $row['fortune'] . '</td>';
			   
			echo '<td align="right"><a href="javascript:deletefortune(' . $row['id'] . ')" style="color:red; text-decoration:none;">x</a></td>';
			echo '</tr>' . "\n";
		}
		echo '</table>';
		echo '</div>'; // close the message tag 
		
		// hidden form - for deleting fortnues
		echo '<form name="deletefortuneform" method="POST" action="admin_editfortune.php">';
		echo '<input type="hidden" name="submitted" />';
		echo '<input type="hidden" name="fortuneid" />';
		echo '</form>';
		
		
		echo '<div class="message">'; // to make it look pretty
		// Show the Add Message link
		echo '<p class="edit"><a href="javascript:toggleLayer(' . "'addfortune'". ')"> Add a new Fortune ></a></p>';
		
		echo '<div id="addfortune">';
		
		echo '<form name="addfortuneform" action="admin_editfortune.php" method="POST">';
		echo '<input type="hidden" name="addfortune" />';
		echo 'Fortune: <Input type="text" name="fortune" class="tb" size="100" />';
		echo '<input type="submit" />';
		echo '</form>';
		echo '</div>'; // close the message tag
		echo '</div>'; // close the add fortune tag
		
	}
}
else
{
	require 'login_required.php';
}
include 'includes/footer.inc.php';
?>