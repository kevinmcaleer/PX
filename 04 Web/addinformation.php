<?php

// Addinformation.php

// Adds information links to services

session_start();

include 'resources/includes/header.inc.php';
?>
<script language="JavaScript" type="text/javascript">
				  <!--
				  
				  function showurl()
				  {
				  	 
					showLayer('url');  
					hideLayer('file');
				  }
				  
				  function showfile()
				  {
				  	showLoyer('file');
					hideLayer('url');
				  }
				  
				  -->
				  </script>
<?php	
include 'resources/includes/navigation.inc.php';

			  
		

// check if user is logged in
if(isset($_SESSION['id']))
{
	// check that the user is an administrator
	if($usr->level == "A")
	{
		// check if the form has been posted
		if(isset($_POST['submitted']))
		{
			// process the uploaded file and save the information to the database
			require_once 'resources/class/class_Information.php';
			$myInfo = new Information();
			$myInfo->name = $_POST['name'];
			$myInfo->description = $_POST['description'];
			if($_POST['typegroup'] == 'url')
			{
				$myInfo->url = $_POST['url'];
				$myInfo->type = "U";
				
			}
			else if($_POST['typegroup'] == 'file')
			{
				// validate file and move to upload area
				$myInfo->file = $_FILES['filename']['name'];
				$myInfo->type = "F";
			}
			
			// Save the file
			$myInfo->save();
			
			// echo $_FILES['information_file']['name'];
		}
		else
		{	
			// Create information form
				
			echo '<div class="message"';
			require_once 'resources/class/class_Service.php';
			$myServ = new Service();
			$myServ->load($_COOKIE['serviceid']);
			echo '<h1>Add Information for the \'' . $myServ->name . '\' Service</h1><br />';
		
			
			echo '<form enctype="multipart/form-data" name="informationform" action="addinformation.php" method="POST">';
			echo '<input type="hidden" name="submitted" />';
			echo 'Name: <input type="text" name="name" /><br />';
			echo 'Description: <input type="text" name="Description" /><br /><br />';
		
			
			
			
			echo '<label>file<input type="radio" name="typegroup" value="file" /></label>';
			echo '<label>URL<input  type="radio" name="typegroup" value="url" /></label>';
			
			echo '<div id="url">';
			echo '<labell>';
			echo 'URL <input type="text" name="urlpath"/><br />';
			echo '</label>';
			echo '</div>';
			echo '<div id="file">';
			echo '<input type="file" name="information_file" />';
			echo '</div>';
				
			echo '<input type="submit" />';
		
			echo '</form>';
			echo '</div>';  // close message div tag 
		}
	}
	else
	{
		echo 'You are not permitted to perform that operation';
	}	
}
else
{
	include 'login_required.php';

}

include 'resources/includes/footer.inc.php';

?>