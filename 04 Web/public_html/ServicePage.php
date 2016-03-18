<?php 

// Service Page

/* if (isset($_POST['serviceid'])) */
if (isset($_POST['serviceid'])) 
{
	session_start();
	
	
	require_once('../resources/class/class_contact.php');
	$usr = new Contact();
	if (isset($_SESSION['id']))
	{
		$usr->load($_SESSION['id']);	
	}
	else
	{
		setcookie('serviceid', $_POST['serviceid']);
	}

	include '../resources/config.php';
	include INCLUDES_PATH . 'header.html';
	include INCLUDES_PATH . 'user.php';
	?>
	<div class="title">
 	<p>Service Details</p>
	</div>
	<div class="container">
	<?php
	include INCLUDES_PATH . 'sidebar.php';
	?>
	<div class="two_column">
  	<?php
	
	if(isset($_POST['submitted']))
		{
			include INCLUDES_PATH . 'navigation.html';	// load the navigation bar			
			include '../resources/class/class_service.php';
			$myService = new Service();
			$myService->load($_POST['serviceid']);
			$myService->name = $_POST['name'];
			$myService->description = $_POST['description'];
			$myService->parent = $_POST['parent'];
			if($_FILES['image']['name'] != '')
			{
				if($_FILES['image']['name'] != '')
				{
					$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
					if(in_array($_FILES['image']['type'],$allowed))
					{
						if(move_uploaded_file($_FILES['image']['tmp_name'], __dir__ . "/img/{$_FILES['image']['name']}"))
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
		  }else
			if($_POST['imagefromlist'] != '' || $_POST['imagefromlist'] != 'NULL')
			{
				$myService->image = $_POST['imagefromlist'];
				$myService->save();
			}
		}
	{
 // Load the current service
 include_once '../resources/class/class_service.php';
 //echo $_POST['serviceid'];
 $myService = new Service();
 $myService->load($_POST['serviceid']);
 //$myService->show();
 ?>
 <table width="100%" cellspacing="0" cellpadding="0" border="0">
 <tr><td valign="top">
 <div id="servicedetails">
 <table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td valign="top">
 <div class="servicename">
 <table><tr><td>
 <! --// Display Service Image -->
 <?php
 echo '<img src="images/' . $myService->image . '" width="64" height="64" />';
 ?>
 </td><td>
 <?php
 echo $myService->name;
 ?>
 </td></tr></table>
 </div>
 </td> 
 <?php
 // if the user is an administrator show the edit link
 if ($usr->level=='A')
 {
	?>
 	<script language="JavaScript" type="text/javascript">
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
		  </script>
	
	<td  valign="top">
	<form action="admin_editservice.php" method="post" name="editserviceform">
	<input type="hidden" name="serviceid" />
	<?php
	echo '<p class="edit" align="right"><a href="javascript:editservice(' . "'" . $_POST['serviceid'] . "'" . ')">Edit this Service</a></p>';
	?>
 	</form>
	</td>
 }
 </tr></table>
 <div class="msg">
 <h2>Description</h2><br />
 <p>
 <?php
 echo "$myService->description";
 ?>
 </p>
 </div>
 </div>
 <?php  
 // display any related children service
 
 include '../resources/includes/service.inc.php';
 ?>
 <div class="message">
 <h2>Related Services</h2><br />
 <?php
 // check if this is a top level node or a child
 if ($myService->parent != '')
 {
 	$myParent = new Service();
 	$myParent->load($myService->parent);
 	echo '<p>Parent: <a href="javascript:loadservice(' . $myParent->id  .  ')">' . $myParent->name;
 	echo '</a></p>';
 }
 ?>
 <form action="servicepage.php" method="POST" name="serviceform">
 <input type="hidden" name="serviceid" />
 </form>
 <p>
 
 <?php
 $children = $myService->getChildren();
 
 $first = TRUE;
 while($childrow = $children->fetch(PDO::FETCH_ASSOC))
 
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
 ?>
 </p>
 </div>
 <! -- // show tags -->
 <div class="tags">
 <p>tags:</p>
 
 <?php
 // create a tag object
 include '../resources/class/class_tag.php';
 
 $myTag = new Tag();
 $tagrow = $myTag->loadAllForService($myService->id);
 $first = TRUE;
 ?>
 <form name="tagsearchform" method="GET" action="searchresults.php" >
 <input type="hidden" name="search" />
 </form>
 <?php
 while($row = $tagrow->fetch(PDO::FETCH_ASSOC))
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
	?>
	<p align="right"><img src="img/edit.png" /><a href='onclick="javascript:toggleLayer('. "'tagedit'" . ' )'">Add Tag<a/></p>
	<div id="tagedit">
	<iframe name="tageditform" src="admin_addtag.php" frameborder="0" width="505"></iframe>
	</div>
    <?php
 	}
 }
 ?>
 </div>
 <! -- // close the table data tags -->
 </td>
	<!--
	// include the javascript for posting requests to the itrequest.php page
	-->
	<script language="JavaScript" type="text/javascript">
	<!--
	function dorequest ( selectedrequest )
	{
 		document.dorequestform.requestid.value = selectedrequest ;
		document.dorequestform.submit() ;
	}
	-->
	</script>
    <?php
 include '../resources/includes/request_info.inc.php';
 
 // Close the page layout table tags
 
 echo "</td></tr>\n";
 echo "</table>\n";
 
	}
}
else
{
	session_start();
	include '../resources/includes/header.inc.php';
	include '../resources/includes/login_required.php';

}

?>
</div>
<?php
include '../resources/includes/footer.html';
?>
