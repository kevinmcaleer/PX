<?php 

// Service Page



if (isset($_POST['serviceid']))
{
	session_start();
	require_once('delete/connection.php');
	require_once('resources/class/class_Contact.php');
	$usr = new Contact();
	$usr->load($_SESSION['id']);
	
	setcookie('serviceid',$_POST['serviceid']);
	
	include 'resources/includes/header.inc.php';
	include 'resources/includes/navigation.inc.php';
	
	if(isset($_POST['submitted']))
		{
			
			include 'resources/class/class_Service.php';
			$myService = new Service();
			$myService->load($_POST['serviceid']);
			$myService->name = $_POST['name'];
			$myService->description = $_POST['description'];
			$myService->parent = $_POST['parent'];
			//echo 'image: '. $_FILES['image']['name'] . "<br />";
			//echo 'image from list: '. $_POST['imagefromlist'];
			
			//$myService->save();
			// echo '<div class="message"><p>Changes Saved</p></div>';
			
			// if an existing file has been selected, use this and ignore the fileupload
			
			/*
			if($_FILES['image']['name'] !='')
			{
				echo 'yes its set';
			}
			else
			{
				echo 'no its not set';
			}
			*/
			
			if($_FILES['image']['name'] != '')
			{
				
			
			
			
			 // upload the file
			// echo 'File Submitted';
			 //if(isset($_POST['submitted']))
			 {
			 //	echo ', testing if files is set';
				if($_FILES['image']['name'] != '')
				{
				//	echo ', checking if file is in array';
					$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
					if(in_array($_FILES['image']['type'],$allowed))
					{
					
					
					
					    //	echo ', checking if file already exists';
						// sod it - just overwrite the current file
						/*
						if(file_exists(__dir__ . "/images/".  $_FILES['image']['name']))
						// check the file doesn't already exist
						{
							echo '<div class="message">';
							echo '<p>A file with that name already exists</p>';
							echo '</div>';
						}
						else
						*/
						if(move_uploaded_file($_FILES['image']['tmp_name'], __dir__ . "/Images/{$_FILES['image']['name']}"))
						{
							// echo '<p><em>The file has been uploaded!</em></p>';
							
							$myService->image = $_FILES['image']['name'];
							//echo $myService->image;
						}
						else
						{
							echo '<div class="message">';
							echo '<p>There was a problem moving the file</p>';	
							echo '</div>';
						}	
					}
					else
					{
						echo '<div class="message">';
						echo '<p>That file type not allowed:' . $_FILES['image']['type'] . ' </p>';
						echo '</div>';
					}
				} 
				else
				{
					// Invalid Type
					echo '<p class="error">Please upload a JPEG or JPG or PNG GIF Image.</p>';
				}
			 $myService->save();
			 }	
			 
			
			 //else
			 //{
		 //		echo 'not submiteed';
		//	 }
		  }else
			if($_POST['imagefromlist'] != '' || $_POST['imagefromlist'] != 'NULL')
			{
				$myService->image = $_POST['imagefromlist'];
				$myService->save();
			}
		
		}
	
	{
	
 // Load the current service
 include_once 'resources/class/class_Service.php';
 //echo $_POST['serviceid'];
 $myService = new Service();
 $myService->load($_POST['serviceid']);
 //$myService->show();

 ////////////////////////////////////////////////////////////////////////
 
 echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">' . "\n"; // create a table for layout 
 echo '<tr><td valign="top">' . "\n";
 
 
 
 // Display the service heading
 echo '<div id="servicedetails">';
 
 echo '<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td valign="top">';
 
 echo '<div class="servicename">';
 
 echo '<table><tr><td>'; // a table for layout
 // Display Service Image
 echo '<img src="images/' . $myService->image . '" width="64" height="64" />';
 echo '</td><td>'; 
 echo $myService->name;
 echo '</td></tr></table>';
 echo '</div>';
 echo '</td>';
 
 
 
 // if the user is an administrator show the edit link
 if ($usr->level=='A')
 {
 	echo '<script language="JavaScript" type="text/javascript">
		  <!--
		  function editservice ( selectedservice )
		  {
  			  document.editserviceform.serviceid.value = selectedservice ;
  			  document.editserviceform.submit() ;
		  }
		  
		  function searchtag ( tag )
		  {
		  	document.tagsearchform.search.value = tag;
			document.tagsearchform.submit();
		  }
		  -->
		  </script>';
	
	echo '<td  valign="top">';
	echo '<form action="admin_editservice.php" method="post" name="editserviceform">';
	echo '<input type="hidden" name="serviceid" />';
	
	echo '<p class="edit" align="right"><a href="javascript:editservice(' . "'" . $_POST['serviceid'] . "'" . ')">Edit this Service</a></p>';
 	echo '</form>';
	echo '</td>';
 }
 echo '</tr></table>' . "\n";
 echo '<div class="msg">';
 echo '<h2>Description</h2><br />';
 echo '<p>';
 echo "$myService->description";
 echo '</p>';
 echo '</div>';
 echo '</div>';
   
 // display any related children service
 
 include 'resources/includes/service.inc.php';
 echo '<div class="message">';
 echo '<h2>Related Services</h2><br />';
 
 // check if this is a top level node or a child
 if ($myService->parent != '')
 {
 	$myParent = new Service();
 	$myParent->load($myService->parent);
 	echo '<p>Parent: <a href="javascript:loadservice(' . $myParent->id  .  ')">' . $myParent->name;
 	echo '</a></p>';
 }
 echo '<form action="servicepage.php" method="POST" name="serviceform">';
 echo '<input type="hidden" name="serviceid" />';
 echo '</form>';
 echo '<p>';
 $children = $myService->getChildren();
 
 $first = TRUE;
 while($childrow = pg_fetch_array($children))
 
 {
 	if($first == TRUE)
	{
		$first = FALSE;
	}
	else
	{
		echo " | "; 
	}
 	echo '<a href="javascript:loadservice(' . $childrow['id'] .')">';
	echo $childrow['name'];
	echo '</a>';
 }
 
 echo '</p>';
 echo '</div>';
 
 // show tags
 
 echo '<div class="tags">';
 echo '<p>tags:</p>';
 
 // create a tag object
 include 'resources/class/class_Tag.php';
 $myTag = new Tag();
 $tagrow = $myTag->loadAllForService($myService->id);
 $first = TRUE;
 
 echo '<form name="tagsearchform" method="GET" action="searchresults.php" >';
 echo '<input type="hidden" name="search" />';
 echo '</form>';
 while($row = pg_fetch_array($tagrow))
 {
 	$tag = $row['name'];
	$tag = ucfirst(strtolower($tag));
	if ($first)
	{
		$first = FALSE;
	
	}
	else
	{
		echo '<span class="tag">, </span>';
	}
	
	
	echo '<a href="javascript:searchtag(' . "'" . $tag . "'"  .')" '. " class='tag'>" . $tag. '</a>';
 }
 
 // if administrator allow adding of tags
 if(isset($_SESSION['id']))
 {
 	if($usr->level='A')
 	{
	
		echo '<p align="right"><img src="images/edit.png" /><a onclick="javascript:toggleLayer('. "'tagedit'" . ' )">Add Tag<a/></p>';
		echo '<div id="tagedit"';
		echo '<iframe name="tageditform" src="admin_addtag.php" frameborder="0" width="505"></iframe>';
		echo '</div>';
 	}
 }
 echo '</div>';
 

 // close the table data tags
 echo "</td>\n";

	// include the javascript for posting requests to the itrequest.php page
	echo '
	<script language="JavaScript" type="text/javascript">
	<!--
	function dorequest ( selectedrequest )
	{
 		document.dorequestform.requestid.value = selectedrequest ;
		document.dorequestform.submit() ;
	}
	-->
	</script>';


 include 'resources/includes/request_info.inc.php';

 
 // Close the page layout table tags
 
 echo "</td></tr>\n";
 echo "</table>\n";
 
}
}
else
{
	session_start();
	include 'resources/includes/header.inc.php';
	include 'login_required.php';

}

include 'resources/includes/footer.inc.php';
?>
