<?php //data.php
require_once 'config.php';



	



$fname    =$_POST['full_name'];	
$mobile   = $_POST['number'];
$email   = $_POST['email'];
$vehicle_make  = $_POST['vehicle_make'];
$vehicle_model_name   = $_POST['vehicle_model_name'];
$vehicle_model_year  = $_POST['vehicle_model_year'];
$parts_needed_one   = $_POST['parts_needed_one'];
$parts_needed_two   = $_POST['parts_needed_two'];
$parts_needed_three   = $_POST['parts_needed_three'];
$parts_needed_four   = $_POST['parts_needed_four'];
$parts_needed_five   = $_POST['parts_needed_five'];
$parts_needed_six   = $_POST['parts_needed_six'];
$parts_needed_seven   = $_POST['parts_needed_seven'];
$parts_needed_eight   = $_POST['parts_needed_eight'];
$parts_needed_nine   = $_POST['parts_needed_nine'];
$parts_needed_ten   = $_POST['parts_needed_ten'];
$selling   = $_POST['selling'];

$agent_recognition_num   = $_POST['agent_recognition_num'];
$brand   = $_POST['brand'];
$supplier  = $_POST['supplier'];
$availability  = $_POST['availability'];
$engine_capacitor =$_POST['egin_capacitor'];
$cost_one = $_POST['cost_one'];
$cost_two = $_POST['cost_two'];
$cost_three = $_POST['cost_three'];
$cost_four = $_POST['cost_four'];
$cost_five = $_POST['cost_five'];
$cost_six = $_POST['cost_six'];
$cost_seven = $_POST['cost_seven'];
$cost_eight = $_POST['cost_eight'];
$cost_nine = $_POST['cost_nine'];
$cost_ten = $_POST['cost_ten'];
$item_status = $_POST['item_status'];
$time_of_reg = date("l jS \of F Y h:i:s A");
$updated_request_date = '';
$resolevd = ['resolevd'];



$sql="INSERT INTO item_info ( number, full_name, item_status, email, vehicle_make,
 vehicle_model_name, vehicle_model_year, parts_needed_one, cost_one, 
 parts_needed_two, cost_two, parts_needed_three, cost_three, parts_needed_four, 
 cost_four, parts_needed_five, cost_five, parts_needed_six, cost_six,
 parts_needed_seven, cost_seven, parts_needed_eight, cost_eight, 
 parts_needed_nine, cost_nine, parts_needed_ten, cost_ten, brand, 
 vehicle_condition_one, vehicle_condition_two, vehicle_condition_three,
 vehicle_condition_four, vehicle_condition_five, vehicle_condition_six, 
 vehicle_condition_seven, vehicle_condition_eight, vehicle_condition_nine,
 vehicle_condition_ten, supplier, availability, agent_recognition_num,
 request_date, updated_request_date, egin_capacitor, resolevd) 
 VALUES ('".mysql_real_escape_string($mobile)."', '".mysql_real_escape_string($fname)."', 
 '".mysql_real_escape_string($item_status)."', '".mysql_real_escape_string($email)."','".mysql_real_escape_string($vehicle_make)."', 
 '".mysql_real_escape_string($vehicle_model_name)."', '".mysql_real_escape_string($vehicle_model_year)."',
 '".mysql_real_escape_string($parts_needed_one)."',
 '".mysql_real_escape_string($cost_one)."', '".mysql_real_escape_string($parts_needed_two)."',
 '".mysql_real_escape_string($cost_two)."', '".mysql_real_escape_string($parts_needed_three)."',
 '".mysql_real_escape_string($cost_three)."', '".mysql_real_escape_string($parts_needed_four)."', 
 '".mysql_real_escape_string($cost_four)."', '".mysql_real_escape_string($parts_needed_five)."', 
 '".mysql_real_escape_string($cost_five)."', '".mysql_real_escape_string($parts_needed_six)."',
 '".mysql_real_escape_string($cost_six)."','".mysql_real_escape_string($parts_needed_seven)."', 
 '".mysql_real_escape_string($cost_seven)."', '".mysql_real_escape_string($parts_needed_eight)."',
 '".mysql_real_escape_string($cost_eight)."', '".mysql_real_escape_string($parts_needed_nine)."', 
 '".mysql_real_escape_string($cost_nine)."', '".mysql_real_escape_string($parts_needed_ten)."', 
 '".mysql_real_escape_string($cost_ten)."', '".mysql_real_escape_string($brand)."', 
 '".mysql_real_escape_string($v_condition_one)."', '".mysql_real_escape_string($v_condition_two)."',
 '".mysql_real_escape_string($v_condition_three)."', '".mysql_real_escape_string($v_condition_four)."', 
 '".mysql_real_escape_string($v_condition_five)."', '".mysql_real_escape_string($v_condition_six)."', 
 '".mysql_real_escape_string($v_condition_seven)."', '".mysql_real_escape_string($v_condition_eight)."', 
 '".mysql_real_escape_string($v_condition_nine)."',  '".mysql_real_escape_string($v_condition_ten)."',
 '".mysql_real_escape_string($supplier)."',  '".mysql_real_escape_string($availability)."', 
 '".mysql_real_escape_string($agent_recognition_num)."', '".mysql_real_escape_string($time_of_reg)."', 
 '".mysql_real_escape_string($updated_request_date)."', '".mysql_real_escape_string($engine_capacitor)."', 
 '".mysql_real_escape_string($resolevd)."')";

// Insert data into mysql
 
$result = mysql_query($sql); 

// if successfully insert data into database, displays message "Successful".
if($result){
header('Location: ./thankyou.php');
}
else {
	
echo "kojovi";
//echo "ERROR ".$sql;
}
		
// close mysql
mysql_close();
?> 