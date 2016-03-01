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
		$query = "select count(id) from fortune";
		$mycount = $sc_connection->query($query)->fetchcolumn();
		$rowcount = $mycount;
		$rand = rand(1,$rowcount);
		
		$query = "SELECT id, fortune FROM fortune where id =  " . $rand ;
		
		$result = $sc_connection->query($query) or die('could not get the fortune from that random number');
		 
		$row = $result->fetch(PDO::FETCH_ASSOC);
		// print_r($row);
		$cookie = $row["fortune"];
		return $cookie;
	}
	
	public function getAll()
	{
		include 'sc_connection.php';
		$query = "SELECT id, fortune FROM fortune";
		$result = $connect->query($query) or die('There was a problem running the fortune getall query');
		return $result;
	}
	
	public function delete($fid)
	{
		include 'sc_connection.php';
		$query = "DELETE FROM fortune WHERE id = " . $fid;
		$result = $sc_connection->query($query) or die ("Could not delete that fortune record");
	}
	
	public function add($fort)
	{
		include 'sc_connection.php';
		$query = "INSERT INTO fortune (fortune) VALUES ('" . $fort . "')";
		$result = $sc_connection->query($query) or die ("Could not add a new fortune record");
	}

}

?>