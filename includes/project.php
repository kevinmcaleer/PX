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
	public function save()
	{
	   $connection
	}
}

?>