<?php
# px Project Controller Class - projectcontroller.php 
# created 4 October 2015
# created by Kevin McAleer
# purpose - to control the project model class (MVC)

class projectcontroller
{
	private $model;
	
	public function __construct($model)
	{
		$this->model = $model;
	}
}
	
?>