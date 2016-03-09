<?php

// signup.php

// Allow users to sign up

session_start();

include '../resources/includes/header.inc.php';

// format the header area
echo '<table height="70" width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td>&nbsp;</td></tr></table>';

if(isset($_POST['usersignup']))
{
	// process the form.
	echo '<div class="message">';
	echo '<h1>Signup Complete</h1>';
	echo '<p>Thank you for signing up. You may now <a href="login.php">login.<a/></p>';
	$registration = "Thank you for registering with the IT Service Catalogue. \n With the IT Service Catalogue you can browse the available services, make IT request and purchase IT goods.";
	$sendto = $_POST['email'];
	
	
	$header = 'MIME-Version: 1.0' . "\n" . 'Content-type: text/plain; charset=UTF-8' . "\n" ;
	$from = 'no-reply@sellafieldsites.com'; // TODO CHANGE THIS TO BE TENANT SPECIFIC
	$cc = 'CC: kevinmcaleer@me.com';
	$from = 'FROM: IT Service Catalogue <' . $from . '>' . "\n" . $cc;
	$from = $header . $from;
	$subject = 'Service Catalogue Registration';
	
	
	mail($sendto, $subject, $registration, $from);
	/*
	echo 'To: '. $sendto . "<br />\n";
	echo 'From: '. $from . "<br />\n";
	echo 'Subject: '. $subject . "<br />\n";
	echo 'Message: ' . $registration . "<br />\n";
	echo "</div>";
	*/
} 
else
{
// display the form
echo '
<div id="signupform" class"signupform">
<h1>Signup</h1>
<form action="signup.php" method="post" name="signup">
<input type="hidden" name="usersignup"/>
<p>Firstname: <input type="text" name="firstname" class="tb" />
   Surname: <input type="text" name="surname" class="tb"/></p>
<p>Email Address: <input type="text" name="email" class="tb" /></p>
<p>Password: <input type="password" name="password" class="tb" /></p>
<p>Confirm Password: <input type="password" name="passwordconfirm" class="tb" /></p><br />
<input type="submit" />

</form>

</div>';
}
include '../resources/includes/footer.inc.php';

?>
