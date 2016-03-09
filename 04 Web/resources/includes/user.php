
<div class="user">
<?php
// user.php
// loads the user login links
// display the currently logged in user.
// if logged in show the logout link 
// else show the login link
if (isset($_SESSION['firstname'])) {
if ($_SESSION['firstname'] != '')
{
	// do this if the user is logged in
	
	echo '<div class="username"><a href="account.php">'. $_SESSION['firstname']. '</a></div>';
	echo " <p><a href=\"logout.php\">Logout </a></p>";
}
}
 else
{
	echo '<div class="username">';
	echo '<a href="login.php"> Login </a></div>';
}
?>
</div>