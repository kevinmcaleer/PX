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

<div id="search">
<form name="search" action="searchsuggest.php" method="get" target="searchwindow">
  <p>Search:
    <input type="text" name="search" onkeyup="this.form.submit()" class="tb" autocomplete="off" onfocus="javascript:toggleLayer('suggest')" />
  </p>
  <input type="submit" />
</form>
<div id="suggest">
  <iframe name="searchwindow" src="searchsuggest.php" width="300" frameborder="0" height="400" scrolling="auto"></iframe>
</div>
</div>
