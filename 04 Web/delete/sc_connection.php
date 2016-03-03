<?php

// sc_connection - the service catalogue database connection stuff

		$schost = "localhost"; 									// Server Hostname
		$scuser = "spdb";										// Database username
		$scpass = "service";										// Database password
		$scdb = "servicepoint";									// Database name
		$dsn = 'mysql:host=' . $schost . '; dbname=' . $scdb;		// Data Source Name
		// open a connection to the database server using PDO
		
		// echo $dsn;
		
		try {
			$sc_connection = new PDO($dsn, $scuser, $scpass);
		
			$sc_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $ex)
		{
    		die('Error : ' . $ex->getMessage());
    	}
		// $dbc = pg_connect ("host=$host dbname=$db user=$user password=$pass");
 

?>