<?php 

// Navigation.inc.php
	
?>


<script language="JavaScript" type="text/javascript">
<!--
function sc_nav ( selectedtype )
{
  document.page.page.value = selectedtype ;
  document.page.submit() ;
}
-->
</script>

<table height="72" border="0"><tr valign="bottom"><td>
<form action="loadpage.php" name="page" id="navform" method="POST">
<input type="hidden" name="page" />
<div id="sc_navigation">
<ul>
<li class="navlink"><a href="javascript:sc_nav('index.php')">Home</a></li>
<li class="navlink"><a href="javascript:sc_nav('services.php')">Services</a></li>
<li class="navlink"><a href="javascript:sc_nav('information.php')">Information</a></li>
<!--
<li class="navlink"><a href="javascript:sc_nav('itrequests.php')">IT Requests</a></li>
-->
<li class="navlink"><a href="javascript:sc_nav('faults.php')">Report a Fault</a></li>
<li class="navlink"><a href="javascript:sc_nav('help.php')">Help</a></li>
<li class="navlink"><a href="javascript:sc_nav('searchresults.php')">Search</a></li>
</ul>
</div>

</form>
</td>
</tr>
</table>