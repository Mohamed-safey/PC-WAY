<?php
require_once('includes/config.php');

if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$time=$_POST['time'];
$ll=$_POST['ll'];
$about=$_POST['about'];
$add=$_POST['address'];

$query="UPDATE dealers_profile SET name='$name' , email='$email', mobile='$mobile' , time='$time' , land_line='$ll' , address='$add'
,about='$about' WHERE dealers_id='$_SESSION[logged_d]'";

$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

header('location:update_profile_d.php?done=1');

}
?>