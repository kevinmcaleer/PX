<?php

// motd.php

// Message Of The Day

	include 'sc_connection.php';

	$query = "SELECT message FROM motd WHERE expiry > now()";
	$result = pg_query($sc_connection, $query);
	if(pg_num_rows($result) > 0)
	{
		echo '<div class="message">', "\n";
		echo '<h2>Message of the day</h2><br />';
		while($motd = pg_fetch_array($result))
		{
			echo $motd['message'] . "<br /> \n";
		
		}
		echo '</div>' . "\n";
	}
	
	
?>