<?php
# px ProjectView - projectview.php 
# created 30 September 2015
# created by Kevin McAleer
# purpose - handles displaying and interacting with the project model
require_once 'includes/project.php';

class projectview
{
	protected $_project;
	
	public function init()
	{
		$this->_project = new project();
		$this->_project->name = 'kevin';
	}
		
	public function show()
	{
		echo 'Project name: ';
		echo $this->_project->name;
}
}
?>