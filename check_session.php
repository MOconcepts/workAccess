<?php //login.php


error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting (E_ALL ^ E_NOTICE);

session_start();
require_once ('http://kolabo8mag.net/WorkAccess/warehouse/ios/config.php');



if(!isset($_SESSION['l'])){
//$username     =$_POST['access_type'];
$passy        =$_POST['password'];
//$_SESSION['u']=$username;
$_SESSION['p']=$passy;
$_SESSION['l']=true;
}
$sql="SELECT * FROM login WHERE password='".mysql_real_escape_string($_SESSION['p'])."'";

$result = mysql_query($sql) or die(mysql_error());


while( $row = mysql_fetch_assoc($result) ){

  $screename = $row['screen_name'];
  $patty    = $row['image'];
  $access_type = $row['access_type'];
}

//  if($access_type =='admin'){
	//  $URL="test.php";
		//echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
//  } else if($access_type =='warehouse'){
//	  $URL="warehouse/test.php";
//		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
//  } else if($access_type =='frontdesk'){
//	  $URL="frontdesk/test.php";
//		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
//  }

if (mysql_num_rows($result)<1) {

$URL="./failed.php";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

 //debugging message
  unset($_SESSION['l']);
  die;
  }

  ?>
