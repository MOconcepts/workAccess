<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting (E_ALL ^ E_NOTICE);

require_once 'config.php';

	if($_POST['email']){
		$email = $_POST['email'];

		$sql="SELECT * FROM login WHERE email='$email'";
		$result = mysql_query($sql) or die(mysql_error());


		while( $row = mysql_fetch_assoc($result) ){
		  $access_type = $row['access_type'];
		  $password = $row['password'];
		}
			$message = 'Your password is :'.$password."\r\n".
			"and you belong to :".$access_type."work area\r\n";
			$subjects = 'WorkAccess password';
			$status= send_email($email,$subjects,$message);
			print_r($status);
			if($status==1){
				echo 'success';
			}else{
				echo 'faild';
			}

			function send_email($to,$subject,$msg){
				$fromemail="noreply@workaccess.com";
				$to= "$t";
				$message = "
				<html>
				<head>
				<title></title>
				</head>
				<body>
					<div>
						$msg
					</div>
				</body>
				</html>
				";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From:'.$fromemail."\r\n" .
				"Reply-To:".$fromemail."\r\n" .
				"X-Mailer: PHP/" . phpversion();
				return mail($to,$subject,$message,$headers);
			}
			}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>WORK ACCESS | recorver Password</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="../libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../libs/assets/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="../libs/jquery/waves/dist/waves.css" type="text/css" />
  <link rel="stylesheet" href="styles/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="../libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="styles/font.css" type="text/css" />
  <link rel="stylesheet" href="styles/app.css" type="text/css" />

</head>
<body>
<div class="app">

<div class="modal-over">
  <div class=" text-center animated fadeInUp" style="width:400px;margin:10% auto;"> 
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
	      <div align="center" class="m-b">
      <img src="images/accesslogo.png" >
    </div>
      </div>
    </div>
    <div class="p-lg panel md-whiteframe-z1 text-color 1" >
      <div class="m-b">
        Forgot your password?
        <p class="text-xs m-t">Enter your email address below and we will send you a mail containing your password.</p>
      </div>
      <form method="post" action="forgot-password.php">
        <div class="md-form-group">
          <input type="email" ng-model="email" class="md-input" required>
          <label>Your Email</label>
        </div>
        <input type="submit" class="md-btn md-raised pink btn-block p-h-md" title="send me my password!" value="Send" >
      </form>
    </div>
	 <a class=" text-center" href="index.php">
      <div class="m-b">Return to <button ui-sref="access.signin" class="md-btn">sign in</button></div>
   </a> 
    <p id="alerts-container"></p>
    <div class="p-v-lg text-center"></div>    
  </div>
  </div>
  </div>




</div>

<script src="../libs/jquery/jquery/dist/jquery.js"></script>
<script src="../libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<script src="../libs/jquery/waves/dist/waves.js"></script>

<script src="scripts/ui-load.js"></script>
<script src="scripts/ui-jp.config.js"></script>
<script src="scripts/ui-jp.js"></script>
<script src="scripts/ui-nav.js"></script>
<script src="scripts/ui-toggle.js"></script>
<script src="scripts/ui-form.js"></script>
<script src="scripts/ui-waves.js"></script>
<script src="scripts/ui-client.js"></script>

</body>
</html>
