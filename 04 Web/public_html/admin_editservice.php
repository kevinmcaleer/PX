<?php

// editservice.php

// for editing services

session_start();
include '../resources/config.php';
include INCLUDES_PATH . 'header.html';
include INCLUDES_PATH . 'user.php';
?>
<div class="title">
  <p>Edit Service</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
<?php
if(isset($_POST['serviceid']))
{
	include INCLUDES_PATH . 'navigation.html';	// load the navigation bar	
	// check current user is authorised to edit a service
	
	if($usr->level="A")
	{
		{
			?>
			<table width="100%" cellspacing="0" cellpadding="0" border="0"><!-- Layout Table--> 
 			<tr><td valign="top">
			<script language="JavaScript" type="text/javascript">
			  <!--
			  function saveform ()
			  {
  			   	document.editserviceform.submit() ;
			  }
			  -->
			  </script>
			<?php
			// echo $_POST['serviceid'];
			include_once '../resources/class/class_service.php';
			$myService = new Service();
			$myService->load($_POST['serviceid']);
			?> 
 			<table width="100%" cellspacing="0" cellpadding="0" border="0"><!-- Layout Table 2-->
 			<tr><td valign="top">
			<form enctype="multipart/form-data" name="editserviceform" method="POST" action="servicepage.php">
			<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			<?php
            echo '<input type="hidden" name="serviceid" value="'. $myService->id .'"/>';
			?>
			<input type="hidden" name="submitted"> 
 			<div id="editservicedetails">
			<table width="100%" border="0" cellpadding="0" cellspacing="0"><!-- Layout Table 3-->
			<tr><td valign="top">
			<div class="servicename">
			Edit:
            <?php
			echo '<input type="text" name="name" value="'. $myService->name .'" class="tb"/><br />';
			?>
			</div>
			</td>
			<td align="right" valign="top">
			<p class="edit"><a href="javascript:saveform()">Save changes</a></p>
			</td></tr></table><!-- Layout Table 3 End-->													
			
            <!-- Description -->
			<div class="message">
			<h2>Description</h2><br />
			<p>
            <?php
			echo '<input type="text" name="description" value="' . $myService->description . '" class="tb" size="80" maxlength="255" />';
			?>
			</div>
			</p>
			<!-- Parent Service -->
			
			<div class="message">
			<h2>Parent Service</h2><br />
			<p>
			<!-- // echo $myService->parent; -->
			<select name="parent" class="tb" />
			<option value="NULL">None</option>
			<?php
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

include '../resources/includes/footer.html';

?>