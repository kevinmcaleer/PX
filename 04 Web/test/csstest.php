<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="../public_html/css/core.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.tb {
	border: 1px solid #0054a6;
}
-->
</style>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#0054a6">&nbsp;</td>
    <td width="960px">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="headertable">
  <tr>
    <td bgcolor="#0054A6"><div id="navigation">
<ul>
<li><a href="../public_html/index.php">Home</a></li>
<li><a href="">Item 1</a></li>
<li><a href="">Item 2</a></li>
<li><a href="">Item 3</a></li>
</ul>
</div></td>
    <td valign="bottom" bgcolor="#0054A6"><div id="account">
<p>Welcome <a href="">Kevin</a>, <a href="">Logout</a></p>
</div></td>
  </tr>
</table></td>
    <td bgcolor="#0054a6">&nbsp;</td>
  </tr>
  <tr>
    <td class="greybackground">&nbsp;</td>
    <td class="greybackground">
    <p><img src="../public_html/img/Title.png" width="226" height="51" /></p>
    
    <div id="breadcrumbs">
    <table border="0" cellpadding="0" cellspacing="0"><tr><td>
	<a href="../public_html/index.php">Home</a></td><td><img src="../public_html/img/navimg.png" /></td><td><a href="../public_html/services.php"> Services </a></td><td><img src="../public_html/img/navimg.png" /></td><td>Email
	</td></tr></table>
    </div>
    
	
	<?php 
	
	include '../resources/includes/navigation.inc.php';
	
	?>
  <table border="1"><tr> <td bgcolor="#0054a6>"  
    <div id="account">
<p>Welcome <a href="../account.php">Kevin</a>, <a href="../logout.php">Logout </a></p></div><div id="search"><form action="../public_html/SearchResults.php" method="GET" name="searchform"><p> Search </p><input type="text" name="search" class="tb"/><input type="submit"></form></div>
   </td></tr></table>
   
    <p>&nbsp;</p></td>
    <td class="greybackground">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div id="footer"><p>Copyright &copy; <a href="#">Work Book</a> 2010 | Designed by <a href="http://www.advicefactory.co.uk">Advice Factory Ltd</a> | Valid <a href="http://jigsaw.w3.org/css-validator/">CSS</a> &amp; <a href="http://validator.w3.org">XHTML</a></p></div></td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php

include '../resources/includes/footer.inc.php';
?>
