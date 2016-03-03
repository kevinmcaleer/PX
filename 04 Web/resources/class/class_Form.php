<?php

// Form.php

// Form Class

class Form
{
	public $id;
	public $name;
	public $description;
	public $workflow_id; // workflow foreign key
	public $form_link_id; // form_link table foreign key
	
	public function load($formid)
	{
		require '../../delete/sc_connection.php';
		$query = 'SELECT id, name, description, workflow_id, form_link_id FROM form where id = ' . $formid;
		$result = pg_query($sc_connection, $query) or die('there was a problem running the form query');
		$row = pg_fetch_array($result);
		
		$this->id = $formid;
		$this->name = $row['name'];
		$this->description = $row['description'];
		$this->work_flow_id = $row['work_flow_id'];
		$this->form_link_id = $row['form_link_id'];
		
		// $this::show();
	}
	
	public function show()
	{
		echo 'id: ' . $this->id . "<br />\n";
		echo 'name:' . $this->name . "<br />\n";
		echo 'description: ' . $this->description . "<br />\n";
		echo 'workflow-id: ' . "<br />\n";
		echo 'form_link_id: '  . "<br />\n";
	}
}

?>