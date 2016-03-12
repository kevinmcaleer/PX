<?php 

// login_page.inc.php

//Include the header:
$page_title = 'Login';
include ('../resources/config.php');
include INCLUDES_PATH . 'header.html';

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
<div class="title">
  <p>Login</p>
</div>
<div class="container">
<?php
include INCLUDES_PATH . 'sidebar.php';
?>
<div class="two_column">
<div class="message">
<div class="logo">
	<img src="/img/servicepointlogo.png" height="150"/>
</div>
<div class="messagecontent">
<h1>Login</h1>
<form action="login.php" method="post">
<p>Username: <input type="text" name="email" size="20" maxlength="80" class="tb" /></p>
<p>Password: <input type="password" name="pass" size="20" maxlength="20" class="tb" /></p>
<p><input type="submit" name="submit" value="Login" /> Don't have an account? <a href="../resources/includes/signup.php">Signup here</a></p>
<input type="hidden" name="submitted" value="TRUE" />
</form>
</div> <!-- login content-->
</div> <!-- message -->
</div> <!-- two_column-->
</div> <!-- container -->
<?php // Include the footer:
include ('../resources/includes/footer.html');
?>
