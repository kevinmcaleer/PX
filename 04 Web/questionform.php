<html>
<body>
<link href="public_html/css/core.css" rel="stylesheet" type="text/css">

<?php

// questionform.php

// Hosts the questions for a form (from within the forms <iframe> tag

// check that this form has been passed a formid

if(isset($_COOKIE['formid']))
{
	require 'resources/class/class_Question.php';
	
	echo '<script language="JavaScript" type="text/javascript">
	<!--
		function deletequestion(questionid)
		{
			document.deleteform.question_id.value = questionid;
			document.deleteform.submit();
		}
		
	
	--></script>';
	
	// echo 'formid is set - '. $_POST['formid'];
	
	// if the formid is set then add the question to the form
	$newQuestion = new Question();
	if(isset($_POST['submitted']))
	{
		
		$newQuestion->question_text = $_POST['question_text'];
		$newQuestion->type = $_POST['type'];
		$newQuestion->form_id = $_COOKIE['formid'];
		$newQuestion->save();
		
		//echo 'new question added';
	}
	
	// delete question
	if(isset($_POST['delete']))
	{
		$newQuestion->delete($_POST['question_id']);
	}
	// just display the form
}	
	
	require_once 'resources/class/class_Form.php';
	$myForm = new Form();
	$myForm->load($_COOKIE['formid']);

	// create a new question
	
	$myQuestion = new Question(); 
	$row = $myQuestion->getAllQuestionsForForm($myForm->id);
	$question_count = 0;
	
	 
	// create a table for layout
	
	echo '<form name="deleteform" method="POST" action="questionform.php">';
	echo '<input type="hidden" name="question_id" />';
	echo '<input type="hidden" name="delete" />';
	echo '</form>';
	echo '<div class="message">' . "\n";
	echo '<table width="100%" cellspacing="0" cellpadding="0" border="0">';
	
	while ($myRow = pg_fetch_array($row))
	{
		$question_count ++;
		echo '<tr><td width="100px">' . "\n";
		echo 'Question '. $question_count . ") </td><td>";
		echo $myRow['question_text'] . "</td><tr>\n";
		if ($myRow['type'] == 'Y')
		{
			// 'Y/N';
			
			echo '<tr><td width="100px">&nbsp;</td><td>';
			echo '<label><input type="radio" name="'. $myRow['question_id'] .'" value="Y" />Y</label>' . "\n";
			echo '<label><input type="radio" name="'. $myRow['question_id'] .'" value="N" />N</label><br />' . "\n";
			echo '</td><td align="right"><a href="javascript:deletequestion('. "'" . $myRow['question_id']. "'" .')" style="color:red; text-decoration:none;">x</a></td></tr>';
		}
		else if($myRow['type'] == 'M')
		{
			
			echo '<tr><td></td><td>multiple choice';
			
			echo '<label><input type="radio" name="answer" value="" /></label>';
			
			echo '</td><td align="right"><a href="javascript:deletequestion('. "'" . $myRow['question_id']. "'" .')" style="color:red; text-decoration:none;">x</a></td></tr>';
		}
		else if($myRow['type'] == 'F')
		{
			echo '<tr><td width="100px">&nbsp;</td><td>';
			echo 'Free Text';
			echo '</td><td align="right"><a href="javascript:deletequestion('. "'" . $myRow['question_id']. "'" .')" style="color:red; text-decoration:none;">x</a></td></tr>';
		}
	}
	echo '</table>'; // close the question layout table
	echo '</div>';	// close the questionline div tag
	
?>

</body>
</html>