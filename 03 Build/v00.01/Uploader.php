<?php

// Uploader.php

// allows the uploading of images for services

echo 'Current Document Root is: ' . $_SERVER['DOCUMENT_ROOT'] . "<BR />";
echo 'Current Directory:' .  __DIR__ ;

if(isset($_POST['submitted']))
{
	if(isset($_FILES['upload']))
	{
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if(in_array($_FILES['upload']['type'],$allowed))
		{
			if(file_exists(__dir__ . "/images/".  $_FILES['upload']['name']))
			// check the file doesn't already exist
			{
				echo 'a file with that name already exists';
			}
			else
			if(move_uploaded_file($_FILES['upload']['tmp_name'], __dir__ . "/Images/{$_FILES['upload']['name']}"))
			{
				echo '<p><em>The file has been uploaded!</em></p>';
			}
			else
			{
				echo 'there was a problem moving the file';	
			}
			
		}
		else
		{
			echo 'file type not allowed:' . $_FILES['upload']['type'];
		}
	} else
	{
		// Invalid Type
		echo '<p class="error">Please upload a JPEG or JPG or PNG GIF Image.</p>';
	}
}
else
{
	echo 'not submiteed';
}


?>