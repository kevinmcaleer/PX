<?php

// motd.php

// Message Of The Day

// TODO - use MVC for motd, use the motd class

	include '../delete/sc_connection.php';

	$query = "SELECT message FROM motd WHERE expiry > now()";
	$result = $sc_connection->query($query);
	
	if($result->rowCount() > 0)
	{
		echo '<div class="message">', "\n";
		echo '<h2>Message of the day</h2><br />';
		while($motd = $result->fetch(PDO::FETCH_ASSOC))
		{
			//print_r($motd);
			echo $motd['message'] . "<br /> \n";
		
		}
		echo '</div>' . "\n";
	}
	
	
?>