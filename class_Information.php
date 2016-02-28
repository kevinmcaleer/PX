<?php

// info.php

// Information Class

class Information
{
	public $id;
	public $name;
	public $description;
	public $filepath;
	public $url;
	public $type; // either 'U' or 'F' for URL or FILE respectively
	public $category_id;


	public function load($infid)
	{
		include 'sc_connection.php';
		$query = "SELECT id, name, filepath, url, type, description, category_id FROM information WHERE id = $infid";
		$result = pg_query($sc_connection, $query);

	}

	public function getAllForService($serviceid)
	{
		include 'sc_connection.php';
		$query = "SELECT id, name, type, category_id, filepath, description, url, category_id FROM information WHERE id = $serviceid";
		$result = pg_query($sc_connection, $query);
		return $result;
	}

	public function save()
	{
		include 'sc_connection.php';
		$query = "INSERT INTO information (name, filepath, url, type, category_id, description) VALUES ('$this->name', '$this->filepath', '$this->url', '$this->type', $this->category_id, '$this->description')";
		$result = pg_query($sc_connection, $query) or die('There was a problem inserting the data');
	}

} // close the class definition

?>