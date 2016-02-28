<?php

// Question.php

// Question class

class Question
{
	public $id;
	public $question_text;
	public $type; // question type - either Y/N, Multiple Choice or Free Text
	public $answer; // the answer to the question
	public $form_id; // the parent form this question belongs to
	
	// load the question with the current question id qid
	public function load($qid)
	{
		require 'sc_connection.php';
		$query = 'SELECT id, question_text, type, answer, form_id FROM question WHERE id = ' .$qid;
		$result = pg_query($sc_connection, $query) or die('There was a problem running the question query');
		$row = pg_fetch_array($result);
		$id = qid;
		$question_text = $row['question_text'];
		$type = $row['type'];
		$answer = $row['answer'];
		$form_id = $row['form_id'];
	}
	
	public function getAllQuestionsForForm($formid)
	{
		require 'sc_connection.php';
		$query = 'SELECT question.id AS question_id, question.question_text, question.type, question.answer, question.form_id, form.id
				  FROM question, form
				  WHERE question.form_id = form.id
				  AND form.id = ' . $formid;
		$result = pg_query($sc_connection, $query) or die ('there was a problem running the loadAllQuestionsForForm query');
		return $result; // return the result so that the caller can walk through the results
	}
	
	public function save()
	{
		require 'sc_connection.php';
		$query = "INSERT INTO question (question_text, type, answer, form_id) VALUES ('{$this->question_text}', '{$this->type}','{$this->answer}',{$this->form_id})";
		$result = pg_query($sc_connection, $query) or die('There was a problem running the Save Queston query');
		pg_close($sc_connection);
	}
	
	public function delete($qid)
	{
		include 'sc_connection.php';
		$query = "DELETE FROM question WHERE id = " . $qid;
		$result = pg_query($sc_connection, $query) or die ("Could not delete that question record");
	}
	
}

?>
