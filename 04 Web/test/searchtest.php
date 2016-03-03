<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="../public_html/css/core.css" rel="stylesheet" type="text/css" />
</head>

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
-->
</script>

<body>
<div id="searchbox">
<form name="search" action="../searchsuggest.php" method="get" target="searchWindow">
Search: <input type="text" name="search" onkeyup="this.form.submit()" class="tb" autocomplete="off" onfocus="javascript:toggleLayer('suggest')" onblur="javascript:toggleLayer('suggest')" />
<input type="submit" /

</form>
</div>

<div id="suggest">
<iframe name="searchWindow" src="../searchsuggest.php" width="300"  frameborder="0"></iframe></div>
<p><a href="../resources/class/class_Search.php" target="_top">test</a></p>
<p>&nbsp; </p>
</body>
</html>
