<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="../public_html/css/core.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="message">

<form action="../public_html/tagsuggest.php" method="get" name="tagform" target="searchwindow">
Add tag: <input type="hidden" name="search" onkeyup="this.form.submit()" autocomplete="off"/>
</form>
</div>

<iframe src="../public_html/tagsuggest.php" height="100" width="200" name="searchwindow"></iframe>


</body>
</html>
