<?php
require_once('includes/config.php');

if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$age=$_POST['age'];
$ll=$_POST['ll'];
$about=$_POST['about'];
$add=$_POST['address'];

$query="UPDATE users_profile SET name='$name' , email='$email', mobile='$mobile' , age='$age' , land_line='$ll' , address='$add'
,about='$about' WHERE users_id='$_SESSION[logged_id]'";

$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

header('location:update_profile.php?done=1');

}
?>