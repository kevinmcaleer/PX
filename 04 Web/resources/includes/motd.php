<?php

// motd.php

// Message Of The Day

// TODO - use MVC for motd, use the motd class

	include '../config.php';

	$query = "SELECT message, type FROM motd WHERE expiry > now()";
	$result = $sc_connection->query($query);
	
	if($result->rowCount() > 0)
	{
		echo '<div class="motd">', "\n";
		echo '<h2>Message Centre</h2><br />';
		while($motd = $result->fetch(PDO::FETCH_ASSOC))
		{
			//print_r($motd);
			
			switch ($motd['type']) {
    case 'i': // info
        echo '<div class="info">';
        break;
    case 'a': // alert
        echo '<div class="alert">';
        break;
    case 'w': // warning
        echo '<div class="warning">';
        break;
}
			echo $motd['message'];
			echo '</div>' . "\n";
		}
		echo '</div>' . "\n";
	}
?>