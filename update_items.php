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


  // updat items script
if ($_GET['id'] and $_GET['item_status']){
  

error_reporting(0);

if (isset($_GET['submit']))
        {
       function upload_img(){
	$path="uploads/";
	if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])){
		$path="uploads/".time()."_".$_FILES['image']['name'];
		if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
			
		}
	}
	return $path;
}


function upload_pdf(){
	$path="uploads/1.jpg";
	if(isset($_FILES['pdf']) && !empty($_FILES['pdf']['tmp_name'])){
		$path="uploads/".time()."_".$_FILES['pdf']['name'];
		if(move_uploaded_file($_FILES['pdf']['tmp_name'],$path)){
			
		}
	}
	return $path;
}


// Get values from form
    if (isset($_GET['submit']))
      
$fname 		      = $_GET['full_name'];	
$mobile 		  = $_GET['number'];
$email  		  = $_GET['email'];
$vmake  		  = $_GET['vehicle_make'];
$vmodel  		  = $_GET['vehicle_model_name'];
$vyear 		 	  = $_GET['vehicle_model_year'];
$parts_needed     = $_GET['parts_needed'];
$selling   		  = $_GET['selling'];
$availability 	  = $_GET['supplier'];
$supplier  		  = $_GET['availability'];
$engine_capacitor = $_GET['egin_capacitor'];
$cost 			  = $_GET['cost'];
$item_status 	  = $_GET['item_status'];
$datetime 		  = $_GET['updated_request_date'];
$fimage = upload_img();

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
		$sql = "UPDATE item_info SET ".$values." WHERE id='$id'";


		
		$result = mysql_query($sql) or die(mysql_error());
}
if($result){
echo "<div class='success'>Item Updated Successfully.<span style='position: relative;left:40%;'></span></div>";

  
     $sql = "SELECT *
FROM `item_info` WHERE id=$id 
ORDER BY `item_info`.`id` DESC 
 ";
     
    $query = mysql_query( $sql );
    
      while( $row = mysql_fetch_assoc($query) ){
        
        if($row['item_status']=='attended'){
			
				$full_name = $row['full_name'];
				//$email   = $row['email'];
				$email   = "dsaved8291@gmail.com";
				$datetime  =  $row['request_date'];

				$megg = "Hello ".$full_name." 
				\n\nWe're writing about your request on ".$row['parts_needed_one'].", ".$row['parts_needed_two'].", 
				".$row['parts_needed_three'].", ".$row['parts_needed_four'].", ".$row['parts_needed_five'].", 
				".$row['parts_needed_six'].", ".$row['parts_needed_seven'].", ".$row['parts_needed_eight'].", 
				".$row['parts_needed_nine'].", ".$row['parts_needed_ten']." with Best Auto Solutions on ".$datetime.". 
				\n\nWe have your parts in stock and prices are ready.
				\n\nKindly ignore this message if you have been updated on the price already.";

				
				$to = $email;
				$subject = "Your items are ready";

				$message = "
				<html>
				<head>
				<title>Best Auto Solution</title>
				</head>
				<body>
				<p>$megg</p>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <noreply@bestautosolutionsgh.com>' . "\r\n";
				$sent = mail($to,$subject,$message,$headers);}
}
}
else {
echo "<div class='error'>Error While Updating Item.<span style='position: relative;left:40%;'></span></div>";

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
				<form action="request_items.php" >
					<div align="left" class="m-tw">
						<input type="submit" class="md-btn md-raised pink p-h-md" value="Close form">
						<input form="SubmitterButting" type="submit" class="md-btn md-raised pink p-h-md" value="Update Item">			
						 <!-- done botton for completed item-->
						 <input form="done" type="submit" class="md-btn md-raised pink p-h-md" value="Done">
							
					</div>
				</form>
	</div>

      <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">

      <?php

      $id=$_GET['id'];
     $sql = "SELECT *
FROM `item_info` WHERE id=$id 
ORDER BY `item_info`.`id` DESC 
 ";
     // $sql = "select * from news_data ";
    $query = mysql_query( $sql );
      $i=0;
      while( $row = mysql_fetch_assoc($query) ){
        
        


		if($row['item_status']=='unattended'){
			$query=("UPDATE item_info SET item_status='pending'  WHERE id=$id");
			$result = mysql_query($query);
			
			
				$full_name = $row['full_name'];
				$email   = $row['email'];
				$datetime  =  $row['request_date'];

				$megg = "Hello ".$full_name.
				"We're writing about your request with Best auto Solutions on ".$datetime.". We’re sorry that it’s taking longer than we thought\n.

					Kindly check back with us in 20 minutes if you do  not receive an update on your request.

					\nWe understand how important your car is to you and apologize for any inconvenience.

					\n 

					\nThank you for using Best Auto Solutions Ghana Ltd.

					 

					\nSincerely

					\nBestautosolutionsgh.com";

				//$to = $_POST['email'];
				$to = $email;
				$subject = "Request recieved";

				$message = "
				<html>
				<head>
				<title>Work Access</title>
				</head>
				<body>
				<p>$megg</p>
				</body>
				</html>
				";

				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <noreply@bestautosolutionsgh.com>' . "\r\n";
				$sent = mail($to,$subject,$message,$headers);
		}
		

        $reg_status1= $row['item_status'];
        
             // $path = substr($row['image'],3);
      
      
      
        ?> 



<div class="card" ng-controller="MDInputCtrl"  >
	<?php if ($reg_status1=="attended") {

	  echo '<div class="card-heading" style="border-top: 5px solid #4caf50">';
	  $coloure = "#4caf50";
	  
	} if ($reg_status1=="pending") {

	  echo '<div class="card-heading" style="border-top: 5px solid #ffc107">';
	  $coloure = "#ffc107";
	}

	 if ($reg_status1=="unattended"){
	echo '<div class="card-heading" style="border-top: 5px solid #f44336">';
		$coloure = "#f44336";
	}
	$colouregreen = "#4caf50";
	$colourered = "#f44336";
	$colourecatton = "#ffc107";
	

	 ?>
		
  <!-- update item satus to attended-->
		  <form id="done" method="get" action="">
				<input type="text" value="<?php echo $row['id']?>" name="id" style="display:none;">
				<input type="text" value="attended" name="item_status" style="display:none;">
		  </form>
		  
      
    
<div class="card-heading">
    <h2>Requestee's Information</h2>
  </div>
  

      <form id="SubmitterButting" method="get" action="">
  
        <input type="text" value="<?php echo $row['id']?>" name="id" style="display:none;">
        <input type="text" value="pending" name="item_status" style="display:none;">

  </div>
  <div class="card-body">
    <div class="row row-sm">
      <div class="col-sm-12">
  
  
  
  <div class="card-body">
    <div class="row row-sm">
      <div class="col-sm-12">
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['vehicle_make']; ?>" type="text" name="vehicle_make" ng-model="user.firstName" >
          <label>Car Make</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['vehicle_model_name']; ?>" type="text" name="vehicle_model_name" ng-model="user.lastName" >
          <label>Car Model  Name</label>
        </div>
      </div>

       <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['egin_capacitor']; ?>" type="text" name="egin_capacitor" ng-model="user.lastName" >
          <label>Car Engine Capacitor</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['vehicle_model_year']; ?>"  name="vehicle_model_year" ng-model="user.city" >
          <label>Car Model Year</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['supplier']; ?>"  type="text" name="supplier" ng-model="user.postalCode"  required>
          <label>Supplier</label>
        </div>
      </div>

<div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['availability']; ?>" type="text" name="availability" ng-model="user.postalCode" required>
          <label>Availability</label>
        </div>
      </div>
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_one']; ?>" type="text" name="parts_needed_one" ng-model="user.state" >
          <label>Parts Needed one</label>
        </div>
      </div>
	  
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_one" value="<?php echo $row['vehicle_condition_one']; ?>">
          <label>Condition one</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_one']; ?>" type="text" name="cost_one" ng-model="user.lastName" required>
          <label>Cost one</label>
        </div>
      </div>
	  
	  
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_two']; ?>" type="text" name="parts_needed_two" ng-model="user.state" >
          <label>Parts Needed two</label>
        </div>
      </div> 
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_two" value="<?php echo $row['vehicle_condition_two']; ?>">
          <label>Condition two</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_two']; ?>" type="text" name="cost_two" ng-model="user.lastName" >
          <label>Cost two</label>
        </div>
      </div> 
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_three']; ?>" type="text" name="parts_needed_three" ng-model="user.state" >
          <label>Parts Needed three</label>
        </div>
      </div>
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_three" value="<?php echo $row['vehicle_condition_three']; ?>">
          <label>Condition three</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_three']; ?>" type="text" name="cost_three" ng-model="user.lastName" >
          <label>Cost three</label>
        </div>
      </div>  
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_four']; ?>" type="text" name="parts_needed_four" ng-model="user.state" >
          <label>Parts Needed four</label>
        </div>
      </div> 
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_four" value="<?php echo $row['vehicle_condition_four']; ?>">
          <label>Condition four</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_four']; ?>" type="text" name="cost_four" ng-model="user.lastName" >
          <label>Cost four</label>
        </div>
      </div> 
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_five']; ?>" type="text" name="parts_needed_five" ng-model="user.state" >
          <label>Parts Needed five</label>
        </div>
      </div>
	    
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_five" value="<?php echo $row['vehicle_condition_five']; ?>">
          <label>Condition five</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_five']; ?>" type="text" name="cost_five" ng-model="user.lastName" >
          <label>Cost five</label>
        </div>
      </div>
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_six']; ?>" type="text" name="parts_needed_six" ng-model="user.state" >
          <label>Parts Needed six</label>
        </div>
      </div>
	    
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_six" value="<?php echo $row['vehicle_condition_six']; ?>">
          <label>Condition six</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_six']; ?>" type="text" name="cost_six" ng-model="user.lastName" >
          <label>Cost six</label>
        </div>
      </div>
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed seven']; ?>" type="text" name="parts_needed seven" ng-model="user.state" >
          <label>Parts Needed seven</label>
        </div>
      </div>
	    
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_seven" value="<?php echo $row['vehicle_condition_seven']; ?>">
          <label>Condition seven</label>
        </div>
      </div>
	  
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_seven']; ?>" type="text" name="cost_seven" ng-model="user.lastName" >
          <label>Cost seven</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_eight']; ?>" type="text" name="parts_needed_eight" ng-model="user.state" >
          <label>Parts Needed eight</label>
        </div>
      </div>
	    
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_eight" value="<?php echo $row['vehicle_condition_eight']; ?>">
          <label>Condition eight</label>
        </div>
      </div>
	  
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_eight']; ?>" type="text" name="cost_eight" ng-model="user.lastName" >
          <label>Cost eight</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_nine']; ?>" type="text" name="parts_needed_nine" ng-model="user.state" >
          <label>Parts Needed nine</label>
        </div>
      </div>
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_nine" value="<?php echo $row['vehicle_condition_nine']; ?>">
          <label>Condition nine</label>
        </div>
      </div>
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_nine']; ?>" type="text" name="cost_nine" ng-model="user.lastName" >
          <label>Cost nine</label>
        </div>
      </div>  
	  
      <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input"  value="<?php echo $row['parts_needed_ten']; ?>" type="text" name="parts_needed_ten" ng-model="user.state" >
          <label>Parts Needed ten</label>
        </div>
      </div> 
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="vehicle_condition_ten" value="<?php echo $row['vehicle_condition_ten']; ?>">
          <label>Condition ten</label>
        </div>
      </div>
	  
 <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" value="<?php echo $row['cost_ten']; ?>" type="text" name="cost_ten" ng-model="user.lastName" >
          <label>Cost ten</label>
        </div>
      </div> 
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="updated_request_date" value="<?php echo date("l jS \of F Y h:i:s A") ?>" style="display:none;">
        </div>
      </div>
	  
	   <div class="col-sm-4">
        <div class="md-form-group">
          <input class="md-input" type="text" name="updated_request_date" value="<?php echo date("l jS \of F Y h:i:s A") ?>" style="display:none;">
        </div>
      </div>
	  	  
<div align="center" class="m-t">
      <input type="submit" class="md-btn md-raised pink p-h-md" value="UPDATE ITEM" style="display:none;">
  </div>
</form>

<?php 
} 


?>

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