<?php

// sc_connection - the service catalogue database connection stuff

		$schost = "localhost";
		$scuser = "kevinmcaleer";
		$scpass = "";
		$scdb = "php";

		// open a connection to the database server
		$sc_connection = pg_connect ("host=$schost dbname=$scdb user=$scuser password=$scpass");
		// $dbc = pg_connect ("host=$host dbname=$db user=$user password=$pass");

?>