<?php
# px Table Class - table.php 
# created 9 October 2015
# created by Kevin McAleer
# purpose - For showing interactive tables

class table
{
	private $columns;
}

class tablemodel 
{
	private $tablearray; // actually an array of an array (rows and columns)
}

class tableview
{
	private $_mytable; // the table 
	
	public function show()
	{
		//remove the line below
		$this->_mytable = "Projects";
		echo '<table border="1">';
		echo '<tr>';
		echo '<td>Table'. $this->_mytable . '</td>';
		echo '</tr>';
		echo '</table>';		
	}
}

?>

 