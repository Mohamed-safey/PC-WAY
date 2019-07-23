<?php
require_once('includes/config.php');

if(isset($_POST['register'])){

$uname=$_POST['username'];
$pw1=$_POST['password'];
$pw2=$_POST['cpassword'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$ll=$_POST['ll'];
$email=$_POST['email'];
$age=$_POST['age'];
$add=$_POST['address'];
$about=$_POST['about'];

if(!empty($uname) && !empty($pw1) && !empty($pw2)){

if($pw1==$pw2){

$query1="SELECT * FROM users WHERE user_name='$uname'";
$result1=mysqli_query($dbc,$query1)or die(mysqli_error($dbc));
if(mysqli_num_rows($result1)==1){
header('location:user_register.php?error=1');
}

else{

$query2="INSERT INTO users VALUES ('','$uname',SHA('$pw1'))";
$result2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

$query3="SELECT * FROM users WHERE user_name='$uname'";
$result3=mysqli_query($dbc,$query3)or die(mysqli_error($dbc));
$row=mysqli_fetch_array($result3);

$query4="INSERT INTO users_profile VALUES('','$name','$email','$mobile','$ll','$add','$about','$age','$row[id]')";
$result4=mysqli_query($dbc,$query4) or die(mysqli_error($dbc));

header('location:user_login.php?done=1');

}


}//both password and confirm shabh b3d

else{

header('location:user_register.php?error=2');

}

 }//if not empty all fields ya gd3an

}
?>