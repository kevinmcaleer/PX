<?php
// Contact Class

class Contact
{

	// properties
	public $id;
	public $title;
	public $firstname;
	public $middlename;
	public $surname;
	public $dob="01/01/2010";
	public $gender;
	public $level = 'S'; // S = Standard User, A = Administrator
	public $email;
	
	// methods
	public function create()
	{
		//require '../../delete/connection.php';
		require '../resources/config.php';
		$query = "INSERT INTO contact (title, firstname, middlename, surname, dob, gender) VALUES ('$this->title','$this->firstname', '$this->middlename', '$this->surname', '$this->dob', '$this->gender')";
		//echo $query;
		
		$result = $conn->query($query);
		// $result = pg_query($connection, $query) or die("There was a problem running the create query");
		// pg_close($connection);
	}
	
	public function load2($myID)
	{
	    require '../resources/config.php';
		//require '../../delete/connection.php';
	    $query = "SELECT * FROM users WHERE user_id = $myID"; // TODO - change select * to specific fields.
	    //echo "Query: " . $query . " <br />";
	    $result = pg_query($connection, $query) or die('Could not find that user');
	    //$row = pg_fetch_row($result);
	    while($row = pg_fetch_array($result))
	    {
	  	 	//echo $row["title"] . "<br />";
			$this->firstname = $row['firstname'];
			$this->surname = $row['lastname'];
			$this->id = $row['user_id'];
			$this->level = $row['level'];
			//echo $row["firstname"] . "<br />";
			//echo $row["surname"] . "<br />";
        }
	  
	    //echo "FirstName: " . $row["firstname"];
	    //echo $row[1];
	    //echo $row[];
	    //echo "FirstName Variable is: " . $this->firstname;
	}
	
	public function load($uid)
	{
		if(!empty($uid))
		{
			require '../resources/config.php';
			//require '../../scconnection.php';
			//echo $id;
			$query = "SELECT * FROM contact WHERE id = '$uid'";
		/// echo $query;
		
		// $result = pg_query($connection, $query) or die("could not run load query: $query");
		$result = $sc_connection->query($query) or die("could not run load query: $query");
		// echo pg_num_rows($result);
		
		$rows = $result->fetch(PDO::FETCH_ASSOC);
		
		// echo "title - " . $rows["title"];
		
		$this->id = $uid;
		$this->title = $rows["title"];
		$this->firstName = $rows["firstname"];
		$this->middleName = $rows["middlename"];
		$this->surName = $rows["surname"];
		$this->DOB = $rows["dob"];
		$this->gender = $rows["gender"];
		$this->level = $rows["level"];
		$this->email = $rows["email"];
		$this->pass = $rows["pass"];
		// pg_close($connection);
		// Contact::show();
		// echo $this->DOB;
		}
		
	}
	
	public function date_tableSQL($date)
	{
		$mydate = explode('/',$date);
		$day = $mydate[0];
		$month = $mydate[1];
		$year = $mydate[2];
		$newdate = array ($year,$month,$day);
		if ($day<=9) { $day="0".$day; }
	    if ($month<=9) { $month="0".$month;} 
		$newdate = implode('-',$newdate);
		
		// echo $newdate;
		return $newdate;
	}

	public function date_SQLtable($date)
	{
		$a=array ($year, $month, $year);
    	return $n_date=implode("-", $a);
	}
		
	public function update()
	{
		require '../resources/config.php';
		//require '../../delete/connection.php';
		
		
		$DOBdate = Contact::date_tableSQL($this->DOB);
		
		$query = "UPDATE contact SET title = '$this->title', firstname = '$this->firstname', middlename = '$this->middlename', surname = '$this->surname', DOB = '$DOBdate', gender = '$this->gender' WHERE id = '$this->id'";
		// echo $query;
		$result = $sc_connection->query($query);
		//pg_close($connection);
	}
	
	public function delete($id)
	{
		//require '../../delete/connection.php';
		require '../resources/config.php';
	}
	
	public function find($name)
	{
		//require '../../delete/connection.php';
		require '../resources/config.php';
	}
	
	// displays all the fields of the current record
	public function show()
	{
		echo "<h1>Records</h1> <BR />";
		echo "id: " . $this->id . "<br />";
		echo "Title: " . $this->title . "<br />";
		echo "Firstname: " . $this->firstname . "<br />";
		echo "Middlename: " . $this->middlename . "<br />";
		echo "Surname: " . $this->surname . "<br />";
		echo "DOB: " . $this->dob . "<br />";
		echo "Gender: " . $this->gender . "<br />";
		echo "Level: " . $this->level. "<br />";
		echo "Email: " . $this->email . "<br />";
		echo "<hr>";
	}
	
}

?>
