<?php
// Connection String
		$host = "localhost";
		$user = "kevinmcaleer";
		$pass = "";
		$db = "servicepoint";

		$dsn = 'mysql:host=' . $host . ' ,dbname=' . $db;
		// open a connection to the database server using PDO
		
		$sc_connection = new PDO($dsn, $user, $pass);
		/* 
		This is the old code. 
		
		$host = "localhost";
		$user = "kevinmcaleer";
		$pass = "";
		$db = "servicepoint";

		// open a connection to the database server
		$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
		// $dbc = pg_connect ("host=$host dbname=$db user=$user password=$pass");
		
		*/
	
?>