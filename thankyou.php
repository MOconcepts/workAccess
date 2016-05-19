<?php //login.php


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
}
 
if (mysql_num_rows($result)<1) {

$URL="../failed.php";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 

 //debugging message
  unset($_SESSION['l']);
  die;
  } 

  
  

  
  ?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>WORK ACCESS</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="../styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../styles/font.css" type="text/css" />
  <link rel="stylesheet" href="../styles/app.css" type="text/css" />

</head>
<body>
<div class="app">

  
	<?php require 'menu_nav.php';?>
	

  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="box">
   <?php require 'nav_bar.php';?>
      <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">

<div class="app">
<div class="amber-200 bg-big">
  <div class="text-center">
    <h1 class="text-shadow no-margin text-white text-4x p-v-lg">
      <span class="text-2x font-bold m-t-lg block">THANKS</span>
    </h1>
  
    <p class="h4 m-v-lg text-u-c font-bold text-black">Your Request has been submited successfully  </p>
    <div class="p-v-lg">
      <a href="test.php" md-ink-ripple class="md-btn md-raised pink p-h-md">
        <span class="text-white">Control Panel</span>
      </a>
      <a href="cpanel.php" md-ink-ripple class="md-btn md-raised pink p-h-md">
        <span class="text-white">Add Request</span>
      </a>
    </div>
  </div>
</div>
</div>

		  
		  
</div>

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="../libs/jquery/waves/dist/waves.js"></script>

<script src="../scripts/ui-load.js"></script>
<script src="../scripts/ui-jp.config.js"></script>
<script src="../scripts/ui-jp.js"></script>
<script src="../scripts/ui-nav.js"></script>
<script src="../scripts/ui-toggle.js"></script>
<script src="../scripts/ui-form.js"></script>
<script src="../scripts/ui-waves.js"></script>
<script src="../scripts/ui-client.js"></script>

</body>
</html>
