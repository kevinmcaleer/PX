<?php
# px start page - index.php 
# created 30 September 2015
# created by Kevin McAleer
# purpose - models a project

require_once 'includes/connection.php';

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
	
	// Saves the current record to the backend database
	public function add()
	{  
		// the query beloew adds the project to the database
		$query = "INSERT INTO project (name,startdate,finishdate,programmeid,budget,rag,status) VALUES ('" . $this->name . ", " . $this->startdate . ", " . $this->finishdate . ", " . $this->budget . ", " . $this->rag . ", " . $this->status . "')";
		require_once '/includes/connection.php';
		
		$result = pg_query($connection, $query) or die("Couldn't add the project");

	}
}
?>