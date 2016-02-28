<?php
// Connectino String
		$host = "localhost";
		$user = "kevinmcaleer";
		$pass = "";
		$db = "workbook";

		// open a connection to the database server
		$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
		// $dbc = pg_connect ("host=$host dbname=$db user=$user password=$pass");
	
?>