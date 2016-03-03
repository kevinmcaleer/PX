<?php

// itcontactsimporter.php

// Imports IT contacts from a CSV file (from sharepoint)

session_start();
include 'resources/includes/header.inc.php';
include 'resources/includes/navigation.inc.php';

if (isset($_SESSION['id']))
{
	echo '<div class="message">';
	
	echo '<h1>IT Contacts Import</h1>';
	echo '</div>';

	// check that the file has been uploaded
	
	
	if($_FILES['csvfile']['name'] != '')
	{
		// check the file is a CSV file
		// echo 'file type is: ' . $_FILES['csvfile']['type'];
	//	$csvfilename = $_FILES['csvfile']['name'];
		
		if($_FILES['csvfile']['type'] == 'text/csv')
		{
			$newPath = __DIR__ . "/csvimport/" . $_FILES['csvfile']['name'];
			//echo $newPath;
			move_uploaded_file($_FILES['csvfile']['tmp_name'], $newPath);
			
			echo '<div class="message"> ';
			echo '<p>CSV file uploaded</P>';
			echo '</div>';
			
			// now read the file and import into the database
			// echo $newPath;
			if(file_exists($newPath))
			{
			
				// clear the itcontacts table
				require 'resources/class/class_ITContact.php';
				$itContact = new ITContact();
				$itContact->clear();
				
				$csvfile = fopen ($newPath,"r");
				$ignorefirstline = TRUE;
				
				
				while (($data = fgetcsv($csvfile, 1000, ",")) !== FALSE)
				{
        			if ($ignorefirstline == TRUE)
					{
					
						$ignorefirstline = FALSE;
					}
					else
					{
						
						$num = count($data);
        				// echo "<p> $num fields in line $row: <br /></p>\n";
        				$row++;
        				
						// traverse each column
						for ($c=0; $c < $num; $c++) 
						{
            				// echo $data[$c] . "<br />\n";
							switch ($c) {
								
								case 0: // Lastname
										$itContact->lastname = $data[$c];
										break;
								
								case 1: // firstname
										$itContact->firstname = $data[$c];
										break;
								
								case 2: // phone
										$itContact->phone = $data[$c];
										break;
								
								case 3: // building
										$itContact->building = $data[$c];
										break;
								case 4: // business_group
										$itContact->business_group = $data[$c];
										break;
								case 5: // Area
										$itContact->area = $data[$c];
										break;
								case 6: //site
										$itContact->site = $data[$c];
										break;
							}
        				}
						$itContact->add();
					}
    			}
    		fclose($csvfile);
			unlink($newPath);
			echo '<div class="message"> ';
			echo '<p>CSV Data Imported Successfully</P>';
			echo '</div>';
			}
			else
			{
				echo 'Opps, could not find the uploaded file.';
				
			}
		}
		else
		{
			echo 'Sorry that file is not a valid CSV file';
		}
	}
	else
	{
		echo 'No file has been uploaded.';
		echo 'name is: '. $_FILES['csvfile']['name'];
	}
	
}
else
{
	include 'login_required.php';
}

include 'resources/includes/footer.inc.php';


?>
