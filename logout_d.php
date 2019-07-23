<?php
//start the session//
session_start();
//checks to see if the special_id session variable has been set//
if(isset($_SESSION['logged_d'])){
//delete the session variable//
$_SESSION= array();
}
if(isset($_COOKIE['id_d'])){
setcookie('id_d','',time()-3600);
setcookie('user_d','',time()-3600);
}
//checks to see if a cookies has benn set that holds the session id//
if(isset($_COOKIE[session_name()])){
setcookie(session_name(),'',time()-3600);
}
//destroy the session//
session_destroy();
//redirect back to home page//
header('location:index.php');
?>