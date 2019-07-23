<?php
if(isset($_POST['login'])){
session_start();
require_once('includes/config.php');
$mail=mysqli_real_escape_string($dbc, trim($_POST['email']));
$pass1=mysqli_real_escape_string($dbc, trim($_POST['pass1']));
if(empty($mail) || empty($pass1)){
header('location:user_login.php?error=1');
}//empty mail and pass
if(!empty($mail) && !empty($pass1)){
$query="SELECT id,user_name,password FROM dealers WHERE user_name='$mail' AND password=SHA('$pass1')";
$result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result);
$_SESSION['logged_d']=$row['id'];
$_SESSION['user_d']=$row['user_name'];
setcookie('user_d', $row['user_name']);
setcookie('id_d', $row['id']);
setcookie('user_d', $row['user_name'],time()+(60*60*24*30));
setcookie('id_d', $row['id'],time()+(60*60*24*30));
header('location:dealer_profile.php');
 }
else{
header('location:dealer_login.php?error=2');
}
 }
  }//not empty both

?>