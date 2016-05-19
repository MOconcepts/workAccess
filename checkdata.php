<?php //login.php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting (E_ALL ^ E_NOTICE);

session_start();
require_once 'config.php';


	$emailId=$_POST['password'];

	$checkdata=" SELECT password FROM login WHERE password='$emailId' ";

	$query=mysql_query($checkdata);

	if(mysql_num_rows($query)>0)
	{
	echo "Please choose a different password";
	}
	else
	{
	echo "Password accepted";
	
exit();
}
?>