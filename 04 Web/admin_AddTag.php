<link href="public_html/css/core.css" rel="stylesheet" type="text/css">

<?php

// Addresources/class/class_Tag.php

// adds tags from the servicepage

$tagged = FALSE;
if(isset($_POST['tag']))
{
	// add the tag
	include 'resources/class/class_Tag.php';
	$myTag = new Tag();
	$name = $_POST['tag'];
	$myTag->name = $name;
	$myTag->add();
	
	// reload page
	
	$tagged = TRUE;
	
	//echo '<div class="message">';
	//echo '<p>Tag Added.</p>';
	//echo '</div>';
}

// create the tagediting form
	
   		
    ?>
    
      
<script language="JavaScript" type="text/javascript">
<!--
function tagsearch ()
{
	document.searchsug.search.value = document.tagform.tag.value
    document.searchsug.submit() ;
  // parent.document.location = selectedtype;
}
-->
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td><div id="tagform">
<form action="admin_AddTag.php" method="post" name="tagform">
Add tag: <input type="text" name="tag" onkeyup="tagsearch()" autocomplete="off"/>
</form>

<form action="tagsuggest.php" method="get" name="searchsug" target="searchwindow">
<input type="hidden" name="search" autocomplete="off"/ onKeyUp="this.form.submit()">
</form>
</div>



<?php
	if($tagged==TRUE)
	{
		// echo '<td>';
		echo 'Tag Added.';
		// echo '</td>';
	}

?>
</td></tr>
<tr><td>
<iframe src="tagsuggest.php" height="75" width="200" name="searchwindow" frameborder="0"></iframe>
</td></tr></table>
