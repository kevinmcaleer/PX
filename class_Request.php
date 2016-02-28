<?php

// Request Class

class Request
{

	public $id;
	public $name;
	public $service_id; // the linked service.id
	public $description;

	// load the request passed
	public function load($rid)
	{
		require 'sc_connection.php';
		$query = "SELECT id, name, serviceid, description FROM request WHERE id = $rid";
		
		//echo $query;
		
		$result = pg_query($sc_connection, $query) or die('There was a problem running the request-load query, '. $query);
		
		$row = pg_fetch_array($result);
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->service_id = $row['serviceid'];
		$this->description = $row['description'];
	}
	
	// gets all the requests related to this serviceid
	public function getAll($serviceID)
	{
		require 'connection.php';
		require 'sc_connection.php';
		$query = "SELECT id, name, serviceid, description FROM request WHERE serviceid = $serviceID";
		// echo $query;
		$result = pg_query($sc_connection, $query);
		
		
		// the calling function will need to use pg_fetch_array to decode the $results
		return $result;
		
		
	}
	
	public function show()
	{
		echo "<br />\n";
		echo "$this->name";
		echo "<br />\n";
		echo "$this->description";
	}
	
	public function delete($rid)
	{
		include 'sc_connection.php';
		$query = "DELETE FROM request WHERE id = " . $rid;
		$result = pg_query($sc_connection, $query) or die ("Could not delete that request record");
	}

	public function add($req, $desc, $servid)
	{
		include 'sc_connection.php';
		
		//echo 'adding request';
		//echo $req;
		$query = "INSERT INTO request (name, description, serviceid) VALUES ('". pg_escape_string($req) . "','" . pg_escape_string($desc) . " ',{$servid})";
		$result = pg_query($sc_connection, $query) or die ("Could not add a new Request record");
	}
}

?>