<?php
require_once('includes/config.php');

//$_SESSION['cat_id']

$p_id=$_POST['p_id'];
$price=$_POST['price'];

$query="SELECT * FROM parts_dealers WHERE dealer_id='$_SESSION[logged_d]' AND part_id='$p_id'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
if(mysqli_num_rows($result)==1){

header('location:add_exisiting.php?error=1');

}

else{
$query="SELECT * FROM parts WHERE id='$p_id'";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result);

$query2="SELECT * FROM part_properties WHERE part_id='$p_id'";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
$row_2=mysqli_fetch_array($result2);


$query3="INSERT INTO parts_dealers VALUES('','$p_id','$_SESSION[cat_id]','$row_2[level_id]','$row_2[level_s]','$row[man_id]','$_SESSION[logged_d]'
,'$price')";
$result3=mysqli_query($dbc,$query3) or die(mysqli_error($dbc));

header('location:add_exisiting.php?done=1');

}

?>