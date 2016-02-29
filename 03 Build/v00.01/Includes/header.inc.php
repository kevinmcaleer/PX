<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $page_title; ?></title>
<link href="includes/core.css" rel="stylesheet" type="text/css" />

<?php
include 'includes/linkscript.inc.php';

?>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
<tr>
<td bgcolor="#0054A6">&nbsp;</td>
<td width="960"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="headertable">
<tr><td align="left" bgcolor="#0054A6">
<div id="navigation">
<ul>
<li><a href="index.php">Home</a></li> 
<?php
// check if the user is an administrator

	if (isset($_SESSION['id']))
	{
	// echo $_SESSION['id'];

	require_once('connection.php');
	require_once('class_Contact.php');
	$usr = new Contact();
	$usr->load($_SESSION['id']);
	if ($usr->level=='A')
	echo '<li><a href="admin.php">Admin</a></li>' . "\n";
	echo '<li><a href="itrequests.php">My Requests</a></li>';
	
	}
?>

</ul>
</div>
</td>
<td></td>
<td align="right" bgcolor="#0054A6" width="300">
<div id="account">
<?php // display the currently logged in user.

// if logged in show the logout link 
// else show the login link

if ($_SESSION['firstname'] != '')
{
	// do this if the user is logged in
	
	echo '<p>Welcome <a href="account.php">'. $_SESSION['firstname']. '</a>';
	echo ", <a href=\"logout.php\">Logout </a></p>";
} else
{
	echo '<a href="login.php"> Login </a></p>';
}

/*
// Display the search field
echo '</div>';
echo '<div id="search">';
echo '<form action="searchresults.php" method="GET" name="searchform">';
echo "<p> Search </p>";
echo '<input type="text" name="search" class="tb" autocomplete="off"/>';
echo '<input type="submit">';
echo '</form>';
echo '</div>';

*/
?>
</div>
<script language="JavaScript" type="text/javascript">
<!--

function toggleLayer( whichLayer)
{
	var elem, vis;
	if (document.getElementById) // this is the way the standards work
		elem = document.getElementById (whichLayer);
	else if (document.all) // this is the way old MSIE version work
		elem = document.all[whichLayer];
	else if (document.layers) // this is the way nn4 works
		elem = document.layers[whichLayer];
	vis = elem.style;
	
	// if the style.display value is blank we try to figure it out here
	if(vis.display=='' &&elem.offsetWidth!=undefined&&elem.offsetHeight!=undefined)
		vis.display = (elem.offsetWidth!=0&&elem.offsetHeight!=0)?'block':'none';
		vis.display = (vis.display==''||vis.display=='block')?'none':'block';
}

/*
function showLayer(whichLayer)
{
	var elem, vis;
	if (document.getElementById) // this is the way the standards work
		elem = document.getElementById (whichLayer);
	else if (document.all) // this is the way old MSIE version work
		elem = document.all[whichLayer];
	else if (document.layers) // this is the way nn4 works
		elem = document.layers[whichLayer];
	vis = elem.style;
		//vis.display = (vis.display==''||vis.display=='block')?'none':'block';
		vis.display = (elem.offsetWidth!=0&&elem.offsetHeight!=0)?'block':'none';
}

function hideLayer(whichLayer)
{
	var elem, vis;
	if (document.getElementById) // this is the way the standards work
		elem = document.getElementById (whichLayer);
	else if (document.all) // this is the way old MSIE version work
		elem = document.all[whichLayer];
	else if (document.layers) // this is the way nn4 works
		elem = document.layers[whichLayer];
	vis = elem.style;
		//vis.display = (vis.display=='none'||vis.display=='')?'':'block';
		vis.display = (vis.display==''||vis.display=='block')?'none':'block';
}
*/

-->
</script>
<div id="search">
<form name="search" action="searchsuggest.php" method="get" target="searchWindow">
<p>Search: <input type="text" name="search" onkeyup="this.form.submit()" class="tb" autocomplete="off" onfocus="javascript:toggleLayer('suggest')" /></p>
<input type="submit" />
</form>
<div id="suggest">
<iframe name="searchWindow" src="searchsuggest.php" width="300" frameborder="0" height="400" scrolling="auto"></iframe>
</div>

</td>
</tr>
</table>

</td>
<td bgcolor="#0054A6"></td>
</tr>
<tr>
<td class="greybackground">&nbsp;</td>
<td class="greybackground">
<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<?php 
// check if the user is logged in, if so display the Pending Approvals section

echo '<td width="200" valign="top">

<table width="180" border="0" cellpadding="4" cellspacing="4">
<tr><td align="centre">
<div id="logo">
<p>IT Service Centre</p>
</div>

<div id="requests">
<a href="itrequests.php">My Requests</a>
</div>

<div id="requests">
My Local IT Contact

<p><a href="myitcontact.php">Click here to find my local IT Contact</a></p>
</div>
';
// Fortune

echo '<div id="fortune">';
echo '<div class="message">';
require_once 'class_fortune.php';
$myFortune = new Fortune();
echo '<p>Did You Know?</p>';

echo "<em>" . '"' . $myFortune->getRandom() . '"' ."</em>";
echo '</div>'; // close fortune
echo '</div>'; // close fortune

?>
</td><tr>
</table>
</td>

<td width="760" valign="top">
<div id="content">


