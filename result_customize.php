<?php
require_once('includes/config.php');

if(isset($_POST['result'])){

$level=$_POST['level'];
$man=$_POST['man'];
$price=$_POST['price'];

// getting level of parts
$level="SELECT * FROM level WHERE name='$level'";
$result_level=mysqli_query($dbc,$level) or die(mysqli_error($dbc));
$row_level=mysqli_fetch_array($result_level);
$_SESSION['level']= $row_level['id'];

//getting manefacturer of parts
$man="SELECT * FROM manfecturer WHERE name='$man'";
$result_man=mysqli_query($dbc,$man) or die(mysqli_error($dbc));
if(mysqli_num_rows($result_man)==1){
$row_man=mysqli_fetch_array($result_man);
$_SESSION['man']= $row_man['id'];
}

else{

$_SESSION['man']='any';

}

//Determining Price Level

if($price=='p_1'){

$_SESSION['price']='high';

}

else{

$_SESSION['price']='low';

}

header('location:smart_customization_result.php');

}

?>