<?php 

// Application Class

class Application
{

	public $id; 		// the unique application id 
	public $name;		// the name of the application
	public $url;		// the url of the homepage of the application (just the filename)
	public $baseurl;	// the url path to the application


public function loadMyApps($contact_id, $applist)
{
	include ('../../delete/connection.php');
	
	$query = "SELECT application.name, contact.id FROM application, application_contact_link, contact 
			  WHERE application_contact_link.contact_id = $contact_id AND
			  		application_contact_link.application_id = application.id";
	
	// echo $query;
	$result = pg_query($connection, $query);
	
	while ($row = pg_fetch_array($result))
	{
		$applist['name'] = $row['name'];
	}

	echo "</ul>\n";

	}


// loads the specific application passed to it via the $appid
public function load($appid)
{
	$query = "SELECT * FROM application WHERE id = $appid";
	include '../../delete/connection.php';
	$result = pg_query($connection, $query);
	
	if (pg_num_rows($result) == 1) 
	{
		$row = pg_fetch_array($result);
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->url = $row['url'];
		$this->baseurl = $row['baseurl'];
	}
	else
	{
		echo 'Either more than 1 result was found or no appication with that application id was found';
	}
}

	public function show()
	{
		echo "<BR />\n";
		echo 'ID: '. $this->id . "<BR />\n";
		echo 'Name: ' . $this->name . "<BR />\n";
		echo 'BASEURL: ' . $this->baseurl . "<BR />\n";
		echo 'URL: ' . $this->url . "<BR />\n";
	}

}
?>