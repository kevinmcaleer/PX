<?php
# px ProjectView - projectview.php 
# created 30 September 2015
# created by Kevin McAleer
# purpose - handles displaying and interacting with the project model

require_once 'includes/project.php';
require_once 'includes/projectcontroller.php';

class projectview
{
	private $_project;
	private $_projectcontroller;
	
	public function __construct($controller, $model)
	{
		$this->_project = $model;
		$this->_projectcontroller = $controller;
		
		#$this->_project->name = 'kevin';
	}
		
	public function show()
	{
		echo '<div class="box">';
		echo '<h1>Projects</h1>';
		echo 'Project name: ' . $this->_project->name . '<br />';
		echo 'ID: ' . $this->_project->id . '<br />';
		echo 'Start Date: '. $this->_project->startdate . '<br />';
		echo 'Finish Date: '. $this->	_project->finishdate . '<br />';
		echo 'Programme ID: '. $this->_project->programmeid . '<br />';
		echo 'Budget: '. $this->_project->budget . '<br />';
		echo 'RAG: '. $this->_project->rag . '<br />';
		echo 'Status: ' . $this->_project->status . '<br />';
		echo '</div>';
}
}
?>