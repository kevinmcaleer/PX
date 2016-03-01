<?php 

// login_page.inc.php

//Include the header:

$page_title = 'Login';

include ('includes/header.inc.php');

// format the login page

echo ' <table height="70" width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr><td>&nbsp;</td></tr></table>';

// Print any error messages, if they exist:

if (!empty($errors)) {

	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occured:<br />';
	foreach ($errors as $msg)
	{
		echo " - $msg<br />\n";
	}
	
	echo '</p><p>Please try again.</p>';
}

// Display the form:

?>

<div id="login">
<h1>Login</h1>

<form action="login.php" method="post">

<p>Username: <input type="text" name="email" size="20" maxlength="80" class="tb" /></p>
<p>Password: <input type="password" name="pass" size="20" maxlength="20" class="tb" /></p>
<p><input type="submit" name="submit" value="Login" /> Don't have an account? <a href="signup.php">Signup here</a></p>
<input type="hidden" name="submitted" value="TRUE" />
</form>

</div>

<?php // Include the footer:

include ('includes/footer.inc.php');

?>
