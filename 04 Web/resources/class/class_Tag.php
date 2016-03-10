<?php

// Tag Class

class Tag
{

	public $id;
	public $name;
	
	public function add()
	{
		
		// convert to UPPER CASE
		$this->name = strtoupper($this->name);
		
		// check that no other tag with this name already exists
		$query = "SELECT name, id  FROM tag WHERE name = '" . $this->name . "'";
		include '../resources/config.php';
		$result = $sc_connection->query($query) or die("problem with query, $query");
		if ($result->rowcount() == 0)
		{
			$query = "INSERT INTO tag (name) VALUES ('" . $this->name . "')";
			include '../../delete/sc_connection.php';
			$result = pg_query($sc_connection, $query) or die("Couldn't add the tag");
			
			// find the newly added tag and then add it to service_tag_link.
		
			$query = "SELECT tag.id, tag.name FROM tag WHERE tag.name = " . "'" . $this->name . "'";
			$result = pg_query($sc_connection, $query) or die ('problem with query');
			$row = pg_fetch_array($result);
			$this->id = $row['id'];
			$this->name = $row['name'];
		
			// check its not already added to the service_tag_link table for this service to prevent duplicates
			
			// insert code here
					
			// now add it to service_tag_link
			$query = "INSERT INTO service_tag_link (service_id, tag_id) VALUES (" . "'" . $_COOKIE['serviceid'] . "', '" .  $this->id . "')";
			$result = pg_query($sc_connection, $query) or die ('could not add the tag to the service_tag_link table');
		}
		else
		{
			// tag already exists
			$row = pg_fetch_array($result);
			$this->id = $row['id'];
			//echo $this->id;
			// check that it is not already in the serivce_tag_link table
			
			$check = "SELECT service_tag_link.id, service_tag_link.tag_id, service_tag_link.service_id, tag.id, service.id 
				 	  FROM service, tag, service_tag_link
					  WHERE service.id = service_tag_link.service_id
					  AND tag.id = service_tag_link.tag_id
					  AND service.id = " . $_COOKIE['serviceid'] . 
					  " AND tag.id = " . $this->id;
					  // echo $check;
			$reslt = pg_query($sc_connection, $check);
			if(pg_num_rows($reslt) == 0)
			{
				// get the id for the existing tag and add to this service
				$row = pg_fetch_array($result);
				$query = "INSERT INTO service_tag_link (service_id, tag_id) VALUES (" . "'" . $_COOKIE['serviceid'] . "', '" . $this->id . "')" ;
				$result = pg_query($sc_connection, $query) or die ("Problem adding existing tag  - {$query} " );
				//include_once 'class_service.php';
			}
			else
			{
				// it was already in the service_tag_link table
				
			}
		}
	}
	
	public function load($tid)
	{
		include '../../delete/sc_connection.php';
		$query = "SELECT id, name FROM tag WHERE id = " . $tid;
		$result = pg_query($sc_connection, $query);
		
		while($row = pg_fetch_array($result))
		{
			$this->id = $row['id'];
			$this->name = $row['name'];
		}
		 
	}
	
	public function loadAllForService($serviceid)
	{
		include '../resources/config.php';
		$query = '
		SELECT tag.id, tag.name, service_tag_link.tag_id, service_tag_link.service_id 
		FROM tag, service_tag_link, service
		WHERE service_tag_link.service_id = service.id 
		AND service_tag_link.tag_id = tag.id
		AND service_tag_link.service_id = ' . $serviceid . " ORDER BY tag.name ASC";
		
		$result = $sc_connection->query($query);
		return $result;
	}
}

?>