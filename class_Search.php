<?php

// search.php 

// Search Class

class SearchService
{

	public $searchstring = '';
	
	public function go($str)
	{
		$searchstring = strtoupper($str);
		if ($searchstring !='')
		{
			include 'sc_connection.php';
			
			 $query = 'SELECT service.name, service.id, service.description, service.image
					   FROM service, 
						(SELECT service.id 
						 FROM 
						  (SELECT service_tag_link.id as SID, service_tag_link.service_id, service_tag_link.tag_id, R1.id
						   FROM service_tag_link,  
						    (SELECT tag.id, tag.name
							 FROM tag
						     WHERE tag.name LIKE ' .  "'" . '%' . $searchstring. '%' . "'" .'
							 ORDER BY tag.name) AS R1
						   WHERE service_tag_link.tag_id = R1.id) AS R2, service
						 WHERE R2.service_id = service.id
						 GROUP BY service.id) AS R3
						WHERE service.id = R3.id
						ORDER BY service.name';
			
			// This was a simple query that returns tags , not services.
			//$query = "SELECT id, name FROM tag WHERE name LIKE '%" . $searchstring . "%' ORDER BY name ASC";
			$result = pg_query($sc_connection, $query);
 			return $result;
		}
	}
}

class SearchRequest
{
	
	public $searchstring = '';
	
	public function go($str)
	{
		$searchstring = strtoupper($str);
		if ($searchstring !='')
		{
			include 'sc_connection.php';
			$query = "SELECT id, name FROM request WHERE name LIKE '%" . $searchstring . "%' ORDER BY name ASC";
			$result = pg_query($sc_connection, $query);
 			return $result;
		}
	}
}

class SearchTag
{
	
	public $searchstring = '';
	
	public function go($str)
	{
		$searchstring = strtoupper($str);
		if ($searchstring !='')
		{
			include 'sc_connection.php';
			$query = "SELECT id, name FROM tag WHERE name LIKE '%" . $searchstring . "%' ORDER BY name ASC LIMIT 5";
			$result = pg_query($sc_connection, $query);
 			return $result;
		}
	}
}

class SearchITContact
{
	public $searchstring = '';
	public $site;
	public $area;
	public $business_group;
	public $buidling;
	
	public function go($str, $param)
	{
		$searchstring = strtolower($str);
		include 'sc_connection.php';
		
		// test for site filter
		if(isset($_GET['site']))
		{
			if($_GET['site'] != 'NULL' || '')
			$site_condition = "AND site = '{$_GET['site']}'";
		}
		else
			$site_condition = "OR site ILIKE '%{$searchstring}%'";
		
		// test for building filter
		if (isset($_GET['building']))
		{
			if($_GET['building'] != "NULL" || '')
			{
				echo "building is " . $_GET['building'];
				$building_condition = "AND building = '%{$_GET['building']}%'";
			}
		}
		else
		{
			
			$building_condition = "OR building ILIKE '%{$searchstring}%'";
		}
		if ($searchstring !='')
		{
			
			$query = "SELECT id, firstname, lastname, building, site, area, phone, business_group 
					  FROM 
					  itcontacts 
					  WHERE firstname ILIKE '%{$searchstring}%' 
					  OR lastname ILIKE '%{$searchstring}%' 
					  OR phone ILIKE '%{$searchstring}%'
					  {$site_condition}
					  {$building_condition}
					  OR business_group ILIKE '%{$searchstring}%'
					  OR area ILIKE '%{$searchstring}%'
					  ORDER BY lastname ASC LIMIT 100";
			$result = pg_query($sc_connection, $query) or die($query);
		}
		else
		{
			// if the parameter is true then show all the IT contacts otherwise do nothing
			if($param == TRUE)
			{
				$query = "SELECT id, firstname, lastname, building, site, area, phone, business_group FROM itcontacts WHERE firstname ILIKE '%%' {$site_condition}  {$building_condition} ORDER BY lastname ASC LIMIT 100";
				$result = pg_query($sc_connection, $query) or die($query);
			}
		}
		
		//echo $query;
 		return $result;
	}
}


?>