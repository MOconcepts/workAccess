<?php //login.php
error_reporting(0);


$db_hostname = 'localhost';
$db_database = 'kolabo8m_work_access';
$db_username = 'kolabo8m_dsaved';
$db_password = 'salvationboy@akor1';


// Connect to server.
$db_server = mysql_connect($db_hostname, $db_username, $db_password)
    or die("Unable to connect to MySQL: " . mysql_error());
	
// Select the database.
mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());
	


?>