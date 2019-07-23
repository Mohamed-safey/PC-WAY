<?php
require_once('includes/config.php');

if(isset($_POST['subscribe'])){


$from=$_POST['mail'];
$msg=$_POST['userMsg'];
$to="info@one-blood.com";

mail($to,$msg,$from,$sub,$userPhone);

header('location:index.php?done=1#mail');

}
?>