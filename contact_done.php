<?php
require_once('includes/config.php');

if(isset($_POST['contact'])){

$Name=$_POST['Name'];
$userPhone=$_POST['userPhone'];
$from=$_POST['userEmail'];
$msg=$_POST['userMsg'];
$to="info@one-blood.com";

mail($to,$msg,$from,$sub,$userPhone);

header('location:contact.php?done=1');

}
?>