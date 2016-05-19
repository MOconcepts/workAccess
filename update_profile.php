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
  $id=$row['id'];
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


  // update image script  	
if($_FILES["image"]){	
	$path="uploads/";
	if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
		$path="../uploads/".time()."_".$_FILES['image']['name'];
		$path2="uploads/".time()."_".$_FILES['image']['name'];
		if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
					
		}
		$query=("UPDATE login SET image='".$path2."'  WHERE id=$id");
		$result = mysql_query($query);
			if ($result){
				
			}
			else{
				echo "am done with you";
			}
	}	
}

  // updat items script
if ($_GET['id'] and $_GET['password']){

error_reporting(0);

if (isset($_GET['submit'])){
     


// Get values from form
if (isset($_GET['submit']))

$fname       =$_GET['fname'];
$lname       =$_GET['lname'];
$password    =$_GET['password'];
$email   	 =$_GET['email'];
$mobile      =$_GET['mobile'];
$screen_name =$_GET['screen_name'];
}

		

if(isset($_GET['id']))
{
	unset($_GET['submit']);
	foreach($_GET as $k=>$val){
		if(empty($_GET[$k])){
			unset($_GET[$k]);
			}
		}
	$id = $_GET['id'];
	$values= "";
	$i=0;
	foreach($_GET as $k=>$val){
		$values.=$k."= '".$_GET[$k]."'";
		if($i+1<count($_GET)){
			$values.=",";
			}
			$i++;
		}
		$sql = "UPDATE login SET ".$values." WHERE id='$id'";


		
		$result = mysql_query($sql) or die(mysql_error());
}
if($result){
echo "<div class='success'>Agent Updated Successfully.<span style='position: relative;left:40%;'></span></div>";

}
else {
echo "<div class='error'>Error While Updating Record.<span style='position: relative;left:40%;'></span></div>";

}
}
  
  
  ?>

  
 <style type="text/css">

 
 .error{
    width:100%;
    height:30px;
    position: relative;
    background: #FF0000;
    color:#fff;
    text-align: center;
 }

 .success{
    width:100%;
    height:30px;
    position: relative;
    background: #58B50C;
    color:#fff;
    text-align: center;
 }
 
 .md-whiteframe-ab {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
 
}

.nill-radius {
    border-radius: 0 !important;
}
.navbar-het {
    position: relative;
    z-index: 50;
    min-height: 37px;
    margin: 0;
    border: none;
	color: #fff
}
.m-tw {
    margin-top: 5px;
    margin-left:28px;
	
.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}
.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}
.inputfile + label * {
	pointer-events: none;
}

}
 </style>

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
  
  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

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


	    <div class="navbar-het md-whiteframe-ab nill-radius white">
				<form action="test.php" >
					<div align="left" class="m-tw">
						<input type="submit" class="md-btn md-raised pink p-h-md" value="Cancle">
						<input form="SubmitterButting" type="submit" class="md-btn md-raised pink p-h-md" value="Update Profile">
						<input form="image_upload" type="submit" name = "submit_image" class="md-btn md-raised pink p-h-md" value="submit image">

					</div>
				</form>
		</div>
	
      <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">
<div class="row row-sm">
 
  <div class="col-sm-8">
    <div class="panel panel-card">
     
		  
      <?php

      
      
     $sql = "SELECT *
FROM `login` WHERE id=$id 
 ";
     // $sql = "select * from news_data ";
    $query = mysql_query( $sql );
      $i=0;
      while( $row = mysql_fetch_assoc($query) ){
        
        
        $reg_status1= $row['item_status'];
        
             // $path = substr($row['image'],3);
      


      
      
        ?> 



<div class="card" ng-controller="MDInputCtrl"  >
		
  <div class="card-heading">
    <h2>Requestor's Information</h2>

      <form id="SubmitterButting" method="get" action="">
  
        <input type="text" value="<?php echo $row['id']?>" name="id" style="display:none;">

  </div>
  <div class="card-body">
    <div class="row row-sm">
      <div class="col-sm-12">
      
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['fname']; ?>" type="text" name="fname" ng-model="user.firstName" required>
          <label>First Name</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['lname']; ?>" type="text" name="lname" ng-model="user.lastName" required>
          <label>Last Name</label>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['password']; ?>" type="password" name="password" ng-model="user.lastName" required>
          <label>Assign a Default Password</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['email']; ?>" type="email" name="email" ng-model="user.city" required>
          <label>Email</label>
         <!--  <span class="md-input-msg right">30/30</span> -->
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['mobile']; ?>" type="tel" name="mobile" ng-model="user.state">
          <label>Mobile</label>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['screen_name']; ?>" type="text" name="screen_name" ng-model="user.postalCode" required>
          <label>Username</label>
        </div>
      </div>
			

<div align="center" class="m-t">
      <input type="submit" class="md-btn md-raised pink p-h-md" value="Update profile" style="display:none;">
	  
  </div>
</form>

<?php } ?>
</div>


 </div>
</div>
  </div>
    </div>
  </div>



  <div class="col-sm-4">
    <div class="panel panel-card">
      <div class="r-t pos-rlt" md-ink-ripple style="background:url(../images/a0.jpg) center center; background-size:cover">
      <div class="p-lg bg-white-overlay text-center r-t" style="width: 343px;">
          <a href="#" class="w-xs inline">
			<?php 
				$result = mysql_query("SELECT image FROM login WHERE id=$id"); 
				while($row = mysql_fetch_assoc($result))
					$patty = $row['image'];	
					$image = "../$patty";
				{ 
			     
				?>
				
            <img src="<?php echo "$image";?>" class="img-circle img-responsive">
			<?php } ?>
          </a>
          <div class="m-b m-t-sm h2">
            <span class=""><?php echo $screename;  ?>.</span>
          </div>
          <p>
             Work Access Area : <?php echo $access_type;  ?>.
          </p>
        </div>
      </div>
   <div class="list-group no-radius no-border">
        
        <a class="list-group-item ">
          <span class="pull-right badge">eg 200 X 200</span> Image size should be <b>(sqare)</b>
        </a>
        <a class="list-group-item ">
			<form id = "image_upload" method="POST" href="" enctype="multipart/form-data">
				<input class="m-t" type="file" name="image"/>	
			</form>
        </a>
      </div>
    </div>
  </div>
 
  </div>

		  
        </div>
      </div>
    </div>
  </div>
  <!-- / content -->




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
