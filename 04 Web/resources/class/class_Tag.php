<?php

/**
 * Tags Class
 *
 * Stores Tags for contacts, services, information and requests
 *
 * @author Kevin McAleer kevin.mcaleer@advicefactory.co.uk
 * @copyright (c) 2016, Advice Factory Ltd
 * @link http://www.servicepoint.online
 * @since Version 1.0
 * @filesource
 *
 */
// -----------------------------------------------------------------------------

/**
 * Tag Class, tag the world
 */
class Tag {

    public $id;
    public $name;

    /**
     * Add a tag
     */
    public function add() {
        include '../resources/config.php';
        // convert to UPPER CASE
        $this->name = strtoupper($this->name);

        // check that no other tag with this name already exists
        $query = "SELECT name, id  FROM tag WHERE name = '" . $this->name . "'";
        include '../resources/config.php';
        $result = $sc_connection->query($query) or die("problem with query, $query");
        if ($result->rowcount() == 0) {
            $query = "INSERT INTO tag (name) VALUES ('" . $this->name . "')";
            $result = $sc_connection->query($query) or die("Couldn't add the tag");

            // find the newly added tag and then add it to service_tag_link.

            $query = "SELECT tag.id, tag.name FROM tag WHERE tag.name = " . "'" . $this->name . "'";
            $result = $sc_connection->query($query) or die('problem with query');
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            $this->name = $row['name'];

            // check its not already added to the service_tag_link table for this service to prevent duplicates
            // insert code here
            // now add it to service_tag_link
            $query = "INSERT INTO service_tag_link (service_id, tag_id) VALUES (" . "'" . $_COOKIE['serviceid'] . "', '" . $this->id . "')";
            $result = $sc_connection->query($query) or die('could not add the tag to the service_tag_link table');
        } else {
            // tag already exists
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $this->id = $row['id'];
            //echo $this->id;
            // check that it is not already in the serivce_tag_link table

            $check = "SELECT service_tag_link.id, service_tag_link.tag_id, service_tag_link.service_id, tag.id, service.id 
				 	  FROM service, tag, service_tag_link
					  WHERE service.id = service_tag_link.service_id
					  AND tag.id = service_tag_link.tag_id
					  AND service.id = " . $_COOKIE['serviceid'] .
                    " AND tag.id = " . $this->id;
            // echo $check;
            $reslt = $sc_connection->query($check);
            if ($reslt->rowcount() == 0) {
                // get the id for the existing tag and add to this service
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $query = "INSERT INTO service_tag_link (service_id, tag_id) VALUES (" . "'" . $_COOKIE['serviceid'] . "', '" . $this->id . "')";
                $result = $sc_connection->query($query) or die("Problem adding existing tag  - {$query} ");
                //include_once 'class_service.php';
            } else {
                // it was already in the service_tag_link table
            }
        }
    }
    /**
     *  Load a particular tag
     * @param type $tid
     */
    public function load($tid) {
        include '../resources/config.php';
        $query = "SELECT id, name FROM tag WHERE id = " . $tid;
        $result = $sc_connection->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $this->id = $row['id'];
            $this->name = $row['name'];
        }
    }

    public function loadAllForService($serviceid) {
        include '../resources/config.php';
        $query = '
		SELECT tag.id, tag.name, service_tag_link.tag_id, service_tag_link.service_id 
		FROM tag, service_tag_link, service
		WHERE service_tag_link.service_id = service.id 
		AND service_tag_link.tag_id = tag.id
		AND service_tag_link.service_id = ' . $serviceid . " ORDER BY tag.name ASC";

        $result = $sc_connection->query($query);
        return $result;
    }
}

?>