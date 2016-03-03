<?php

// adminnav.inc.php

// Admin Navigation bar



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
<form action="../../Includes/loadpage.php" name="page" id="navform" method="POST">
<input type="hidden" name="page" />
<div id="sc_navigation">
<ul>
<li class="navlink"><a href="javascript:sc_nav('admin.php')">Upload IT Contacts File</a></li>
<li class="navlink"><a href="javascript:sc_nav('admin_editmotd.php')">Edit Message of the Day</a></li>
<li class="navlink"><a href="javascript:sc_nav('admin_editfortune.php')">Edit Fortunes</a></li>

</ul>
</div>

</form>
</td>
</tr>
</table>