<?php

// editmotd.php

// Edit the Message Of the Day
session_start();
include 'resources/includes/header.inc.php';

// check if someone is logged on

if(isset($_SESSION['id']))
{
	echo '
			<script language="javascript">
			<!--
				
				function deletemotd ( motd_id )
				{
						document.deletemotdform.motdid.value = motd_id;
						document.deletemotdform.submit();
				}
			
			-->
			</script>
	
	';

	// first check if the logged on user is an administrator
	if($usr->level == 'A')
	{
		include 'resources/includes/adminnav.inc.php';
		include 'resources/class/class_motd.php';
		$myMotd = new Motd();
		
		// process any delete requests
		if(isset($_POST['submitted']))
		{
			// delete the motd
			$remove_motd = $_POST['motdid'];
			$myMotd->delete($remove_motd); // delete it!
		
		}
		else
		if(isset($_POST['addmessage']))
		{
			$msg = $_POST['message'];
			$exp = $_POST['expiry'];
			$myMotd->add($msg,$exp);
		}
		
		
		$messages = $myMotd->getAll();
		
		echo '<div class="message">'. "\n";
		echo '<h1>Message of the Day</h1>';
		
		// display all the message of the days with an edit and delete link on the right
		
		echo '<table width="100%" cellspacing="4" cellpadding="4" border="0">';
		while($row = pg_fetch_array($messages))
		{
			echo '<tr>' . "\n";
			// if the message has expired change the font color to red
			echo '<td>';
			echo $row['message'] . '</span></td>';
			
			echo '<td>';
			
			if(strtotime($row['expiry']) < strtotime("now"))
			{
				echo '<span style="color:red">';
			}
			else
			echo '<span>';
			
			echo $row['expiry'] . '</td>';
			echo '<td align="right"><a href="javascript:deletemotd(' . $row['id'] . ')" style="color:red; text-decoration:none;">x</a></td>';
			echo '</tr>' . "\n";
		}
		echo '</table>';
		echo '</div>'; // close the message tag 
		
		// hidden form - for deleting motd messages
		echo '<form name="deletemotdform" method="POST" action="admin_editmotd.php">';
		echo '<input type="hidden" name="submitted" />';
		echo '<input type="hidden" name="motdid" />';
		echo '</form>';
		
		
		echo '<div class="message">'; // to make it look pretty
		// Show the Add Message link
		echo '<p class="edit"><a href="javascript:toggleLayer(' . "'addmessage'". ')"> Add new Message ></a></p>';
		
		echo '<div id="addmessage">';
		
		echo '<form name="addmessageform" action="admin_editmotd.php" method="POST">';
		echo '<input type="hidden" name="addmessage" />';
		echo 'Message: <Input type="text" name="message" class="tb" />';
		echo 'Expiry Date: (MM/DD/YYYY) <input type="date" name="expiry"  class="tb" />';
		echo '<input type="submit" />';
		echo '</form>';
		echo '</div>'; // close the message tag
		echo '</div>'; // close the add message tag
		
	}
}
else
{
	require 'resources/includes/login_required.php';
}
include 'resources/includes/footer.inc.php';
?>