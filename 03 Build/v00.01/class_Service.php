<?php

// Service Class

class Service
{

	public $id;
	public $name;
	public $description;
	public $responsibilities;
	public $restrictions;
	public $parent;
	public $image;

	// load the specific service
	public function load($serviceid)
	{
		include 'connection.php';
		include 'sc_connection.php';
		$query = "SELECT * FROM service WHERE id = $serviceid";
		$result = pg_query($sc_connection, $query);
		
		if (pg_num_rows($result) == 1)
		{
			$row = pg_fetch_array($result);
			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->description = $row['description'];
			$this->responsibilities = $row['responsibilities'];
			$this->restrictions = $row['restrictions'];
			$this->parent = $row['parent'];
			$this->image = $row['image'];
		}
		else
		{
			echo 'Sorry, no service with that id was found.';
		}
	}

	// loads all services into an array that are top level services
	public function loadall(&$result)
	{
		require 'sc_connection.php';
		
		$query = "SELECT id, name, description, parent, image FROM service WHERE parent is null ORDER BY name ASC";
		$result = pg_query($sc_connection, $query);
		
	}
	
	// loads all services into an array
	public function loadallservices()
	{
		require 'sc_connection.php';
		$query = "SELECT id, name, description, parent, image FROM service ORDER BY name ASC";
		$result = pg_query($sc_connection, $query);
		return $result;
	}
	
	public function show()
	{
		echo "ID: ". $this->id . "<br />\n";
		echo "Name: ". $this->name . "<br />\n";
		echo "Description: ". $this->description . "<br />\n";
		echo "Responsibilities: ". $this->responsibilities . "<br />\n";
		echo "Restrictions: ". $this->restrictions . "<br />\n";
		echo "Parent: " . $this->parent . "<br />\n";
		echo "image path: " . $this->image ;
		echo '<img src="images/' . $this->image . '">';
		
	}

	public function getChildren()
	{
		require 'sc_connection.php';
		$query = "SELECT id, name, description, responsibilities, restrictions FROM service WHERE parent = " . $this->id;
		$result = pg_query($sc_connection, $query);
		
		return ($result);
	}
	
	// saves changes to the current service
	public function save()
	{
		require 'sc_connection.php';
	
		$query = "UPDATE service SET name = '" .  $this->name . "' , description = " . "'" . $this->description . "'" . ", parent = "  ;
		
		//echo $this->parent; 
		if ($this->parent == '')
		{
			$query = $query . "NULL";
		}
		else
		{
			$query = $query .  $this->parent;
			
			
		}
		
		if ($this->image != '')
		{
			$query = $query . ", image = '" . $this->image . "'";
		}
		
		$query = $query . " WHERE id = ".  $this->id;
		
		//echo $query;
		$result = pg_query($sc_connection, $query) or die("there was a problem running the update query" . $query);
	}
	
	public function getImages()
	{
		// require_once 'class_Service.php';
		require  'sc_connection.php';
		$query = 'SELECT image FROM service WHERE image IS NOT NULL GROUP BY image';
		$result = pg_query($sc_connection, $query);
		return $result;
	
	}

}

?>