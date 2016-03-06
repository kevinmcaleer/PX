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
		require '../../delete/sc_connection.php';
		$query = "SELECT id, name, serviceid, description FROM request WHERE id = $rid";
		
		//echo $query;
		
		$result = $sc_connection->query($query) or die('There was a problem running the request-load query, '. $query);
		
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->service_id = $row['serviceid'];
		$this->description = $row['description'];
	}
	
	// gets all the requests related to this serviceid
	public function getAll($serviceID)
	{
		require '../resources/config.php';
		$query = "SELECT id, name, service_id, description FROM request WHERE service_id = $serviceID";
		// echo $query;
		$result = $sc_connection->query($query);
		
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
		require '../resources/config.php';
		
		$query = "DELETE FROM request WHERE id = " . $rid;
		$result = $sc_connection->query($query) or die ("Could not delete that request record");
	}

	public function add($req, $desc, $servid)
	{
		require '../resources/config.php';
		
		//echo 'adding request';
		//echo $req;
		$query = "INSERT INTO request (name, description, service_id) VALUES ('". $req . "','" . $desc . " ',{$servid})";
		$result = $sc_connection->query($query) or die ("Could not add a new Request record");
	}
}

?>