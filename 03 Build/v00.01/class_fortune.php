<?php

// class_fortune.php

// Fortune Class

class Fortune
{
	public $id; // Primary Key
	public $fortune; // the mysical fortune itself
	
	// Gets a random fortune from the database
	public function getRandom()
	{
		include 'sc_connection.php';
		$query = "SELECT id, fortune FROM fortune ORDER BY RANDOM() LIMIT 1";
		$result = pg_query($sc_connection, $query) or die('could not get the fortune from that random number');
		 
		$row = pg_fetch_array($result);
		$cookie = $row['fortune'];
		return $cookie;
	}
	
	public function getAll()
	{
		include 'sc_connection.php';
		$query = "SELECT id, fortune FROM fortune";
		$result = pg_query($sc_connection, $query) or die('There was a problem running the fortune getall query');
		return $result;
	}
	
	public function delete($fid)
	{
		include 'sc_connection.php';
		$query = "DELETE FROM fortune WHERE id = " . $fid;
		$result = pg_query($sc_connection, $query) or die ("Could not delete that fortune record");
	}
	
	public function add($fort)
	{
		include 'sc_connection.php';
		$query = "INSERT INTO fortune (fortune) VALUES ('" . pg_escape_string($fort) . "')";
		$result = pg_query($sc_connection, $query) or die ("Could not add a new fortune record");
	}

}

?>