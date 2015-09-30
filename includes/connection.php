<?php
# px Database connection - connection.php 
# created 30 September 2015
# created by Kevin McAleer
# purpose - to contain the database connection strings

// Connection String
		$host = "localhost";
		$user = "kevinmcaleer";
		$pass = "";
		$db = "px";

		// open a connection to the database server
		$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
		// $dbc = pg_connect ("host=$host dbname=$db user=$user password=$pass");
	
?>