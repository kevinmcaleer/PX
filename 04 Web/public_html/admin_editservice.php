<?php

// editservice.php

// for editing services

session_start();
include '../resources/includes/header.inc.php';
include '../resources/includes/navigation.inc.php';

if(isset($_POST['serviceid']))
{
	// check current user is authorised to edit a service
	
	if($usr->level="A")
	{
		/*
		if(isset($_POST['submitted']))
		{
			
			include_once '../resources/class/class_service.php';
			$myService = new Service();
			$myService->load($_POST['serviceid']);
			$myService->name = $_POST['name'];
			$myService->description = $_POST['description'];
			$myService->parent = $_POST['parent'];
			$myService->save();
			echo '<div class="message"><p>Changes Saved</p></div>';		
			// reload services page?		
		}
		else		
		*/
		{
			echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">' . "\n <!-- Layout Table-->"; // create a table for layout 
 			echo '<tr><td valign="top">' . "\n";
			echo '<script language="JavaScript" type="text/javascript">
			  <!--
			  function saveform ()
			  {
  			   	document.editserviceform.submit() ;
			  }
			  -->
			  </script>' . "\n";
	
			// echo $_POST['serviceid'];
			include_once '../resources/class/class_service.php';
			$myService = new Service();
			$myService->load($_POST['serviceid']);
			// $myService->show();
			
			 ////////////////////////////////////////////////////////////////////////
 
 			echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">' . "\n  <!-- Layout Table 2-->"; // create a table for layout 
 			echo '<tr><td valign="top">' . "\n";
 
			echo '<form enctype="multipart/form-data" name="editserviceform" method="POST" action="servicepage.php">' . "\n";
			echo '<input type="hidden" name="MAX_FILE_SIZE" value="300000" />';
			echo '<input type="hidden" name="serviceid" value="'. $myService->id .'"/>' . "\n";
			echo '<input type="hidden" name="submitted">' . "\n";
			
			 // Display the service heading
 			echo '<div id="editservicedetails">' . "\n";
			echo '<table width="100%" border="0" cellpadding="0" cellspacing="0">' . "\n  <!-- Layout Table 3-->"; // service layout		
			echo '<tr><td valign="top">' . "\n";
			echo '<div class="servicename">' . "\n";
			echo 'Edit: ' . "\n";
			echo '<input type="text" name="name" value="'. $myService->name .'" class="tb"/><br />';
			// . $myService->name ;
			echo '</div>' . "\n";
			
			echo '</td>' . "\n";
			
			echo '<td align="right" valign="top">' . "\n";
			echo '<p class="edit"><a href="javascript:saveform()">Save changes</a></p>' . "\n";
			
			
			// close table
			echo '</td></tr></table>' . "\n  <!-- Layout Table 3 End-->";														// end service layout
			
			/// Description
			
			echo '<div class="message">' . "\n";
			echo '<h2>Description</h2><br />' . "\n";
			echo '<p>' . "\n";
			
			echo '<input type="text" name="description" value="' . $myService->description . '" class="tb" size="80" maxlength="255" />' . "\n";
			echo '</div>' . "\n";
			echo '</p>' . "\n";
			
			/// Parent Service
			
			echo '<div class="message">' . "\n";
			echo '<h2>Parent Service<h2><br />' . "\n";
			echo '<p>' . "\n";
			// echo $myService->parent;
			echo '<select name="parent" class="tb" />' . "\n";
			
			echo '<option value="NULL">None</option>';
			
			$options = new Service();
			$optionrow = $options->loadallservices();
			while($myRow = $optionrow->fetch(PDO::FETCH_ASSOC))
			{
				//$myRow->show();
				echo '<option value = "' . $myRow['id'] . '"';
				
				//echo 'Service ID: ' . $myService->id . "<br />";
				//echo 'Row ID: '. $row['id'];
				if ($myRow['id'] == $myService->parent)
				{
					echo 'selected="' . $myRow['parent'] . '"';
				}
				echo '>';
				echo $myRow['name'];
				echo '</option>' . "\n";
			}
			
			echo '</select>';
			echo '</div>' . "\n";
			echo '</p>' . "\n";
			
			/// Restrictions
			
			echo '<div class="message">' . "\n";
			echo '<h2>Restrictions</h2><br />' . "\n";
			echo '<p>' . "\n";
			
			echo '<input type="text" name="restrictions" value="' . $myService->restrictions . '" class="tb" />' . "\n";
			echo '</div>' . "\n";
			echo '</p>' . "\n";
			
			// Image Upload
			
			echo '<div class="message">';
			echo '<p>Service Image <input type="file" name="image" /></p>';
			echo '<p>Or Choose from existing Images:</p>';
			echo '<select name="imagefromlist">';
			echo '<option value="NULL">None</option>';
			
			// get a list of service images
			
			require_once '../resources/class/class_service.php';
			$imageList = new Service();
			$images = $imageList->getImages();
			while($iRow = $images->fetch(PDO::FETCH_ASSOC))
			{
				echo '<option value="' . $iRow['image'] . '" ';
				
				// if the value is the same as the current service, display it as the selected item
				if($iRow['image'] == $myService->image)
				{
					echo 'selected="' . $iRow['image'] . '"';
				}
				echo  '>' . $iRow['image'] . '</option>';
			}		
			echo '</select>';
			echo '</div>';
			echo '</form>' . "\n";
			//echo '</td>';
			echo "</td></tr>\n";
 			echo "</table>\n <!-- Layout Table 2 End -->" ;
		
			include '../resources/includes/request_info.inc.php';
			echo "</td></tr>\n";
 			echo "</table>\n <!-- Laout Table 1 End-->";
		}
	}
	else
	{
		echo '<div class="message">';
		echo '<h1>Error</h1>';
		echo '<p>Sorry, You are not authorised to perform this operation.</p>';
		echo '</div>';
	}
	
}

include '../resources/includes/footer.inc.php';

?>