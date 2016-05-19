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

<?php
if(isset($_GET['id']))
{
	$id = $_GET['id'];
//$id=mysql_real_escape_string($_GET['deleted']);
mysql_query("DELETE FROM item_info where id='$id'");

if(mysql_query){
	echo "<div class='something'>You have successfully delete item at row $id<span style='position: relative;left:40%;'><a href='request_items.php' title='Close' class=''>X</a></span></div>";
}

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

 <div class="row row-sm">

	<div class="col-sm-4">
          <div class="card ">
            <div class="card-heading">
              <h2><b>Request</b></h2>
              <small>total request rundown</small>
            </div>
            <div class="list-group list-group-lg no-bg">
              <a  class="list-group-item">
                <span class="pull-right">
                  <span style="color:#fff" id="unattended" class="label red">0</span>
                </span>
                Unattended Request
              </a>
              <a  class="list-group-item">
                <span class="pull-right">
                  <span id="pending" class="label yellow">0</span>
                </span>
                Pending
              </a>
              <a class="list-group-item">
                <span class="pull-right">
                  <span class="label green"></span>
				  <span style="color:#fff" id="attended" class="label green">0</span>
                </span>
                Attended Request
              </a>
              <a href="request_items.php" class="list-group-item">
                <span class="pull-right">
                  <b class="label bg-info"><span id="total">0</span></b>
                </span>
                Total Request
              </a>
            </div>
          </div>
        </div>

	<div class="col-sm-4">
      <div class="panel panel-card">
	   <div class="card-heading">
        <div style = "height: 110px;">
			 <h2><b>Agents</b></h2>
              <small>Registerd agents on work access</small>
        </div>
		</div>
        <div class="panel-body text-center">
          <div class="m-v-lg">
            Total accounts
            <div class="h2 text-success font-bold"><span id="regAgents">0</span></div>
          </div>
        </div>

      </div>
    </div>

	<div class="col-sm-4">
		  <div class="panel panel-card">
		   <div class="card-heading">
			<div style = "height: 25px;">
				 <h2><b>Time</b></h2>
				  <small>Current time and date</small>
			</div>
			</div>
			<div class="panel-body text-center">
			  <div class="m-v-lg" style = "margin-top: 3px;">
				Date:
				<div class="h2 text-info-lt font-bold">
				<?php echo date("l");?>
				</div>
				<div class="h2 text-info-lt font-bold">
				<?php echo date(" d~m~Y");?>
				</div>
			  </div>
			  <div class="m-v-lg">
				Time waits for no one!!!
				<div class="h2 text-success font-bold">
				<span id="hours">0</span>:<span id="minutes">0</span>:<span id="seconds">0</span>
				</div>
			</div>

		  </div>
		</div>

	  </div>

 </div>
 </div>
 </div>


<script>
 $(document).ready(function(){
     setInterval(ajaxcall, 1000);
 });
 function ajaxcall(){
     $.ajax({
         url: 'gettime.php',
         success: function(data) {
             data = data.split(':');
             $('#hours').html(data[0]);
             $('#minutes').html(data[1]);
             $('#seconds').html(data[2]);
             $('#unattended').html(data[3]);
             $('#pending').html(data[4]);
             $('#attended').html(data[5]);
             $('#total').html(data[6]);
             $('#regAgents').html(data[7]);
         }
     });
 }
</script>




<script src="../scripts/countItem.js"></script>
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
