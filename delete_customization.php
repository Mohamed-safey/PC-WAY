<?php

require_once('includes/config.php');

if(isset($_GET['cus_id'])){

$cust_id=$_GET['cus_id'];

$delete="DELETE FROM user_customization WHERE id='$cust_id' AND users_id='$_SESSION[logged_id]'";
$result=mysqli_query($dbc,$delete) or die(mysqli_error($dbc));

$delet2="DELETE FROM customization_details WHERE u_c_id='$cust_id'";
$resul2=mysqli_query($dbc,$delet2) or die(mysqli_error($dbc));

header('location:user_profile.php?done=4');

}

?>