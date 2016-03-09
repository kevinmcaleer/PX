<?php
 
/*
    Stolen from: http://code.tutsplus.com/tutorials/organize-your-next-php-project-the-right-way--net-5873
	
	The important thing to realize is that the config file should be included in every
    page of your project, or at least any page you want access to these settings.
    This allows you to confidently use these settings throughout a project because
    if something changes such as your database credentials, or a path to a specific resource,
    you'll only need to update it here.
*/
global $sc_connection;
$config = array(
    "db" => array(
        "sc" => array(
            "dbname" => "servicepointdb",
            "username" => "servicepointdb",
            "password" => "Horsefoot28!",
            "host" => "servicepointdb.db.11221321.hostedresource.com",
			"dsn" => ""  	
        ),
        "db2" => array(
            "dbname" => "database2",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost"
        )
    ),
    "urls" => array(
        "baseUrl" => "http://www.servicepoint.online"
    ),
    "paths" => array(
        "resources" => "/path/to/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/img/layout"
        )
    )
	
);
$config['db']['sc']['dsn'] = "mysql:host=". $config['db']['sc']['host'] . "; dbname=" . $config['db']['sc']['dbname'];
 
/*
    I will usually place the following in a bootstrap file or some type of environment
    setup file (code that is run at the start of every page request), but they work 
    just as well in your config file if it's in php (some alternatives to php are xml or ini files).
*/
 
/*
    Creating constants for heavily used paths makes things a lot easier.
    ex. require_once(LIBRARY_PATH . "Paginator.php")
*/
defined("LIBRARY_PATH")   || define("LIBRARY_PATH",  '../library/');
defined('INCLUDES_PATH')  || define ("INCLUDES_PATH", '../resources/includes/');
defined("CLASS_PATH")     || define("CLASS_PATH", '../resources/class');
defined("RESOURCES")      || define("RESOURCES",  '../resources/');     
defined("TEMPLATES_PATH") ||  define("TEMPLATES_PATH", '../templates/');
 
/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
 

try {
	$sc_connection = new PDO($config['db']['sc']['dsn'], $config['db']['sc']['username'], $config['db']['sc']['password']);
	$sc_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
catch (PDOException $ex)
	{
    die('Error : ' . $ex->getMessage());
 	}
?>