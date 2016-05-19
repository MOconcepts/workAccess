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
  $id1 = $row['id'];
}
 
if (mysql_num_rows($result)<1) {

$URL="../failed.php";
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

 <style type="text/css">


 .something{


    width:100%;
    height:30px;
    position: relative;
    background: #000;
    color:#fff;
    text-align: center;
 }

.modalDialog {
    position: fixed;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 99999;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.modalDialog:target {
    opacity:15;
    pointer-events: auto;
}
.modalDialog > div {
	background:#fff;
    width: 400px;
    position: relative;
    margin: 10% auto;
   	height: auto;
    border-radius: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.8);
    
}



 </style>

<div class="app">
  
  			<?php require 'menu_nav.php';?>
			
  <!-- content -->
  <div id="content" class="app-content" role="main">
    <div class="box">
	
   <?php require 'nav_bar.php';?>
   
      <div class="box-row">
        <div class="box-cell">
          <div class="box-inner padding">
            


  <div class="panel panel-default">
    <div class="panel-heading">
    Requested Items
    </div>
    <div class="panel-body b-b b-light">
      Search: <input id="filter" type="text" class="form-control input-sm w-auto inline m-r"/>
    </div>
    <div>

      <table class="table m-b-none" ui-jp="footable" data-filter="#filter" data-page-size="10">
        <thead >
          <tr>
              <th data-toggle="true">#</th>
              <th data-toggle="true">Full Name</th>
              <th data-toggle="true">Requested Items</th>
              <th data-hide="">Status</th>
              <th>Update</th>
              <!--<th>Delete</th>-->
          </tr>
        </thead>
        <tbody style="overflow:scroll">

         <?php
             $sql = "SELECT *
        FROM `item_info` WHERE agent_recognition_num = $id1 AND item_status!='attended'
        ORDER BY `item_info`.`id` DESC
         ";
     
    $query = mysql_query( $sql );
      $i=0;
	  $idnum = 1;
      while( $row = mysql_fetch_assoc($query) ){
		$reg_status1= $row['item_status'];
		
		if ($reg_status1=="attended") {
		$label1 = "label green";
		}
		
		if ($reg_status1=="pending") {
		  $label1 = "label amber";
		}

		if ($reg_status1=="unattended"){
		$label1 = "label red";
		}

        ?> 
     
          <tr>
			  <td><?php echo $idnum++;?></td>
              <td><?php echo $row['full_name'];?></td>
              <td><?php echo $row['parts_needed_one'].", ".$row['parts_needed_two'].", ".$row['parts_needed_three'].", ".$row['parts_needed_four'].", ".$row['parts_needed_five'].", ".$row['parts_needed_six'].", ".$row['parts_needed_seven'].", ".$row['parts_needed_eight'].", ".$row['parts_needed_nine'].", ".$row['parts_needed_ten'];?></td>
			 <td ><span class="<?php echo $label1;?>"  style = "color:#fff" title="<?php echo $row['item_status'];?>"><?php echo $row['item_status'];?></span></td>
              <td><a href="update_items.php?id=<?php echo $row['id'];?>"><button>Update</button></a></td>
             <!-- <td><a href="#openModal?id//<?php echo $row['id'];?>"><button>Delete</button></a></td> -->
          </tr>

		  <div id="openModal?id<?php echo $row['id'];?>" class="modalDialog" >
			  <div class="app" >
				<div class=" " >
				  <div class="text-center">

				<h1 class="text-shadow no-margin text-4x p-v-sm">
				<span style="color:red">DELETE!!!</span>
				</h1>
					<p class="h5 m-v-lg text-u-c font-bold text-black" >Are you sure you want to delete this user reqest record</p>
						<a href="request_items.php?id=<?php echo $row['id'];?>" title="Delete" md-ink-ripple class="md-btn md-raised pink p-h-md">Delete</a>
						<a href="#close" title="Cancel" md-ink-ripple class="md-btn md-raised pink p-h-md">Cancel</a>
					</p>
			   </div>
				</div>
				</div>
		  </div>
          <?php } ?>

		  	  </tbody>
		    <tfoot class="hide-if-no-paging">
          <tr>
              <td colspan="5" class="text-center">
                  <ul class="pagination"></ul>
              </td>
          </tr>
        </tfoot>
		</table>

		  

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