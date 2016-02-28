<?php
# px start page - index.php 
# created 30 September 2015
# created by Kevin McAleer
# purpose - models a project

#require 'includes/connection.php';

// The Project class
class project
{
	public $id; 				// the database primary key
	public $name; 			// the name of the project
	public $startdate; 		// the project start date
	public $finishdate;		// the project finish date
	public $programmeid;		// the programme the project belongs to
	public $budget;			// the total budget for the project	
	public $rag;				// the projects Red, Amber or Green status
	public $status; 			// proposed, open, closed, abanodoned.
	
	// initialize the class
	function __construct()
	{
	  $this->id = 1;
	  $this->name = 'empty';
	  $this->startdate = '20151001';
	  $this->finishdate = '20151225';
	  $this->programmeid = 1;
	  $this->budget = '0';
	  $this->rag = 'G';
	  $this->status = '1'; // 1 is active, 0 is closed	
	}
	
	// Load the record 
	public function load($pid) // pid is the project id to load
	{
		$query = "SELECT * FROM project where project.id = " . $pid . ";";
		require 'includes/connection.php';
		$result = pg_query($connection, $query) or die("couldn't load the project, ID not found.");
		$row = pg_fetch_array($result);
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->startdate = $row['startdate'];
		$this->finishdate = $row['finishdate'];
		$this->budget = $row['budget'];
		$this->programmeid = $row['programmeid'];
		$this->rag = $row['rag'];
		$this->status = $row['status'];
	}
	
	// Saves the current record to the backend database
	public function add()
	{  
		
		// the query beloew adds the project to the database
		$query = "INSERT INTO project (name, startdate, finishdate, programmeid, budget, rag, status) VALUES ('" . $this->name . "', '" . $this->startdate . "', '" . $this->finishdate . "', '" . $this->programmeid . "', '" .  $this->budget . "', '" . $this->rag . "', '" . $this->status . "');";
		
		// connect to the database
		require 'includes/connection.php';
	
		// execute the query or return an error
		$result = pg_query($connection, $query) or die("Couldn't add the project");

	}
}
?>