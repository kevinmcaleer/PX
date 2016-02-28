<?php

	// demandtest.php
	
	// tests out workflow and forms, test bed
	
	
	setcookie('formid', 1);
	session_start();
	
	require 'includes/header.inc.php';
	require 'includes/navigation.inc.php';
	
	echo '<script language="JavaScript" type="text/javascript">
	<!--
		function addquestion(formid)
		{
			document.questionform.formid.value = formid;
			document.questionform.submit();
		}
		
	
	--></script>';
	
	require_once 'class_Form.php';
	require_once 'class_Request.php';
	
	// create a new request
	$myRequest = new Request();
	$myRequest->load(9); // order a blackberry for this test
	
	
	// create a new form
	$myForm = new Form();
	$myForm->load(1);
	
	// build the form
	echo '<div class="message">';
	
	echo $myRequest->name;
	
	echo '<h1>' . $myForm->name . '</h1><br />';
	echo $myForm->description . '<br />';
	
	//echo '<div id="questions">';
	//echo '<div class="message">';
	
	// questions
	
	echo '<iframe src="questionform.php" name="questionframe" width="100%" height="500" frameborder="0"></iframe>';
	
	
	//echo '</div>'; // close questions div tag
	//echo '</div>'; //close message div tag
	
	
	// form for adding questions
	
	// first check if the user is an administrator
	
	if($usr->level == 'A')
	{
		//echo '<div id="addquestion">';
		
		echo '<a href="javascript:toggleLayer(' . "'addquestion'" . ')" class="edit">Add New Question> </a>';
		echo '<div id="addquestion">' . "\n";
		echo '<form name="questionform" target="questionframe" method="POST" action="questionform.php">';
		echo '<input type="hidden" name="formid" />';
		echo '<input type="hidden" name="submitted" />';
		echo 'Question Text <input type="text" name="question_text"/><br />';
		echo 'Question Type';
	
		echo '<select name="type">' . "\n";
		echo '<option value="Y">Yes/No</option>' . "\n";
		echo '<option value="M">Multiple Choice</option>' . "\n";
		echo '<option value="F">Free Text</option>' . "\n";
		echo '</select>' . "\n";
		echo 'Multiple Choice options: <input type="text" name="options" />';
		echo '</form>' . "\n";
		echo '<a href="javascript:addquestion('. $myForm->id .')">Add New Question</a>';
		//echo '</div>' . "\n";
		echo '</div>'; // close the add question div tag
		// end of add questions bit
	}
	
	
	echo '</div>'; // close message div tag
	
	require 'includes/footer.inc.php';
?>
