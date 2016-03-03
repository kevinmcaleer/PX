<?php

// ITContacts.php

// IT Contacts Class for importing

class ITContact
{
	
	public $id;
	public $firstname;
	public $lastname;
	public $phone;
	public $site;
	public $area;
	public $building;
	public $business_group;

	public function add ()
	{
		include '../../delete/sc_connection.php';
		
		// Escape the text data
  		$escaped = pg_escape_string($data);
  
  		/*
  		// Insert it into the database
  		pg_query("INSERT INTO correspondence (name, data) VALUES ('My letter', '{$escaped}')");
		*/
		$firstname = pg_escape_string($this->firstname);
		$lastname = pg_escape_string($this->lastname);
		$phone = pg_escape_string($this->phone);
		$site = pg_escape_string($this->site);
		$area = pg_escape_string($this->area);
		$building = pg_escape_string($this->building);
		$business_group = pg_escape_string($this->building_group);
		$query = "INSERT INTO itcontacts (firstname, lastname, phone, site, area, building, business_group) 
				  VALUES (' {$firstname} ', '{$lastname}', '{$phone}', '{$site}', '{$area}', '{$building}', '{$business_group}')";
		
		
		// make it safe to insert (inserts escape characters where required)
		/// $query = pg_escape_string($query);
		// echo $query . "<br />";
		$result = pg_query($sc_connection, $query) or die ('There was a problem adding the IT contact');
		pg_close($sc_connection);
	}
	public function clear()
	{
		include '../../delete/sc_connection.php';
		$query = 'DELETE FROM itcontacts WHERE id IS NOT NULL';
		$result = pg_query($sc_connection, $query) or die('There was a problem running the delete query');
		pg_close($sc_connection);
		
	}
	
	public function getSites()
	{
		include '../../delete/sc_connection.php';
		$query = "SELECT site FROM itcontacts GROUP BY site ORDER BY site ASC";
		$result = pg_query($sc_connection, $query) or die('There was a problem running the get sites query');
		return $result;
	}
	public function getBuildings()
	{
		include '../../delete/sc_connection.php';
		$query = "SELECT building FROM itcontacts GROUP BY building ORDER BY building ASC";
		$result = pg_query($sc_connection, $query) or die('There was a problem running the get Buildings query');
		return $result;
	}
}
?>