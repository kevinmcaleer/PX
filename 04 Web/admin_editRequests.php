<?php

// editmotd.php

// Edit the Requests for a specific Service
session_start();
include 'resources/includes/header.inc.php';

// check if someone is logged on

if(isset($_SESSION['id']))
{
	echo '
			<script language="javascript">
			<!--
				
				function deleterequest ( request_id )
				{
						document.deleterequestform.requestid.value = request_id;
						document.deleterequestform.submit();
				}
				
				function loadservice ( service_id)
				{
					document.loadserviceform.serviceid.value = service_id;
					document.loadserviceform.submit();
				}
			
			-->
			</script>
	
	';

	// first check if the logged on user is an administrator
	if($usr->level == 'A')
	{
		include 'resources/includes/navigation.inc.php';
		require_once 'resources/class/class_Request.php';
		$myRequest = new Request();
		
		// get the current service from the service id
		require_once 'resources/class/class_Service.php';
		$myService = new Service();
		$myService->load($_POST['serviceid']);
		
		// process any delete requests
		if(isset($_POST['deleteRequest']))
		{
			// delete the Request
			$remove_request = $_POST['requestid'];
			$myRequest->delete($remove_request); // delete it!
		
		}
		else
		if(isset($_POST['addrequest']))
		{
			$req = $_POST['name'];
			$desc = $_POST['description'];
			
			$myRequest->add($req, $desc, $myService->id);
		}
		
		
		$requests = $myRequest->getAll($myService->id);
		
		echo '<div class="message">'. "\n";
		echo '<h1>Requests</h1>';
		
		// display all the Requests with an edit and delete link on the right
		
		echo '<table width="100%" cellspacing="4" cellpadding="4" border="0">';
		while($row = pg_fetch_array($requests))
		{
			echo '<tr>' . "\n";
			
			echo '<td>';
			echo $row['name'] . '</td>';
			   
			echo '<td align="right"><a href="javascript:deleterequest(' . $row['id'] . ')" style="color:red; text-decoration:none;">x</a></td>';
			echo '</tr>' . "\n";
		}
		echo '</table><br />';
		echo '<hr size="1" />';
		echo '<a href="javascript:loadservice(' . $myService->id . ')" class="edit">Back to  '. $myService->name .' Service ></a>';
		echo '</div>'; // close the message tag 
		
		echo '<form name="loadserviceform" method="POST" action="servicepage.php">';
		echo '<input type="hidden" name="serviceid" />';
		echo '</form>';
		
		
		
		// hidden form - for deleting fortnues
		echo '<form name="deleterequestform" method="POST" action="admin_editRequests.php">';
		echo '<input type="hidden" name="deleteRequest" />';
		echo '<input type="hidden" name="serviceid" value="' . $myService->id. '"/>';
		echo '<input type="hidden" name="requestid" />';
		echo '</form>';
		
		
		echo '<div class="message">'; // to make it look pretty
		// Show the Add Request link
		echo '<p class="edit"><a href="javascript:toggleLayer(' . "'addrequest'". ')"> Add a new Request ></a></p>';
		
		echo '<div id="addrequest">';
		
		echo '<form name="addrequestform" action="admin_editRequests.php" method="POST">';
		echo '<input type="hidden" name="addrequest" />';
		echo '<input type="hidden" name="serviceid" value="'. $myService->id .'"/>';
		echo 'Request name: <Input type="text" name="name" class="tb" size="100" />';
		echo 'Description: <input type="text" name="description" class="tb" size="100">';
		echo '<input type="submit" />';
		echo '</form>';
		echo '</div>'; // close the message tag
		echo '</div>'; // close the add fortune tag
		
	}
}
else
{
	require 'resources/includes/login_required.php';
}
include 'resources/includes/footer.inc.php';
?>

