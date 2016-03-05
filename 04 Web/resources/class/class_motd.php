<?php

// class_motd.php

// Message Of The Day Class

class motd
{
	public $id;				// Primary Key
	public $message;		// Message of the day
	public $expiry;			// Expiry Date

	public function load($mid)
	{
		include '../../delete/sc_connection.php';
		$query = "SELECT id, message, expiry FROM motd WHERE id = " . $mid;
		$result = $sc_connection->query($query) or die('There was a problem running the motd query');
		$row = $result->fetch();
		$this->id = $mid;
		$this->message = $row['message'];
		$this->expiry = $row['expiry'];
	}
	
	public function getAll()
	{
		include '../../delete/sc_connection.php';
		$query = "SELECT id, message, expiry FROM motd";
		$result = pg_query($sc_connection, $query) or die('There was a problem running the motd query');
		return $result;
	}
	
	public function delete($mid)
	{
		include '../../delete/sc_connection.php';
		$query = "DELETE FROM motd WHERE id = " . $mid;
		$result = pg_query($sc_connection, $query) or die ("Could not delete that motd record");
	}
	
	public function add($msg, $exp)
	{
		include '../../delete/sc_connection.php';
		$query = "INSERT INTO motd (message, expiry) VALUES ('" . $msg . "','" . $exp. "')";
		$result = pg_query($sc_connection, $query) or die ("Could not add a new motd record");
	}
}
?>