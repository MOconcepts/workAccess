<?php   
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once '../config.php';


if(!isset($_SESSION['l'])){
$username     =$_POST['access_type'];
$passy        =$_POST['password']; 
$_SESSION['u']=$username;
$_SESSION['p']=$passy;
$_SESSION['l']=true;
}
$sql="SELECT * FROM login WHERE access_type='".mysql_real_escape_string($_SESSION['u'])."' AND password='".mysql_real_escape_string($_SESSION['p'])."'";

$result = mysql_query($sql) or die(mysql_error());


while( $row = mysql_fetch_assoc($result) ){
        
  $screename = $row['screen_name'];
  $patty    = $row['image'];
  $access_type = $row['access_type'];
  $id1 = $row['id'];
}
 
if (mysql_num_rows($result)<1) {

$URL="../failed.php";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 

 //debugging message
  unset($_SESSION['l']);
  die;
 } 



$result1 = mysql_query("SELECT * FROM item_info WHERE item_status='pending' AND agent_recognition_num =$id1");
$num_rows2 = mysql_num_rows($result1);
echo $num_rows2;

$result = mysql_query("SELECT * FROM item_info WHERE item_status='unattended' AND agent_recognition_num =$id1");
$num_rows = mysql_num_rows($result);
echo $num_rows;
?>
  
  
  