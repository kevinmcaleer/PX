<?php

// request_info.inc.php

// Request and Information Links include file

// Display the requests and information links
 ////////////////////////////////////////////////////////////////////////
 // Now display the request section
 
 echo '<td  valign="top" width="200">'; // the requests section of the table
 echo '<div id="requests">';
 
 include '../resources/class/class_Request.php';
 $myRequests = new Request();
 // $myRequests->load($myService->id);
 $rows = $myRequests->getAll($myService->id);

 // include the form tags
 echo '<form action="itrequests.php" method="POST" name="dorequestform">'; 
 echo '<input type="hidden" name="requestid" />';
 // display a table
 // each request will be a row

 echo '<table border="0" cellspacing="0" cellpadding="0" width="100%"> <!-- requests table -->' . "\n";
 echo "<tr>\n";
 echo "<td>\n";
 echo "<p>Requests</p>";
 echo "</td>\n";
 echo "</tr>\n";
 
 while ($row = $rows->fetch(PDO::FETCH_ASSOC))
 {
 	echo "<tr>";
	echo '<td class="requestline">' . "\n";
	// echo $row['id'];
	echo '<a href="javascript:dorequest('. $row['id'] . ')">';
	echo $row['name'];
	echo "</a>\n";
	echo '<p class="ServiceLineDescription">';
	echo $description['description'];
	echo '</p>';
	echo "</td>\n";
	echo "</tr>\n";
 }
echo '</form>';
 // if the current user is an administrator - show the 'Add' link at the bottom of the table
 
 if (isset($_SESSION['id']))
	{
	// echo $_SESSION['id'];

	echo ' <script language="JavaScript" type="text/javascript">
			<!--
			function addrequest ( selectedtype )
			{
			  document.requestform.serviceid.value = selectedtype ;
			  document.requestform.submit() ;
			}
			
			function addinfo (serviceid)
			{
				document.informationform.serviceid.value = serviceid;
				document.informationform.submit();
			}
			
			-->
			</script>' . "\n";

	
	
	}
 
 

 if ($usr->level=='A') 
	{
	echo '<tr><td>' . "\n";
	
	echo '<form action="admin_editRequests.php" method="POST" name="requestform"> ' . "\n";
	echo '<input type="hidden" name="serviceid" / >' . "\n";
	
	echo '<p class="edit" align="right"><a href="javascript:addrequest(' ."$myService->id". ')">Edit Requests</a></p>' . "\n";
	echo '</form>' . "\n";
	echo '</td></tr>' . "\n";
	}
 echo "</table> <!-- requests table -->\n";
 echo '</div>' . "\n";
  
 // The Information section
 
 echo '<div class="message">';
 echo '<p>Information</p><br />';
 
 require_once '../resources/class/class_information.php';
 $myInformation = new Information(); // create a new Info object
 $infolist = $myInformation->getAllForService($myService->id);
 while($row = $infolist->fetch(PDO::FETCH_ASSOC))
 {
 	echo '<div id="information">';
	echo '<p class="requestline"><a href="information/' . $row['filepath']. '" target="_blank">' . $row['name'] . "</a></p> \n";
	echo '</div>'; // close information div tag
 }
 
 if ($usr->level=='A')
 {
 
 	echo '<form action="addinformation.php" method="POST" name="informationform"> ' . "\n";
 	echo '<input type="hidden" name="serviceid" / >' . "\n";
 	echo '</form>' . "\n";
 	
 	echo '<p class="edit" align="right"><a href="javascript:addinfo(' ."$myService->id". ')">Add Information</a></p>' . "\n";
 
 }
  echo '</div>'; // close message div tag

 
 echo '<div class="message">';
 echo '<table><tr><td>';
 echo '<a href="faults.php" border="0"><img src="images/warning_icon.png" /></a>';
 echo '</td><td>';
 echo '<h2>Report a fault</h2>'; 
 echo '<p><a href="faults.php"> with '. $myService->name . ' </a></p>';
 echo '</td></tr></table></div>';
 
 ?>
